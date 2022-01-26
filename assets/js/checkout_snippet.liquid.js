<script>

  window.TierCookies={getItem:function(a){return a?decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*"+encodeURIComponent(a).replace(/[\-\.\+\*]/g,"\\$&")+"\\s*\\=\\s*([^;]*).*$)|^.*$"),"$1"))||null:null},setItem:function(a,b,c,d,e,f){if(!a||/^(?:expires|max\-age|path|domain|secure)$/i.test(a))return!1;var g="";if(c)switch(c.constructor){case Number:g=c===1/0?"; expires=Fri, 31 Dec 9999 23:59:59 GMT":"; max-age="+c;break;case String:g="; expires="+c;break;case Date:g="; expires="+c.toUTCString()}return document.cookie=encodeURIComponent(a)+"="+encodeURIComponent(b)+g+(e?"; domain="+e:"")+(d?"; path="+d:"")+(f?"; secure":""),!0},removeItem:function(a,b,c){return!!this.hasItem(a)&&(document.cookie=encodeURIComponent(a)+"=; expires=Thu, 01 Jan 1970 00:00:00 GMT"+(c?"; domain="+c:"")+(b?"; path="+b:""),!0)},hasItem:function(a){return!!a&&new RegExp("(?:^|;\\s*)"+encodeURIComponent(a).replace(/[\-\.\+\*]/g,"\\$&")+"\\s*\\=").test(document.cookie)},keys:function(){for(var a=document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g,"").split(/\s*(?:\=[^;]*)?;\s*/),b=a.length,c=0;c<b;c++)a[c]=decodeURIComponent(a[c]);return a}};

  // var ms_product_id     = '{{product.id}}';
  // var ms_variant_id     = '{{product.variants.first.id}}';
  // var ms_product_price  = '{{product.price | divided_by: 100.0}}';
  // var ms_product_handle = '{{product.handle}}';
  
  
  var ms_product_id     = [];
  var ms_variant_id     = [];
  var ms_product_price  = [];
  var ms_product_handle = '{{product.handle}}'; 
  var tier_exist = null;
  var alert_popup = '';
  var minimum_amount = 0;
  var total = null;

  if(jQuery('.ms-price').length > 0){
    jQuery('.price__regular').each(function(){
    ms_product_id.push(jQuery(this).find('.ms-price').attr('data-ms-id'));
    ms_variant_id.push(jQuery(this).find('.ms-price').attr('data-ms-variant_id'));
    ms_product_price.push(jQuery(this).find('.ms-price').attr('data-ms-product_price'));
    }) 
  }else{
      ms_product_id     = '{{product.id}}';
      ms_variant_id     = '{{product.variants.first.id}}';
      ms_product_price  = '{{product.price | divided_by: 100.0}}';
  }

jQuery(document).ready(function(){

  	if(jQuery('.offer_msg').length == 0) {
  		jQuery('.tp_subtotal').parent().append('<div class="offer_msg"></div>');
  	}

    var app_status = null;

    jQuery.ajax({
      url   : 'https://metizapps.com/wholesale-suite/tier_front/checkappstatus',
      method  : 'POST',
      data  : {shopurl: Shopify.shop},
      async   : false,
      success : function(res) {       
        data = jQuery.parseJSON(res);
        app_status = data.app_status;
      },error:function (request, status, error){ }
    });

    if(app_status == 1){    

      {% if template == 'cart' %}
      cart_discount();
      {% endif %}

      function cart_discount(cart = '') {

        var cartdata = (cart != '') ? cart : {{cart|json}};
        jQuery.ajax({
          type: 'POST',
          async : false,
          url: 'https://metizapps.com/wholesale-suite/tier_front/cart_discount',
          data: {
                  "cartdata" : cartdata,
                  "shopurl" : "{{ shop.permanent_domain }}",
                  "customer_id" : "{{customer.id}}",
                  "currency" : "{{cart.currency.iso_code}}"
                },
          datatype: "JSON",
          success: function(data) {
            var itemdata = $.parseJSON(data);
            tier_exist = itemdata.tier;
            jQuery('.tp_subtotal').html(itemdata.subtotal);
            jQuery('.offer_msg').html(itemdata.offer_msg);
            minimum_amount = itemdata.minimum_amount; 
            alert_popup = itemdata.alert_msg; 
            total =  itemdata.total;

            jQuery.each(itemdata, function(k, dataval) {
              
              jQuery('.p_'+k).html(dataval.product_price);
              jQuery('.pt_'+k).html(dataval.p_total_price);
            });
          }
        });
      }

      jQuery(document).on("click", 'input[name="checkout"], button[name="checkout"]', function(ev) {
         
          
          if(tier_exist == 1){ 
              ev.preventDefault();
              ev.stopPropagation();  
              if(minimum_amount == null){
                 minimum_amount = 0;
              }             
              if(parseFloat(minimum_amount) < parseFloat(total) || parseFloat(minimum_amount) == parseFloat(total)){ 

                   jQuery.ajax({
                    cache     : false,
                    contentType : "application/json; charset=utf-8",
                    dataType  : "json",
                    type    : "GET",
                    url     : '/cart.js',
                    success   : function(res) {
                      window.tier_cart = res;
                      tier_checkout();                    
                    }
                  }); 
              }else{ 
                 jQuery("html").append(alert_popup);
                 ev.preventDefault();
                 ev.stopPropagation();                   
                 return false;
              }   
             
          }
      });

      function tier_checkout() {
          var shop_domain = "{{shop.permanent_domain}}";

          var note_attributes = [];

          jQuery( "[name^='attributes']" ).each(function() {
            var $a = jQuery(this);
            var name = jQuery(this).attr("name");
            name = name.replace(/^attributes\[/i, ""). replace(/\]$/i, "");
            var v = { 
              name : name,
              value: $a.val()
            };
            if (v.value == "") {
              return;
            }
            switch($a[0].tagName.toLowerCase()) {
              case "input":
                if ($a.attr("type") == "checkbox") {
                  if ($a.is(":checked")) {
                    note_attributes.push(v);
                  }
                } else {
                  note_attributes.push(v);
                }
                break;
              default:
                note_attributes.push(v);
            }
          });

          for (var i=0; i<window.tier_cart.items.length; i++) {
            var item = window.tier_cart.items[i];
            var el = document.querySelectorAll("[id='updates_" + item.key + "']");
            if (el.length != 1) {
              el = document.querySelectorAll("[id='updates_" + item.variant_id + "']");
            }
            if (el.length == 1) {
              window.tier_cart.items[i].quantity = el[0].value;
            }
          }

          var note = "";
          if (jQuery("[name='note']").length) {
            note = jQuery("[name='note']")[0].value;
          }

          var tier_cart_data = {
            shop_slug: shop_domain.replace(".myshopify.com", ""),
            cart: window.tier_cart,
            note: note,
            note_attributes: note_attributes
          };

          jQuery.ajax({
            dataType  : "json",
            type    : "POST",
            url   : 'https://metizapps.com/wholesale-suite/tier_front/create_draft_order',
            data    : {
              "cartdata"    : JSON.stringify(tier_cart_data), 
              "shop"      : shop_domain, 
              "currency"    : "{{cart.currency.iso_code}}",
              "customer_id"   : "{{customer.id}}",
            },
            success : function(data) {
              setTimeout(function(){
                window.location.href = data;
              }, 500);
            }
          });
      }
      jQuery(document).on('click', '.header-cart-btn', function(){
        setTimeout(function(){
          cart_discount();
        }, 1000);
      });

      jQuery(document).on('click', '.ajaxifyCart--qty-adjuster, #addToCart-product-template', function(){ 
        setTimeout(function(){ 
          jQuery.getJSON('/cart.js', function(cart) {
            console.log(cart); 
            cart_discount(cart); 
          }); 
        }, 1000);
      });

      jQuery(document).on('blur', '.ajaxifyCart--num', function(){ 
        setTimeout(function(){ 
          jQuery.getJSON('/cart.js', function(cart) {
            console.log(cart); 
            cart_discount(cart); 
          }); 
        }, 1000);
      });

      jQuery(document).on('change, input', 'input[name="updates[]"]', function(){ 
        setTimeout(function(){ 
          jQuery.getJSON('/cart.js', function(cart) {
            cart_discount(cart); 
          }); 
        }, 1000);
      });

      jQuery('form[action="/cart/add"] select,form[action="/cart/add"] radio').on('change', function() {
        location.reload();  
      });

    }  
 
});
</script> 

