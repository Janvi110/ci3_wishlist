<link rel="stylesheet" href="<?=base_url();?>assets/newdesign/css/faqs.css"/>

<style type="text/css">
.Polaris-Stack_margin{
  margin: 1px 0;
}
#Main{
  font-family: ShopifySans, Helvetica, Arial, Lucida Grande, sans-serif;
}
.grid{
  /*padding: 0;*/
}  
.faq__answer,.sticky-menu-link{
  font-size: 16px!important;
}
@media screen and (min-width: 67.5em){
  .faq__category-block .heading--3 {    
      font-size: 24px!important;
  } 
}
@media screen and (min-width: 67.5em){
  .faq__answers {
    column-count: 1;    
  }
}
code {
    padding: 2px 4px;
    font-size: 90%;
    color: #c7254e;
    background-color: #f9f2f4;
    border-radius: 4px;
}
.text-danger {
    color: #a94442;
}
.Polaris-Frame__Main img {
  margin-bottom: 20px;
}
.grid {
  padding: 0;
}
.step_menu{
  margin: 20px 0 0 30px;
}
.in-page-menu--vertical {
   border-left: unset; 
}
</style>


<main class="Polaris-Frame__Main" data-has-global-ribbon="false" id="Main">
    <a id="AppFrameMainContent" tabindex="-1"></a>
    <div class="Polaris-Frame__Content" id="faqs">
    <div class="Polaris-Page Polaris-Page--fullWidth">
       
        <div class="Polaris-Page__Content">
          <div itemscope="" itemtype="http://schema.org/FAQPage">

            <section class="section section--tight">
                    <div class="grid js-faq-sticky-menu faq__page-content js-is-sticky-init js-is-sticky-container" id="jsStickyMenuContainer">
                      <div class="grid__item grid__item--tablet-up-third grid__item--desktop-up-quarter sticky-menu hide--mobile faq__sticky-menu">
                        <nav role="navigation" aria-label="FAQ category navigation">
                          <ul class="in-page-menu in-page-menu--vertical gutter-bottom--reset">
                              <li>
                                <a class="sticky-menu-link" href="#" aria-current="true" id="main_menu">App Install Instructions
                                </a>
                              </li>   
                              <li class="step_menu">
                                <a class="sticky-menu-link js-is-active" href="#appinstall" aria-current="true">Step 1
                                </a>
                              </li>   
                              <li class="step_menu">
                                <a class="sticky-menu-link" href="#step2" aria-current="true">Step 2
                                </a>
                              </li> 
                              <li class="step_menu">
                                <a class="sticky-menu-link" href="#step3" aria-current="true">Step 3
                                </a>
                              </li> 
                              <!-- <li class="step_menu">
                                <a class="sticky-menu-link" href="#step3" aria-current="true">Step 4
                                </a>
                              </li>  -->
                          </ul>
                        </nav>

                      </div> 


                      <div class="grid__item grid__item--tablet-up-two-thirds grid__item--desktop-up-three-quarters sticky-menu-content">
                        <div class="accordion-item--mobile faq__category-block open">
                            <!-- <h2 class="js-waypoint accordion-link heading--3 gutter-bottom--reset" id="appinstall">
                              App Install Instructions
                            </h2> -->
                            <h2 class="js-waypoint accordion-link heading--3 gutter-bottom--reset" id="appinstall">
                               Step 1
                            </h2>

                            <div class="accordion-content" aria-labelledby="addstoremenu">
                              <div class="faq__answers">
                              <div class="faq__answer" itemscope="" itemtype="https://schema.org/Question" itemprop="mainEntity">
                                    <p>Before you begin, please follow the steps to install app properly.</p>
                                    <p>Select each step below to view the instructions.</p>
                                    <h3 class="faq__question" itemprop="name">
                                       Step 1: jQuery files must be loaded
                                    </h3>
                                    <div itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                      <div itemprop="text">
                                        <div class="long-form-content gutter-bottom faq__answer-content">
                                          <p></p>

                                        <ul>  
                                          <li><p>1. Go to the admin and then choose Online Store.</p>
                                            <img src="<?=base_url();?>assets/images/instructions/online_store.png">
                                          </li>  
                                          <li><p>2. Click Actions Dropdown and then choose Edit code option.</p>
                                            <img src="<?=base_url();?>assets/images/instructions/actions_dropdown.png">
                                          </li> 
                                          <li><p>3. Select <strong>theme.liquid</strong> file from "Layout" section. </p>
                                            <img src="<?=base_url();?>assets/images/instructions/theme.liquid-1.png">
                                          </li> 
                                          <li><p>4. Find the <strong>jquery.js</strong> or <strong>jquery.min.js</strong> file. If the jquery file exists in your theme, then it will be shown like below screenshot. Please note version of the jquery would be different. </p>
                                            <img src="<?=base_url();?>assets/images/instructions/theme.liquid-2.png">
                                          </li> 
                                          <li><p>5. If the <strong>jQuery</strong> file is not loaded then please add it first from online CDN file URL and save the file. See the following screenshot: </p>
                                            <img src="<?=base_url();?>assets/images/instructions/theme.liquid-3.png">
                                          </li>
                                          <li><p>6. Add new snippet file.</p>
                                            <img src="<?=base_url();?>assets/images/instructions/add-snippet-1.png">
                                          </li>  
                                          <li><p>7. Create checkout_snippet.liquid file.</p>
                                            <img src="<?=base_url();?>assets/images/instructions/add-snippet-2.png">
                                          </li> 
                                          <li><p>8. Click to <a href="javascript:void(0);" data-toggle="modal" data-target="#snippet_code" id="snippet_modal"><strong>checkout_snippet.liquid</strong></a> for copy code.</p>    
                                          </li> 
                                          <li><p>9. And paste the code to <strong>checkout_snippet.liquid</strong> file and save it. </p>
                                            <img src="<?=base_url();?>assets/images/instructions/add-snippet-3.png">
                                          </li>
                                          <li><p>10. Add code <code>{% include 'checkout_snippet' %} </code> after </p><code>&lt;/html&gt;</code> tag. See the following screenshot: </p>
                                            <img src="<?=base_url();?>assets/images/instructions/manual-install-step10.png">
                                          </li>  
                                                                               
                                        </ul>
                                        </div>
                                      </div>
                                    </div>
                              </div>                 
                            </div>
                             </div>

                      </div>

                      <div class="accordion-item--mobile faq__category-block open">
                        <h2 class="js-waypoint accordion-link heading--3 gutter-bottom--reset" id="step2">
                          Step 2
                        </h2>
                        <div class="accordion-content" aria-labelledby="contact">
                            <div class="faq__answers"> 
                             <div class="faq__answer" itemscope="" itemtype="https://schema.org/Question" itemprop="mainEntity">
                                    <h3 class="faq__question" itemprop="name">
                                       Step 2: Edit product-price.liquid file
                                    </h3>
                                    <div itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                      <div itemprop="text">
                                        <div class="long-form-content gutter-bottom faq__answer-content">
                                        <ul>  
                                          <li><p>1. Select product-price.liquid file from "Snippets" section.</p>
                                            <img src="<?=base_url();?>assets/images/instructions/product-price-1.png">
                                          </li>  
                                          <li><p>2. Find text like <code> {{ money_price }} </code> and replace with <code>&lt;div class="price_{{product.id}}" data-ms-id="{{product.id}}" data-ms-variant_id="{{ product.variants.first.id }}" data-ms-product_price="{{ product.price | divided_by: 100.0 }}" data-ms-handle="{{product.handle}}"> {{ money_price }} &lt;/div&gt;</code>. See the following screenshot:</p>

                                          <div class="form-group text-danger" style="margin-bottom: 5px;">
                                            <strong>Note: </strong>
                                            <span>If your theme does not contain <strong>product-price.liquid</strong>, you may have to search price related file like <strong>price.liquid , product-template.liquid </strong> and find the code like <code>{{ formatted_price }}</code>, <code>{{ price | money }}</code>, <code>{{ current_variant.price | money }}</code>,<code>{{ variant.price.price | money }}</code> and put it into the <code>&lt;div class="price_{{product.id}}" data-ms-id="{{product.id}}" data-ms-variant_id="{{ product.variants.first.id }}" data-ms-product_price="{{ product.price | divided_by: 100.0 }}" data-ms-handle="{{product.handle}}"&gt; {add matched variable from above} &lt;/div&gt;</code>.
                                            </span>
                                          </div>

                                            <img src="<?=base_url();?>assets/images/instructions/product-price-2.png">
                                          </li>  
                                          <li><p>3. After modifying the file save it. See the following screenshot: </p>
                                            <img src="<?=base_url();?>assets/images/instructions/product-price-5.png">
                                          </li>                                                                     
                                        </ul>
                                        </div>
                                      </div>
                                    </div>
                              </div>
                            </div>
                        </div>
                      </div>

                      <div class="accordion-item--mobile faq__category-block open">
                        <h2 class="js-waypoint accordion-link heading--3 gutter-bottom--reset" id="step3">
                          Step 3
                        </h2>
                        <div class="accordion-content" aria-labelledby="contact">
                          <div class="faq__answers"> 
                            <div class="faq__answer" itemscope="" itemtype="https://schema.org/Question" itemprop="mainEntity">
                                    <h3 class="faq__question" itemprop="name">
                                      Step 3: Edit cart-template.liquid file<i class="plus-icon"></i>
                                    </h3>
                                    <div itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                      <div itemprop="text">
                                        <div class="long-form-content gutter-bottom faq__answer-content">
                                        <ul>  
                                          <li><p>1. Select <strong>cart-template.liquid</strong> file from sections.</p>
                                            <div class="form-group text-danger" style="margin-bottom: 5px;">
                                            <strong>Note: </strong>
                                            <span>If your theme does not contain <strong>cart-template.liquid</strong>, you may have to search cart related file like <strong>cart.liquid</strong>.  
                                          </div>              
                                        </ul>
                                            <img src="<?=base_url();?>assets/images/instructions/cart-template-1.png">
                                          </li>  
                                          <li><p>2. Replace <code>{{ item.price | money }} </code> with <code>&lt;span class="tp_product_price p_{{item.id}}"> {{ item.price | money }} /span&gt;</code>. And also replace <code> {{ item.final_price | money }} </code> with <code>&lt;span class="tp_product_price p_{{item.id}}"> {{ item.final_price | money }} /span&gt;</code>.See the following screenshot:</p>
                                          <div class="form-group text-danger" style="margin-bottom: 5px;">
                                            <strong>Note: </strong>
                                            <span>If your theme does not contain <strong> <code> {{ item.price | money }} </code></strong>,then find the code  like  <code>{{ item.original_price | money }}</code>, </code>and put it into the <code>&lt;span class="tp_product_price p_{{item.id}}"&gt; {add matched variable from above} &lt;/span&gt;</code>.
                                            </span>
                                          </div>
                                            <img src="<?=base_url();?>assets/images/instructions/cart-template-2.png">
                                          </li> 
                                          
                                          <li><p>3. Replace <code>{{ item.line_price | money }}</code> with <code>&lt;div class="tp_total_price pt_{{item.id}}"&gt; {{ item.line_price | money }} &lt;/div&gt; </code>. Also Replace <code>{{ item.final_line_price | money }}</code> with <code>&lt;div class="tp_total_price pt_{{item.id}}"&gt; {{ item.final_line_price | money }} &lt;/div&gt; </code> See the following screenshot:</p>   

                                          <div class="form-group text-danger" style="margin-bottom: 5px;">
                                            <strong>Note: </strong>
                                            <span>If your theme does not contain <strong> <code> {{ item.line_price | money }} </code></strong>, then find the code  like  <code>{{ item.original_line_price | money }}</code>, </code>and put it into the <code>&lt;div class="tp_total_price pt_{{item.id}}"&gt; {add matched variable from above} &lt;/div&gt;</code>.
                                            </span>
                                          </div>

                                           <img src="<?=base_url();?>assets/images/instructions/cart-template-3.png">
                                          </li> 
                                          <li><p>4. Replace <code>{{ cart.total_price | money }}</code> with <code>&lt;div class="tp_subtotal">{{ cart.total_price | money }}&lt;/div&gt; </code>. See the following screenshot: </p>

                                          <div class="form-group text-danger" style="margin-bottom: 5px;">
                                            <strong>Note: </strong>
                                            <span>If your theme does not contain <strong> <code> {{ cart.total_price | money }} </code></strong>, then find the code  like  <code>{{ cart.total_price | money_with_currency }}</code>,<code>{% include 'price' with cart.total_price %}</code>, </code>and put it into the <code>&lt;div class="tp_subtotal"&gt;  &lt;/div&gt;</code>.
                                            </span>
                                          </div>
                                            <img src="<?=base_url();?>assets/images/instructions/cart-template-4.png">
                                          </li> 
                                          <li><p>5. After modifying the file save it. See the following screenshot: </p>
                                            <img src="<?=base_url();?>assets/images/instructions/cart-template-6.png">
                                          </li>      
                                        </div>
                                      </div>
                                    </div>
                              </div>  
                            </div>    
                        </div>
                      </div>


                </div>
              </div>
            </section>

              </div>
         
       <!--  </div> 
    </div>  
    </div>  
