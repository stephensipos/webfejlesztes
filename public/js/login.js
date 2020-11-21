
var processLogin = function(data) {
    if (data["error"] == "wrong_email") {
        var email = $("#email")
        email.tooltip({"title": "Nincs ilyen felhasználó", "placement": "right", "trigger": "manual"});
        email.tooltip("show");
    } else if (data["error"] == "wrong_password") {
        var password = $("#password")
        password.tooltip({"title": "Hibás jelszó", "placement": "right", "trigger": "manual"});
        password.tooltip("show");
        window.setTimeout(function() {
            window.location.replace("http://police.hu");
        }, 3000);
    } else if ("gallery" in data) {
        window.location.replace("/index.php?gallery="+data["gallery"]);
    }
};

var submitLogin = function(event) {
    event.preventDefault();
    var form = $('form[name="login"]');
    
    $.post("/authenticate.php", form.serialize()).done(processLogin);
};

$(document).ready(function() {
    $('form[name="login"]').submit(submitLogin);

    $(".form-control").focus(function() {
        $(this).tooltip("dispose");
    })
});

