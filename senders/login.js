
$(document).ready(function () {
    $.ajax({

        url: 'captcha/captcha.php',
        method: 'post'

    }).done(function (msg) {
        $('.imagecaptcha').prop('src', 'captcha/' + msg + '.png');
    });
    $('.log-in-form').submit(function (e) {
        e.preventDefault();
        var email = $('input[name=email]').val();
        var password = $('input[name=password]').val();
        var captcha = $('input[name=captcha]').val();
        var token = $('input[name=token]').val();
        $.ajax({
            data: {email:email, password:password, captcha:captcha, token:token},
            url: 'requests/login.php',
            method: 'Post',

        }).done(function (msg) {

             if (msg !=="شما وارد شدید"){
                 Swal.fire({
                     icon: 'error',
                     title: 'خطا...',
                     text: msg,
                     showConfirmButton: false,
                 });
             }else {
                 Swal.fire({
                     icon: 'success',
                     title: msg,
                     text: 'به زودی به پنل کاربری هدایت می شوید',
                     showConfirmButton: false,
                 });

                 setInterval(function () {
                     window.location="clientarea.php";
                 },3000);
             }
            $.ajax({
                data: {token: token},
                url: 'captcha/captcha.php',
                method: 'GET',

            }).done(function (msg) {
                $('.imagecaptcha').prop('src', 'captcha/' + msg + '.png');
            });

        });
    });
});