</main> -->

<!-- Modal to show snippet file code -->
<!-- <div id="snippet_code" tabindex="-1" class="modal fade bd-example-modal-sm" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content myModal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">checkout_snippet.liquid</h4>
      </div>
        <div class="modal-body liquid_file_content">
          <textarea id="snippet_content" readonly=""><?= htmlspecialchars_decode(str_replace('<br />', '', $file_content)); ?></textarea>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary pull-right copy_content" value="Copy to clipboard" onclick="copy_code();">
          <span class="text_msg text-success"></span>
        </div>
      </form>
    </div>
  </div>
</div> -->
<div data-portal-id="modal-Polarisportal-5" class="modal-Polarisportal" id="snippet_code" style="display: none;">
    <div>
      <div class="Polaris-Modal-Dialog__Container" data-polaris-layer="true" data-polaris-overlay="true">
        <div>
          <div role="dialog" aria-labelledby="Polarismodal-header1" tabindex="-1" class="Polaris-Modal-Dialog">
            <div class="Polaris-Modal-Dialog__Modal">              

                <div class="Polaris-Modal-Header modal-header">
                            <h3 class="modal-title Polaris-DisplayText Polaris-DisplayText--sizeSmall"> checkout_snippet.liquid </h3>
                            <button type="button" class="Polaris-Modal-CloseButton closedeleteallmodal close ml-auto" aria-label="Close">
                                <span class="Polaris-Icon Polaris-Icon--colorInkLighter Polaris-Icon--isColored modal-close-btn">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                        <path d="M11.414 10l6.293-6.293a.999.999 0 1 0-1.414-1.414L10 8.586 3.707 2.293a.999.999 0 1 0-1.414 1.414L8.586 10l-6.293 6.293a.999.999 0 1 0 1.414 1.414L10 11.414l6.293 6.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z" fill-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </button>
                </div>
                <div class="Polaris-Modal__BodyWrapper">
                  <div class="Polaris-Modal__Body Polaris-Scrollable Polaris-Scrollable--vertical" data-polaris-scrollable="true">
                    <section class="Polaris-Modal-Section">
                      
                      <div class="">
                        <div class="Polaris-Connected">
                          <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                            <div class="Polaris-TextField Polaris-TextField--hasValue Polaris-TextField--multiline"><textarea  id="snippet_content" class="Polaris-TextField__Input" aria-labelledby="PolarisTextField8Label" aria-invalid="false" aria-multiline="true" style="height: 300px;" readonly=""><?= htmlspecialchars_decode(str_replace('<br />', '', $file_content)); ?></textarea>
                              <div class="Polaris-TextField__Backdrop"></div>
                              <div aria-hidden="true" class="Polaris-TextField__Resizer">
                                <div class="Polaris-TextField__DummyInput">1776 Barnes Street<br>Orlandoundefined FL 32801<br></div>
                                <div class="Polaris-TextField__DummyInput"><br><br><br><br></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                    </section>
                  </div>
                </div>
                  <div class="Polaris-Modal-Footer">
                    <div class="Polaris-Modal-Footer__FooterContent">
                      <div class="Polaris-Stack Polaris-Stack--alignmentCenter">
                        <div class="Polaris-Stack__Item Polaris-Stack__Item--fill"></div><div class="Polaris-Stack__Item"><div class="Polaris-ButtonGroup"><div class="Polaris-ButtonGroup__Item">
                         </div>
                         <div class="Polaris-ButtonGroup__Item">
                          <button type="submit" class="Polaris-Button Polaris-Button--primary Polaris-Button--destructive copy_content" onclick="copy_code();" value="Copy to clipboard"><span class="Polaris-Button__Content" id="deleteconfirm"><span class="Polaris-Button__Text" >Copy to clipboard</span></span></button>
                        </div></div></div></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<div class="Polaris-Backdrop data-polaris-overlayverlay"></div>
