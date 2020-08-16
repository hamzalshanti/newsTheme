<?php 
get_header(); 
//Template Name: info-graphic
?>



<div class="container">

<?php
            if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<div id="breadcrumbs" class="navigator">','</div>' );
            }
        ?>

<div class="row">
        <?php 
            $images = get_field('info_graphic_gallary');
            if( $images ){
                $flag = 1;
                    foreach( $images as $image ):
        ?>
  <div class="column">
    <img src="<?php echo $image ?>" style="width:100%" onclick="openModal();currentSlide(<?php echo $flag?>)" class="hover-shadow cursor">
  </div>
        <?php
        ++$flag; 
        endforeach;
        }
        ?>
</div>

<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
  <?php 
    $images = get_field('info_graphic_gallary');
    if( $images ){
        $flag = 1;
            foreach( $images as $image ): ?>
    <div class="mySlides">
       <div class="my-slides-container">
      <div class="numbertext">4 / <?php echo $flag ?></div>
      <img src="<?php echo $image ?>">
      </div>
    </div>
    
    <?php
        ++$flag; 
        endforeach;
        }
        ?>
    
    <a class="prev" onclick="plusSlides(-1)">&#10095;</a>
    <a class="next" onclick="plusSlides(1)">&#10094;</a>

    <!-- <div class="caption-container">
      <p id="caption"></p>
    </div> -->



  </div>
</div>
</div>


<script>
    ////////////////




function openModal() {
    document.getElementById("myModal").style.display = "flex";
  }
  
  function closeModal() {
    document.getElementById("myModal").style.display = "none";
  }
  
  var slideIndex = 1;
  showSlides(slideIndex);
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "flex";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }





/////////////////
</script>

<?php get_footer(); ?>