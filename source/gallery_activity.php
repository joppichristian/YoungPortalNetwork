
<style>
a:hover{
  text-decoration: none;
}
.carousel {
	margin-bottom: 0;
	padding: 0 40px 30px 40px;
}

.carousel-control {
	left: -12px;
  background-color: rgba(50, 72, 31, 0.6);
}
.carousel-control.right {
	right: -12px;
}

.carousel-indicators {
	right: 50%;
	top: auto;
	bottom: 0px;
	margin-right: -19px;
}

.carousel-indicators li {
	background-color: rgba(50, 72, 31, 0.6);
}

.carousel-indicators .active {
background-color: rgb(50, 72, 31);
}
</style>
<div id="myCarousel" class="carousel slide">
  <?php
  $qry_a="SELECT * FROM MEDIA_ATTIVITA WHERE ATTIVITA_ID = '$id_attivita' AND TIPO='FOTO' ;";
  $result_a = $mysqli->query($qry_a);
  $indice = 0;
   $foto_trovate = 0;

  ?>
   <ol class="carousel-indicators">
     <?php while($row_a = $result_a->fetch_array())
     {
	    $foto_trovate = 1;
       if($indice == 0) { ?>
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
     <?php
   } else {
     ?>
     <li data-target="#myCarousel" data-slide-to="<?php echo $indice;?>"></li>
     <?php
     }
     $indice = $indice +1;
   }
    if($foto_trovate==0)
   {
	   ?>
	    <li data-target="#myCarousel" data-slide-to="0"></li>

		<?php
   }
     ?>

   </ol>

   <!-- Carousel items -->
   <div class="carousel-inner">

     <?php
     $indice = 0;
     $foto_trovate = 0;
     $result_a = $mysqli->query($qry_a);
     while($row_a = $result_a->fetch_array())
     {
	   $foto_trovate = 1;
       if($indice == 0) { ?>
         <div class="item active">
           <img src="<?php echo $row_a['URL']; ?>" style="max-width:100%;"/>
         </div>
     <?php
   } else {
     ?>
     <div class="item">
       <img src="<?php echo $row_a['URL']; ?>" style="max-width:100%;"/>
     </div>
     <?php
     }
     $indice = $indice +1;
   }
   if($foto_trovate==0)
   { ?>
	    <div class="item active">
           <img src="images/example.jpg" style="max-width:100%;"/>
         </div>
         <?php

   }
     ?>

   </div><!--/carousel-inner-->

   <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div><!--/myCarousel-->
   <script>
   $(document).ready(function() {
     $('#myCarousel').carousel({
     interval: 1000
   });
   });
   </script>
