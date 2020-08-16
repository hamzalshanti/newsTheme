<?php get_header(); ?>

<main>
        <!--hero-section-->
        <section class="hero-section">
            <div class="container">
                <div class="recent-news mb-3 py-2 border border-gray d-flex align-items-center justify-content-start">
                    <div class="recent-news-title px-3 flex-shrink-0 font-weight-bold">
                        <span>سوق مسقط</span>
                    </div>
                    <marquee  onmouseover="stop()" onmouseleave="start()">
                        <?php 
                            $marq = array(
                                'post_type' => 'post',
                                'posts_per_page' => 10,
                            );
                            $marqObj = new WP_Query($marq);
                            if($marqObj->have_posts()): 
                                while($marqObj->have_posts()): 
                                    $marqObj->the_post();
                        ?>
                        <a href="<?php the_permalink() ?>" class="ml-2"><?php echo get_the_title(); ?></a>
                        <span class="marquee-logo ml-2">نيوز24</span>
                        <?php  
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </marquee>
                </div>
                
                <?php 

                $myposts = get_posts(array(
                    'posts_per_page' => '1',
                    'meta_query' => array(
                        array(
                            'key'     => 'chk_box',
                            'value'   => '"primary"',
                            'compare' => 'LIKE'
                        )
                    )
                ));
            
                if ( $myposts ) {
                    foreach ( $myposts as $post ) : 
                        setup_postdata( $post ); ?>
            
                   
                <!--primary-new-->
                <div class="primary-new">
                    <a href="" class="hero-img mb-3 h-75 w-100">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100 h-100 img-fluid">
                    </a>
                    <div class="hero-info">
                        <h2 class="mb-3 font-weight-bold"><a href=""><?php the_field('special_title') ?></a></h2>
                        <p class="mb-3 font-weight-bold">
                            <a href="">
                                <?php echo get_the_title(); ?>
                            </a>
                        </p>
                        <div class="date">
                            <span class="d-inline-block ml-3"><?php echo get_the_date(); ?></span>
                            <span><?php echo the_category(' '); ?></span>
                        </div>
                    </div>
                </div>
                <!--primary-new-->
                <?php
                    endforeach;
                    wp_reset_postdata();
                }
                ?>

        </div>
        </section>
        <!--hero-section-->

        <section class="news mb-5">
            <!--container-->
            <div class="container">
                <!--start of row-->
                <div class="row">
                     <!--col-->
                    <div class="col-lg-8">
                        <!--akhbar-->
                        <div class="akhbar row">
                            <?php 


                            $counter = 1;
                            $args = array(
                                'post_type' => 'post',
                                'category__not_in' => array(3, 9, 10, 11, 12),
                                'posts_per_page' => -1
                            );

                            $query = new WP_Query($args);
                            if($query->have_posts()): 
                                while($query->have_posts()): 
                                    $query->the_post();
                            ?>
                            
                            <?php if($counter % 4 != 0){  ?>
                            <!--khabr-->
                            <div class="khabr p-relative col-6 col-lg-12 py-0">
                                <!--row-->
                                <div class="row">
                                    <!--col-->
                                    <div class="col-lg-6">
                                        <a href="<?php the_permalink() ?>" class="khabr-img mb-3 mb-lg-0 w-100">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100 h-100">
                                        </a>
                                    </div>
                                    <!--col-->
                                     <!--col-->
                                     <div class="col-lg-6">
                                         <!--khaber-info-->
                                        <div class="khabr-info d-flex flex-column justify-content-between p-relative h-100">
                                            <h3 class="font-weight-bold"><a href="<?php the_permalink(); ?>"><?php echo get_the_title();?></a></h3>
                                            <p class="d-none d-lg-block font-weight-bold"><?php echo get_the_excerpt() ?></p>
                                            <div class="khabr-cat">
                                            <?php echo the_category(' - '); ?>
                                            </div>
                                        </div>
                                        <!--khaber-info-->
                                    </div>
                                    <!--col-->

                                </div>
                                <!--row-->
                                <hr>
                            </div>
                            <!--khabr-->
                            
                            <?php      
                               } else{
                            ?>
                            
                            <!--khabr-->
                            <div class="khabr p-relative col-md-12">
                            
                                <a href="" class="khabr-focus-img w-100">
                                    <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" class="w-100 h-100">
                                </a>
                                    <div class="khabr-focus-info">
                                    <h3 class="font-weight-bold"><a href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a></h3>
                                    <div class="khabr-cat">
                                            <?php echo the_category(' - '); ?>
                                    </div>
                                </div>  
                                <hr>
                            </div>
                            <!--khabr-->

                            <?php
                                 }
                                 ++$counter; 
                                    endwhile;
                                    endif;
                                    wp_reset_postdata();
                                    
                                ?>
                               
                        </div>
                        <!--akhbar-->
                    </div>
                    <!--col-->
                    <!--col-->
                    <div class="col-lg-4">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'cat' => '12',
                        'posts_per_page' => 1
                    );
                    $article=new wp_query($args);
                    if($article->have_posts()){
                    while($article->have_posts()){
                     $article->the_post();
                     ?>
                        <div class="artical sidebar-widget p-0 border-0">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="card-header-right">
                                        <h3 class="font-weight-bold"><a href="<?php the_permalink(); ?>"><?php the_field('art_name') ;?></a></h3>
                                        <h4 class="mb-4 font-weight-bold"><?php the_field('position'); ?></h4>
                                    </div>
                                    <div class="card-header-left mr-auto">
                                        <img src="<?php echo get_the_post_thumbnail_url()?>" alt="" class="w-100">
                                    </div>
                                </div>
                                <div class="card-body">
                                  <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a></h5>
                                  <p class="card-text"><?php echo get_the_excerpt()?></p>
                                </div>
                              </div>
                              <!--card-->
                        </div>
                        <!--artical-->
                  <?php  }
                        }
                          wp_reset_postdata();
                          ?>

                        <div class="most-read sidebar-widget p-3">
                            <h4 class="mb-4 font-weight-bold"><a href="">الأكثر قراءة</a></h4>
                            <div class="row">
                                    <!--most-read-new-->
                                    <?php dynamic_sidebar('alltime_pop'); ?>
                                    <!--most-read-new-->
                            <?php 
                            ++$counter;

                            ?>
                        </div>
                        </div>
                        <!--most-read-->

                        <!--opinion-->
                        <div class="opinion sidebar-widget">
                            <h4 class="mb-4 font-weight-bold"><a href="<?php echo get_category_link(9); ?>">كتاب واراء</a></h4>
                            <?php
                            $args = array(
                             'post_type' => 'post',
                             'cat' => '9',
                             'posts_per_page' => -1
                             );
                            $op=new wp_query($args);
                            if($op->have_posts()){
                            while($op->have_posts()){
                            $op->the_post();?>
                            <!--person-opinion-->
                            <div class="person-opinion">
                                <a href="<?php the_permalink(); ?>" class="person-info d-flex align-items-center">
                                    <?php if( get_field('person_op_img') ): ?>
                                        <img src="<?php the_field('person_op_img'); ?>"  class="rounded-circle ml-1"/>
                                    <?php endif; ?>
                                    <h5 class="font-weight-bold"><?php the_field('person_op'); ?></h5>
                                </a>
                                <h6 class="font-weight-bold">
                                    <a href="<?php the_permalink(); ?>" class="opinion-title my-3">
                                    <?php echo get_the_title() ?>
                                    </a>
                                </h6>
                                <div class="opinion-desc font-weight-bold">
                                    <p><?php echo get_the_excerpt();?></p>
                                </div>
                                <?php if(next_post_link( __( '', 'textdomain' )) != null) {?>
                                <hr class="mx-auto w-75">
                                <?php } ?>
                            </div>
                            
                         <?php   
                         }
                            wp_reset_postdata();
                        }
                        ?>
                            <!--person-opinion-->
                    </div>
                    <!--opinion-->
                    
                    <!--ceremony-->
                    <div class="ceremony sidebar-widget">
                        <h4 class="mb-4 font-weight-bold"><a href="<?php echo get_category_link(10); ?>">مراسم سلطانية</a></h4>
                        <?php
                        $args = array(
                             'post_type' => 'post',
                             'cat' => '10',
                             'posts_per_page' => -1
                             );
                            $ceremony = new wp_query($args);
                            if($ceremony->have_posts()){
                            while($ceremony->have_posts()){
                            $ceremony->the_post();?>
                            <!--ceremony-con-->
                            <a href="<?php the_permalink(); ?>" class="ceremony-con d-flex align-items-center">
                                <div class="ceremony-img">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" class="w-100 h-100">
                                </div>
                                <div class="ceremony-desc">
                                    <p><?php echo the_title();?> </p>
                                </div>
                            </a>
                    <?php     
                     }
                            wp_reset_postdata();
                        }
                        ?>
                        <!--ceremony-con-->
                    </div>
                    <!--ceremony-->
                   
                    <!--country-->
                    <div class="country sidebar-widget">
                        <h4 class="mb-4 font-weight-bold"><a href="<?php echo get_category_link(11); ?>">الدولة والشورى</a></h4>
                        <div class="row">
                        <?php 
                        $args = array(
                            'post_type' => 'post' ,
                            'posts_per_page' => -1,
                            'cat'         => '11',
                        ); 
                        $cou = new WP_Query($args);
                        if($cou->have_posts()){
                        while($cou->have_posts()){
                            $cou->the_post();?>
                        <!--most-read-new-->
                        <div class="most-read-new col-6 col-lg-12">
                            <a href="<?php the_permalink() ?>" class="most-read-new-img">
                                <img src="<?php  echo get_the_post_thumbnail_url();?>" alt="" class="w-100 h-100 img-fluid">
                            </a>
                            <h5><a href="<?php the_permalink() ?>"><?php echo the_title();?></a></h5>
                        </div>
              <?php         
                }
                wp_reset_postdata();
                }
                    ?>
                        <!--most-read-new-->
                    </div>
                    </div>
                    <!--country-->

                    <!--jobs-->
                    <div class="jobs sidebar-widget">
                        <h4 class="mb-4 font-weight-bold"><a href="http://localhost:88/news/%d9%88%d8%b8%d8%a7%d8%a6%d9%81/">وظائف</a></h4>
                        <?php
                        $args = array(
                        'post_type' => 'job',
                        'posts_per_page' => -1
                        );
                        $job = new wp_query($args);
                        if($job->have_posts()){
                        while($job->have_posts()){
                        $job->the_post();?>

                        <!--job-details-->
                        <a href="<?php the_permalink() ?>" class="job-details d-flex">
                        <div class="job-icon d-flex justify-content-center align-items-center rounded-circle">
                            <i class="far fa-file-alt"></i>
                        </div>
                        <div class="job-desc">
                        <p> <?php echo get_the_title() ?> </p>
                        </div>
                        </a>
                        <?php  }
                        }
                        wp_reset_postdata();
                        ?>
                        <!--job-details-->

                    </div>
                    <!--jobs-->

                    <!--radio-->
                    <div class="radio sidebar-widget p-0 border-0">
                        <!--card-->
                        <div class="card">
                            <div class="card-header">
                              <h4 class="m-0">اذاعة الرؤية</h4>
                            </div>
                            <ul class="list-group list-group-flush p-0">

                              <li class="list-group-item">
                                <a href="#" class="d-flex align-items-center">
                                    <div class="radio-icon ml-4 d-flex justify-content-center align-items-center rounded-circle">
                                        <i class="fas fa-play"></i>
                                    </div>
                                    <div class="radio-desc">
                                        اقتصاد وعلوم وسياسة
                                    </div>
                                </a>
                              </li>
                              
                              <li class="list-group-item">
                                <a href="#" class="d-flex align-items-center">
                                    <div class="radio-icon ml-4 d-flex justify-content-center align-items-center rounded-circle">
                                        <i class="fas fa-play"></i>
                                    </div>
                                    <div class="radio-desc">
                                        اقتصاد وعلوم وسياسة
                                    </div>
                                </a>
                              </li>

                              <li class="list-group-item">
                                <a href="#" class="d-flex align-items-center">
                                    <div class="radio-icon ml-4 d-flex justify-content-center align-items-center rounded-circle">
                                        <i class="fas fa-play"></i>
                                    </div>
                                    <div class="radio-desc">
                                        اقتصاد وعلوم وسياسة
                                    </div>
                                </a>
                              </li>


                            </ul>
                          </div>
                        <!--card-->
                    </div>
                    <!--radio-->

                </div>
                    <!--col-->
                </div>
                <!--end of row-->
        </div>
        <!--container-->
        </section>

    </main>


    <div class="journal container mb-4 px-4 py-2">
        <h3 class="py-4">جريدة الرؤية العمانية</h3> 
        <!--row--> 
        <div class="row justify-content-center">

            <?php 

                $args = array(
                    'post_type' => 'journal',
                    'posts_per_page' => -1
                );
                $journal = new WP_Query($args);
                
                if($journal->have_posts()){
                    while($journal->have_posts()){ 
                        $journal->the_post();

            ?>
            <!--col-->
            <div class="col-6 col-md-4 col-lg mb-4 text-center">
                <div class="d-inline-block">
                <div class="journal-version position-relative mb-4">
                   <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" class="w-100"> 
                    <?php 

                        // load selected file (from post)
                        $file = get_field('journal_file');
                        //var_dump($file); 
                        if( $file ){
                        ?>

                    <div class="options w-100 h-100 justify-content-center align-items-center flex-column d-none">
                        <a href="<?php echo $file['url']; ?>" class="read">قراءة</a>
                        <a href="<?php echo $file['url']; ?>" class="download" download>تنزيل</a>
                    </div>
                    <?php } ?>
                </div>
                <div class="version-num font-weight-bold">
                    <p class="text-center"><?php echo get_the_title(); ?></p>
                </div>
                </div>
            </div>
            <!--col-->
                    
            <?php 
                    }
                }
                wp_reset_postdata();
            ?>
          
        </div>
        <!--row-->
    </div>
<?php get_footer(); ?>