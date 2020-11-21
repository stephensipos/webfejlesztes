<?php

$jslibs=[];
$jslibs[] = "https://cdnjs.cloudflare.com/ajax/libs/galleria/1.5.7/galleria.min.js";
$jslibs[] = "https://cdnjs.cloudflare.com/ajax/libs/galleria/1.5.7/themes/classic/galleria.classic.min.js";
$jslibs[] = "/js/gallery.js";


$galleries_root = "../public/images/bg/";
$galleries = array_filter(glob($galleries_root.'*'), 'is_dir');;

$selected_gallery = $_GET["gallery"];

if (in_array($selected_gallery, array_map('basename', $galleries))) {
    $images = array_map('basename', glob($galleries_root.$selected_gallery.'/*'));
?>
<div class="container text-center">
  <h5>Galéria: <?php echo($selected_gallery)?></h5>
  <link rel=”stylesheet” type=”text/css” href=”https://cdnjs.cloudflare.com/ajax/libs/galleria/1.5.7/themes/fullscreen/galleria.classic.min.css” />
  <style>
    .galleria {
      width: 100%;
      height: 600px;
      background: #000;
      overflow: hidden;
    }
  </style>
  <div class="galleria">
    <?php foreach ($images as $image) {?>
    <img src="/images/bg/<?php echo($selected_gallery);?>/<?php echo($image);?>" />
    <?php }; ?>
  </div>
</div>
<?php 
} else {
?>
  <div class="container text-center">
    <span>Ez a galéria nem létezik :(</span>
  </div>
<?php
}
?>
<div class="container text-center">
  <a href="/">Vissza</a>
</div>