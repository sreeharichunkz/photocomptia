<div id="Event" class="tabcontent">


     <div class="col-12 section__header-wrap">
         <h2 class="title_section title_h1 title_horizontal-line"><span class="reveal reveal_gray">My Entries</span></h2>
      </div>
    </br>



   <?   $slmo = $pdo->query("SELECT * FROM photoreg WHERE personid=".$_SESSION['personid']);

      $row = $slmo->fetch(PDO::FETCH_ASSOC);
      if($row==true){?>
        <section class="section section-onescreen section-oneCarousel">
          <div class="container-flex">
              <div class="photo-carousel swiper-container">

                    <!-- Item -->
<div class="swiper-wrapper">

        <?$p=1;
          while ( $row = $slmo->fetch(PDO::FETCH_ASSOC) ) {?>
<div class="swiper-slide photo-carousel__item">

              <a href="#">
              <div class="item__block-description" data-swiper-parallax="-100">
                  <h2 class="title title__h3"><? echo $p ?></h2>
                  </div>
                  <div class="item__block-image" style="background-image: url(<?echo 'contest/'.$row['photolink'] ?>);"></div>
          </a></div>
<!-- Full-width images with number text -->



<?$p=$p+1; }?></div>
<div class="swiper-control">
 <div class="swiper-pagination"></div>
         <div class="swiper-button-next">NEXT</div>
         <div class="swiper-button-prev">PREV</div>

</div></div>
</div></section>
<div id="wave"></div>
<?
} else{
   ?>

      <h6>You have not taken part in any contest.</h6>
<?}?>
  </div>
