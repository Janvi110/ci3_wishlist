<div id="page-wrapper" >
            <!--<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Wishlist page</h1>
                </div>
                
            </div>-->
         <?php
		  if ($this->session->flashdata('message')) {
             $message = $this->session->flashdata('message');
            }	 
	     ?> 
		 	<?php if (!empty($message)): ?>
                   <div class="alert alert-success">
                      <a class="close" data-dismiss="alert">x</a>
                            <?php echo $message; ?>
                    </div>
           <?php endif; ?>
		  
<div class="panel panel-primary">
	<div class="panel-heading">
	<h3 class="panel-title">Wishlist page</h3>
	</div>
	<div class="panel-body">
	<div class="row">
      <div class="col-lg-7 col-md-12">
	         <form method="POST" id="wishlist_page_form" action="<?=base_url('homepage/wishlist_setting');?>">
		             <input type="hidden" name="return_url" value="wishlistpage">
				<div class="form-group">
					<label>Wishlist Title Text</label>
					<input class="form-control" type="text" name="wp_title_text" id="wp_title_text" placeholder="Clear All" value="<?=(isset($setting['wp_title_text']))? $setting['wp_title_text'] : 'My Wishlist'?>" >
				</div>
				
				<label>Wishlist Title  Text Color</label>
				 <div class="form-group">
				<input type="text" class="form-control" name="wp_title_text_color" id="wp_title_text_color" placeholder="Enter Hex color Value"  value="<?=(isset($setting['wp_title_text_color']))? $setting['wp_title_text_color'] : 'inherit'?>">
				
			   </div> 
			   
				<div class="form-group">
					<label>Wishlist Title Text Font Family</label>
					<input class="form-control" type="text" name="wp_title_text_fontfamily" id="wp_title_text_fontfamily" placeholder="Name of the Fonts" value="<?=(isset($setting['wp_title_text_fontfamily']))? $setting['wp_title_text_fontfamily'] : 'inherit'?>" >
				</div>
				
				  <div class="form-group">
					<label>Wishlist Title Text Font Size</label>
					<input class="form-control" name="wp_title_text_fontsize" id="wp_title_text_fontsize" placeholder="Size in px"  value="<?=(isset($setting['wp_title_text_fontsize']))? $setting['wp_title_text_fontsize'] : '30px'?>">
				</div>
				
				<label>Single Product Title Color</label>
				 <div class="form-group">
				<input type="text" class="form-control" name="wp_product_title_color" id="wp_product_title_color" placeholder="Enter Hex color Value"  value="<?=(isset($setting['wp_product_title_color']))? $setting['wp_product_title_color'] : '#000'?>">
				</div>
			    
				<label>Single Product Text Font Family</label>
				 <div class="form-group">
				<input type="text" class="form-control" name="wp_product_title_fontfamily" id="wp_product_title_fontfamily" placeholder="Name of the Fonts"  value="<?=(isset($setting['wp_product_title_fontfamily']))? $setting['wp_product_title_fontfamily'] : 'inherit'?>">
				</div>
				
				<label>Single Product Font Size</label>
				 <div class="form-group">
				<input type="text" class="form-control" name="wp_product_title_fontsize" id="wp_product_title_fontsize" placeholder="Size in pxe"  value="<?=(isset($setting['wp_product_title_fontsize']))? $setting['wp_product_title_fontsize'] : '18px'?>">
				</div>
				
				<label>Single Product Price Color</label>
				 <div class="form-group">
				<input type="text" class="form-control" name="wp_product_price_color" id="wp_product_price_color" placeholder="Enter Hex color Value"  value="<?=(isset($setting['wp_product_price_color']))? $setting['wp_product_price_color'] : '#000'?>">
			    </div> 
			   
				<div class="form-group">
					<label>Empty Wishlist notification Text</label>
					<input type="text" class="form-control" name="wp_noitems_text" id="wp_noitems_text" placeholder="There are no items in your wishlist"  value="<?=(isset($setting['wp_noitems_text']))? $setting['wp_noitems_text'] : 'There are no items in your Wishlist'?>">
				</div>
				<div class="form-group">
					<label>Login Reminder Message Text</label>
					<input type="text" class="form-control" name="wp_login_text" id="wp_login_text" placeholder="Please login to save this wishlist"  value="<?=(isset($setting['wp_login_text']))? $setting['wp_login_text'] : "Please <a href='/account/login'>login</a> to save this Wishlist to your Account"?>">
				</div>
				<br>
				
				<div class="alert alert-info" role="alert">Buttons</div>
				
				<div class="form-group">
					<label>'Clear Wishlist' Button Text</label>
					<input type="text"  class="form-control" name="wp_clearall_button_text" id="wp_clearall_button_text" placeholder="Clear All"  value="<?=(isset($setting['wp_clearall_button_text']))? $setting['wp_clearall_button_text'] : 'Clear All'?>">
				</div>
				
			   <div class="form-group">
					<label>'Add all to Cart' Button Text</label>
					<input type="text" class="form-control" name="wp_addall_button_text" id="wp_addall_button_text" placeholder="Add all to Cart"  value="<?=(isset($setting['wp_addall_button_text']))? $setting['wp_addall_button_text'] : 'Add All'?>">
				</div>
				
				
				
				<div class="form-group">
					<label>Add to Cart Button Text</label>
					<input type="text"  class="form-control" name="wp_addcart_button_text" id="wp_addcart_button_text" placeholder="Clear All"  value="<?=(isset($setting['wp_addcart_button_text']))? $setting['wp_addcart_button_text'] : 'Add to Cart'?>">
				</div>
				
				<label>Add to Cart and Add All Button Color</label>
				 <div class="form-group">
				<input type="text" class="form-control" name="wp_addall_button_color" id="wp_addall_button_color" placeholder="Enter Hex color Value"  value="<?=(isset($setting['wp_addall_button_color']))? $setting['wp_addall_button_color'] : '#337ab7'?>">
				
				
			   </div> 
			   
			 
			   
			   
				
			   <div class="form-group">
					<label>Remove Button Text</label>
					<input type="text"  class="form-control" name="wp_remove_button_text" id="wp_remove_button_text" placeholder="Add all to Cart"  value="<?=(isset($setting['wp_remove_button_text']))? $setting['wp_remove_button_text'] : 'Remove'?>">
				</div>
				
				
				
				<label>Remove Button and Clear All Color</label>
				 <div class="form-group">
				<input type="text" class="form-control" name="wp_clearall_button_color" id="wp_clearall_button_color" placeholder="Enter Hex color Value" value="<?=(isset($setting['wp_clearall_button_color']))? $setting['wp_clearall_button_color'] : '#d9534f'?>">
			   </div> 
				
				<br>
				<div class="alert alert-info" role="alert">Confirmation Modal/Popup</div>
				
				  <div class="form-group">
					<label>Close Button text</label>
					<input type="text"  class="form-control" name="close_button_title" id="close_button_title" placeholder="Close"  value="<?=(isset($setting['close_button_title']))? $setting['close_button_title'] : 'Close'?>">
				</div>
				   
				<div class="form-group">
					<label>Remove Modal/Popup Title</label>
					<input type="text"  class="form-control" name="remove_modal_title" id="remove_modal_title" placeholder="Remove from Wishlist?"  value="<?=(isset($setting['remove_modal_title']))? $setting['remove_modal_title'] : 'Remove from Wishlist?'?>">
				</div>
             
				
				<div class="form-group">
					<label>Message (Item added to Cart)</label>
					<input type="text" class="form-control" name="msg_item_added" id="msg_item_added" placeholder="Item added to Cart"  value="<?=(isset($setting['msg_item_added']))? $setting['msg_item_added'] : 'Item added to cart successfully'?>">
				</div>
				
				
				<div class="form-group">
					<label>Message (All Items added to Cart)</label>
					<input type="text" class="form-control" name="msg_items_added" id="msg_items_added" placeholder="Items added to Cart"  value="<?=(isset($setting['msg_items_added']))? $setting['msg_items_added'] : 'Items added to cart successfully'?>">
				</div>
				
				<div class="form-group">
					<label>Message (clear All from wishlish conform)</label>
					<input type="text" class="form-control" name="msg_clear_all" id="msg_clear_all" placeholder="Clear this Wishlist?"  value="<?=(isset($setting['msg_clear_all']))? $setting['msg_clear_all'] : 'Clear this Wishlist?'?>">
				</div>
				
				<div class="form-group">
					<label>Custom css</label>
					<textarea name="page_custom_css"  class="form-control" id="page_custom_css"><?=(isset($setting['page_custom_css']))? $setting['page_custom_css'] : ''?></textarea>

				</div>

			  <button type="submit" class="btn btn-success">Submit</button>
			
			 
                
			</form>
	       
	 
	  </div>
