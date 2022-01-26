<?php
$shop_owner = $this->session->userdata('shop_owner');
$shop = $this->session->userdata('email');

?>

<style type="text/css">    
    /*rating star*/
.rating_star { 
  border: none;
  float: left;
  padding: 0px;
  font-size: 1.8rem;  
  margin-top:1.1rem;
}

.rating_star > input { display: none; } 
.rating_star > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating_star > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating_star > label { 
  color: #ddd; 
  float: right; 
  /*border: 1px dotted yellow;*/
}
.svgclass{
 height: 35px;
  width: 35px;
  background-color: white;
  border: 1px #919eab solid;
  border-radius: 50%;
  display: inline-block;
  position: relative;
    top: -2px;
    left: -7px;
}
/***** CSS Magic to Highlight Stars on Hover *****/

.rating_star > input:checked ~ label, /* show gold star when clicked */
.rating_star:not(:checked) > label:hover, /* hover current star */
.rating_star:not(:checked) > label:hover ~ label { color: #FFD119;  } /* hover previous stars in list */

.rating_star > input:checked + label:hover, /* hover current star when changing rating */
.rating_star > input:checked ~ label:hover,
.rating_star > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating_star > input:checked ~ label:hover ~ label { color: #FFD119;  } 
</style>
<style>
.collapsibles {
    width: 100%;
    border: none;
    text-align: left;
    position: relative;
    top: -7px;
}
.contents {
    padding-left: 57px;
    padding-right: 57px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
.up{
    transform: rotate(180deg);
}
.down{
    transform: rotate(180deg);
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
                                                <h1 class="Polaris-DisplayText_1u0t8 Polaris-DisplayText--sizeLarge">Dashboard</h1>
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
                        <div class="Polaris-Card">
                            <div class="Polaris-Card__Section">
                                <div class="Polaris-Card__SectionHeader">
                                    <!-- <h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Hi Manthan Bhavsar!</h1> -->
                                    <p class="Polaris-DisplayText Polaris-DisplayText--sizeExtraLarge client_name">Hi <?= $shop_owner ?>,</p>
                                </div>
                                <p>Welcome to Easy Wishlist </p>
                            </div>
                        </div>
                    </div>
                    <div class="Polaris-Layout__Section">
                        <div class="Polaris-Card">
                            <div class="Polaris-Card__Header collapsibles show_btn">
                                <span class="svgclass">
                                      <svg style="height: 21px;position: relative;top: 7px;left: 6px;" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 1a5 5 0 00-5 5v.448c0 5.335 2.955 9.647 8.598 12.457a.902.902 0 00.804 0C16.046 16.095 19 11.783 19 6.448V6a5 5 0 00-9-3 4.992 4.992 0 00-4-2z" fill="#707070"/></svg>
                                    </span><span class="Polaris-DisplayText Polaris-DisplayText--sizeSmall "><a  style="cursor: pointer;" >Wishlist button</a></span>
                                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="height: 25px;width: 25px;float: right;" class="show_btn1"><path d="M10 14a.997.997 0 01-.707-.293l-5-5a.999.999 0 111.414-1.414L10 11.586l4.293-4.293a.999.999 0 111.414 1.414l-5 5A.997.997 0 0110 14z" fill="#707070"/></svg><br>
                            </div>   
                            <div  class="contents"><br>
                                <p>The first step to adding Wishlist button on Product pages.</p>
                                <p>In most cases, it has to be added to product.liquid or product-form.liquid or product-template.liquid</p>
                                <p>For icon</p><br>
                                <div>
                                    <div class="Polaris-Banner Polaris-Banner--statusInfo Polaris-Banner--hasDismiss Polaris-Banner--withinPage" tabindex="0" role="status" aria-live="polite" aria-labelledby="PolarisBanner16Heading" aria-describedby="PolarisBanner16Content">
                                        <div class="Polaris-Banner__Ribbon">
                                            <span class="Polaris-Icon Polaris-Icon--colorHighlight Polaris-Icon--applyColor"></span>
                                        </div>
                                        <div class="Polaris-Banner__ContentWrapper"> 
                                            <div class="Polaris-Banner__Content" id="PolarisBanner16Content">
                                                <p>&lt;div id="mswishlist"  class="mswishlist" data-product="{{ product.id }}" data-variant="{{ product.variants.first.id }}"&gt;&lt;/div&gt;</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <p>For button</p><br>
                                <div>
                                    <div class="Polaris-Banner Polaris-Banner--statusInfo Polaris-Banner--hasDismiss Polaris-Banner--withinPage" tabindex="0" role="status" aria-live="polite" aria-labelledby="PolarisBanner16Heading" aria-describedby="PolarisBanner16Content">
                                        <div class="Polaris-Banner__Ribbon">
                                            <span class="Polaris-Icon Polaris-Icon--colorHighlight Polaris-Icon--applyColor"></span>
                                        </div>
                                        <div class="Polaris-Banner__ContentWrapper"> 
                                            <div class="Polaris-Banner__Content" id="PolarisBanner16Content">
                                                <p>&lt;div id="mswishlist"  class="mswishlist mswlbtn" data-product="{{ product.id }}" data-variant="{{ product.variants.first.id }}"&gt;&lt;/div&gt;</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <p>You can place the code anywhere in the file. However, the recommended location to add this code is next to 'Add to Cart' button or below it..</p>
                                <ol>
                                    <li>Go to Online Store => Themes => Edit HTML/CSS</li>
                                    <li>Under Templates, look for product.liquid file and click to open the file in the editor.</li>
                                    <li>Place the above code near the Add to Cart Button.</li>
                                    <li>Open product page, you can see Wishlist button near Add to Cart button.</li>
                                    <li>Also, you can add Wishlist Button on Collection Pages.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="Polaris-Layout__Section">
                        <div class="Polaris-Card">
                            <div class="Polaris-Card__Header collapsibles show_pg">
                                <span class="svgclass">
                                    <svg style="height: 21px;position: relative;top: 6px;left: 6px;" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.379 0a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 5.622V18.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 18.5v-17A1.5 1.5 0 014.5 0h6.879zM6 5h4v2H6V5zm8 4v2H6V9h8zm-8 6v-2h7v2H6z" fill="#707070"/></svg>
                                </span><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="height: 25px;width: 25px;float: right;" class="show_pg1"><path d="M10 14a.997.997 0 01-.707-.293l-5-5a.999.999 0 111.414-1.414L10 11.586l4.293-4.293a.999.999 0 111.414 1.414l-5 5A.997.997 0 0110 14z" fill="#707070"/></svg>
                                <span class="Polaris-DisplayText Polaris-DisplayText--sizeSmall"><a style="cursor: pointer;"  >Wishlist page</a></span><br>
                            </div>   
                            <div  class="contents"><br>
                                <p>The app provides a link to My Wishlist page in the tooltip. However, it is recommended to place a link to this page in the page header or menu.</p>
                                <ol>
                                    <li>Go to Online Store => Navigation</li>
                                    <li>Click on the Edit Menu link for the menu displayed at the top of your store.</li>
                                    <li>Under Menu Items, click on Add Menu Items</li>
                                    <li>Use the following values without quotes, Name ="Wishlist", Link ="Web Address", Path ="/a/mswishlist" and click Save Menu.</li>
                                </ol>
                            </div>
                        </div>       
                    </div>
                    <div class="Polaris-Layout__Section">
                        <div class="Polaris-Card">
                            <div class="Polaris-Card__Header collapsibles save_wish">
                                <span class="svgclass" class="">
                                    <svg style="height: 21px;position: relative;top: 6px;left: 6px;" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 012.5 1h15A1.5 1.5 0 0119 2.5v15a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 011 17.5v-15zM8 5h8v2H8V5zm8 4H8v2h8V9zm-8 4h8v2H8v-2zM5 7a1 1 0 100-2 1 1 0 000 2zm1 3a1 1 0 11-2 0 1 1 0 012 0zm-1 5a1 1 0 100-2 1 1 0 000 2z" fill="#707070"/></svg>
                                </span>
                                <span class="Polaris-DisplayText Polaris-DisplayText--sizeSmall"><a  style="cursor: pointer;position: relative;top: 0px" >Save Wishlist</a>
                                </span>
                                <span class="Polaris-DisplayText Polaris-DisplayText--sizeSmall extra_weight app_status"></span>
                                <span >
                                <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="height: 25px;width: 25px;float: right;" class="save_wish1"><path d="M10 14a.997.997 0 01-.707-.293l-5-5a.999.999 0 111.414-1.414L10 11.586l4.293-4.293a.999.999 0 111.414 1.414l-5 5A.997.997 0 0110 14z" fill="#5C5F62"/></svg></span><br>
                            </div>
                            <div class="contents"><br>
                                <p>The app provides a link to My Wishlist page in the tooltip. However, it is recommended to place a link to this page in the page header or menu.</p><br>
                                <div>
                                    <div class="Polaris-Banner Polaris-Banner--statusInfo Polaris-Banner--hasDismiss Polaris-Banner--withinPage" tabindex="0" role="status" aria-live="polite" aria-labelledby="PolarisBanner16Heading" aria-describedby="PolarisBanner16Content">
                                        <div class="Polaris-Banner__Ribbon">
                                            <span class="Polaris-Icon Polaris-Icon--colorHighlight Polaris-Icon--applyColor"></span>
                                        </div>
                                        <div class="Polaris-Banner__ContentWrapper"> 
                                            <div class="Polaris-Banner__Content" id="PolarisBanner16Content">
                                                <p>&lt;input type="hidden" name="ms_customer_id" id="ms_customer_id" value="{% if customer %}{{ customer.id}}{% else %}0{% endif %}" /&gt;</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <p>It is recommended to add this code either after opening or just before closing tags in layout/theme.liquid. Ideally, it can be placed anywhere as long as it remains outside any conditional statements such as 'if', 'unless', 'while' etc.</p><br>
                            </div>
                        </div>
                    </div>
                    <div class="Polaris-Layout__Section">
                        <div class="">
                            <div style="--top-bar-background:#00848e; --top-bar-background-lighter:#1d9ba4; --top-bar-color:#f9fafb; --p-frame-offset:0px;">
                            <div class="Polaris-Card">
                                <div class="Polaris-Card__Header">
                                    <h2 class="Polaris-Heading">FAQs</h2>
                                </div>
                                <div class="Polaris-Card__Section">
                                    <h2 class="Polaris-Heading">What will this app do?</h2>
                                    <p>Easy Wishlist is the modern age wishlist for the ecommerce platform Shopify which empowers your customers to create the collection of desired products on your ecommerce platform that too without login or registration. With the help of this plugin you can diminish shopping cart abandonment and carry out sales from customers who desired for a product and didn’t end up purchasing.</p>
                                </div>
                                <div class="Polaris-Card__Section">
                                    <h2 class="Polaris-Heading">How does this help my shop?</h2>
                                    <p>he customers can gain benefit from the wishlist plugin as it can remind them of a product and help merchants measure product interest beyond a clear-cut sale. Moreover, the plugin is quite easy to use and the wishlist can be created just in a blink of eye. It is super simple to set up and any non-developer can easily do this.</p>
                                </div>                    
                                <div class="Polaris-Card__Section">
                                    <h2 class="Polaris-Heading">How do I get support?</h2>
                                    <p>We are willing to help you, please email us at support@metizsoft.zohodesk.com</p>
                                </div>
                              </div>
                            </div>         
                        </div>
                    </div> 

                    <div class="Polaris-Layout__Section">
                    <div class="">

                        <div style="--top-bar-background:#00848e; --top-bar-background-lighter:#1d9ba4; --top-bar-color:#f9fafb; --p-frame-offset:0px;">
                          <div class="Polaris-Card">
                            <div class="Polaris-CalloutCard__Container">
                              <div class="Polaris-Card__Section">
                                <div class="Polaris-CalloutCard">
                                  <div class="Polaris-CalloutCard__Content">
                                    <div class="Polaris-CalloutCard__Title">
                                      <h2 class="Polaris-Heading">WHAT IS NEXT?</h2>
                                    </div>
                                    <div class="Polaris-TextContainer">
                                      <p>We are working hard to support the Shopify Community to save your time and money 👍 (optional step)</p>
                                    </div>

                                    <a href="https://apps.shopify.com/easy-wishlist?#reviews" target="_blank" class="rating_star">
                                    <!-- <fieldset ass="rating_star"> -->
                                        <input type="radio" id="star5" name="rating" value="5" />
                                        <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                    <!-- </fieldset>   -->
                                    </a>
                                    
                                  </div><img src="<?=base_url();?>assets/images/Image7.png" alt="" class="Polaris-CalloutCard__Image">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    </div> 
                </div>
            </div>
<script>
    $(".show_btn").click(function(){
        $('.show_btn1').toggleClass('up down');
    });
    $(".show_pg").click(function(){
        $('.show_pg1').toggleClass('up down');
    });
    $(".save_wish").click(function(){
        $('.save_wish1').toggleClass('up down');
    });
var coll = document.getElementsByClassName("collapsibles");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("wish");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<script type="text/javascript">  
  
    $(document).ready(function () {
       $('.full').click(function () {            
            let a= document.createElement('a');
            a.target= '_blank';
            a.href= 'https://apps.shopify.com/easy-wishlist?#reviews';
            a.click();
       });

       $('.screen-loader').hide();
   });
    
</script>

<div class="screen-loader">
    <span class="Polaris-Spinner Polaris-Spinner--colorTeal Polaris-Spinner--sizeLarge">
        <svg viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg">
        <path d="M15.542 1.487A21.507 21.507 0 00.5 22c0 11.874 9.626 21.5 21.5 21.5 9.847 0 18.364-6.675 20.809-16.072a1.5 1.5 0 00-2.904-.756C37.803 34.755 30.473 40.5 22 40.5 11.783 40.5 3.5 32.217 3.5 22c0-8.137 5.3-15.247 12.942-17.65a1.5 1.5 0 10-.9-2.863z"></path>
        </svg>
    </span>
    <span role="status"><span class="Polaris-VisuallyHidden">Spinner example</span></span>
</div>