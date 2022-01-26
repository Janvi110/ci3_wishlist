<?php if(empty($ms_customer_id) && empty($wishlist_token)){ ?>
		<div class="alert alert-success">
     <a class="close" data-dismiss="alert">x</a>
            <?=(isset($setting['wp_login_text']))? $setting['wp_login_text'] : "Please <a href='/account/login'>login</a> to save this Wishlist to your Account" ?>                 
	    </div>
	
<?php }
if(!empty($products)){
foreach($products as $product){
	   
		$images=$product['images'];

		$product_images='';
		$price='';
		$variant_title='';
		$inventory_quantity=0;
		
		
	if(!empty($product['variants'])){
		foreach($product['variants'] as $var){
		
		if($product['wish_item'][1]==$var['id']){
		   
		
		   $inventory_quantity=$var['inventory_quantity'];
		   
		   if($var['inventory_policy']=='continue' || $var['inventory_management']=='')
		   {
				$inventory_quantity=1;
		      }
		    $price=$var['price'];
			if($var['title']!="Default Title"){
		    $variant_title=$var['title'];
			}
		foreach($images as $img){
		if($img['id']==$var['image_id'] || $var['image_id']==''){
			$product_images=$img['src'];
			break;
		}
		}
		}
		}
	}
	$amount=$price;
	if (strpos($money_format, 'amount_no_decimals') !== false) {
		$amount=str_replace('{{amount_no_decimals}}',$price,$money_format);
   }else if (strpos($money_format, 'amount_with_comma_separator') !== false) {
		$amount=str_replace('{{amount_with_comma_separator}}',$price,$money_format);
   }else{
		$amount=str_replace('{{amount}}',$price,$money_format);
   }
	?>

  
      <div class="col-md-4 col-sm-4 mswish_product" id="product_<?=$product['wish_item'][0]?>_<?=$product['wish_item'][1]?>">
         <div class="product">
            <div class="image">
			<a href="/products/<?=$product['handle']?>?variant=<?=$product['wish_item'][1]?>">  
				<img src="<?=$product_images?>" alt="" class="img-responsive"> </a>
				</div>
            <div class="text">
               <h3 class="product_title">
				<a href="/products/<?=$product['handle']?>?variant=<?=$product['wish_item'][1]?>"><?=$product['title']?></a>
				  </h3>
               <p class="variant_title"><?=$variant_title?></p>
               <p class="price"><?=$amount?></p>
			    </div>
               <p class="buttons">

				   <?php if(empty($wishlist_token)) : ?>
				   <a href="javascript:void(0)" class="btn btn-warning mswishlist_removebtn" data-productid="<?=$product['wish_item'][0]?>" data-variantid="<?=$product['wish_item'][1]?>" >
					   <?=(isset($setting['wp_remove_button_text']))? $setting['wp_remove_button_text'] : 'Remove' ?>
				   </a> 
				   <?php endif; ?>

				   <?php if($inventory_quantity==0){ ?>
				          <span class="out-of-stock">Out of stock</span>
					 <?php }else{?>
					    <a href="javascript:void(0)" class="btn btn-primary mswishlist_addtocartbtn" data-productid="<?=$product['wish_item'][0]?>" data-variantid="<?=$product['wish_item'][1]?>" data-variant_count="1" data-is_chosen_variant="1" data-url="/products/<?=$product['handle']?>"><i class="fa fa-shopping-cart"></i>
							<?=(isset($setting['wp_addcart_button_text']))? $setting['wp_addcart_button_text'] : 'Add to Cart' ?>
							</a> </p>
           
					  <?php  } ?>
				 
         </div>

   </div>
<?php }

}else{?>
	<div class="alert alert-success">
     <a class="close" data-dismiss="alert">x</a>
            <?=(isset($setting['wp_noitems_text']))? $setting['wp_noitems_text'] : 'There are no items in your Wishlist' ?>                 
	    </div>
	
<?php } ?>

<div id="mswishlist_remove_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=(isset($setting['remove_modal_title']))? $setting['remove_modal_title'] : 'Remove from Wishlist?' ?></h4>
      </div>
      <div class="modal-body">
       <div class="col-sm-12 col-xs-12">
	    <div class="col-sm-6 col-xs-6">
			<div class="image">
			</div>
		</div>
		<div class="col-sm-6 col-xs-6">
			<div class="text">
			</div>
		</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=(isset($setting['close_button_title']))? $setting['close_button_title'] : 'Close' ?></button>
		<button type="button" class="btn btn-warning" id="ms_modal_remove_button" ><?=(isset($setting['wp_remove_button_text']))? $setting['wp_remove_button_text'] : 'Remove' ?></button>
      </div>
    </div>

  </div>
</div>
<script src="<?=base_url("assets/js/jquery-1.12.3.min.js"); ?>"></script>
<script src="<?=base_url("assets/js/bootstrap.min.js"); ?>"></script>
