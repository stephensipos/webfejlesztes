<?php
    $jslibs=[];
    $jslibs[] = "/js/login.js";
?>
<div class="container text-center">
    <p>Lépj be, és válogas sszemélyre szabott háttérképeink közül!</p>
</div>
<div class="container">
    <div class="row">
        <form name="login" method="POST" class="col-md-4 offset-md-4">
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail cím" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password"  placeholder="Jelszó"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-secondary" value="Belépés"/>
            </div>
        </form>
    </div>
</div>