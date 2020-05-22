<?php
if (!function_exists('getEmailTemplate')) {
	function getEmailTemplate($key = ""){
		$result = (object)array();

		$result->subject = '';
		$result->content = '';
		if(!empty($key)){
			switch ($key) {

				case 'new_order_notification_send_to_customer':
					$result->subject = "{{website_name}} -  Place order Successfully!";
					$result->content = "<p><span xss='removed'>Hello there,</span></p> <p><span xss='removed'>Thank you for your purchase.</span></p> <p><span xss='removed'>You  have already placed order successfully in our servivce -  <strong>{{website_name}}</strong></span></p> <p><span xss='removed'>Below is your product delivery information:</span></p> <ul> <li><span xss='removed'>Email: <strong>{{customer_email}}</strong></span></li> <li><span xss='removed'>OrderID:<strong> {{order_id}}</strong></span></li> <li><span xss='removed'>Amount:<strong> {{amount}}</strong></span></li> <li><span xss='removed'>Package:<strong> {{package_name}}</strong></span></li> <li><span xss='removed'>Manage your order link<strong>: {{manage_orders_link}}</strong></span></li> </ul> <p><span xss='removed'>It has been a pleasure doing business with you. We wish you the best of luck.</span></p> <p><span xss='removed'>Thanks and Best Regards!</span></p>";
					return $result;
					break;

                case 'new_order_notification_send_to_admin':
                    $result->subject = "{{website_name}} -  New order successfully!";
                    $result->content = '<p><span xss="removed">Hi Admin!</span></p> <p><span xss="removed">Someone have already placed order successfully in <strong>{{website_name}}</strong> with follow data:</span></p> <ul xss="removed"> <li><span xss="removed">Email: <strong>{{customer_email}}</strong></span></li> <li><span xss="removed">OrderID: <strong>{{order_id}}</strong></span></li> <li><span xss="removed">Amount:<strong> {{amount}}</strong></span></li> <li><span xss="removed">Package: <strong>{{package_name}}</strong></span></li> </ul>';

                    return $result;
                    break;

			}
		}
		return $result;
	}
}

/**
 * Replace all merge fields and return the template for email
 * 
 *
 */
if (!function_exists('parse_merge_fields')) {

    function parse_merge_fields($content = '', $merge_fields = '', $replace_main_content = true){
        if ($replace_main_content) {
            $template = file_get_contents(APPPATH.'/libraries/PHPMailer/template.php');
        }else{
            $template = $content;
        }

        $search = array(
            "{{email_content}}" => $content,
            "{{website_logo}}"  => get_option('website_logo', BASE."assets/images/logo.png"),
            "{{website_link}}"  => PATH,
            "{{website_name}}"  => get_option("website_name", "SMM PANEL"),
            "{{copyright}}"     => "&copy; 2019. ".get_option("website_name", "SMM PANEL"),
        );

        if (is_array($merge_fields)) {
            $search = array_merge($search, $merge_fields);
        }

        foreach ($search as $key => $val) {
            if (strrpos($template, $key) !== false) {
                $template = str_replace($key, $val, $template);
            }
        }
        return $template;
    }
}


if (!function_exists('send_mail_template1')) {
    function send_mail_template1($template = [], $user_id_or_email, $from_email_data = []){
        $CI = &get_instance();

        // Get Receive email, name
        if (is_numeric('$user_id_or_email')) {
            $user_info = $CI->get("email, role, timezone", USERS, "id = '{$user_id}'");

            if (empty($user_info)) {
                return "Failed to send email template! User Account does not exists!";
            }
            $recipient_email_address = $user_info->email;
            $recipient_name          = 'Admin';

        }else{
            $recipient_email_address = $user_id_or_email;
            $recipient_name          = 'Clients';
        }

        // Get Send email, name
        if (!isset($from_email_data['from_email']) && $from_email_data['from_email'] != "") {
            $from_email = $from_email_data['from_email'];
        }else{
            $from_email = get_option('email_from', '') ? get_option('email_from', '') : "do-not-reply@smm.com";
        }

        if (isset($from_email_data['from_email_name']) && $from_email_data['from_email_name'] != "") {
            $from_email_name = $from_email_data['from_email_name'];
        }else{
            $from_email_name = get_option('email_name', '') ? get_option('email_name', '') : get_option('website_title', '');
        }

        switch ($template['type']) {
            case 'order':
                $merge_fields = array(
                    "{{order_id}}"     => 1,
                    "{{package_name}}" => 2,
                    "{{quantity}}"     => 3,
                );
                break;

            default:
                $merge_fields = array();
                break;
        }

        $subject       = parse_merge_fields($template['subject'], $merge_fields, false);
        $mail_template = parse_merge_fields($template['message'], $merge_fields, true);

        /*----------  Call PHPMaler  ----------*/
        $CI->load->library("phpmailer_lib");
        $mail = new PHPMailer(true);
        $mail->CharSet = "utf-8";
        try {
            /*----------  Check send email through PHP mail or SMTP  ----------*/
            $email_protocol_type    = get_option("email_protocol_type", "");
            $smtp_server            = get_option("smtp_server", "");
            $smtp_port              = get_option("smtp_port", "");
            $smtp_username          = get_option("smtp_username", "");
            $smtp_password          = get_option("smtp_password", "");
            $smtp_encryption        = get_option("smtp_encryption", "");

            if($email_protocol_type == "smtp" && $smtp_server != "" && $smtp_port != "" && $smtp_username != "" && $smtp_password != ""){
                $mail->isSMTP();
                $mail->SMTPDebug = 0; 
                //Enable SMTP debugging
                // 0 = off (for production use)
                // 1 = client messages
                // 2 = client and server messages                               
                $mail->Host = $smtp_server; 
                $mail->SMTPAuth = false;                             
                if ($smtp_username != "" && $smtp_username != "")  {
                    $mail->SMTPAuth = true;                             
                    $mail->Username = $smtp_username;                
                    $mail->Password = $smtp_password;                         
                }                         
                $mail->SMTPSecure = $smtp_encryption;                         
                $mail->Port = $smtp_port;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );                                    
            }else{
                // Set PHPMailer to use the sendmail transport
                $mail->isSendmail();
            }
            /* Set the mail sender. */
            $mail->setFrom($from_email, $from_email_name);
            $mail->addReplyTo($from_email, $from_email_name);

            //Recipients
            $mail->addAddress($recipient_email_address, $recipient_name);    

            //Content
            $mail->isHTML(true); 
            $mail->Subject = $subject;
            $mail->MsgHTML($mail_template);

            $mail->send();

            return false;
        } catch (Exception $e) {
            $message = 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
            return $message;
        }
    }
}


?>