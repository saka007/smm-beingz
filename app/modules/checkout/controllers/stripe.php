<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class stripe extends MX_Controller {
	public $tb_users;
	public $tb_transaction_logs;
	public $stripeapi;
	public $payment_type;
	public $currency_code;
	public $mode;

	public function __construct(){
		parent::__construct();

		$this->tb_users            = USERS;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
		$this->tb_services         = SERVICES;
		$this->tb_services         = SERVICES;
		$this->tb_order            = ORDER;
		$this->payment_type		   = "stripe";
		$this->mode 			   = get_option("stripe_payment_environment", "");
		$this->currency_code       = (get_option("currency_code", "USD") == "")? 'USD' : get_option("currency_code", "");
		$this->load->library("stripeapi");
		$this->stripeapi = new stripeapi(get_option('stripe_secret_key',""), get_option('stripe_publishable_key',""), $this->mode);

		$this->load->model('model', 'model');
	}

	public function index(){
		redirect(cn("checkout"));
	}

	public function create_payment($order_details = ""){
		if ($order_details) {
			$this->load->view($this->payment_type.'/index', $order_details);
		}else{
			redirect(cn());
		}
	}

	/**
	 *
	 * Create payment
	 *
	 */
	public function create_payment_step2(){
		unset_session("order_details");
		$order_details = post('order');
		
		if ($order_details['item_ids'] == "" || $order_details['email'] == "" || $order_details['link'] == ""|| $order_details['price'] == "") {
			redirect(cn());
		}

		$item_ids      = $order_details['item_ids'];
		$email         = $order_details['email'];
		$item 		   = $this->model->get('id, price, name, quantity', $this->tb_services, ['ids' => $item_ids, 'status' => 1]);
		if (empty($item)) {
			redirect(cn());
		}
		$itemName = 'Order '.$item->name.' ('.$item->quantity.') - ServiceID #'.$item->id.' - '.$email;
		$amount = $item->price;
		$token  = post("stripeToken");
		if(!empty($token)){
			// Card info
			$card_num       = post('card_num');
			$card_cvv       = post('cvv');
			$card_exp_month = post('exp_month');
			$card_exp_year  = post('exp_year');
			
			// Buyer info
			$data_buyer_info = array(
				"source" 	  => $token,
				"email" 	  => $email ,
			);

			//add customer to stripe
			$customer = $this->stripeapi->customer_create($data_buyer_info);
			// Item info
			$itemNumber = $item->name;
			$orderID    = 'ODRS'.strtotime(NOW);//charge a credit or a debit card.

			if (strtolower($this->currency_code) == 'jpy') {
				$charge = $amount;
			}else{
				$charge = $amount*100;
			}

			$data_charge = array(
				'customer'     => $customer->id,
		        'amount'       => $charge,
		        'currency'     => strtolower($this->currency_code),
		        'description'  => $itemName,
		        'metadata'     => array(
		            'order_id' => $orderID
		        )
			);
			//charge a credit or a debit card
			set_session("order_details", $order_details);
		    $result = $this->stripeapi->create_payment($data_charge);
			if (!empty($result) && $result->status == 'success') {
				/*----------  Insert to Transaction table  ----------*/
				$response = $result->response;
				
				require_once 'orders.php';
				$data_order = (object)array(
					'payment_type'          => $this->payment_type,
					'amount'                => $amount,
					'txt_id'                => $response->id,
					'order_details'         => session('order_details'),
					'transaction_fee'       => "",
				);

				$order = new orders();
				if(!$order->save_order($data_order)){
					unset_session("order_details");
					redirect(cn("checkout/unsuccess"));
				};
				/*----------  Add funds to user balance  ----------*/
				unset_session("order_details");
				redirect(cn("checkout/success"));
			}else{
				redirect(cn("checkout/unsuccess"));
			}
	
		}else{
			redirect(cn("checkout"));
		}
	}
}