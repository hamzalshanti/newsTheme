<?php get_header(); 
    if(have_posts()) {
        while(have_posts()) {
            the_post();
?>

<main class="mb-5">
        <div class="container">

            
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<div id="breadcrumbs" class="navigator">','</div>' );
            }
        ?>

            <div class="row">
            <!--col-->
            <div class="col-lg-8 mb-4 mb-lg-0">
            <!--single-new-->
            <div class="single-new">
                <!--single-new-info-->
                <div class="single-new-info">
                    <h2><?php the_field('special_title'); ?></h2>
                    <h1><?php echo get_the_title(); ?></h1>
                    <div class="date">
                        <span class='ml-2'><?php echo get_the_date(); ?></span>
                        <span>الساعة <?php echo get_the_time(); ?></span>
                    </div>
                </div>
                <!--single-new-info-->
                <?php 
                    $images = get_field('art_gal');
                    if( $images ){
                ?>
                <!--slider-->
                <div class="slider mb-4">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php   
                    $flag = 0;
                    foreach( $images as $image ): ?>
                    <div class="carousel-item <?php echo ($flag == 0) ? 'active' : '' ?>">
                    <img class="d-block w-100" src="<?php echo $image ?>" alt="First slide">
                    </div>
                    <?php
                    ++$flag; 
                    endforeach;
                    ?>
                </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                </div>
                <?php } ?>
                <!--slider-->       
              

                <div class="row align-items-center options mb-5">
                    <!--col-->
                    <div class="col-md mb-4 mb-md-0">
                        <div class="abb-link">
                            <span>رابط مختصر</span>
                            <input type="text" value="<?php the_permalink() ?>" onclick="this.setSelectionRange(0, this.value.length)"">
                        </div>
                    </div>
                    <!--col-->

                    <!--col-->
                    <div class="col-md-5">
                        <div class="new-soical-media-link">
                            <ul class="d-flex align-items-center justify-content-between list-unstyled p-0 m-0">
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-facebook-messenger"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fas fa-print"></i></a></li>
                                <li><a href=""><i class="fas fa-plus"></i></a></li>
                                <li><a href=""><i class="fas fa-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--col-->
                </div>
                <!--row-->
                <!--desc-->
                <div class="desc">
                
                <div class="content">
                    <?php the_content(); ?>
                </div>
        
                <div class="source-tags">
                    <div class="source">
                       المصدر / <?php the_field('art_source'); ?>
                    </div>
                    <div class="tags">
                        <ul class="d-flex  align-items-center list-unstyled p-0 m-0 flex-wrap">
                        <?php
                        $posttags = get_the_tags();
                        if ($posttags) {
                        foreach($posttags as $tag) {
                        ?>
                            <li class="mb-3"><a href="" class="py-1 px-3"># <?php echo $tag->name  ?> </a></li>
                        <?php 
                        }
                    }
                        ?>
                        </ul>
                    </div>
                </div>

                <div class="img-space">
                    <img src="assets/images/price.jpg" alt="" class="w-100 h-100">
                </div>
                
                <div class="realted-posts">
                <ul class="nav nav-pills mb-3 p-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">اخبار ذات صلة</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">المزيد من الاخبار</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <!--related-khabr-->
                        <div class="related-khabr">
                            <!--row-->
                            <div class="row">
                            <?php 
                            $post_id = get_the_ID();
                            $cats = wp_get_post_categories($post_id);
                            $realted = array(
                                'post_type' => 'post',
                                'category__in' => $cats,
                                'post__not_in' =>  array($post_id),
                                'posts_per_page' => 3,
                            );
                            $realtedObj = new WP_Query($realted);
                            if($realtedObj->have_posts()):
                            while($realtedObj->have_posts()):
                            $realtedObj->the_post(); 
                            ?>     
                                <!--col-->
                                <div class="col-4 px-2">
                                    <a href="#" class="khabr-follow">
                                        <div class="follow-img">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100 h-100 img-fluid">
                                        </div>
                                        <div class="follow-desc">
                                            <p><?php echo get_the_title(); ?></p>
                                        </div>
                                    </a>
                                </div>
                                <!--col-->
                                <?php 
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                            <!--row-->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <!--related-khabr-->
                        <div class="related-khabr">
                            <!--row-->
                            <div class="row">
                                <!--col-->
                                <div class="col-4 px-2">
                                    <a href="#" class="khabr-follow">
                                        <div class="follow-img">
                                            <img src="images/sela1.jpg" alt="" class="w-100 h-100 img-fluid">
                                        </div>
                                        <div class="follow-desc">
                                            <p>كسر لجدار الصمت رفضا لترشح بوتفليقة</p>
                                        </div>
                                    </a>
                                   </div>
                                   <!--col-->
                                   <!--col-->
                                   <div class="col-4 px-2">
                                       <a href="#" class="khabr-follow">
                                           <div class="follow-img">
                                               <img src="images/sela1.jpg" alt="" class="w-100 h-100 img-fluid">
                                           </div>
                                           <div class="follow-desc">
                                               <p>كسر لجدار الصمت رفضا لترشح بوتفليقة</p>
                                           </div>
                                        </a>
                                   </div>
                                    <!--col-->
                                    <!--col-->
                                   <div class="col-4 px-2">
                                       <a href="#" class="khabr-follow">
                                           <div class="follow-img">
                                               <img src="images/sela1.jpg" alt="" class="w-100 h-100 img-fluid">
                                           </div>
                                           <div class="follow-desc">
                                               <p>كسر لجدار الصمت رفضا لترشح بوتفليقة</p>
                                           </div>
                                        </a>
                                   </div>
                                      <!--col-->
                            </div>
                            <!--row-->
                        </div>
                        <!--releated-khabr-->
                    </div>
                    <!--tap-pane-->
                  </div>
                  <!--tap-content-->
                </div>
                <!--releated-posts-->
                <div class="facebook-comment">
                    <h4 class="mb-4 position-relative pb-3">تعليق عبر الفيسبوك</h4>

                </div>
            </div>
            <!--desc-->
            </div>
            <!--single-new-->
        </div>
        <!--col-->
        <!--col-->
        <div class="col-lg-4">
            <!--Mainnews-->
            <div class="Mainnews">
                <h4><a href="#">اهم الاخبار</a></h4>
                <div class="Mainnews-inner px-3">
                <?php 
                $imp = array(
                    'post_type' => 'post',
                    'category__in' => array( 5 ),
                    'post__not_in' =>  array($post_id),
                    'posts_per_page' => 6,
                );
                $impObj = new WP_Query($imp);
                if($impObj->have_posts()):
                while($impObj->have_posts()):
                $impObj->the_post(); 
                ?>
                <!--Mainnews-con-->
                <a href="#" class="Mainnews-con d-flex align-items-center">
                    <div class="Mainnews-img">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100 h-100">
                    </div>
                    <div class="Mainnews-desc">
                        <p>
                           <?php echo get_the_title(); ?>
                        </p>
                    </div>
                </a>
                <!--Mainnews-con-->
                <?php 
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
                </div>
            </div>
            <!--Mainnews-->
            <!--ads-->
            <div class="ads d-flex justify-content-center align-items-center">
            مساحة اعلانية
            </div>
            <!--ads-->
            <!--read-filter-->
            <div class="read-filter-widget">
                    <a href=""><h4 class="p-3">الأكثر قراءة</h4></a>
                    <ul class="nav nav-pills mb-3 p-0 d-flex align-items-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="text-center nav-link active" id="pills-days-tab" data-toggle="pill" href="#pills-days" role="tab" aria-controls="pills-days" aria-selected="true">يومي</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="text-center nav-link" id="pills-weeks-tab" data-toggle="pill" href="#pills-weeks" role="tab" aria-controls="pills-weeks" aria-selected="false">اسبوعي</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="text-center nav-link" id="pills-months-tab" data-toggle="pill" href="#pills-months" role="tab" aria-controls="pills-months" aria-selected="false">شهري</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-days" role="tabpanel" aria-labelledby="pills-days-tab">
                        <!--Mainnews-->
                        <div class="Mainnews">
                            <!--Mainnews-inner-->
                            <div class="Mainnews-inner px-3">
                                <?php dynamic_sidebar('daily_pop'); ?>
                            </div>
                            <!--Mainnews-inner-->
                        </div>
                        <!--Mainnews-->
                    </div>
                    <div class="tab-pane fade" id="pills-weeks" role="tabpanel" aria-labelledby="pills-weeks-tab">
                        <!--Mainnews-->
                        <div class="Mainnews">
                             <!--Mainnews-inner-->
                             <div class="Mainnews-inner px-3">
                                <?php dynamic_sidebar('weekly_pop'); ?>
                            </div>
                            <!--Mainnews-inner-->
                        </div>
                        <!--Mainnews-->
                    </div>
                    <div class="tab-pane fade" id="pills-months" role="tabpanel" aria-labelledby="pills-months-tab">
                        <!--Mainnews-->
                        <div class="Mainnews">
                             <!--Mainnews-inner-->
                             <div class="Mainnews-inner px-3">
                                <?php dynamic_sidebar('monthly_pop'); ?>
                            </div>
                            <!--Mainnews-inner-->
                        </div>
                        <!--Mainnews-->
                    </div>
                    <!--tab-pane-->
                  </div>
                  <!--tab-content-->
            </div>
            <!--read-filter-->
            
                 <!--infografics-->
            <div class="infografics">
                <!--tilte-info-->
                <div class="title-info"> 
                    <a href="#">
                        <h4>انفوجرافيك</h4>
                        </a>
                </div>
                <!--tilte-info-->
                <!--infoimg-->
                <div class="infoimg">
                    <a href="#"><img src="images/trump.jpg" alt=""></a>
                </div>
                <!--infoimg--> 
                <p class="text-center">المطارات والطائرات المسيرة.. حوادث متكررة وقلق متزايد</p>
                <div class="text-left agian"> 
                    <a href="" class="etc">
                        المزيد
                    <span class="rounded-circle icon" href="#">></span>
                    </a> 
                </div> 
            </div>
            <!--infografics-->

        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--container-->
</main>

<?php 
}
}
get_footer();

?>