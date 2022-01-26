<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <!-- <div class="tab-content search-box2-main"> -->
      <div class="tab-content decoration-main-box pb-30">
        <div class="tab-pane active" id="th">

          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="searchBox">
                <div class="text-center decoration-title">
                  Choose Decoration Method
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <?php foreach ($decoration_methods as $key => $method) { //pre($method);?>
            
              <?php 
                
                $photo  = theme_img('no_picture.png', lang('no_image_available')); 

                if(!empty($method->image))
                {
                  $photo  = '<img class="img-responsive" src="'.base_url('uploads/images/medium/'.$method->image).'" alt="'.$method->name.'"/>';
                }

              ?>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="col-lg-10 text-center decoration-box-size">
                  <a href="javascript:" class="decoration-method-click" data-method="<?php echo $method->name; ?>" data-method_id="<?php echo $method->id; ?>">
                    <div class="decoration-box-blue method-<?php echo $method->id; ?>">
                      <div class="product-img">
                        <!-- <img class="img-responsive" src="<?php echo base_url('gocart/themes/default/assets/images/product/direct_garment.png') ?>" alt=""> -->
                        <?php echo $photo; ?>
                      </div>
                      <div class="decoration-content">
                         <span class=""><?php echo $method->name; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>

            <?php } ?>

            <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
              <div class="col-lg-8 text-center decoration-box-size">
                <div class="decoration-box-blue">
                  <div class="product-img">
                    <img class="img-responsive" src="<?php echo base_url('gocart/themes/default/assets/images/product/day_sub.png') ?>" alt="">
                  </div>
                  <div class="decoration-content">
                     <span class="">Day Sublimation</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
              <div class="col-lg-8 text-center decoration-box-size">
                <div class="decoration-box-blue">
                  <div class="product-img">
                    <img class="img-responsive" src="<?php echo base_url('gocart/themes/default/assets/images/product/embroidery.png') ?>" alt="">
                  </div>
                  <div class="decoration-content">
                     <span class="">Embroidery</span>
                  </div>
                </div>
              </div>
            </div>  --> 

          </div>

          <div class="direct-garment-data" style="display: none;">

            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="decoration-hr"></div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="searchBox">
                  <div class="text-center decoration-sub-title">
                    Select Design Placement
                  </div>
                  <div class="text-center decoration-sub-title-small">
                    <span class="decoration-note">Note : </span>
                    <span class="decoration-content-small">You can custom position your design the review stage.</span>
                  </div>
                </div>
              </div>
            </div>
          
          
            
            <div class="row">
            
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="col-lg-12 text-center decoration-box-size mar-50">
                  <a href="javascript:" class="decoration-method-sub-click" data-decoration_position="front_only">
                    <div class="decoration-box-border">
                      <div class="product-img">
                        <img class="img-responsive" src="<?php echo base_url('gocart/themes/default/assets/images/product/front.png') ?>" alt="">
                      </div>
                    </div>
                  </a>
                  <div class="decoration-content">
                    <span class="garment-font">Front Only</span>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="col-lg-12 text-center decoration-box-size mar-50">
                  <a href="javascript:" class="decoration-method-sub-click" data-decoration_position="left_chest_only">
                    <div class="decoration-box-border">
                      <div class="product-img">
                        <img class="img-responsive" src="<?php echo base_url('gocart/themes/default/assets/images/product/left-chest.png') ?>" alt="">
                      </div>
                    </div>
                  </a>
                  <div class="decoration-content">
                    <span class="garment-font">Left Chest Only</span>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="col-lg-12 text-center decoration-box-size mar-50">
                  <a href="javascript:" class="decoration-method-sub-click" data-decoration_position="back_only">
                    <div class="decoration-box-border">
                      <div class="product-img">
                        <img class="img-responsive" src="<?php echo base_url('gocart/themes/default/assets/images/product/front.png') ?>" alt="">
                      </div>
                    </div>
                  </a>
                  <div class="decoration-content">
                    <span class="garment-font">Back Only</span>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="col-lg-12 text-center decoration-box-size mar-50">
                  <a href="javascript:" class="decoration-method-sub-click" data-decoration_position="left_chest_back_only">
                    <div class="decoration-box-border">
                      <div class="product-img">
                        <img class="img-responsive" src="<?php echo base_url('gocart/themes/default/assets/images/product/left-chest-back.png') ?>" alt="">
                      </div>
                    </div>
                  </a>
                  <div class="decoration-content">
                    <span class="garment-font">Left Chest & Back</span>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                <div class="col-lg-12 text-center decoration-box-size mar-50">
                  <a href="javascript:" class="decoration-method-sub-click" data-decoration_position="front_back_only">
                    <div class="decoration-box-border">
                      <div class="product-img">
                        <img class="img-responsive" src="<?php echo base_url('gocart/themes/default/assets/images/product/front-back.png') ?>" alt="">
                      </div>
                    </div>
                  </a>
                  <div class="decoration-content">
                    <span class="garment-font">Front & Back</span>
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

<script type="text/javascript">
  $(".decoration-method-click").on("click", function(){
    
    if($(this).attr('data-method') == 'Direct to Garment')
    {
      $('.direct-garment-data').show();
      $('.method-' + $(this).attr('data-method_id')).css('background-color', '#33CC33');
      $(".decoration-method-sub-click").attr('data-id', 1)
    }
    else
    {
      window.location = "<?php echo base_url('cart/products') ?>/" + $(this).attr('data-method_id');
    }
  })

  $(".decoration-method-sub-click").on("click", function(){
    window.location = "<?php echo base_url('cart/products') ?>/" + $(this).attr('data-id') + '/' + $(this).attr('data-decoration_position');
  })
</script>