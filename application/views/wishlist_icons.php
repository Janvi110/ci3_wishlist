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
                            <h1 class="Polaris-DisplayText_1u0t8 Polaris-DisplayText--sizeLarge">Wishlist Icons</h1>          
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
            <?php } ?>
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <form method="POST" id="wishlist_icon_form" action="<?=base_url('homepage/wishlist_setting');?>">
                  <input type="hidden" name="return_url" value="wishlisticon">
                  <div>
                    <div class="Polaris-Layout" style="margin-top: -55px;" >
                      <div class="Polaris-Layout__Section Polaris-Layout__Section--oneThird" style="border-style: none">
                        <div class="Polaris-Card box">
                          <div class="Polaris-Card__Header">
                            <div class="Polaris-Stack Polaris-Stack--alignmentBaseline">
                              <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                <h2 class="Polaris-Heading text" style="font-size: 14px; position: relative;top: 15px;">Custom Wishlist icon class name</h2><svg style="float: right;position: relative;top: -4px" xmlns="http://www.w3.org/2000/svg" width="15.095" height="15.095" viewBox="0 0 15.095 15.095"><defs><style>.a{fill:none;stroke:#212b36;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}</style></defs><g transform="translate(-2.25 -2.25)"><path class="a" d="M16.595,9.8A6.8,6.8,0,1,1,9.8,3a6.8,6.8,0,0,1,6.8,6.8Z"/><path class="a" d="M13.635,11.856a2.039,2.039,0,0,1,3.963.68c0,1.359-2.039,2.039-2.039,2.039" transform="translate(-5.816 -4.097)"/><path class="a" d="M18,25.5h0" transform="translate(-8.203 -12.304)"/></g></svg>
                                <p style="float: right;">
                                  
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div>
                              <div style="position: relative;top: -13px">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-TextField Polaris-TextField--hasValue">
                                      <input id="wishlist_icon" name="wishlist_icon"  value="<?=(isset($setting['wishlist_icon']))? $setting['wishlist_icon'] : 'fa fa-heart'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
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
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 13px;">Add to wishlist button text</h2>
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
                                          <div class="Polaris-TextField Polaris-TextField--hasValue"><input id="add_to_wishlist" name="add_to_wishlist" value="<?=(isset($setting['add_to_wishlist']))? $setting['add_to_wishlist'] : 'Add to Wishlist'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
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
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 13px;">Remove from wishlist button text</h2>
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
                                          <div class="Polaris-TextField Polaris-TextField--hasValue"><input id="remove_from_wishlist" name="remove_from_wishlist"value="<?=(isset($setting['remove_from_wishlist']))? $setting['remove_from_wishlist'] : 'Remove from wishlist'?>" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="">
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
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 8px;">Wishlist Icon default color</h2>
                              </div>
                            </div>
                          </div>
                          <div class="Polaris-Card__Section">
                            <div>
                              <div class="">
                                <div class="Polaris-Connected">
                                  <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                                    <div class="Polaris-Connected ml-auto">
                                      <div id="banner_font_color" class="color-picker colorpicker-element">
                                        <input style="position: relative;height: 36px;width: 36px; top: -35px;left: 239px;" type="color" id="wishlist_icon_color" name="wishlist_icon_color" value="<?=(isset($setting['wishlist_icon_color']))? $setting['wishlist_icon_color'] : '#a79c9d'?>">
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
                                <h2 class="Polaris-Heading" style="font-size: 14px; position: relative;top: 8px;">Wishlist icon hover color/<br>wishlisted state color</h2>
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
                                  <div class="Polaris-Connected ml-auto">
                                    <div id="banner_font_color" class="color-picker colorpicker-element">
                                      <input style="position: relative;height: 36px;width: 36px; top: -60px;left: 239px;" type="color" id="wishlist_icon_hover_color" name="wishlist_icon_hover_color" value="<?=(isset($setting['wishlist_icon_hover_color']))? $setting['wishlist_icon_hover_color'] : '#FF1493'?>">
                                    </div>
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
                    <div style="position: relative;margin-top: -60px;left: 20px;">
                      <label class="Polaris-Choice" for="PolarisCheckbox2">
                        <span class="Polaris-Choice__Control">
                          <span class="Polaris-Checkbox">
                            <input id="PolarisCheckbox2" type="checkbox" name="display_item_count" <?=($display_item_count == '1')? 'checked' : ''?>  value="1" class="Polaris-Checkbox__Input" aria-invalid="false" role="checkbox" aria-checked="false" value="">
                            <span class="Polaris-Checkbox__Backdrop"></span>
                            <span class="Polaris-Checkbox__Icon">
                              <span class="Polaris-Icon">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M8.315 13.859l-3.182-3.417a.506.506 0 0 1 0-.684l.643-.683a.437.437 0 0 1 .642 0l2.22 2.393 4.942-5.327a.436.436 0 0 1 .643 0l.643.684a.504.504 0 0 1 0 .683l-5.91 6.35a.437.437 0 0 1-.642 0"></path>
                                </svg>
                              </span>
                            </span>
                          </span>
                        </span>
                        <span class="Polaris-Choice__Label">Display total number of itmes along with wishlist icon</span>
                      </label>
                      <div id="PolarisPortalsContainer"></div>  
                      <div style="float: left; margin-top: 19px;">
                        <button class="Polaris-Button Polaris-Button--primary" type="submit">
                          <span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Submit</span></span>
                        </button>
                      <div id="PolarisPortalsContainer"></div><br>
                      </div>
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