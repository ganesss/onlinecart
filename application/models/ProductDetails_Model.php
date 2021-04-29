<?php
class ProductDetails_Model extends CI_Model
{
	public function get_cart_item(){
		$sessionid=$this->session->session_id;
		$cart_list=$this->db->where('A.sessionid',$sessionid)->from('cart_items A')->join('product_details B','A.productid=B.id','inner')->get()->result_array();
		return $cart_list;
	}

	public function get_order_item($orderno){
		$sessionid=$this->session->session_id;
		$order_list=$this->db->where('order_number',$orderno)->from('order_items A')->join('product_details B','A.productid=B.id','inner')->get()->result_array();
		return $order_list;
	}

	public function get_order_details(){
		$sessionid=$this->session->session_id;
		$order_details=$this->db->from('order_details A')->join('customer_details B','A.userid=B.id','inner')->get()->result_array();
		return $order_details;
	}

	public function get_order_info($orderno){
		$order_details=$this->db->where('order_number',$orderno)->from('order_items A')->join('product_details B','A.productid=B.id','inner')->get()->result_array();
		return $order_details;
	}
}
?>