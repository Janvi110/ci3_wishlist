<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Homem extends CI_Model {

    function __construct() {
        parent::__construct();	
    }
    
	function save_wishlist_setting($data){
	   	$this->db->select('*');
       	$this->db->where('shop',$data['shop']);
	   	$this->db->where('key',$data['key']);
       	$query = $this->db->get('wishlist_setting');
	   	if($query->num_rows() > 0){ //update
		   	$this->db->where('shop',$data['shop']);
		   	$this->db->where('key',$data['key']);
			   $this->db->update('wishlist_setting',$data);	
		   	}else{
		       $this->db->insert('wishlist_setting',$data);
		 }
	}
   
    function get_wishlist_setting($shop_id){
  
       $this->db->select('*');
       $this->db->where('shop',$shop_id);
	 
       $query = $this->db->get('wishlist_setting');
	   $setting=array();
	   if($query->num_rows() > 0){ //update
	      $result=$query->result();
		  foreach($result as $row){
		  
			  $setting[$row->key]=$row->value;
		}
		  
	   }
	    return $setting;
	 }
	 
}
