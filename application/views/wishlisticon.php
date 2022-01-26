<div id="page-wrapper" >
            <!--<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Wishlist icon & tooltip</h1>
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
	<h3 class="panel-title">Wishlist icon</h3>
	</div>
	<div class="panel-body">
	<div class="row">
      <div class="col-lg-7 col-md-12">
	         <form method="POST" id="wishlist_icon_form" action="<?=base_url('homepage/wishlist_setting');?>">
			 <input type="hidden" name="return_url" value="wishlisticon">
		     <label>Custom Wishlist icon class name</label>
             <div class="form-group">
          
               <input class="form-control" name="wishlist_icon"  id="wishlist_icon" placeholder="Icon class Name" value="<?=(isset($setting['wishlist_icon']))? $setting['wishlist_icon'] : 'fa fa-heart'?>" type="text">
              
			   </div> 
            <p class="text-info">Enter any custom icon class name. You can use any <a href="http://fontawesome.io/icons/">FontAwesome icons</a> too. To use fontawesome, enter its name in the format fa fa-icon for e.g. <b>fa fa-heart</b></p>
               
            <label>Wishlist Icon default color</label>
			<div class="form-group ">
			<input type="text" class="form-control" name="wishlist_icon_color" id="wishlist_icon_color" placeholder="Enter Hex Value" value="<?=(isset($setting['wishlist_icon_color']))? $setting['wishlist_icon_color'] : '#a79c9d'?>" >
		
			</div>
			
			<label>Wishlist icon hover color / wishlisted state color</label>
			<div class="form-group">
			<input type="text" class="form-control" name="wishlist_icon_hover_color" id="wishlist_icon_hover_color" placeholder="Enter Hex Value"  value="<?=(isset($setting['wishlist_icon_hover_color']))? $setting['wishlist_icon_hover_color'] : '#FF1493'?>">
		
			</div>
			
			<label>Add to wishlist button text</label>
			<div class="form-group">
			<input type="text" class="form-control" name="add_to_wishlist" id="add_to_wishlist" placeholder="Add to wishlist button text"  value="<?=(isset($setting['add_to_wishlist']))? $setting['add_to_wishlist'] : 'Add to wishlist'?>">
		
			</div>
			 <p class="text-info">Button class <b>ms-wishlist-add-btn</b></p>
			<label>Remove from wishlist button text</label>
			<div class="form-group">
			<input type="text" class="form-control" name="remove_from_wishlist" id="remove_from_wishlist" placeholder="Remove from wishlist button text"  value="<?=(isset($setting['remove_from_wishlist']))? $setting['remove_from_wishlist'] : 'Remove from wishlist'?>">
		
			</div>
			 <p class="text-info">Button class <b>ms-wishlist-remove-btn</b></p>
			
			 <?php
			$display_item_count='1';
	    if(isset($setting['display_item_count'])){
			$display_item_count=$setting['display_item_count'];
		 }
	   ?>
			<div class="form-group">
              <input type="checkbox" name="display_item_count" <?=($display_item_count=='1')? 'checked' : ''?>  value="1">  Display total number of items along with Wishlist icon
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

  $("#wishlist_icon_form").validate({
    ignore: '',
   rules: {
      wishlist_icon: {
        required: true
      },
	   wishlist_icon_color: {
        required: true
      },
	   wishlist_icon_hover_color: {
        required: true
      },
	   
    },

  });
  
  
  


});
</script>