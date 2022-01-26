<?php 
header('Content-Type: text/css');
if(isset($setting['wishlist_icon'])){ ?>
.mswishlist .notinwishlist {color:<?=$setting['wishlist_icon_color']?> }
.mswishlist .notinwishlist:hover {color:<?=$setting['wishlist_icon_hover_color']?> }
.mswishlist .inwishlist {color:<?=$setting['wishlist_icon_hover_color']?> }
<?php if($setting['display_item_count']!='1'){ ?>
.mswishcount {display: none;}
<?php }?>
<?php }?>

<?php if(isset($setting['wp_title_text_color'])){ ?>
/* wishlist page*/
.ms_wishliast_title {color:<?=$setting['wp_title_text_color']?> !important;font-family:<?=$setting['wp_title_text_fontfamily']?> !important;}
.mswish_product .product_title a{font-size:<?=$setting['wp_product_title_fontsize']?>!important;color:<?=$setting['wp_product_title_color']?>!important;font-family:<?=$setting['wp_product_title_fontfamily']?>!important;}
.mswish_product .price{color:<?=$setting['wp_product_price_color']?>!important;}
.mswishlist_addtocartbtn,.mswishlist_addtocartallbtn{background:<?=$setting['wp_addall_button_color']?>!important;border-color:<?=$setting['wp_addall_button_color']?>!important;}
.mswishlist_removebtn,.mswishlist_removeallbtn,#ms_modal_remove_button{background:<?=$setting['wp_clearall_button_color']?>!important;border-color:<?=$setting['wp_clearall_button_color']?>!important;}
<?php }?>

