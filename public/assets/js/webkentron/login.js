$(function () {
//    if($('#login-form-link').attr('class')=='active'){
//        $('#login-form').css('display','block');
//        $('#register-form').css('display','none');
//    }else if($('#register-form-link').attr('class') == 'active'){
//        $('#login-form').css('display','none');
//        $('#register-form').css('display','active');
//    }
    
    $('#login-form-link').click(function (e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function (e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});


