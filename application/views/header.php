<?php

$shop_owner = $this->session->userdata('shop_owner');
$shop_email = $this->session->userdata('shop_email');
$short_name = createAcronym($shop_owner, false);
function createAcronym($string) {
    $output = null;
    $token  = strtok($string, ' ');
    while ($token !== false) {
        $output .= $token[0];
        $token = strtok(' ');
    }
    return $output;
}

$backtoshopify = 'https://'.$this->session->userdata('shop'). '/admin/apps';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charSet="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title><?=isset($title) ? $title : 'Easy Wishlist'; ?></title>
        <!--  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,600;1,300&display=swap" rel="stylesheet"> -->
        <link rel="icon" href="<?=base_url();?>assets/images/Wishlist.png" type="image/gif" sizes="16x16">
        <link href="<?=base_url();?>assets/newdesign/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?=base_url();?>assets/newdesign/css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?=base_url();?>assets/newdesign/js/custom.js"></script>
    </head>
    <body>   

 <style type="text/css">
        .loader{
            background: url('<?=base_url();?>assets/images/loader1.gif');
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            position: fixed;
            z-index: 999;
            display: none;
            background-position: center;
            background-color: #ffffffa6;
            background-repeat: no-repeat;
        }
        .loader1{
            background: url('<?=base_url();?>assets/images/loader1.gif');
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            position: fixed;
            z-index: 999;
            display: none;
            background-position: center;
            background-color: #ffffffa6;
            background-repeat: no-repeat;
        }
        .Polaris-Navigation__Item:hover 
        .Polaris-Navigation__Icon svg .c {
            fill: #5c6ac4;
        }
        .Polaris-Navigation__Item:hover 
        .Polaris-Navigation__Icon svg .cu {
            stroke: #5c6ac4;
        }
        </style>

        <!-- Html Start -->
        <div style="--top-bar-background:#0b4697; --top-bar-color:rgb(255, 255, 255); --top-bar-background-lighter:hsla(215, 71%, 47%, 1);">
            <div class="Polaris-Frame Polaris-Frame--hasNav Polaris-Frame--hasTopBar">
                <!-- Topbar  -->
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
                        <div class="Polaris-TopBar__LogoContainer">
                            <a class="Polaris-TopBar__LogoLink" href="/"><img src="<?=base_url();?>assets/newdesign/images/metiz-logo.png" alt="" class="Polaris-TopBar__Logo" style="width: 180px;" /></a>
                        </div>
                        <div class="Polaris-TopBar__Contents">
                            <div class="Polaris-TopBar__SearchField">                                            
                               <p class="Polaris-DisplayText Polaris-DisplayText--sizeSmall" style="color:#fff; font-weight:600;  text-transform: uppercase;">Easy Wishlist </p>
                            </div>
                            <div class="Polaris-TopBar__SecondaryMenu">
                                
                            </div>
                            <div>
                                <div class="Polaris-TopBar-Menu__ActivatorWrapper logout_menu">
                                    <div style="position: relative;">
                                        <button type="button" class="Polaris-TopBar-Menu__Activator Polarispopover1" tabindex="0" aria-controls="Polarispopover1" aria-owns="Polarispopover1" aria-expanded="false">
                                            <div class="Polaris-MessageIndicator__MessageIndicatorWrapper">
                                                <span aria-label="Avatar with initials M B" role="img" class="Polaris-Avatar Polaris-Avatar--sizeSmall Polaris-Avatar--styleSix">
                                                    <span class="Polaris-Avatar__Initials">
                                                        <svg class="Polaris-Avatar__Svg" viewBox="0 0 40 40">
                                                            <text x="50%" y="50%" dy="0.35em" fill="currentColor" font-size="20" text-anchor="middle"><?=$short_name?></text>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </div>
                                            <span class="Polaris-TopBar-UserMenu__Details">
                                                <p class="Polaris-TopBar-UserMenu__Name owner_name"><?=$shop_owner?></p>  
                                                <p class="Polaris-TopBar-UserMenu__Detail"><?=$shop_email?></p>
                                            </span>
                                        </button>
                                        <div class="Polaris-PositionedOverlay Polaris-Popover__PopoverOverlay Polaris-Popover__PopoverOverlay--open" style="top: 50px;right: 0px;z-index: 513;">
                                          <div class="Polaris-Popover" data-polaris-overlay="true">
                                            <div class="Polaris-Popover__FocusTracker" tabindex="0"></div>
                                            <div class="Polaris-Popover__Wrapper">
                                              <div id="Polarispopover1" tabindex="-1" class="Polaris-Popover__Content" style="height: 60px;width: 160px; display: none;" >
                                                <div class="Polaris-Popover__Pane_yisof Polaris-Scrollable Polaris-Scrollable--vertical" data-polaris-scrollable="true">
                                                    <ul class="Polaris-ActionList">
                                                        <li class="Polaris-ActionList__Section">
                                                            <div class="Polaris-ActionList__Section--withoutTitle">
                                                                <ul class="Polaris-ActionList__Actions">          
                                                                <li>
                                                                    <a type="button" class="Polaris-ActionList__Item" href="<?=base_url('login/logout')?>"><div class="Polaris-ActionList__Content">
                                                                        <div class="Polaris-ActionList__Prefix add_ActionList__Prefix">
                                                                        <span class="Polaris-Icon">
                                                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">   <path d="M10 19a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM9.293 8.707a1 1 0 0 1 1.414-1.414l3 3a1 1 0 0 1 0 1.414l-3 3a1 1 0 0 1-1.414-1.414L10.586 12H7a1 1 0 1 1 0-2h3.586L9.293 8.707z">
                                                                                    
                                                                                </path>
                                                                            </svg>
                                                                        </span>
                                                                        </div>
                                                                        <div class="Polaris-ActionList__Text">Log out</div></div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>                              
                                                </ul></div></div>
                                            </div>
                                            <div class="Polaris-Popover__FocusTracker" tabindex="0"></div>
                                          </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loader"></div>
                <!-- SideBar -->
                <div class="Polaris-Frame__Navigation" id="AppFrameNav">
                    <nav class="Polaris-Navigation">
                        <div class="Polaris-Navigation__PrimaryNavigation Polaris-Scrollable Polaris-Scrollable--vertical" data-polaris-scrollable="true">
                            <ul class="Polaris-Navigation__Section">
                                <li class="Polaris-Navigation__ListItem">
                                    <div class="Polaris-Navigation__ItemWrapper">
                                        <a class="Polaris-Navigation__Item" tabindex="0" href="<?=$backtoshopify;?>" data-polaris-unstyled="true">
                                            <div class="Polaris-Navigation__Icon">
                                                <span class="Polaris-Icon">
                                                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M19 9H3.661l5.997-5.246a1 1 0 00-1.316-1.506l-8 7c-.008.007-.011.018-.019.025a.975.975 0 00-.177.24c-.018.03-.045.054-.059.087a.975.975 0 000 .802c.014.033.041.057.059.088.05.087.104.17.177.239.008.007.011.018.019.025l8 7a.996.996 0 001.411-.095 1 1 0 00-.095-1.411L3.661 11H19a1 1 0 000-2z" /></svg>
                                                </span>
                                            </div>
                                            <span class="Polaris-Navigation__Text">Back to Shopify</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="Polaris-Navigation__Section Polaris-Navigation__Section--withSeparator">
                                <li class="Polaris-Navigation__SectionHeading">
                                    <span class="Polaris-Navigation__Text">Primary menu</span>
                                </li>
                                <li class="Polaris-Navigation__ListItem">
                                    <div class="Polaris-Navigation__ItemWrapper">
                                        <a class="Polaris-Navigation__Item" tabindex="0" id="dashboard" href="<?php echo base_url('/homepage'); ?>" data-polaris-unstyled="true">
                                            <div class="Polaris-Navigation__Icon">
                                                <span class="Polaris-Icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path class="g" d="M19.664 8.252l-9-8a1 1 0 0 0-1.328 0L8 1.44V1a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v5.773L.336 8.252a1.001 1.001 0 0 0 1.328 1.496L2 9.449V19a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9.449l.336.299a.997.997 0 0 0 1.411-.083 1.001 1.001 0 0 0-.083-1.413zM16 18h-2v-5a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v5H4V7.671l6-5.333 6 5.333V18zm-8 0v-4h4v4H8zM4 2h2v1.218L4 4.996V2z" fill-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <span class="Polaris-Navigation__Text">Home</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="Polaris-Navigation__ListItem">
                                    <div class="Polaris-Navigation__ItemWrapper">
                                        <a class="Polaris-Navigation__Item" tabindex="0" id="wishlist_page" href="<?=base_url('homepage/wishlistpage')?>" data-polaris-unstyled="true">
                                            <div class="Polaris-Navigation__Icon">
                                                <span class="Polaris-Icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" focusable="false" width="19.233" height="19.233" viewBox="0 0 19.233 19.233"><defs><style>.a{fill:none;}.b,.c{stroke:none;}.c{fill:#919eab;}</style></defs><g class="a" transform="translate(-1 -1)"><path class="b" d="M6.342,1A5.342,5.342,0,0,0,1,6.342v.479c0,5.7,3.157,10.308,9.187,13.31a.964.964,0,0,0,.859,0c6.031-3,9.187-7.61,9.187-13.31V6.342a5.342,5.342,0,0,0-9.616-3.205A5.334,5.334,0,0,0,6.342,1Z"/><path class="c" d="M 14.89115238189697 2.999677658081055 C 13.84433269500732 2.999677658081055 12.84442234039307 3.499607086181641 12.21638298034668 4.336996078491211 L 10.6150426864624 6.47211742401123 L 9.015422821044922 4.33570671081543 C 8.389995574951172 3.500419616699219 7.394075393676758 3.001308441162109 6.350366592407227 3.000019073486328 L 6.349372863769531 3.000026702880859 L 6.342432975769043 3.000026702880859 C 4.499412536621094 3.000026702880859 3.000001907348633 4.49943733215332 3.000001907348633 6.342456817626953 L 3.000001907348633 6.821137428283691 C 3.000001907348633 9.249156951904297 3.665952682495117 11.44688701629639 4.979343414306641 13.35325717926025 C 6.257990837097168 15.20919227600098 8.152993202209473 16.80591583251953 10.61642360687256 18.10431289672852 C 13.08019733428955 16.80593872070312 14.97522735595703 15.20928001403809 16.2537727355957 13.35331726074219 C 17.56693267822266 11.44712734222412 18.23276329040527 9.249377250671387 18.23276329040527 6.821137428283691 L 18.23276329040527 6.342456817626953 C 18.23276329040527 4.901507377624512 17.31430244445801 3.627216339111328 15.94730281829834 3.171546936035156 C 15.60516262054443 3.057506561279297 15.24982261657715 2.999677658081055 14.89115238189697 2.999677658081055 M 14.89115238189697 0.9996776580810547 C 15.45460510253906 0.9996776580810547 16.02438163757324 1.089054107666016 16.57975196838379 1.274177551269531 C 18.76129341125488 2.00135612487793 20.23276329040527 4.04290771484375 20.23276329040527 6.342456817626953 L 20.23276329040527 6.821137428283691 C 20.23276329040527 12.52151679992676 17.07645225524902 17.12882614135742 11.04591274261475 20.13127708435059 C 10.91065216064453 20.19861602783203 10.76351737976074 20.23228645324707 10.61638259887695 20.23228645324707 C 10.46924781799316 20.23228645324707 10.32211303710938 20.19861602783203 10.18685245513916 20.13127708435059 C 4.157382965087891 17.12883758544922 1.000001907348633 12.52151679992676 1.000001907348633 6.821137428283691 L 1.000001907348633 6.342456817626953 C 1.000001907348633 3.391916275024414 3.39189338684082 1.000026702880859 6.342432975769043 1.000026702880859 L 6.342432975769043 1.000017166137695 C 6.343870162963867 1.000015258789062 6.345256805419922 1.000015258789062 6.346693992614746 1.000015258789062 C 8.026979446411133 1.000030517578125 9.609193801879883 1.791828155517578 10.61638259887695 3.136997222900391 C 11.64486408233643 1.765687942504883 13.24131965637207 0.9996776580810547 14.89115238189697 0.9996776580810547 Z" ></g></svg>
                                                </span>
                                            </div>
                                            <span class="Polaris-Navigation__Text">Wishlist Page</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="Polaris-Navigation__ListItem">
                                    <div class="Polaris-Navigation__ItemWrapper">
                                        <a class="Polaris-Navigation__Item" tabindex="0" id="wishlist_icons" href="<?php echo base_url('homepage/wishlisticon'); ?>" data-polaris-unstyled="true">
                                            <div class="Polaris-Navigation__Icon">
                                                <span class="Polaris-Icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" focusable="false" class="svg" width="19.233" height="19.233" viewBox="0 0 19.233 19.233"><defs><style>.a{fill:none;}.b,.c{stroke:none;}.c{fill:#919eab;}</style></defs><g class="a" transform="translate(-1 -1)"><path class="b" d="M6.342,1A5.342,5.342,0,0,0,1,6.342v.479c0,5.7,3.157,10.308,9.187,13.31a.964.964,0,0,0,.859,0c6.031-3,9.187-7.61,9.187-13.31V6.342a5.342,5.342,0,0,0-9.616-3.205A5.334,5.334,0,0,0,6.342,1Z" /><path class="c" d="M 14.89115238189697 2.999677658081055 C 13.84433269500732 2.999677658081055 12.84442234039307 3.499607086181641 12.21638298034668 4.336996078491211 L 10.6150426864624 6.47211742401123 L 9.015422821044922 4.33570671081543 C 8.389995574951172 3.500419616699219 7.394075393676758 3.001308441162109 6.350366592407227 3.000019073486328 L 6.349372863769531 3.000026702880859 L 6.342432975769043 3.000026702880859 C 4.499412536621094 3.000026702880859 3.000001907348633 4.49943733215332 3.000001907348633 6.342456817626953 L 3.000001907348633 6.821137428283691 C 3.000001907348633 9.249156951904297 3.665952682495117 11.44688701629639 4.979343414306641 13.35325717926025 C 6.257990837097168 15.20919227600098 8.152993202209473 16.80591583251953 10.61642360687256 18.10431289672852 C 13.08019733428955 16.80593872070312 14.97522735595703 15.20928001403809 16.2537727355957 13.35331726074219 C 17.56693267822266 11.44712734222412 18.23276329040527 9.249377250671387 18.23276329040527 6.821137428283691 L 18.23276329040527 6.342456817626953 C 18.23276329040527 4.901507377624512 17.31430244445801 3.627216339111328 15.94730281829834 3.171546936035156 C 15.60516262054443 3.057506561279297 15.24982261657715 2.999677658081055 14.89115238189697 2.999677658081055 M 14.89115238189697 0.9996776580810547 C 15.45460510253906 0.9996776580810547 16.02438163757324 1.089054107666016 16.57975196838379 1.274177551269531 C 18.76129341125488 2.00135612487793 20.23276329040527 4.04290771484375 20.23276329040527 6.342456817626953 L 20.23276329040527 6.821137428283691 C 20.23276329040527 12.52151679992676 17.07645225524902 17.12882614135742 11.04591274261475 20.13127708435059 C 10.91065216064453 20.19861602783203 10.76351737976074 20.23228645324707 10.61638259887695 20.23228645324707 C 10.46924781799316 20.23228645324707 10.32211303710938 20.19861602783203 10.18685245513916 20.13127708435059 C 4.157382965087891 17.12883758544922 1.000001907348633 12.52151679992676 1.000001907348633 6.821137428283691 L 1.000001907348633 6.342456817626953 C 1.000001907348633 3.391916275024414 3.39189338684082 1.000026702880859 6.342432975769043 1.000026702880859 L 6.342432975769043 1.000017166137695 C 6.343870162963867 1.000015258789062 6.345256805419922 1.000015258789062 6.346693992614746 1.000015258789062 C 8.026979446411133 1.000030517578125 9.609193801879883 1.791828155517578 10.61638259887695 3.136997222900391 C 11.64486408233643 1.765687942504883 13.24131965637207 0.9996776580810547 14.89115238189697 0.9996776580810547 Z" ></g></svg>
                                                </span>
                                            </div>
                                            <span class="Polaris-Navigation__Text">Wishlist Icon</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="Polaris-Navigation__ListItem">
                                    <div class="Polaris-Navigation__ItemWrapper">
                                        <a class="Polaris-Navigation__Item" tabindex="0" id="customers" href="<?php echo base_url('customers'); ?>" data-polaris-unstyled="true">
                                            <div class="Polaris-Navigation__Icon">
                                                <span class="Polaris-Icon">
                                                    <svg  class="Polaris-Icon__Svg" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20.002" height="21.815" viewBox="0 0 20.002 21.815"><defs><style>.a{fill:none;stroke:#919eab;stroke-width:2px;}.cu</style></defs><path class="a cu"d="M15.61,5.645A4.645,4.645,0,1,1,10.964,1,4.645,4.645,0,0,1,15.61,5.645ZM2.738,15.827a13.829,13.829,0,0,1,8.228-3.141,13.839,13.839,0,0,1,8.228,3.141,2.041,2.041,0,0,1,.624,2.263l-.367,1.123a2.323,2.323,0,0,1-2.208,1.6H4.687a2.323,2.323,0,0,1-2.207-1.6L2.113,18.09a2.035,2.035,0,0,1,.624-2.263Z" transform="translate(-0.963)" fill-rule="evenodd"></svg>
                                                </span>
                                            </div>
                                            <span class="Polaris-Navigation__Text">Customers</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>

                            <ul class="Polaris-Navigation__Section Polaris-Navigation__Section--withSeparator">
                                <li class="Polaris-Navigation__SectionHeading">
                                    <span class="Polaris-Navigation__Text">MORE FEATURES</span>
                                </li>

                                <li class="Polaris-Navigation__ListItem">                
                                    <a type="button" class="Polaris-Navigation__Item" id="other_apps" href="<?=base_url('homepage/other_apps')?>">
                                        <div class="Polaris-Navigation__Icon">
                                        <span class="Polaris-Icon">
                                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                            <path d="M8 11H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7H2v-5h5v5zM8 0H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM7 7H2V2h5v5zm12 4h-7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1zm-1 7h-5v-5h5v5zM12 6h2v2a1 1 0 1 0 2 0V6h2a1 1 0 1 0 0-2h-2V2a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2z"></path>
                                            </svg>
                                        </span>
                                        </div>
                                        <span class="Polaris-Navigation__Text">Our Other Apps</span>
                                        <div class="Polaris-Navigation__Badge">
                                        <span tabindex="0" aria-describedby="TooltipContent1">
                                            <span class="Polaris-Icon Polaris-Icon--colorSkyDark Polaris-Icon--isColored">
                                            
                                            </span>
                                        </span>
                                        </div>
                                    </a>
                                    
                                    </li>
                            </ul>

                            <ul class="Polaris-Navigation__Section Polaris-Navigation__Section--withSeparator">
                               
                                <li class="Polaris-Navigation__SectionHeading">
                                    <span class="Polaris-Navigation__Text">HELPDESK</span>
                                </li>
                                <li class="Polaris-Navigation__ListItem">
                                    <div class="Polaris-Navigation__ItemWrapper">
                                        <a class="Polaris-Navigation__Item" tabindex="0" id="Installation" href="<?php echo base_url('/installation'); ?>" data-polaris-unstyled="true">
                                            <div class="Polaris-Navigation__Icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 20 20" version="1.1">
                                                <defs>
                                                <clipPath id="clip1">
                                                    <path d="M 18.75 2.5 L 15 2.5 C 14.308594 2.5 13.75 3.058594 13.75 3.75 C 13.75 4.441406 14.308594 5 15 5 L 17.5 5 L 17.5 17.5 L 2.5 17.5 L 2.5 2.5 L 6.984375 2.5 L 8.75 4.265625 L 8.75 10.734375 L 7.132812 9.117188 C 6.644531 8.628906 5.855469 8.628906 5.367188 9.117188 C 4.878906 9.605469 4.878906 10.394531 5.367188 10.882812 L 9.117188 14.632812 C 9.351562 14.867188 9.667969 15 10 15 C 10.332031 15 10.648438 14.867188 10.882812 14.632812 L 14.632812 10.882812 C 15.121094 10.394531 15.121094 9.605469 14.632812 9.117188 C 14.144531 8.628906 13.355469 8.628906 12.867188 9.117188 L 11.25 10.734375 L 11.25 3.75 C 11.25 3.417969 11.117188 3.101562 10.882812 2.867188 L 8.382812 0.367188 C 8.148438 0.132812 7.832031 0 7.5 0 L 1.25 0 C 0.558594 0 0 0.558594 0 1.25 L 0 18.75 C 0 19.441406 0.558594 20 1.25 20 L 18.75 20 C 19.441406 20 20 19.441406 20 18.75 L 20 3.75 C 20 3.058594 19.441406 2.5 18.75 2.5 "></path>
                                                </clipPath>
                                                </defs>
                                                <g id="surface1">
                                                <g clip-path="url(#clip1)" clip-rule="evenodd">
                                                <rect x="0" y="0" width="20" height="20"></rect>
                                                </g>
                                                </g>
                                                </svg>
                                            </div>
                                            <span class="Polaris-Navigation__Text">Installation</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="Polaris-Navigation__ListItem">
                                    <div class="Polaris-Navigation__ItemWrapper">
                                        <a class="Polaris-Navigation__Item" tabindex="0" href="https://www.metizapps.com/wishlist/tutorial/" target="_blank"   data-polaris-unstyled="true">
                                            <div class="Polaris-Navigation__Icon">
                                                <span class="Polaris-Icon">
                                                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 20c5.514 0 10-4.486 10-10S15.514 0 10 0 0 4.486 0 10s4.486 10 10 10zm1-6a1 1 0 11-2 0v-4a1 1 0 112 0v4zm-1-9a1 1 0 100 2 1 1 0 000-2z"/></svg>
                                                </span>
                                            </div>
                                            <span class="Polaris-Navigation__Text">App Tutorial</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="Polaris-Navigation__ListItem">
                                    <div class="Polaris-Navigation__ItemWrapper">
                                        <a class="Polaris-Navigation__Item" tabindex="0" href="mailto:support@metizsoft.zohodesk.com" data-polaris-unstyled="true">
                                            <div class="Polaris-Navigation__Icon">
                                                <span class="Polaris-Icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0C4.486 0 0 4.486 0 10c0 1.728.45 3.42 1.304 4.924l-1.253 3.76a1.001 1.001 0 0 0 1.265 1.264l3.76-1.253A9.947 9.947 0 0 0 10 20c5.514 0 10-4.486 10-10S15.514 0 10 0m0 18a7.973 7.973 0 0 1-4.269-1.243.996.996 0 0 0-.852-.104l-2.298.766.766-2.299a.998.998 0 0 0-.104-.851A7.973 7.973 0 0 1 2 10c0-4.411 3.589-8 8-8s8 3.589 8 8-3.589 8-8 8m0-9a1 1 0 1 0 0 2 1 1 0 0 0 0-2M6 9a1 1 0 1 0 0 2 1 1 0 0 0 0-2m8 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"></path></svg>
                                                </span>
                                            </div>
                                            <span class="Polaris-Navigation__Text">Helpdesk</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <?php
                if($thisPage){
                    $thisPage = $thisPage;
                }else{
                    $thisPage = '';
                }
                ?>
<!-- <script type="text/javascript"> var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode:"2d0b4e35bccf76e53a7e1e5bb3c5f7aded397d69e5b485c5b742f04e9b07b102d295ffa75655e0ff8c85a92fa1179cca", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>"); </script> -->

<script type="text/javascript"> 

    var thisPage = "<?=$thisPage?>";
    if(thisPage){
        $('#' + thisPage).addClass('active');
        if (thisPage == 'dashboard') {       
            $('#' + thisPage + ' .Polaris-Navigation__Icon .g').css('fill','#202e78');
        } else if (thisPage == 'wishlist_page') { 
            $('#' + thisPage + ' .Polaris-Navigation__Icon .c').css('fill','#202e78');
        } else if (thisPage == 'wishlist_icons') {
            $('#' + thisPage + ' .Polaris-Navigation__Icon .c').css('fill','#202e78');
        } else if (thisPage == 'customers'){  
            $('#' + thisPage + ' .Polaris-Navigation__Icon .cu').css('stroke','#202e78');
        }
    }

    $( document ).ready(function() {

        $(".Polarispopover1").click(function(){
            $("#Polarispopover1").toggle();
        });

    });


    $('.logout_menu').click(function(event){
         event.stopPropagation(); 
    });

    $('body').click(function(){
        $("#Polarispopover1").hide();
    })

    
    
</script>               