<div id="page-wrapper">
<?php
if ($this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
}	 

if (!empty($message)) : ?>
	<div class="alert alert-success">
		<a class="close" data-dismiss="alert">x</a>
		<?php echo $message; ?>
	</div>
<?php endif; ?>
		  
<div class="panel panel-primary">
	<div class="panel-heading">
	<h3 class="panel-title">Customer List</h3>
	</div>
	<div class="panel-body">
	<div class="row">
      <div class="col-lg-12 col-md-12">

		<table class="table table-hover table-striped mswl-tblcustomers" width="100%" cellpadding="10">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Name</th>
		      <th>Email</th>
		      <th>Country</th>
		      <th>Total Orders</th>
		      <th>Last Order</th>
		      <th>Created At</th>
		      <th class="action">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if( !empty($customers) ) : ?>
		  	<?php $row 	= $page; foreach($customers as $customer) : ?>
			<?php $name = $customer['first_name'] .' '. $customer['last_name']; ?>
		    <tr>
		      <td><?= $row; ?></td>
		      <td><?= $name; ?></td>
		      <td><?= $customer['email']; ?></td>
		      <?php $country = !empty($customer['default_address']['country']) ? $customer['default_address']['country'] : ''; ?>
		      <td><?= $country; ?></td>
		      <td><?= $customer['orders_count']; ?></td>
		      <td><?= $customer['last_order_name']; ?></td>
			  <?php $created_at = date("M d, Y H:i A", strtotime($customer['created_at'])); ?>
			  <td><?= $created_at; ?></td>
		      <td class="action"><a href="javascript:void(0);" class="customer-wishlist" data-id="<?= $customer['id']; ?>" data-name="<?= $name; ?>">Wishlist</a></td>
		    </tr>
			<?php $row++; endforeach; ?>
			<?php else : ?>
			<tr>
				<td colspan="8"><strong>No Records Found</strong></td>
			</tr>
			<?php endif; ?>
		  </tbody>
		</table>

		<!-- Display Pagination -->
		<div class="text-right">
		<?= $pagination; ?>
		</div>
		<!-- //Display Pagination -->

	  </div>
</div>
</div>
</div>


</div>

<!-- Modal for wishlist details -->
<div id="wishlist_details" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content panel-primary">
      <div class="modal-header panel-heading">
        <a href="#" class="close-msg" data-dismiss="modal" aria-label="close">×</a>
        <h4 class="modal-title"><span class="wishlist-title"></span> Wishlist Items</h4>
      </div>
      <div class="modal-body wishlist-body"></div>
      <div class="modal-footer">
      	<input type="hidden" name="customer_id">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- //Modal for wishlist details -->

<div id="saving_container" style="display:none;">
    <div id="saving" style="background-color:#000; position:fixed; width:100%; height:100%; top:0px; left:0px;z-index:100000"></div>
    <img id="saving_animation" src="<?php echo base_url('assets/images/loader.gif'); ?>" alt="saving" style="z-index:100001; margin-left:-32px; margin-top:-32px; position:fixed; left:50%; top:50%"/>
    <div id="saving_text" style="text-align:center; width:100%; position:fixed; left:0px; top:50%; margin-top:40px; color:#fff; z-index:100001"></div>
</div>

<script>
$(document).ready(function() {

	$('.customer-wishlist').on('click', function(){

		var customer_id  	= $(this).data('id');
		var customer_name	= $(this).data('name');
		var $customer_id 	= $('input[name=customer_id]').val();

		if(customer_id == $customer_id) {

			$('#wishlist_details').modal('show');
			return false;
		}

		show_animation();
		$.ajax({
			url		: '<?= base_url('customers/get_wishlist_items'); ?>',
			method	: 'POST',
			data 	: {customer_id : customer_id},
			success : function(response) {

				hide_animation();
				$('.wishlist-body').html(response);
				$('input[name=customer_id]').val(customer_id);
				$('.wishlist-title').html(customer_name + ':');
				$('#wishlist_details').modal('show');
			}
		});
	});

   /**
    * Function for show animation
    */
   function show_animation() {

      $('#saving_container').css('display', 'block');
      $('#saving').css('opacity', '.8');
   }

   /**
    * Function for hide animation
    */
   function hide_animation() {
      $('#saving_container').fadeOut();
   }
});
</script>