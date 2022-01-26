<?php
$shop_owner = $this->session->userdata('shop_owner');
$shop = $this->session->userdata('shop_email');
?>

<style type="text/css">    

.box{
  box-shadow: none;
}
</style>
<!-- Offset Frame -->
<main class="Polaris-Frame__Main" id="AppFrameMain" data-has-global-ribbon="true">
  <a id="AppFrameMainContent" tabindex="-1"></a>
  <div class="Polaris-Frame__Content">
    <div class="Polaris-Page Polaris-Page--fullWidth">
      <div class="Polaris-Page-Header Polaris-Page-Header--mobileView">
        <div class="Polaris-Page-Header__MainContent">
          <div class="Polaris-Page-Header__TitleActionMenuWrapper">
            <div>
              <div class="Polaris-Header-Title__TitleAndSubtitleWrapper">
                <div class="Polaris-ButtonGroup--segmented">
                  <div class="Polaris-Page-Header__MainContent">
                    <div class="Polaris-Page-Header__TitleActionMenuWrapper">
                      <div>
                        <div class="Polaris-Header-Title__TitleAndSubtitleWrapper"> 
                          <div class="Polaris-Header-Title">
                            <h1 class="Polaris-DisplayText_1u0t8 Polaris-DisplayText--sizeLarge">Wishlist Page</h1>          
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="Polaris-Page__Content ">
        <div class="Polaris-Layout">
          <div class="Polaris-Layout__Section">
            <?php
              $message = '';
              if ($this->session->flashdata('message')) :
                $message = $this->session->flashdata('message');
              endif;
            ?> 
            <?php if(!empty($message)) { unset($_SESSION['message']); ?>  
              <div class="Polaris-Banner Polaris-Banner--statusSuccess Polaris-Banner--hasDismiss Polaris-Banner--withinPage banner_out" style="margin: 15px 0;"  tabindex="0" role="status" aria-live="polite" aria-labelledby="PolarisBanner4Heading" aria-describedby="PolarisBanner4Content">
                <div class="Polaris-Banner__Dismiss">
                  <button type="button" class="Polaris-Button Polaris-Button--plain Polaris-Button--iconOnly close-msg" aria-label="Dismiss notification">
                    <span class="Polaris-Button__Content">
                      <span class="Polaris-Button__Icon">
                        <span class="Polaris-Icon">
                          <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                            <path d="M11.414 10l4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z" fill-rule="evenodd"></path>
                          </svg>
                        </span>
                      </span>
                    </span>
                  </button>
                </div>
                <div class="Polaris-Banner__Ribbon">
                  <span class="Polaris-Icon Polaris-Icon--colorGreenDark Polaris-Icon--isColored Polaris-Icon--hasBackdrop">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                      <circle fill="currentColor" cx="10" cy="10" r="9"></circle>
                      <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8m2.293-10.707L9 10.586 7.707 9.293a1 1 0 1 0-1.414 1.414l2 2a.997.997 0 0 0 1.414 0l4-4a1 1 0 1 0-1.414-1.414"></path>
                    </svg>
                  </span>
                </div>
                <div class="Polaris-Banner__ContentWrapper">
                  <div class="Polaris-Banner__Heading" id="PolarisBanner4Heading">
                    <p class="Polaris-Heading"> <?php echo $message; ?></p>
                  </div>                              
                </div>
              </div>
            <?php }   ?>
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <form method="post" action="<?=base_url();?>homepage/wishlist_setting">
                  <input type="hidden" name="return_url" value="wishlistpage">
                  <div>
                    <div class="Polaris-Layout" style="margin-top: -55px;" >
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading text" style="font-size: 14px; position: relative;top: 13px;">Wishlist Text Title</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div>
                              <div class="">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-TextField Polaris-TextField--hasValue">
                                      <input id="wp_title_text" name="wp_title_text" value="<?=(isset($setting['wp_title_text']))? $setting['wp_title_text'] : 'My Wishlist'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                      <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="PolarisPortalsContainer"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 13px;">Wishlist Title Text Color</h2>
                              </div>
                              <div class="Polaris-Stack__Item">
                                <div class="Polaris-ButtonGroup">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/344"><a aria-describedby="344" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay17" href="produdcts/344" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="344">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div>
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-TextField Polaris-TextField--hasValue"><input id="wp_title_text_color" name="wp_title_text_color" value="<?=(isset($setting['wp_title_text_color']))? $setting['wp_title_text_color'] : 'inherit'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 13px;">Wishlist Title Text Font Family</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/345"><a aria-describedby="345" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay19" href="produdcts/345" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="345">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div>
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-TextField Polaris-TextField--hasValue"><input id="wp_title_text_fontfamily" name="wp_title_text_fontfamily" value="<?=(isset($setting['wp_title_text_fontfamily']))? $setting['wp_title_text_fontfamily'] : 'inherit'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                    <div class="Polaris-Layout" style="margin-top: -55px;">
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 13px;">Wishlist Text Title Font Size</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div>
                              <div class="">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-TextField Polaris-TextField--hasValue">
                                      <input id="wp_title_text_fontsize" value="<?=(isset($setting['wp_title_text_fontsize']))? $setting['wp_title_text_fontsize'] : '30px'?>"name="wp_title_text_fontsize"  class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                      <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="PolarisPortalsContainer"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 13px;">Single Product Font Size</h2>
                              </div>
                              <div class="Polaris-Stack__Item">
                                <div class="Polaris-ButtonGroup">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/344"><a aria-describedby="344" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay17" href="produdcts/344" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="344">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div>
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-TextField Polaris-TextField--hasValue"><input id="wp_product_title_fontsize"  name="wp_product_title_fontsize"value="<?=(isset($setting['wp_product_title_fontsize']))? $setting['wp_product_title_fontsize'] : '30px'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 13px;">Single Product Text Font Family</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/345"><a aria-describedby="345" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay19" href="produdcts/345" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="345">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div>
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-TextField Polaris-TextField--hasValue"><input id="wp_product_title_fontfamily" name="wp_product_title_fontfamily" value="<?=(isset($setting['wp_product_title_fontfamily']))? $setting['wp_product_title_fontfamily'] : 'inherit'?>"class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                    <div class="Polaris-Layout" style="margin-top: -55px;">
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 13px;">Login Reminder Message Text</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div>
                              <div class="">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-TextField Polaris-TextField--hasValue">
                                      <input id="wp_login_text" name="wp_login_text" value="<?=(isset($setting['wp_login_text']))? $setting['wp_login_text'] : "Please <a href='/account/login'>login</a> to save this Wishlist to your Account"?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                      <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="PolarisPortalsContainer"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 13px;">Empty Wishlist Notification Text</h2>
                              </div>
                              <div class="Polaris-Stack__Item">
                                <div class="Polaris-ButtonGroup">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/344"><a aria-describedby="344" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay17" href="produdcts/344" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="344">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div>
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-TextField Polaris-TextField--hasValue"><input id="wp_noitems_text" name="wp_noitems_text"value="<?=(isset($setting['wp_noitems_text']))? $setting['wp_noitems_text'] : 'There are no items in your Wishlist'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                      </div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                    <div class="Polaris-Layout" style="margin-top: -55px;">
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px;  position: relative;top: 27px;">Single Product Title Color</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div style="position: relative;top: 0px;">
                              <div class="">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-Connected ml-auto">
                                      <div id="banner_font_color" class="color-picker colorpicker-element">
                                        <input style="height: 36px;width: 36px; position: relative;top: -20px;left: 236px;" type="color" id="wp_product_title_color" name="wp_product_title_color" value="<?=(isset($setting['wp_product_title_color']))? $setting['wp_product_title_color'] : '#0000'?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="PolarisPortalsContainer"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 27px;">Single Product Price Color</h2>
                              </div>
                              <div class="Polaris-Stack__Item">
                                <div class="Polaris-ButtonGroup">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/344"><a aria-describedby="344" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay17" href="produdcts/344" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="344">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div style="position: relative;top: 0px;">
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-Connected ml-auto">
                                            <div id="banner_font_color" class="color-picker colorpicker-element">
                                              <input style="height: 36px;width: 36px; position: relative;top: -20px;left: 236px;" type="color" id="wp_product_price_color" name="wp_product_price_color" value="<?=(isset($setting['wp_product_price_color']))? $setting['wp_product_price_color'] : '#0000'?>">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                      </div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                    <!-- buttons -->
                    <div class="Polaris-Layout" style="margin-top: -46px;">
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading text" style="font-size: 14px;font-weight: bold;position: relative;top: -5px">Buttons</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div></div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird"></div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird"></div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                    <div class="Polaris-Layout" style="margin-top: -47px;">
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: -22px;">‘Clear Wishlist’ Button Text</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div>
                              <div class="">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-TextField Polaris-TextField--hasValue" style="position: relative;top: -35px">
                                      <input id="wp_clearall_button_text" value="<?=(isset($setting['wp_clearall_button_text']))? $setting['wp_clearall_button_text'] : 'Clear All'?>" name="wp_clearall_button_text" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                      <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="PolarisPortalsContainer"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: -22px;">‘Add all to Cart’ Button Text</h2>
                              </div>
                              <div class="Polaris-Stack__Item">
                                <div class="Polaris-ButtonGroup">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/344"><a aria-describedby="344" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay17" href="produdcts/344" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="344">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div>
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-TextField Polaris-TextField--hasValue" style="position: relative;top: -35px"><input id="wp_addall_button_text" name="wp_addall_button_text"value="<?=(isset($setting['wp_addall_button_text']))? $setting['wp_addall_button_text'] : 'Add All'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: -22px;">Add to Cart Button Text</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/345"><a aria-describedby="345" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay19" href="produdcts/345" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="345">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div>
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-TextField Polaris-TextField--hasValue" style="position: relative;top: -35px"><input id="wp_addcart_button_text" name="wp_addcart_button_text"value="<?=(isset($setting['wp_addcart_button_text']))? $setting['wp_addcart_button_text'] : 'Add to Cart'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                    <div class="Polaris-Layout" style="margin-top: -55px;">
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px;  position: relative;top: -22px;">Remove Button Text</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div>
                              <div class="">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-TextField Polaris-TextField--hasValue" style="position: relative;top: -35px">
                                      <input id="wp_remove_button_text"name="wp_remove_button_text" value="<?=(isset($setting['wp_remove_button_text']))? $setting['wp_remove_button_text'] : 'Remove'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                      <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="PolarisPortalsContainer"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                      </div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                    <div class="Polaris-Layout" style="margin-top: -55px;">
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: -8px;">Add to Cart & Add All Button Color</h2>
                              </div>
                              <div class="Polaris-Stack__Item">
                                <div class="Polaris-ButtonGroup">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/344"><a aria-describedby="344" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay17" href="produdcts/344" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="344">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div style="position: relative;top: -35px;">
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-Connected ml-auto">
                                            <div id="banner_font_color" class="color-picker colorpicker-element">
                                              <input style="height: 36px;width: 36px; position: relative;left: 236px;top: -20px" type="color" id="wp_addall_button_color" name="wp_addall_button_color" value="<?=(isset($setting['wp_addall_button_color']))? $setting['wp_addall_button_color'] : '#337ab7'?>">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px;  position: relative;top: -8px;">Remove Button and Clear All Color</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/345"><a aria-describedby="345" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay19" href="produdcts/345" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="345">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div style="position: relative;top: -35px;">
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-Connected ml-auto">
                                            <div id="banner_font_color" class="color-picker colorpicker-element">
                                              <input style="height: 36px;width: 36px; position: relative;left: 236px;top: -20px;" type="color" id="wp_clearall_button_color" name="wp_clearall_button_color" value="<?=(isset($setting['wp_clearall_button_color']))? $setting['wp_clearall_button_color'] : '#d9534f'?>">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                      </div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>  
                    <!-- Confirmation Modal/Popup -->
                    <div class="Polaris-Layout" style="margin-top: -55px;" >
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading text" style="font-size: 14px; position: relative;top: -26px; font-weight: bold;">Confirmation Modal/Popup</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird"></div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird"></div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                    <div class="Polaris-Layout" style="margin-top: -69px;">
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: -22px;">Close Button text</h2>
                              </div>
                            </div>
                          </div>
                          <div class= "Polaris-Card__Section">
                            <div>
                              <div class="">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-TextField Polaris-TextField--hasValue" style="position: relative;top: -35px">
                                      <input id="close_button_title" name="close_button_title" value="<?=(isset($setting['close_button_title']))? $setting['close_button_title'] : 'Close'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                      <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="PolarisPortalsContainer"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: -22px;">Remove Modal/Popup Title</h2>
                              </div>
                              <div class="Polaris-Stack__Item">
                                <div class="Polaris-ButtonGroup">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/344"><a aria-describedby="344" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay17" href="produdcts/344" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="344">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div>
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-TextField Polaris-TextField--hasValue" style="position: relative;top: -35px"><input id="remove_modal_title" name="remove_modal_title" value="<?=(isset($setting['remove_modal_title']))? $setting['remove_modal_title'] : 'Remove from Wishlist?'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: -22px;">Message (Item added to Cart)</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/345"><a aria-describedby="345" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay19" href="produdcts/345" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="345">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div>
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-TextField Polaris-TextField--hasValue" style="position: relative;top: -35px"><input id="msg_item_added" name="msg_item_added"value="<?=(isset($setting['msg_item_added']))? $setting['msg_item_added'] : 'Item added to cart successfully'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                    <div class="Polaris-Layout" style="margin-top: -55px;">
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px;  position: relative;top: -22px;">Message (All Items added to Cart)</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div>
                              <div class="">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-TextField Polaris-TextField--hasValue" style="position: relative;top: -35px">
                                      <input id="msg_items_added" name="msg_items_added" value="<?=(isset($setting['msg_items_added']))? $setting['msg_items_added'] : 'Items added to cart successfully'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                      <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="PolarisPortalsContainer"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: -22px;">Message (clear All from wishlish conform)</h2>
                              </div>
                              <div class="Polaris-Stack__Item">
                                <div class="Polaris-ButtonGroup">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div class="Polaris-ResourceList__ResourceListWrapper">
                              <ul class="Polaris-ResourceList" aria-live="polite">
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div class="Polaris-ResourceItem__ItemWrapper">
                                    <div class="Polaris-ResourceItem" data-href="produdcts/344"><a aria-describedby="344" aria-label="View details for Black &amp; orange scarf" class="Polaris-ResourceItem__Link" tabindex="0" id="PolarisResourceListItemOverlay17" href="produdcts/344" data-polaris-unstyled="true"></a>
                                      <div class="Polaris-ResourceItem__Container" id="344">
                                        <div class="Polaris-ResourceItem__Owned">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li class="Polaris-ResourceItem__ListItem">
                                  <div>
                                    <div class="">
                                      <div class="Polaris-Connected">
                                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                          <div class="Polaris-TextField Polaris-TextField--hasValue" style="position: relative;top: -35px"><input id="msg_clear_all" name="msg_clear_all" value="<?=(isset($setting['msg_clear_all']))? $setting['msg_clear_all'] : 'Clear this Wishlist?'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird">
                        
                      </div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                    <div class="Polaris-Layout" style="margin-top: -55px;">
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading" style="font-size: 14px;  position: relative;top: -22px;">Custom css</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div>
                              <div class="">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-TextField Polaris-TextField--hasValue" style="position: relative;top: -35px">
                                     <textarea name="page_custom_css" id="page_custom_css" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField4Label" aria-invalid="false" name="page_custom_css" aria-multiline="true" style="height: 100px;"><?=(isset($setting['page_custom_css']))? $setting['page_custom_css'] : ''?></textarea>
                                      <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="PolarisPortalsContainer"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                  
                    </div>
                    <div style="float: left;position: relative;left: 19px;margin-top: -34px;">
                      <button class="Polaris-Button Polaris-Button--primary" type="submit">
                        <span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Submit</span></span>
                      </button>
                      <div id="PolarisPortalsContainer"></div><br>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
<script type="text/javascript"> 
    $(document).ready(function () { 
      $('.screen-loader').hide();

    });
    $(document).on('click',".close-msg", function(){
        $(this).parent().parent().hide();
    });
    setTimeout(function() {
      $('.Polaris-Banner').fadeOut('fast');
    }, 3000);
</script>

<div class="screen-loader">
    <span class="Polaris-Spinner Polaris-Spinner--colorTeal Polaris-Spinner--sizeLarge">
        <svg viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg">
        <path d="M15.542 1.487A21.507 21.507 0 00.5 22c0 11.874 9.626 21.5 21.5 21.5 9.847 0 18.364-6.675 20.809-16.072a1.5 1.5 0 00-2.904-.756C37.803 34.755 30.473 40.5 22 40.5 11.783 40.5 3.5 32.217 3.5 22c0-8.137 5.3-15.247 12.942-17.65a1.5 1.5 0 10-.9-2.863z"></path>
        </svg>
    </span>
    <span role="status"><span class="Polaris-VisuallyHidden">Spinner example</span></span>
</div>