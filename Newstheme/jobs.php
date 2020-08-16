<?php 
/*
Template Name: jobs
*/
get_header(); 
?>

<div class="container">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<div id="breadcrumbs" class="navigator">','</div>' );
                } 
            ?>
    <div class="row">
    
        
            <?php 

                $args = array (
                    'post_type' => 'job',
                    'posts_per_page' => -1
                );

                $jobs = new WP_Query( $args );

                if($jobs->have_posts()): 
                    while($jobs->have_posts()): 
                        $jobs->the_post();
            ?>
            
                <!--col-->
                <div class="col-lg-3 mb-4">
                    <div class="post h-100">
                        <a href="<?php the_permalink() ?>" class="d-block cat-img">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100 h-100">
                        </a>
                        
                        <div class="px-2 py-4">
                            <h5>
                                <a href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a>
                            </h5>
                        </div>
                        
                    </div>
                </div>
                <!--col-->
            <?php 
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
    </div>
</div>



<?php get_footer(); ?>