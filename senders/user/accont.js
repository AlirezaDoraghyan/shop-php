$(document).ready(function () {

    // this ajax for accont form
    $('.accont-user').submit(function (e) {
        e.preventDefault();
        var name = $('input[name=name]').val();
        var lastname = $('input[name=lastname]').val();
        var phone = $('input[name=phone]').val();
        var about = $('input[name=about]').innerHeight();
        var captcha = $('input[name=captcha]').val();
        var token = $('input[name=token]').val();

        $.ajax({
            data: {captcha: captcha, token: token, name: name, lastname: lastname, phone: phone, about: about},
            url: 'requests/paneluser/accont.php',
            method: 'Post',

        }).done(function (msg) {

            if (msg !== "مقادیر با موفقیت ثبت شد") {
                Swal.fire({
                    icon: 'error',
                    title: 'خطا...',
                    text: about,
                    showConfirmButton: false,
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: msg,
                    showConfirmButton: false,
                });
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

    // this ajax for my wallet form
    $('.sent-money-to-frend').submit(function (e) {
        e.preventDefault();
        var email = $('input[name=email]').val();
        var mony = $('input[name=mony]').val();
        var descript = $('input[name=descript]').val();
        var captcha = $('input[name=captcha]').val();
        var token = $('input[name=token]').val();

        $.ajax({
            data: {captcha: captcha, token: token, email: email, descript: descript, mony: mony},
            url: 'requests/paneluser/mywallet.php',
            method: 'Post',

        }).done(function (msg) {

            if (msg !== 'تراکنش باموفقیت انجام شد.') {
                Swal.fire({
                    icon: 'error',
                    title: 'خطا...',
                    text: msg,
                    showConfirmButton: false,
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: msg,
                    showConfirmButton: false,
                });
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

    // this ajax for annousces see
    $('.title-slid-coll-all-click').click(function () {

        var data = $(this).prop('id');

        $.ajax({
            data: {data: data},
            url: 'requests/paneluser/annousces.php',
            method: 'Post',

        });
    });


    // this ajax for change password
    $('.change-password').submit(function (e) {
        e.preventDefault();
        var newpass = $('input[name=newpass]').val();
        var anewpass = $('input[name=anewpass]').val();
        var lasspass = $('input[name=lasspass]').val();
        var captcha = $('input[name=captcha]').val();
        var token = $('input[name=token]').val();


        $.ajax({
            data: {newpass: newpass, anewpass: anewpass, lasspass: lasspass, captcha: captcha, token: token},
            url: 'requests/paneluser/password.php',
            method: 'Post',

        }).done(function (msg) {

            if (msg !== "رمز عبور تغییر یافت") {
                Swal.fire({
                    icon: 'error',
                    title: 'خطا...',
                    text: msg,
                    showConfirmButton: false,
                    timer: 1500

                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: msg,
                    showConfirmButton: false,
                    timer: 1500

                });

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