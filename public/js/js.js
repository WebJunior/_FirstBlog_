$(document).ready(function() {
    $("button[name  = 'reg_user']").bind('click',getDataFromRegistrationFormAndSendAJAX);
    $("button[name  = 'enter_user']").bind('click',loginUser);

    function loginUser() {
        var login_reg = $('input#login_in').val();
        var pwd_reg = $('input#pwd_in').val();

        $('span#reg_error').hide();

        $.ajax({
            type: "POST",
            url: "/login",
            data: {
                login_in: login_reg,
                pass_in: pwd_reg,
            },
            dataType: 'text',
            success: function(data){

                if(data== 'error__verif') {
                    $('span#reg_error').show();
                    $('span#reg_error').text('Пользователь не подтверждён');
                }

                if(data== 'error__user__not_found') {
                    $('span#reg_error').show();
                    $('span#reg_error').text('Пользователь не найден');
                }

                if(data== 'error__pass') {
                    $('span#reg_error').show();
                    $('span#reg_error').text('Пароль неправильный');
                }

                if(data== 'error__attempts') {
                    $('span#reg_error').show();
                    $('span#reg_error').text('Слишком часто пытаетесь войти');
                }

                if(data== 'login__ok') {
                    location.reload();
                }
            },
            error: function() {
                $('span#reg_error').show();
                $('span#reg_error').text('Ошибка входа.');
            }
        });

    }

    function getDataFromRegistrationFormAndSendAJAX() {

        var email_reg = $('input#email_reg').val();
        var login_reg = $('input#login_reg').val();
        var pwd_reg = $('input#pwd_reg').val();
        var pwd_reg_re = $('input#pwd_reg_re').val();
        var check_login = false;
        var check_pass = false;

        $('span#reg_succ').hide();
        $('span#reg_error').hide();

        if (pwd_reg != pwd_reg_re) {
            $('span#reg_error').show();
            $('span#reg_error').text('Пароли не совпадают');
            return false;
        }

        if ( login_reg.length >= 3 && login_reg.length <=50)  {
            check_login = true;
        }else {
            $('span#reg_error').show();
            $('span#reg_error').text('Длина логина должна быть от 3 до 50 символов');
            return false;
        }

        if ( (pwd_reg.length >= 3 && pwd_reg.length <=50) && (pwd_reg_re.length >=3 && pwd_reg_re.length <=50)) {
            check_pass = true;
        }else {
            $('span#reg_error').show();
            $('span#reg_error').text('Длина пароля должна быть от 3 до 50 символов');
            return false;
        }

        if (check_pass && check_login) {
            $('#reg_user').hide();
            $.ajax({
                type: "POST",
                url: "/addUserAjax",
                data: {
                    email: email_reg,
                    login: login_reg,
                    pass: pwd_reg,
                    re_pass: pwd_reg_re,
                    reg_new_user:true
                },
                dataType: 'text',
                success: function(data){

                    if(data== 'reg__ok') {
                        $('span#reg_succ').show();
                        $('span#reg_error').hide();
                        $('span#reg_succ').text('Регистрация прошла успешно! Письмо с подтверждением отправлено на Email');
                    }

                    if(data== 'email__error') {
                        $('span#reg_error').show();
                        $('span#reg_succ').hide();
                        $('span#reg_error').text('Укажите корректный E-mail');
                    }

                    if(data== 'password__error') {
                        $('span#reg_error').show();
                        $('span#reg_succ').hide();
                        $('span#reg_error').text('Укажите корректный пароль');
                    }

                    if(data== 'user__error') {
                        $('span#reg_error').show();
                        $('span#reg_succ').hide();
                        $('span#reg_error').text('Такой пользователь уже зарегистрирован');
                    }

                    if(data== 'request__error') {
                        $('span#reg_error').show();
                        $('span#reg_succ').hide();
                        $('span#reg_error').text('Слишком много запросов');
                    }
                    $('#reg_user').show();
                },
                error: function() {
                    $('span#reg_error').show();
                    $('span#reg_succ').hide();
                    $('span#reg_error').text('Ошибка регистрации.');
                }
            });
        }

    }


});
