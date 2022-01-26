<!DOCTYPE html>
<html>
    <head>
        <meta charSet="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title><?php echo $page_title; ?></title>
       <!--  
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,600;1,300&display=swap" rel="stylesheet"> -->
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
       <!--  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
       <link rel="stylesheet" href="https://sdks.shopifycdn.com/polaris/3.21.0/polaris.min.css" />

        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
        <link href="css/custome.css" rel="stylesheet" type="text/css" media="all" />  
        <link href="css/polaris.css" rel="stylesheet" type="text/css" media="all" /> 
        <link href="css/pricing.css" rel="stylesheet" type="text/css" media="all" />              
        <!-- <link href="css/vendor.css" rel="stylesheet" type="text/css" media="all" />        
        <link href="css/analytics.css" rel="stylesheet" type="text/css" media="all" />
 -->
    <!-- polaris css -->
        
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/vendors~Admin~error~internal~plus~redirectLoop-ccbb3f135d4cbb2f4479ed64342850edb95335da634b257f5d0592c3927187a5.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/vendors~Admin~error~internal-20f53301492fe078cd3448df0be43ae399ea97c29f4d9296601f2da9fca03134.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/vendors~Admin~section-flow-v2-editor~section-flow-v2-list-9fe2b4333fb0febbd8b3b4e11ad50850ecc584e93f182a15168c6cd8f2c11227.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/vendors~Admin~redirectLoop-43b254b029a1d47a3c8ce8a2c9b862127c40c6e6c32e3f16f639b4734c753302.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/vendors~Admin-18aaebaa6eddb97ae7b986b6d204c314d88fedaff4159a7e42c548da5d26cf50.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/Admin-28912c35040422fa4e8ad24d4db223f65b99a6e40f79189215102315538f3d0c.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/quickSearch-3be2b78b7f152eb4bcc6ce7de4a7bdbe5938883ce44b47bd5db33b14b075e5ee.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/vendors~AppBridgeAutoOpenModal~AppBridgeContextualSaveBar~AppBridgeLoading~AppBridgeModal~AppBridgeT~6647f714-758bf6b02d54f87380652aea6ceb1d8821a86412c8e22a1d7e5b781f40562240.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/vendors~AppBridgeAutoOpenModal~AppBridgeContextualSaveBar~AppBridgeLoading~AppBridgeModal~AppBridgeT~35a68717-28f310c0fbf4a77b4e2f7ed315a824b218209f6043acbb0a575873a584c3b172.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/vendors~productindex-5bea140e681fa0c7f9490a6150311793e879524346311f6170cc4c76807b3310.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/analyticsAppReportsIndex~analyticsCustomReportsIndex~archivedCampaignsIndex~automationsIndex~banking~f4d7d28f-8e805386aee80a3b5e4e18e728125bfac2bbed4c3f368ce903299a886064c502.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/AddRemoveTagsModal~customerList~orderIndex~orderListCustomizable~productindex-6ca02feb7df4bca04c41c89d672e894d69a4f1c14a6578fffb6600f449c34065.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/orderIndex~orderListCustomizable~productindex-5fc98a5f16aaddc0db711cb32ea0ecda1e79b244c5820dc1efd01743374bf320.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/customerList~productindex-821a6f6138b1b63ac7e4e45d6ed29adef3d8fb20cce4e98f57ff8c75738db2c7.css" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.shopify.com/shopifycloud/web/assets/v1/baseline/productindex-dcf3b39aaf0c48fd1315f9c843103ce5ba09698dc2b36b3209beeec7545816a0.css">

    <!-- end  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>        
        <script src="js/custome.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>                
    <div style="--top-bar-background:#0b4697; --top-bar-color:rgb(255, 255, 255); --top-bar-background-lighter:hsla(215, 71%, 47%, 1);">
        <div class="Polaris-Frame Polaris-Frame--hasNav Polaris-Frame--hasTopBar">
        <div class="Polaris-Frame__Skip"><a href="#AppFrameMainContent" class="Polaris-Frame__SkipAnchor">Skip to content</a></div>
        <div class="Polaris-Frame__TopBar" id="AppFrameTopBar">
            <div class="Polaris-TopBar">
            <button type="button" class="Polaris-TopBar__NavigationIcon" aria-label="Toggle menu">
                <span class="Polaris-Icon Polaris-Icon--colorWhite">
                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                    <path d="M19 11H1a1 1 0 1 1 0-2h18a1 1 0 1 1 0 2zm0-7H1a1 1 0 0 1 0-2h18a1 1 0 1 1 0 2zm0 14H1a1 1 0 0 1 0-2h18a1 1 0 1 1 0 2z"></path>
                </svg>
                </span>
            </button>
            <div class="Polaris-TopBar__LogoContainer"><a class="Polaris-TopBar__LogoLink" href="/"><img src="images/metiz-logo.png" alt="" class="Polaris-TopBar__Logo" style="width: 124px;"></a></div> 

            <div class="Polaris-TopBar__Contents">               
                    <span>  
                    <div style="--top-bar-background:#00848e; --top-bar-background-lighter:#1d9ba4; --top-bar-color:#f9fafb; --p-frame-offset:0px;">
                      <p class="Polaris-DisplayText Polaris-DisplayText--sizeSmall" style="color:#fff; font-size: 1.6rem;">Store Locator </p>
                    </div>                      
                       <!--  <h2 style="color:#fff;"> Store Locator </h2> -->
                    </span>
            </div>

            <div class="Polaris-TopBar__Contents">                
                <div>
                <div class="Polaris-TopBar-Menu__ActivatorWrapper">
                    <button type="button" class="Polaris-TopBar-Menu__Activator" tabindex="0" aria-controls="Polarispopover1" aria-owns="Polarispopover1" aria-expanded="false">                    
                    <span class="Polaris-TopBar-UserMenu__Details">                        
                        <p class="Polaris-TopBar-UserMenu__Detail">metizsoft@gmail.com</p>
                    </span>
                    </button>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div>
            <div class="Polaris-Frame__Navigation" id="AppFrameNav">
            <nav class="Polaris-Navigation">
                <div class="Polaris-Navigation__PrimaryNavigation Polaris-Scrollable Polaris-Scrollable--vertical" data-polaris-scrollable="true">
                <ul class="Polaris-Navigation__Section Polaris-Navigation__Section--withSeparator">
                    <li class="Polaris-Navigation__SectionHeading"><span class="Polaris-Navigation__Text">Primary menu</span></li>
                    <li class="Polaris-Navigation__ListItem">
                    <div class="Polaris-Navigation__ItemWrapper">
                        <a class="Polaris-Navigation__Item" href="/storelocator/dashboard.php">
                        <div class="Polaris-Navigation__Icon">
                            <span class="Polaris-Icon">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                <path d="M19.664 8.252l-9-8a1 1 0 0 0-1.328 0L8 1.44V1a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v5.773L.336 8.252a1.001 1.001 0 0 0 1.328 1.496L2 9.449V19a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9.449l.336.299a.997.997 0 0 0 1.411-.083 1.001 1.001 0 0 0-.083-1.413zM16 18h-2v-5a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v5H4V7.671l6-5.333 6 5.333V18zm-8 0v-4h4v4H8zM4 2h2v1.218L4 4.996V2z" fill-rule="evenodd"></path>
                            </svg>
                            </span>
                        </div>
                        <span class="Polaris-Navigation__Text">Home</span>
                        </a>
                    </div>
                    </li>
                    <li class="Polaris-Navigation__ListItem">
                    <div class="Polaris-Navigation__ItemWrapper">
                        <a class="Polaris-Navigation__Item" href="/storelocator/storelisting.php">
                        <div class="Polaris-Navigation__Icon">
                            <span class="Polaris-Icon">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                <path d="M19.492 11.897l-1.56-.88a7.8 7.8 0 0 0 0-2.035l1.56-.879a1.001 1.001 0 0 0 .37-1.38L17.815 3.26a1.001 1.001 0 0 0-1.353-.362l-1.491.841A8.078 8.078 0 0 0 13 2.586V1a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v1.586a8.053 8.053 0 0 0-1.97 1.152l-1.492-.84a1 1 0 0 0-1.352.361L.139 6.723a1.001 1.001 0 0 0 .37 1.38l1.559.88A7.829 7.829 0 0 0 2 10c0 .335.023.675.068 1.017l-1.56.88a.998.998 0 0 0-.37 1.38l2.048 3.464a.999.999 0 0 0 1.352.362l1.492-.842A7.99 7.99 0 0 0 7 17.413V19a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.587a8.014 8.014 0 0 0 1.97-1.152l1.492.842a1 1 0 0 0 1.353-.362l2.047-3.464a1.002 1.002 0 0 0-.37-1.38m-3.643-3.219c.1.448.15.893.15 1.322a6.1 6.1 0 0 1-.15 1.322 1 1 0 0 0 .484 1.09l1.287.725-1.03 1.742-1.252-.707a1 1 0 0 0-1.183.15 6.023 6.023 0 0 1-2.44 1.425 1 1 0 0 0-.715.96V18H9v-1.294a1 1 0 0 0-.714-.959 6.01 6.01 0 0 1-2.44-1.425 1.001 1.001 0 0 0-1.184-.15l-1.252.707-1.03-1.742 1.287-.726a.999.999 0 0 0 .485-1.089A6.043 6.043 0 0 1 4 10c0-.429.05-.874.152-1.322a1 1 0 0 0-.485-1.09L2.38 6.862 3.41 5.12l1.252.707a1 1 0 0 0 1.184-.149 6.012 6.012 0 0 1 2.44-1.426A1 1 0 0 0 9 3.294V2h2v1.294a1 1 0 0 0 .715.958c.905.27 1.749.762 2.44 1.426a1 1 0 0 0 1.183.15l1.253-.708 1.029 1.742-1.287.726a1 1 0 0 0-.484 1.09M9.999 6c-2.205 0-4 1.794-4 4s1.795 4 4 4c2.207 0 4-1.794 4-4s-1.793-4-4-4m0 6c-1.102 0-2-.897-2-2s.898-2 2-2c1.104 0 2 .897 2 2s-.896 2-2 2"></path>
                            </svg>
                            </span>
                        </div>
                        <span class="Polaris-Navigation__Text">Stores</span>
                        </a>
                    </div>
                    </li>
                    <li class="Polaris-Navigation__ListItem">
                        <div class="Polaris-Navigation__ItemWrapper">
                            <a class="Polaris-Navigation__Item" href="/storelocator/searchfilter.php">
                            <div class="Polaris-Navigation__Icon">
                                <span class="Polaris-Icon">
                                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                      <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                                    </svg>
                                </span>
                            </div>
                            <span class="Polaris-Navigation__Text">Search Filter</span>
                            </a>
                        </div>
                        </li>
                        <li class="Polaris-Navigation__ListItem">
                            <div class="Polaris-Navigation__ItemWrapper">
                                <a class="Polaris-Navigation__Item" href="/storelocator/extrafilter.php">
                                <div class="Polaris-Navigation__Icon">
                                    <span class="Polaris-Icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                          <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <span class="Polaris-Navigation__Text">Extra Filter</span>
                                </a>
                            </div>
                        </li>
                        <li class="Polaris-Navigation__ListItem">
                            <div class="Polaris-Navigation__ItemWrapper">
                                <a class="Polaris-Navigation__Item" href="/storelocator/settings.php">
                                <div class="Polaris-Navigation__Icon">
                                    <span class="Polaris-Icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                          <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <span class="Polaris-Navigation__Text">Settings</span>
                                </a>
                            </div>
                        </li>
                        <li class="Polaris-Navigation__ListItem">
                            <div class="Polaris-Navigation__ItemWrapper">
                                <a class="Polaris-Navigation__Item" href="/storelocator/faq.php">
                                <div class="Polaris-Navigation__Icon">
                                    <span class="Polaris-Icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                          <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <span class="Polaris-Navigation__Text">Faq</span>
                                </a>
                            </div>
                        </li>
                        <li class="Polaris-Navigation__ListItem">
                            <div class="Polaris-Navigation__ItemWrapper">
                                <a class="Polaris-Navigation__Item" href="/storelocator/plan.php">
                                <div class="Polaris-Navigation__Icon">
                                    <span class="Polaris-Icon">
                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                          <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <span class="Polaris-Navigation__Text">Plans</span>
                                </a>
                            </div>
                        </li>
                </ul>
                <ul class="Polaris-Navigation__Section Polaris-Navigation__Section--withSeparator">
                    <li class="Polaris-Navigation__SectionHeading"><span class="Polaris-Navigation__Text">More features</span></li>
                    <li class="Polaris-Navigation__ListItem">
                    <button type="button" class="Polaris-Navigation__Item">
                        <div class="Polaris-Navigation__Icon">
                        <span class="Polaris-Icon">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                            <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                            </svg>
                        </span>
                        </div>
                        <span class="Polaris-Navigation__Text">GDPR Cookie</span>
                        <div class="Polaris-Navigation__Badge">
                        <span tabindex="0" aria-describedby="TooltipContent1">
                            <span class="Polaris-Icon Polaris-Icon--colorSkyDark Polaris-Icon--isColored">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                <path fill-rule="evenodd" d="M11 11H9v-.148c0-.876.306-1.499 1-1.852.385-.195 1-.568 1-1a1.001 1.001 0 0 0-2 0H7c0-1.654 1.346-3 3-3s3 1 3 3-2 2.165-2 3zm-2 4h2v-2H9v2zm1-13a8 8 0 1 0 0 16 8 8 0 0 0 0-16z"></path>
                            </svg>
                            </span>
                        </span>
                        </div>
                    </button>
                    </li>
                    <li class="Polaris-Navigation__ListItem">
                    <button type="button" class="Polaris-Navigation__Item">
                        <div class="Polaris-Navigation__Icon">
                        <span class="Polaris-Icon">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                            <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                            </svg>
                        </span>
                        </div>
                        <span class="Polaris-Navigation__Text">Country Based Announ…</span>
                        <div class="Polaris-Navigation__Badge">
                        <span tabindex="0" aria-describedby="TooltipContent2">
                            <span class="Polaris-Icon Polaris-Icon--colorSkyDark Polaris-Icon--isColored">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                <path fill-rule="evenodd" d="M11 11H9v-.148c0-.876.306-1.499 1-1.852.385-.195 1-.568 1-1a1.001 1.001 0 0 0-2 0H7c0-1.654 1.346-3 3-3s3 1 3 3-2 2.165-2 3zm-2 4h2v-2H9v2zm1-13a8 8 0 1 0 0 16 8 8 0 0 0 0-16z"></path>
                            </svg>
                            </span>
                        </span>
                        </div>
                    </button>
                    </li>
                    <li class="Polaris-Navigation__ListItem">
                    <button type="button" class="Polaris-Navigation__Item">
                        <div class="Polaris-Navigation__Icon">
                        <span class="Polaris-Icon">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                            <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                            </svg>
                        </span>
                        </div>
                        <span class="Polaris-Navigation__Text">Age Verifier & FDA Banner</span>
                        <div class="Polaris-Navigation__Badge">
                        <span tabindex="0" aria-describedby="TooltipContent3">
                            <span class="Polaris-Icon Polaris-Icon--colorSkyDark Polaris-Icon--isColored">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                <path fill-rule="evenodd" d="M11 11H9v-.148c0-.876.306-1.499 1-1.852.385-.195 1-.568 1-1a1.001 1.001 0 0 0-2 0H7c0-1.654 1.346-3 3-3s3 1 3 3-2 2.165-2 3zm-2 4h2v-2H9v2zm1-13a8 8 0 1 0 0 16 8 8 0 0 0 0-16z"></path>
                            </svg>
                            </span>
                        </span>
                        </div>
                    </button>
                    </li>
                    <li class="Polaris-Navigation__ListItem">
                    <button type="button" class="Polaris-Navigation__Item">
                        <div class="Polaris-Navigation__Icon">
                        <span class="Polaris-Icon">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                            <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                            </svg>
                        </span>
                        </div>
                        <span class="Polaris-Navigation__Text">Easy Free Shipping Bar</span>
                        <div class="Polaris-Navigation__Badge">
                        <span tabindex="0" aria-describedby="TooltipContent4">
                            <span class="Polaris-Icon Polaris-Icon--colorSkyDark Polaris-Icon--isColored">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                <path fill-rule="evenodd" d="M11 11H9v-.148c0-.876.306-1.499 1-1.852.385-.195 1-.568 1-1a1.001 1.001 0 0 0-2 0H7c0-1.654 1.346-3 3-3s3 1 3 3-2 2.165-2 3zm-2 4h2v-2H9v2zm1-13a8 8 0 1 0 0 16 8 8 0 0 0 0-16z"></path>
                            </svg>
                            </span>
                        </span>
                        </div>
                    </button>
                    </li>
                    <li class="Polaris-Navigation__ListItem">
                        <button type="button" class="Polaris-Navigation__Item">
                            <div class="Polaris-Navigation__Icon">
                            <span class="Polaris-Icon">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                                </svg>
                            </span>
                            </div>
                            <span class="Polaris-Navigation__Text">Easy Wishlist</span>
                            <div class="Polaris-Navigation__Badge">
                            <span tabindex="0" aria-describedby="TooltipContent4">
                                <span class="Polaris-Icon Polaris-Icon--colorSkyDark Polaris-Icon--isColored">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M11 11H9v-.148c0-.876.306-1.499 1-1.852.385-.195 1-.568 1-1a1.001 1.001 0 0 0-2 0H7c0-1.654 1.346-3 3-3s3 1 3 3-2 2.165-2 3zm-2 4h2v-2H9v2zm1-13a8 8 0 1 0 0 16 8 8 0 0 0 0-16z"></path>
                                </svg>
                                </span>
                            </span>
                            </div>
                        </button>
                        </li>
                </ul>
                <ul class="Polaris-Navigation__Section Polaris-Navigation__Section--withSeparator Polaris-Navigation__Section--fill">
                    <li class="Polaris-Navigation__SectionHeading">
                    <span class="Polaris-Navigation__Text">Help center</span>
                    <button type="button" class="Polaris-Navigation__Action">
                        <span class="Polaris-Icon">
                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                            <path d="M17.928 9.628C17.836 9.399 15.611 4 9.999 4S2.162 9.399 2.07 9.628a1.017 1.017 0 0 0 0 .744C2.162 10.601 4.387 16 9.999 16s7.837-5.399 7.929-5.628a1.017 1.017 0 0 0 0-.744zM9.999 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-6A2 2 0 1 0 10 12.001 2 2 0 0 0 10 8z"></path>
                        </svg>
                        </span>
                    </button>
                    </li>
                    <li class="Polaris-Navigation__ListItem">
                    <button type="button" class="Polaris-Navigation__Item">
                        <div class="Polaris-Navigation__Icon">
                        <span class="Polaris-Icon">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 1 0-16 0 8 8 0 0 0 16 0zm-9 4h2v-4H9v4zm0-6h2V6H9v2z"></path>
                            </svg>
                        </span>
                        </div>
                        <span class="Polaris-Navigation__Text">Documents</span>
                    </button>
                    </li>
                    <li class="Polaris-Navigation__ListItem">
                    <button type="button" class="Polaris-Navigation__Item">
                        <div class="Polaris-Navigation__Icon">
                        <span class="Polaris-Icon">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                            <path d="M10 0C4.486 0 0 4.486 0 10c0 1.728.45 3.42 1.304 4.924l-1.253 3.76a1.001 1.001 0 0 0 1.265 1.264l3.76-1.253A9.947 9.947 0 0 0 10 20c5.514 0 10-4.486 10-10S15.514 0 10 0m0 18a7.973 7.973 0 0 1-4.269-1.243.996.996 0 0 0-.852-.104l-2.298.766.766-2.299a.998.998 0 0 0-.104-.851A7.973 7.973 0 0 1 2 10c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8m0-9a1 1 0 1 0 0 2 1 1 0 0 0 0-2M6 9a1 1 0 1 0 0 2 1 1 0 0 0 0-2m8 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"></path>
                            </svg>
                        </span>
                        </div>
                        <span class="Polaris-Navigation__Text">Help desk</span>
                    </button>
                    </li>
                </ul>
                </div>
            </nav>
            <button type="button" class="Polaris-Frame__NavigationDismiss" aria-hidden="true" aria-label="Close navigation" tabindex="-1">
                <span class="Polaris-Icon Polaris-Icon--colorWhite">
                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                    <path d="M11.414 10l6.293-6.293a.999.999 0 1 0-1.414-1.414L10 8.586 3.707 2.293a.999.999 0 1 0-1.414 1.414L8.586 10l-6.293 6.293a.999.999 0 1 0 1.414 1.414L10 11.414l6.293 6.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z" fill-rule="evenodd"></path>
                </svg>
                </span>
            </button>
            </div>
        </div>
        <div class="Polaris-Frame__ContextualSaveBar Polaris-Frame-CSSAnimation--startFade"></div>
        
<style type="text/css">
    .Polaris-Navigation__Item--selected_13f25 {
    font-weight: 600;
    color: var(--p-action-primary,#202e78);
    background-color: var(--p-surface-hovered,rgba(92,106,196,.12));
    position: relative;
   }


</style>
<script type="text/javascript">
    var thisPage = "<?php echo $thisPage; ?>";
    $('#div1').addClass('active');

</script>
