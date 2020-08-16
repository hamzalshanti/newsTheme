<?php wp_head(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php bloginfo('name'); wp_title();?></title>
</head>
<?php 

$GLOBALS['fb_url'] = roya_get_theme_option( 'fb_url' );
$GLOBALS['twitter_url'] = roya_get_theme_option( 'twitter_url' );
$GLOBALS['google_plus_url'] = roya_get_theme_option( 'google_plus_url' );
$GLOBALS['youtube_url'] = roya_get_theme_option( 'youtube_url' );
$GLOBALS['android_url'] = roya_get_theme_option( 'android_url' );
$GLOBALS['ios_url'] = roya_get_theme_option( 'ios_url' );
$GLOBALS['copy_right'] = roya_get_theme_option( 'copy_right' );
?>
<body class="<?php echo (is_user_logged_in()) ? 'logged-in' : '' ?><?php echo $log ?> <?php echo (is_home()) ? '' : 'gray-body'?> " >

    <div class="overlay"></div>
    <header class="mb-3">
        <!--top-header-->
        <div class="top-header p-relative">
            <!--container-->
            <div class="container d-flex align-items-center">
                <div class="share">
                    <div class="dropdown show">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-share-alt"></i>
                        </a>
                        <div  class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a href="" class="dropdown-item text-center"><i class="fab fa-facebook-f"></i></a>
                          <a href="" class="dropdown-item text-center"><i class="fab fa-twitter"></i></a>
                          <a href="" class="dropdown-item text-center"><i class="fab fa-google-plus-g"></i></a>
                          <a href="" class="dropdown-item text-center"><i class="fab fa-youtube"></i></a>
                          <a href="" class="dropdown-item text-center"><i class="fab fa-android"></i></a>
                          <a href="" class="dropdown-item text-center"><i class="fab fa-apple"></i></a>
                        </div>
                      </div>
                </div>
                <div class="logo text-center">
                    <a href="<?php echo home_url(); ?>"><h1 class="text-center font-weight-bold">نيوز24</h1></a>
                </div>
                <div class="search text-left">
                    <button><i class="fas fa-search"></i></button>
                </div>
               
            </div>
            <!--container  -->
            
            <!--search-box-->
            <div class="search-box">
                <div class="container h-100">
                    <div class="form row align-items-center h-100">
                        <div class="col">
                            <button class="text-dark" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                        
                        <div class="col-8 col-md-10">
                            <input type="text" class="search-here d-block w-100 border-0 px-2 py-4" placeholder="ابحث هنا . . . ">
                        </div>

                        <div class="col text-left">
                            <button class="hide-search text-dark"><i class="fas fa-arrow-left"></i></button>
                        </div>

                    </div>
                </div>
            </div>
            <!--search-box-->

        </div>
        <!--top-header-->

        <!--down-header-->
        <div class="down-header">
            <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark py-3 p-lg-0">
              <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
                <?php 
                  wp_nav_menu( array(
                  'theme_location'  => 'main-menu',
                  'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                  'container'       => 'div',
                  'container_class' => 'collapse navbar-collapse',
                  'container_id'    => 'navbarNavDropdown',
                  'menu_class'      => 'navbar-nav p-0 w-100 justify-content-between',
                  'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'          => new WP_Bootstrap_Navwalker(),
                  ) );
                ?>
            </nav>
            </div>
        </div>
        <!--down-header-->
    </header>