</div>
</div>
</div>



</div>
<script>
$(document).ready(function() {

  $("#wishlist_page_form").validate({
    ignore: '',
   rules: {
      wp_title_text: {
        required: true
      },
	   wp_title_text_color: {
        required: true
      },
	   wp_title_text_fontfamily: {
        required: true
      },
	    wp_title_text_fontsize: {
        required: true
      },
	   wp_product_title_color: {
        required: true
      },
	   wp_product_title_fontfamily: {
        required: true
      },
	   wp_product_title_fontsize: {
        required: true
      },
	   wp_product_price_color: {
        required: true
      },
	   wp_noitems_text: {
        required: true
      },
	   wp_login_text: {
        required: true
      },
	     wp_clearall_button_text: {
        required: true
      },
	     wp_addall_button_text: {
        required: true
      },
	     wp_addcart_button_text: {
        required: true
      },
	     wp_addall_button_color: {
        required: true
      },
	     wp_remove_button_text: {
        required: true
      },
	     wp_clearall_button_color: {
        required: true
      },
	     close_button_title: {
        required: true
      },
	     remove_modal_title: {
        required: true
      },
	     msg_item_added: {
        required: true
      },
	     msg_items_added: {
        required: true
      },
	     msg_clear_all: {
        required: true
      },
	
	
    },

  });

});
</script>