<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Sys_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
   
  public function InsertData($tablename, $data=array()){

      $this->db->insert($tablename, $data);

      return $this->db->insert_id();
   }

   public function AddTag($tablename, $data=array()){

	    $this->db->insert($tablename, $data);
	    return $this->db->insert_id();
   }

   public function getlist($table_name, $shop_id){

        $this->db->where('status', '1');
        $this->db->where('shop_id', $shop_id);
        $this->db->select('*');
        $this->db->from($table_name);
        $query = $this->db->get();
        return $query->result();
   }

   public function getsinglelist($table_name, $field, $val){

      $this->db->where($field, $val);
      $this->db->select('*');
      $this->db->from($table_name);
      $query = $this->db->get();
      return $query->result();  
    }

   public function delete($tablename, $field, $val){

        $this->db->where($field, $val);
        $this->db->delete($table_name);
   }

   public function update($table_name, $field, $val, $data=array()){
         
      $this->db->where($field, $val);
      $this->db->update($table_name, $data);

    }

    public function count_rec($tablename, $field, $val){

        $this->db->where($field, $val);
        $this->db->select('*');
        $this->db->from($tablename);
        $query = $this->db->get();
        return $query->num_rows();  
    }

    public function get_cost($table_name, $field1, $val1, $field2, $val2, $field3, $val3){


        $this->db->where($field1, $val1);
        $this->db->where($field2, $val2);
        $this->db->where($field3, $val3);
        $this->db->select('*');
        $this->db->from($table_name);

        $query = $this->db->get();
        return $query->result();  
    }

    public function get_class_list($table_name, $field1, $val1, $field2, $val2){

        $this->db->where($field1, $val1);
        $this->db->where($field2, $val2);
        $this->db->where('status', '1');
        $this->db->select('*');
        $this->db->from($table_name);
        $query = $this->db->get();
        return $query->result();  
    }


    public function get_title_name($type){

        if($type==1){
            $page_title = "products";
        }elseif($type==2){
            $page_title = "Product title";
        }elseif($type==3){
            $page_title = "collections";
        }elseif($type==4){
            $page_title = "cart";
        }elseif($type==5){
            $page_title = "Check out";
        }elseif($type==6){
            $page_title = "popupcart";
        }

        return $page_title;
    }

    public function check_data_exist($table_name, $field1, $val1, $field2, $val2, $field3, $val3, $field4, $val4){

        $this->db->where('status', '1');
        $this->db->where($field1, $val1);
        $this->db->where($field2, $val2);
        if(isset($field3) AND $field3 != ''){
          $this->db->where($field3.'!=', $val3);
        }
        if(isset($field4) AND $field4 != ''){
          $this->db->where($field4, $val4);
        }
        $this->db->select('*');
        $this->db->from($table_name);
        $query = $this->db->get();
        return $query->num_rows();  
    } 

    public function getProducts($table_name, $shop_id){

        $this->db->where('shop_id', $shop_id);
        $this->db->select('*');
        $this->db->from($table_name);
        $query = $this->db->get();
        return $query->result_array();
   }

   public function getProducts_front($table_name, $field, $val){

        $this->db->where($field, $val);
        $this->db->select('*');
        $this->db->from($table_name);
        $query = $this->db->get();
        return $query->result_array();
   }

   public function getProducts_with_limit($table_name, $shop_id,$lowerLimit,$perPageCount,$search = ''){
        
        $this->db->where('shop_id', $shop_id);
        $this->db->select('*');
        if($search != ''){
          $this->db->group_start();
          $this->db->or_like('product_title', $search);
          $this->db->or_like('variant_title', $search);
          $this->db->or_like('variant_sku', $search);
          $this->db->or_like('msrp', $search); 
          $this->db->or_like('inventory_quantity', $search);  
          $this->db->group_end();        
        } 
        $this->db->limit($perPageCount, $lowerLimit);  
        $this->db->from($table_name);     
        $query = $this->db->get();
        return $query->result_array();
   }

   public function get_currency_icon($currency) {

    $locale='en-US'; //browser or user locale
    $fmt = new NumberFormatter( $locale."@currency=$currency", NumberFormatter::CURRENCY );
    $symbol = $fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
    return $symbol;
  }
   
}
