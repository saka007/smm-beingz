<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class paypal extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $paypal;
	public $payment_type;
	public $currency_code;
	public $tb_services;
	public $tb_order;
	public $mode;

	public function __construct(){
		parent::__construct();
		$this->tb_users            = USERS;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
		$this->tb_services         = SERVICES;
		$this->tb_services         = SERVICES;
		$this->tb_order            = ORDER;
		$this->payment_type		   = "paypal";
		$this->mode = get_option("payment_environment", "");
		$this->currency_code = (get_option("currency_code", "USD") == "")? 'USD' : get_option("currency_code", "USD");
		$this->load->library("paypalapi");
		$this->paypal = new paypalapi(get_option('paypal_client_id',""), get_option('paypal_client_secret',""));

		$CI = &get_instance();
		if(empty($CI->model)){
			$CI->load->model('model', 'model');
		}


	}

	public function index(){
		redirect(cn("checkout"));
	}

	/**
	 *
	 * Create payment
	 *
	 */

	public function create_payment($order_details = ""){
		unset_session("order_details");
		$item_ids      = $order_details['item_ids'];
		$email         = $order_details['email'];
		$item = $this->model->get('id, price, name, quantity', $this->tb_services, ['ids' => $item_ids, 'status' => 1]);
		if (empty($item)) {
			redirect(cn("checkout"));
		}

		$description = 'Order '.$item->name.' ('.$item->quantity.') - ServiceID #'.$item->id.' - '.$email;
		$amount = $item->price;
		if (!empty($amount) && $amount > 0) {
			$data = (object)array(
				"amount"       => $amount,
				"currency"     => $this->currency_code,
				"description"  => $description,
				"redirectUrls" => cn("checkout/paypal/complete"),
				"cancelUrl"    => cn("checkout/unsuccess"),
			);
			set_session("order_details", $order_details);
			$response = $this->paypal->create_payment($data, $this->mode);
			if ($response->status) {
				$this->load->view('paypal/index', ['redirect_url' => $response->approvalUrl]);
			}else{
				ms(array(
					"status"  => "error",
					"message" => $response->message
				));
			}
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang('this_payment_is_not_active_please_choose_another_payment_or_contact_us_for_more_detail')
			));
		}
	}

	/**
	 *
	 * Call Execute payment after creating payment
	 *
	 */
	public function complete(){

		if (isset($_GET["paymentId"]) && $_GET["paymentId"] == session('paypal_payment_id')) {
			$result = $this->paypal->execute_payment($_GET["paymentId"], $_GET["PayerID"], $this->mode);
                      
			// get amount
			$amount = $result->transactions[0]->amount;
			$amount = $amount->total;

			// get Transaction Id
			$transactions = $result->getTransactions();
			$related_resources = $transactions[0]->getRelatedResources();
			$sale = $related_resources[0]->getSale();
			$get_transaction_fee = $sale->getTransactionFee();
			$sale_id = $sale->getId();


			if(!empty($result) && $result->state == 'approved'){

				require_once 'orders.php';
				$data_order = (object)array(
					'payment_type'          => $this->payment_type,
					'amount'                => $amount,
					'txt_id'                => $sale_id,
					'transaction_fee'       => $get_transaction_fee->getValue(),
					'order_details'         => session('order_details'),
				);
				unset_session('order_details');
				unset_session('paypal_payment_id');	
				$order = new orders();
				if(!$order->save_order($data_order)){
					redirect(cn("checkout/unsuccess"));
				};
				/*----------  Add funds to user balance  ----------*/
				redirect(cn("checkout/success"));
			}else{
				redirect(cn("checkout/unsuccess"));
			}

		}else{
			redirect(cn("checkout/unsuccess"));
		}
	}
}