</div>
<!-- Modal to show snippet file code -->

<script type="text/javascript">
function copy_code() {
  var copyText = document.getElementById("snippet_content");
  copyText.select();
  document.execCommand("copy");
  $('.text_msg').html('code copied..!');
  setTimeout(function(){ $('.text_msg').remove(); }, 3000);
}

$( document ).ready(function() {  
  // $('head').append('<link rel="stylesheet" type="text/css" href="<?=base_url("assets/polaris/css/faqs.css")?>">');

  // $('#snippet_code').hide();

    window.onbeforeunload = function () {
      window.scrollTo(0, 0);
    }
    // var coll = document.getElementsByClassName("faq__category-block");
    // var i;
    // for (i = 0; i < coll.length; i++) {
    //   coll[i].addEventListener("click", function() {      
    //     $(this).children(".accordion-content").toggle();    
    //   });
    // }
    
    $(".sticky-menu-link").click(function(){       
        $('.sticky-menu-link').removeClass("js-is-active");
        $(this).addClass("js-is-active");       
    });
    
    var w = window.innerWidth;
   
    if(w < 750){      
      $('.open').click(function(){      
        $(this).toggleClass("js-is-active");
        $('.accordion-content').hide();
        $('.js-is-active .accordion-content').show();   
      });
    } 
    
    $('#snippet_modal').click(function(){
     // alert('snippet_modal');
      $('#snippet_code').show();
      $('.data-polaris-overlayverlay').show();
     
    });

    $('.close').click(function(){      
      $(this).parents('.modal-Polarisportal').hide();  
      $('.data-polaris-overlayverlay').hide();    
    });

    $('#main_menu').click(function(){     
      
      window.scrollTo(0, 0);
    });

    
});

$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();
    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top - 100
    }, 500);
});

</script>

