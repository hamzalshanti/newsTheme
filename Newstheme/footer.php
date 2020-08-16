<?php wp_footer(); ?>
    <footer class="py-3 <?php echo (is_home()) ? '' : 'footer-edit'?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md mb-3 mb-md-0 text-center text-md-right col-lg-4 order-md-2 order-lg-1 copy-right">
                <?php echo $GLOBALS['copy_right'] ?>
                </div>
            
                <div class="social-media col-12 col-lg-4 order-md-1 mb-3 mb-lg-0 order-lg-2 text-center">
                    <ul class="d-flex align-items-center justify-content-around list-unstyled p-0 m-0">
                        <?php if(isset($GLOBALS['fb_url'])) ?>
                        <li><a href="<?php echo $GLOBALS['fb_url'] ?>"><i class="fab fa-facebook-f"></i></a></li>
                        <?php if(isset($GLOBALS['twitter_url'])) ?>
                        <li><a href="<?php echo $GLOBALS['twitter_url'] ?>"><i class="fab fa-twitter"></i></a></li>
                        <?php if(isset($GLOBALS['google_plus_url'])) ?>
                        <li><a href="<?php echo $GLOBALS['google_plus_url'] ?>"><i class="fab fa-google-plus-g"></i></a></li>
                        <?php if(isset($GLOBALS['youtube_url'])) ?>
                        <li><a href="<?php echo $GLOBALS['youtube_url'] ?>"><i class="fab fa-youtube"></i></a></li>
                        <?php if(isset($GLOBALS['android_url'])) ?>
                        <li><a href="<?php echo $GLOBALS['android_url'] ?>"><i class="fab fa-android"></i></a></li>
                        <?php if(isset($GLOBALS['ios_url'])) ?>
                        <li><a href="<?php echo $GLOBALS['ios_url'] ?>"><i class="fab fa-apple"></i></a></li>
                    </ul>
                </div>

                <div class="col-12 col-md text-center text-md-left col-lg-4 order-last atyaf text-left">
                    <?php dynamic_sidebar('atyaf')?>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
