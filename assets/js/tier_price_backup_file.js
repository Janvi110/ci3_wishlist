var mainDomain = "https://metizapps.com";
var WS_baseUrl = mainDomain + '/wholesale-suite';
jQuery('head').append('<link rel="stylesheet" href="' + WS_baseUrl + '/assets/css/public_style.css" type="text/css" />');

jQuery(document).ready(function(){

    var shopurl = Shopify.shop;

	product_id = []; variant_id = []; product_price = [];
	/*jQuery('.price__regular').each(function(){
		product_id.push(jQuery(this).attr('data-ms-id'));
		variant_id.push(jQuery(this).attr('data-ms-variant_id'));
		product_price.push(jQuery(this).attr('data-ms-product_price'));
	});*/

    product_id = [ms_product_id];
    variant_id = [ms_variant_id];
    product_price = [ms_product_price];
	
	let searchParams = new URLSearchParams(window.location.search);

	if(searchParams.has('variant')) {
		variant_id = [];
		variant_id.push(searchParams.get('variant'));
	}

	/*** Show Tier discount price ***/
	var customer_id = ((meta.page.customerId != undefined) && (meta.page.customerId != '')) ? meta.page.customerId : '';

    if(customer_id != '') {

		if((variant_id != '' && variant_id != undefined)) {

			if(meta.product != undefined) {

				for(var i = 0; i < meta.product.variants.length; i++) {

					if(meta.product.variants[i].id == variant_id) {
						product_price 	= [];
						// variantid = variant_id;
						$_product_price	= (parseInt(meta.product.variants[i].price) / 100);
						product_price.push($_product_price.toFixed(2));
						break;
					}
				}
			}

			show_tier_price(customer_id, product_id, variant_id, product_price);
		}
	}
	/*** //Show Tier discount price ***/

	/*** Show As Low As price ***/
	if((variant_id != '' && variant_id != undefined) && (product_id != '' && product_id != undefined)) {

		show_ala_price(product_id, variant_id);
	}
	/*** Show As Low As price ***/

	// change product price based on tier discount price and show as low as price
	jQuery('.single-option-selector').on('change', function(){

		$('.ala_price').html('');
		let searchParams = new URLSearchParams(window.location.search);

		if(searchParams.has('variant')) {
			var variant_id = [];
			variant_id.push(searchParams.get('variant'));
		}

		// tier discount price //
		if(meta.product != undefined) {

			product_price = [];
			for(var i = 0; i < meta.product.variants.length; i++) {

				if(meta.product.variants[i].id == variant_id) {
					$_price = (parseInt(meta.product.variants[i].price) / 100);
					product_price.push($_price.toFixed(2));
					variant_id = variant_id;
					break;
				}
			}
			show_tier_price(customer_id, product_id, variant_id, product_price);
		}

		// as low as price //
		show_ala_price(product_id, variant_id);
	});

	/*** Ajax function to show As low as price ***/
	function show_ala_price(product_id = [], variant_id = []) {
		// alert(product_id);
		// console.log(variant_id);
		jQuery.ajax({
			url 	: WS_baseUrl + '/tier_front/get_ala_price_all',
			method	: 'POST',
			data 	: {shopurl: shopurl, product_id: product_id, variant_id: variant_id, currency: Shopify.currency.active},
			success	: function(res) {

				var data = jQuery.parseJSON(res);

				for (var i = 0; i < data.length; i++) {

					var _product_id = (data[i].product_id != '') ? parseInt(data[i].product_id) : '';

					if(jQuery('#price_'+_product_id+' .price-item--regular').parent().find('.ala_price').length == 1) {

						jQuery('.price_'+_product_id+' .ala_price').html('As Low As: ' + data[i].lowest_price);

					} else {

						jQuery('.price_'+_product_id).parent().append('<div class="ala_price">As Low As: '+data[i].lowest_price+'</div>');
					}
				}
			}
		});
	}
	/*** //Ajax function to show As low as price ***/

	/*** //Ajax function to show tier discount price ***/
	function show_tier_price(customer_id = '', product_id = [], variant_id = [], product_price = []) {

		if(customer_id != '') {

			jQuery.ajax({
				url 	: WS_baseUrl + '/tier_front/get_tier_price',
				method	: 'POST',
				data 	: {shopurl: shopurl, variant_id: variant_id, customer_id: customer_id, product_id: product_id, product_price: product_price},
				success	: function(res) {

					var data = jQuery.parseJSON(res);
					// console.log(data); return false; 
					for (var i = 0; i < data.length; i++) {

						var _product_id = (data[i].product_id != '') ? parseInt(data[i].product_id) : '';

						if(jQuery('#sprice_'+_product_id+'.sale_avail').length == 1) {

							jQuery('#sprice_'+_product_id+' .price-item--sale').html(data[i].product_price);

						} else {

							jQuery('.price_'+_product_id).html(data[i].product_price);
						}
					}
				}
			});
		}
	}
	/*** //Ajax function to show tier discount price ***/

	// Show product group pricing table on product details page
	
	if(meta.page != undefined && meta.page.pageType == 'product') {

		var handle = jQuery('.price_'+meta.product.id).attr('data-ms-handle');
		var price = '';
		if(variant_id != '' && meta.product != undefined) {

			for(var i = 0; i < meta.product.variants.length; i++) {

				if(meta.product.variants[i].id == variant_id) {
					price = (parseInt(meta.product.variants[i].price) / 100);
					price = price.toFixed(2);
					break;
				}
			}
		}
		// Show product group pricing table 
		get_product_group(handle, price);

		// change product group price
		jQuery('.single-option-selector').on('change', function(){

			let searchParams = new URLSearchParams(window.location.search);

			if(searchParams.has('variant')) {
				var variant_id = searchParams.get('variant');
			}

			if(variant_id != '' && meta.product != undefined) {

				for(var i = 0; i < meta.product.variants.length; i++) {

					if(meta.product.variants[i].id == variant_id) {
						price = (parseInt(meta.product.variants[i].price) / 100);
						price = price.toFixed(2);
						break;
					}
				}
			}

			// Show product group pricing table 
			get_product_group(handle, price);
		});
	}

	// Function to show product pricing group table
	function get_product_group(handle = '', price = '') {
		
		jQuery.ajax({
			url 	: WS_baseUrl + '/tier_front/get_product_group',
			method	: 'POST',
			data 	: {shopurl: shopurl, product_handle: handle, product_price: price, customer_id: customer_id, currency: Shopify.currency.active},
			success	: function(data) {

				try {

					if(jQuery('.price_'+meta.product.id).parent().find('.product_group_price').length != 0) {

						jQuery('.product_group_price').html(data);

					} else {
						jQuery('.price_'+meta.product.id).parent().append('<div class="product_group_price">'+data+'<div>');
					}

				} catch(e) {}
			}
		});
	}
});