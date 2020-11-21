<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="/css/custom.css">
    </head>
    <body>
        <div class="container-fluid content">
            <header class="container text-center header">
                <h1>Háttérképek!</h1>
                <h3>Mindenkinek a saját szája-íze szerint</h3>
                <ul>
                </ul>
                <hr />
            </header>
            <content>
                <?php
                if (isset($_GET["gallery"])) {
                    require("../webfejlesztes/gallery.php");
                } else {
                    require("../webfejlesztes/login.php");
                }
                ?>
            </content>
            <footer  class="footer text-center">
                <span class="small">Beadandó feladat Webfejlesztés tárgyból</span>
                <dl class="dl-horizontal">
                    <dt>Készítette</dt>
                    <dd>Sipos István</dd>
                    <dt>NEPTUN kód</dt>
                    <dd>F5D7DV</dd>
                    <dt>Szerintem</dt>
                    <dd>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (5-ös)
                    </dd>
                </dl>
            </footer>
        </div>
        <script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
              crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <?php foreach($jslibs as $js) {
            ?><script src="<?php echo($js); ?>"></script><?php
        };?>
    </body>
</html>
