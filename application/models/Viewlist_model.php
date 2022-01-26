<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Viewlist_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function getstorebyurl($shop){

        $this->db->select('*');
        $this->db->where('shop_url', $shop);
        $query = $this->db->get('shop');
        return $query->row();
    }

	function save_wishlist($data){

	   $this->db->select('*');
       $this->db->where('shop_id',$data['shop_id']);
	   $this->db->where('ms_customer_id',$data['ms_customer_id']);
       $query 	= $this->db->get('customer_wishlist');
	   $result  = $query->row();

	   if($query->num_rows() > 0){ //update

	   	   if(!empty($result->wishlist_token)) {
	   	   		unset($data['wishlist_token']);
	   	   }

	       $this->db->where('shop_id',$data['shop_id']);
	       $this->db->where('ms_customer_id',$data['ms_customer_id']);
		   $this->db->update('customer_wishlist',$data);

	   }else{

	       $this->db->insert('customer_wishlist',$data);
	   }
	}

	function get_wishlist($shop_id,$ms_customer_id){
	   $this->db->select('*');
       $this->db->where('shop_id',$shop_id);
	   $this->db->where('ms_customer_id',$ms_customer_id);
       $query = $this->db->get('customer_wishlist');
	   if($query->num_rows() > 0){ //update

	      $result=$query->row();
	   
		  return $result->mswishlist;
	   }
	}

	public function get_customer_wishlist_data($shop_id = '', $param = array()) {

		if( !empty($shop_id) ) {
			$this->db->where( 'shop_id', $shop_id );

			if( !empty($param['totals_only']) ) {
				$this->db->get('customer_wishlist');
			}

			if( !empty($param['fields']) ) {
				$this->db->select( $param['fields'] );
			}

			if( !empty($param['limit']) ) {

				$this->db->limit( $param['limit'], $param['offset'] );
			}

			if( !empty($param['where']) ) {
				$this->db->where( $param['where'] );
				$query 	= $this->db->get('customer_wishlist');
				$result = $query->row();

			} else {
				$query 	= $this->db->get('customer_wishlist');
				$result = $query->result();
				
			}

			if($query->num_rows() > 0) {
				return $result;
			}
		}
		return false;
	}
}

