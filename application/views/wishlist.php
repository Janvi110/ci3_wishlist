<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap-ms.css"); ?>" />
<style>
<?=(isset($setting['page_custom_css']))? $setting['page_custom_css'] : '' ?>	
</style>
<?php
$headers = apache_request_headers();
$shop = $_GET['shop'];
?>
<input type="hidden" id="ms_shop" value="<?=$shop?>">
<input type="hidden" id="msg_item_added" value=" <?=(isset($setting['msg_item_added']))? $setting['msg_item_added'] : 'Item added to cart successfully' ?> ">
<input type="hidden" id="msg_items_added" value=" <?=(isset($setting['msg_items_added']))? $setting['msg_items_added'] : 'Items added to cart successfully' ?> ">
<input type="hidden" id="msg_clear_all" value=" <?=(isset($setting['msg_clear_all']))? $setting['msg_clear_all'] : 'Clear this Wishlist?' ?> ">

<div class="bootstrap-mswl">
	<div class="container">

		<?php if(empty($wishlist_token)) : ?>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
			<?php $title = (isset($setting['wp_title_text'])) ? $setting['wp_title_text'] : 'My Wishlist'; ?>
		    <div class="col-md-6"> <h1 class="ms_wishliast_title"><?= $title; ?></h1></div>
			<div class="col-md-6 ms_btn_toolbar pull-right">

			  <!-- Social Share Buttons -->
			  <a href="javascript:void(0)" class="btn btn-social btn-facebook social-share" data-url="http://www.facebook.com/sharer.php?u=" title="Share via Facebook"><span class="fa fa-facebook"></span></a>

			  <a href="javascript:void(0)" class="btn btn-social btn-twitter social-share" data-url="http://twitter.com/share?text=<?= $title; ?>&url=" title="Share via Twitter"><span class="fa fa-twitter"></span></a>

			  <a href="javascript:void(0)" class="btn btn-social btn-google-plus social-share" data-url="https://plus.google.com/share?url=" title="Share via Google+"><span class="fa fa-google-plus"></span></a>

			  <input type="hidden" name="share_link" id="share_link">
			  <!-- //Social Share Buttons -->

			  <a href="#" class="btn btn-warning mswishlist_removeallbtn"><?=(isset($setting['wp_clearall_button_text']))? $setting['wp_clearall_button_text'] : 'Clear All' ?></a>
			  <a href="#" id="addallbutton" class="btn btn-primary mswishlist_addtocartallbtn"><?=(isset($setting['wp_addall_button_text']))? $setting['wp_addall_button_text'] : 'Add All' ?></a>
			</div>
			</div>
		</div>

		<?php else : ?>

		<div class="row">
			<div class="col-sm-12 col-xs-12 text-center">
	    		<h1>Products List</h1>
			</div>
		</div>
		<?php endif; ?>

		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="mswish_products">
					<div class="ms_wait"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <script src="<?=base_url("assets/js/jquery-1.12.3.min.js"); ?>"></script> -->

<script>!window.jQuery && document.write(unescape('%3Cscript src="<?=base_url("assets/js/jquery-1.12.3.min.js"); ?>"%3E%3C/script%3E'))</script>
<script src="<?=base_url("assets/js/wishlist.js"); ?>"></script>

<script type="text/javascript">

/** Social Share Script **/
var customer_id = $('#ms_customer_id').val();

if(customer_id != '' && customer_id != 0 && customer_id != undefined) {

	$.ajax({
		url 	: '<?= base_url('viewlist/share_wishlist'); ?>',
		method 	: 'POST',
		data	: { shop:Shopify.shop, customer_id: customer_id, action: 'share_wishlist' },
		success : function(data) {
			$('#share_link').val(data);
		}
	});

	$('.social-share').on('click', function() {

		url  = $(this).data('url');
		link = window.location.href + $('#share_link').val();
		wishlist_social_share(url+link);
	});

} else {
	$('.social-share').hide();
}

function wishlist_social_share(url) {
    window.open(encodeURI(url),'sharer','toolbar=0,status=0,width=648,height=595');
    return true;
}
</script>