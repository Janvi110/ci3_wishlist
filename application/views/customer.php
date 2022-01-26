<?php
$shop_owner = $this->session->userdata('shop_owner');
$shop = $this->session->userdata('shop_email');
?>

<style type="text/css">    

.box{
  box-shadow: none;
}
.modal-btn:hover{
  text-decoration: underline;
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
                            <h1 class="Polaris-DisplayText_1u0t8 Polaris-DisplayText--sizeLarge">Customers</h1>          
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
      <!-- table -->
      <div class="Polaris-Page__Content ">
        <div class="Polaris-Layout">
          <div class="Polaris-Layout__Section">
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <div class="">
                  <div class="Polaris-DataTable__Navigation"><button class="Polaris-Button Polaris-Button--disabled Polaris-Button--plain Polaris-Button--iconOnly" aria-label="Scroll table left one column" type="button" disabled=""><span class="Polaris-Button__Content"><span class="Polaris-Button__Icon"><span class="Polaris-Icon"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                  <path d="M12 16a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 0 1 0-1.414l5-5a.999.999 0 1 1 1.414 1.414L8.414 10l4.293 4.293A.999.999 0 0 1 12 16z"></path>
                  </svg></span></span></span></button><button class="Polaris-Button Polaris-Button--plain Polaris-Button--iconOnly" aria-label="Scroll table right one column" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Icon"><span class="Polaris-Icon"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                  <path d="M8 16a.999.999 0 0 1-.707-1.707L11.586 10 7.293 5.707a.999.999 0 1 1 1.414-1.414l5 5a.999.999 0 0 1 0 1.414l-5 5A.997.997 0 0 1 8 16z"></path></svg></span></span></span></button></div>
                  <div class="Polaris-DataTable data_table-M35">
                    <div class="Polaris-DataTable__ScrollContainer data_tableM35">
                      <table class="Polaris-DataTable__Table ct-table customer-table">
                        <thead>
                          <tr>
                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header" scope="col"><div class="Polaris-TextStyle--variationStrong">#</div></th>
                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric text-left" scope="col"> 
                              <div class="Polaris-TextStyle--variationStrong">Name</div>
                            </th>
                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric text-left" scope="col"> 
                              <div class="Polaris-TextStyle--variationStrong">Email</div>
                            </th>
                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric text-left" scope="col"> 
                              <div class="Polaris-TextStyle--variationStrong">Country</div>
                            </th>
                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric text-left" scope="col"> 
                              <div class="Polaris-TextStyle--variationStrong">Total Orders </div>
                            </th>
                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric text-left" scope="col"> 
                              <div class="Polaris-TextStyle--variationStrong">Last Order</div>
                            </th>
                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric text-left" scope="col"> 
                              <div class="Polaris-TextStyle--variationStrong">Created At</div>
                            </th>
                            <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col"><span class="Polaris-TextStyle--variationStrong">Action</span></th>
                          </tr>
                        </thead>
                        <tbody id="customer_table">
                          <?php if( !empty($customers) ) : ?>
                          <?php $row  = $page; foreach($customers as $customer) : ?>
                          <?php $name = $customer['first_name'] .' '. $customer['last_name']; ?>
                          <tr class="Polaris-DataTable__TableRow">
                            <th class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn" scope="row"><div class="Polaris-TextStyle--variationStrong"><?= $row; ?></div></th>
                            <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric text-left"><?= $name; ?></td>
                            <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric text-left"><?= $customer['email']; ?></td>
                            <?php $country = !empty($customer['default_address']['country']) ? $customer['default_address']['country'] : ''; ?>
                            <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric text-left"><?= $country; ?></td>
                            <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric text-left"><?= $customer['orders_count']; ?></td>
                            <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric text-left"><?= $customer['last_order_name']; ?></td>
                            <?php $created_at = date("M d, Y H:i A", strtotime($customer['created_at'])); ?>
                            <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric text-left"><?= $created_at; ?></td>
                            <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">
                              <a href="javascript:void(0);" class="modal-btn" data-id="<?= $customer['id']; ?>" data-name="<?= $name; ?>" style="color: blue" >Wishlist</a>
                            </td>
                          </tr>
                          <?php $row++; endforeach; ?>
                          <?php else : ?>  
                          <tr>
                            <td colspan="8" style="text-align: center"><strong>No Records Found</strong></td>
                          </tr>
                          <?php endif; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div id="PolarisPortalsContainer"></div>
              </div>
              <!-- pagination -->
              <?php
              // $total = count($customers); 
              if($totalItems > $itemsPerPage){ ?>

              <div class="Polaris-Card__Section text-center">
                <nav class="Polaris-Pagination" aria-label="Pagination">
                  <button type="button" class="Polaris-Pagination__Button Polaris-Pagination__PreviousButton" aria-label="Previous"  
                    <?php if ($previouspage <= 0) { ?>  disabled=""  <?php } ?>
                    onclick="GetAllCustomerListing(<?= $itemsPerPage ?>,<?= $previouspage ?>);"><span class="Polaris-Icon"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2" fill-rule="evenodd"></path></svg></span></button>

                    <button type="button" class="Polaris-Pagination__Button Polaris-Pagination__NextButton" aria-label="Next" tabindex="0" aria-describedby="PolarisTooltipContent51"                             <?php if ($currentpage == $pages) { ?>  disabled=""  <?php } ?>
                    onclick="GetAllCustomerListing(<?= $itemsPerPage ?>,<?= $nextpage ?>);"><span class="Polaris-Icon"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M17.707 9.293l-5-5a.999.999 0 1 0-1.414 1.414L14.586 9H3a1 1 0 1 0 0 2h11.586l-3.293 3.293a.999.999 0 1 0 1.414 1.414l5-5a.999.999 0 0 0 0-1.414" fill-rule="evenodd"></path></svg></span>
                  </button>
                </nav>
              </div>
              <?php } ?>
              <!-- end pagination -->
            </div>
          </div>
          <!-- modal -->
          <div>
            <div class="Polaris-Modal-Dialog__Container tier-modal customer_modal" id="customer_modal" data-polaris-layer="true" data-polaris-overlay="true" style="display: none;">
              <div role="dialog" aria-labelledby="Polarismodal-header2" tabindex="-1" class="Polaris-Modal-Dialog">
                <div class="Polaris-Modal-Dialog__Modal">
                  <form action="#" id="frmtier" name="frmtier">
                    <div class="Polaris-Modal-Header modal-header">
                      <div id="Polarismodal-header2" class="Polaris-Modal-Header__Title">
                        <h2 class="Polaris-DisplayText Polaris-DisplayText--sizeSmall">:Wishlist Items</h2>
                      </div>
                      <button type="button" class="Polaris-Modal-CloseButton modal-close-btn" aria-label="Close">
                        <span class="Polaris-Icon Polaris-Icon--colorInkLighter Polaris-Icon--isColored ">
                          <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                            <path d="M11.414 10l6.293-6.293a.999.999 0 1 0-1.414-1.414L10 8.586 3.707 2.293a.999.999 0 1 0-1.414 1.414L8.586 10l-6.293 6.293a.999.999 0 1 0 1.414 1.414L10 11.414l6.293 6.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z" fill-rule="evenodd"></path>
                          </svg>
                        </span>
                      </button>
                    </div>
                    <div class="Polaris-Card">
                      <div class="Polaris-Card__Section">
                        <div class="">
                          <div class="Polaris-DataTable__Navigation">
                            <button class="Polaris-Button Polaris-Button--disabled Polaris-Button--plain Polaris-Button--iconOnly" aria-label="Scroll table left one column" type="button" disabled="">
                              <span class="Polaris-Button__Content">
                                <span class="Polaris-Button__Icon">
                                  <span class="Polaris-Icon">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                      <path d="M12 16a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 0 1 0-1.414l5-5a.999.999 0 1 1 1.414 1.414L8.414 10l4.293 4.293A.999.999 0 0 1 12 16z"></path>
                                    </svg>
                                  </span>
                                </span>
                              </span>
                            </button>
                            <button class="Polaris-Button Polaris-Button--plain Polaris-Button--iconOnly" aria-label="Scroll table right one column" type="button">
                              <span class="Polaris-Button__Content">
                                <span class="Polaris-Button__Icon">
                                  <span class="Polaris-Icon">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M8 16a.999.999 0 0 1-.707-1.707L11.586 10 7.293 5.707a.999.999 0 1 1 1.414-1.414l5 5a.999.999 0 0 1 0 1.414l-5 5A.997.997 0 0 1 8 16z"></path>
                                    </svg>
                                  </span>
                                </span>
                              </span>
                            </button>
                          </div>
                          <div class="Polaris-DataTable">
                            <div class="Polaris-DataTable__ScrollContainer">
                              <table class="Polaris-DataTable__Table">
                                <thead>
                                  <tr>
                                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header" scope="col">#</th>
                                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header" scope="col">Product Name</th>
                                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header " scope="col">Variant</th>
                                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header" scope="col">Price (USD)</th>
                                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">SKU</th><th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Created At</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header" scope="col">1</td>
                                    <td data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header" scope="col">Always Together Campaign(test)</td>
                                    <td data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header " scope="col">Jet Black / S</td>
                                    <td data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header" scope="col">50.00</td>
                                    <td data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">27</th><td data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Oct 02, 2018 10:34 AM</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div id="PolarisPortalsContainer"></div>
                        <div class="show_customer_data"></div>
                      </div>
                    </div>
                    <div class="Polaris-Modal-Footer">
                      <div class="Polaris-Modal-Footer__FooterContent">
                        <div class="Polaris-Stack Polaris-Stack--alignmentCenter">
                          <div class="Polaris-Stack__Item Polaris-Stack__Item--fill"></div>
                          <div class="Polaris-Stack__Item">
                            <div class="Polaris-ButtonGroup">
                              <div class="Polaris-ButtonGroup__Item">
                                <button type="button" class="Polaris-Button modal-close-btn">
                                  <span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Cancel</span></span>
                                </button>
                              </div>                                  
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End Modal -->
        </div>
      </div>
      <!-- End Table -->
  </div>
</div>
<script type="text/javascript">  
  
    $(document).ready(function () { 
      $('.screen-loader').hide();
    });
    $(document).on('click',".close-msg", function(){
        console.log(this);
         $('.Polaris-Banner').hide();
    });
    $(document).on('click', '.modal-btn', function () {
       $('.customer_modal').show();
    });
    setTimeout(function() {
      $('.Polaris-Banner').fadeOut('fast');
    }, 3000);
    function GetAllCustomerListing(perPageCount, pageNumber,search = '') {
        $('.screen-loader').show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>customers/GetAllCustomerData",
            data: {'pageNumber': pageNumber, 'perPageCount': perPageCount,'search': search},
            dataType: "html",
            success: function (data) {
                $('.screen-loader').hide();
                // $('.show_customer_data').html(data);
                // $('.hide_table').hide();
                if(search){
                  $(".Polaris-Pagination").hide();
                }else{
                  $(".Polaris-Pagination").show();  
                }
            },
            // complete: function(data) {
            //     var search_tier = "<?=$search_tier;?>";
            //     var value = search_tier.toLowerCase();
            //     $("#customer_table tr").filter(function () {
            //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            //     }); 
                
            // }
        });
    }
</script>

<div class="screen-loader">
    <span class="Polaris-Spinner Polaris-Spinner--colorTeal Polaris-Spinner--sizeLarge">
        <svg viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg">
        <path d="M15.542 1.487A21.507 21.507 0 00.5 22c0 11.874 9.626 21.5 21.5 21.5 9.847 0 18.364-6.675 20.809-16.072a1.5 1.5 0 00-2.904-.756C37.803 34.755 30.473 40.5 22 40.5 11.783 40.5 3.5 32.217 3.5 22c0-8.137 5.3-15.247 12.942-17.65a1.5 1.5 0 10-.9-2.863z"></path>
        </svg>
    </span>
    <span role="status"><span class="Polaris-VisuallyHidden">Spinner example</span></span>
</div>