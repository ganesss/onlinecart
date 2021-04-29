<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductDetails extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ProductDetails_Model');
	}

	public function index()
	{
		$this->load->view('product_shop_list_view');
	}

	public function save(){

		if(!empty($_FILES['file'])){
			$data_store['product_image']=$_FILES['file']['name'];
			$destination="assets/upload/".$data_store['product_image'];
			move_uploaded_file($_FILES['file']['tmp_name'], $destination);
		}

		$id=$this->input->post('id');
		$data_store['name']=$this->input->post('name');
		$data_store['short_description']=$this->input->post('short_description');
		$data_store['long_description']=$this->input->post('long_description');
		$data_store['price']=$this->input->post('txt_price');
		$data_store['status']=$this->input->post('sel_status');
		
		if(!empty($id)){
			$data_store['modified_date']=date('Y-m-d');
			$result=$this->db->where('id',$id)->update('product_details',$data_store);
		}else{
			$data_store['created_date']=date('Y-m-d');
			$result=$this->db->insert('product_details',$data_store);
		}
		
		echo ($result)?"success":"error";
	}

	public function product_list(){
		$this->load->view('product_list_view');
	}

	public function get_product_details(){
		$result=$this->db->where('status','active')->get('product_details')->result();
		$data['result_data']=$result;
		echo json_encode($data);
	}

	public function get_product_list(){
		$result=$this->db->get('product_details')->result();
		$data['result_data']=$result;
		echo json_encode($data);
	}

	public function get_product_view(){
		$id=$this->uri->segment(2);
		$data['product']=$this->db->where('id',$id)->get('product_details')->result_array();
		$this->load->view('product_view',$data);
	}

	public function add_cart(){
		$product_id=$this->input->post('product_id');
		$sessionid=$this->session->session_id;
		$get_product_data=$this->db->where('id',$product_id)->get('product_details')->result_array();

		$data_to_store['productid']=$product_id;
		$data_to_store['sessionid']=$sessionid;
		$data_to_store['price']=$get_product_data[0]['price'];
		$data_to_store['created_date']=date('Y-m-d');

		$get_cart_data=$this->db->where('productid',$product_id)->where('sessionid',$sessionid)->get('cart_items')->result_array();
		$insert_cart=$this->db->insert('cart_items',$data_to_store);
		$cart_data['status']=(!empty($insert_cart))?'success':'error';
		$cart_data['mode']='insert';

		$cart_list=$this->db->where('sessionid',$sessionid)->get('cart_items')->result_array();
		echo json_encode($cart_data);
	}

	public function get_cart_list(){
		$sessionid=$this->session->session_id;
		$cart_list=$this->db->where('sessionid',$sessionid)->get('cart_items')->result_array();
		$cart_data['result']=$cart_list;
		echo json_encode($cart_data);
	}

	public function cart_checkout(){
		$this->load->view('cart_items_view');
	}

	public function get_checkout_details(){
		$data['get_cart_items']=$this->ProductDetails_Model->get_cart_item();
		echo json_encode($data);
	}

	public function remove_cart(){
		$cartid=$this->input->post('cartid');
		$this->db->where('c_id',$cartid)->delete('cart_items');
	}

	public function checkout(){
		$this->load->view('cart_checkout_view');
	}

	public function place_order(){	
		$today = date("Ymd");
		$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
		$order_number=$today . $rand;
		$name=$this->input->post('cus_name');
		$email=$this->input->post('cus_email');
		$phone=$this->input->post('cus_phone');
		$address=$this->input->post('cus_address');
		$sessionid=$this->session->session_id;

		$store_customer_details['name']=$name;
		$store_customer_details['email']=$email;
		$store_customer_details['phone']=$phone;
		$store_customer_details['address']=$address;
		$store_customer_details['created_date']=date('Y-m-d');

		$customer_details=$this->db->where('name',$name)->where('email',$email)->where('phone',$phone)->where('address',$address)->get('customer_details')->result_array();
		if(!empty($customer_details)){
			$user_id=$customer_details[0]['id'];
		}else{
			$this->db->insert('customer_details',$store_customer_details);
			$user_id=$this->db->insert_id();
		}
		
		$cart_list=$this->db->where('sessionid',$sessionid)->get('cart_items')->result_array();

		if(!empty($cart_list)){
			$total_price=array();
			foreach ($cart_list as $key => $value) {
				$store_order_items['sessionid']=$sessionid;
				$store_order_items['userid']=$user_id;
				$store_order_items['order_number']=$order_number;
				$store_order_items['productid']=$value['productid'];
				$store_order_items['price']=$value['price'];
				$store_order_items['created_date']=date('Y-m-d');
				$this->db->insert('order_items',$store_order_items);
				$total_price[]=$value['price'];
			}

			$store_order_details['sessionid']=$sessionid;
			$store_order_details['userid']=$user_id;
			$store_order_details['order_number']=$order_number;
			$store_order_details['totalPrice']=array_sum($total_price);
			$store_order_details['email']=$email;
			$store_order_details['phone']=$phone;
			$store_order_details['address']=$address;
			$store_order_details['status']="Placed";

			$this->db->insert('order_details',$store_order_details);
		}

		$this->db->where('sessionid',$sessionid)->delete('cart_items');
		$this->session->sess_destroy();

		$data['status']='success';
		$data['order_no']=$order_number;

		echo json_encode($data);
	}

	public function get_order_details(){
		$order_number=$this->uri->segment(2);
		$data['get_order_items']=$this->ProductDetails_Model->get_order_item($order_number);

		$data['get_total_amount']=0;
		foreach ($data['get_order_items'] as $key => $value) {
			$data['get_total_amount']+=$value['price'];
			$data['order_date']=$value['created_date'];
			$data['order_number']=$value['order_number'];
		}

		$this->load->view('order_report_view',$data);
	}

	public function order_list(){
		$data['get_order_details']=$this->ProductDetails_Model->get_order_details();
		$this->load->view('order_list_view',$data);
	}

	public function display_order_details(){
		$order_number=$this->input->post('order_number');
		$data['get_order_details']=$this->ProductDetails_Model->get_order_info($order_number);

		$data['get_total_amount']=0;
		foreach ($data['get_order_details'] as $key => $value) {
			$data['get_total_amount']+=$value['price'];
			$data['order_date']=$value['created_date'];
			$data['order_number']=$value['order_number'];
		}

		echo json_encode($data);
	}
}
