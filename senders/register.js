$(document).ready(function () {
    $('.log-in-form').submit(function (e) {
        e.preventDefault();
        var email = $('input[name=email]').val();
        var username = $('input[name=username]').val();
        var password = $('input[name=password]').val();
        var captcha = $('input[name=captcha]').val();
        var token = $('input[name=token]').val();
        $.ajax({
            data: {email: email, password: password, captcha: captcha, token: token, username: username},
            url: 'requests/register.php',
            method: 'Post',

        }).done(function (msg) {

            if (msg !== "عضویت با موفقیت انجام شد. لطفا به ایمیل خود مراجعه کرده و عضویت خود را فعال کنید") {
                Swal.fire({
                    icon: 'error',
                    title: 'خطا...',
                    text: msg,
                    timer: 3500,
                    showConfirmButton: false,
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'عضویت انجام شد',
                    text: msg,
                    timer: 3500,
                    showConfirmButton: false,
                });

                setInterval(function () {
                    window.location = "clientarea.php";
                }, 3000);
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