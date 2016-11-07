$(window).ready(function(){
    
    $(".login-btn").on("click", function(e) {
        e.preventDefault();
        
    var user = new User();
    var email = new $("[name='email-value']").val();
    var password = new $("[name='password-value']").val();
    var userLogin = user.loginUser(email,password);
    userLogin.done(showUser);
    })
    
    function showUser() {
         if(window.loginResp.errors) {
            $('.invalidCred').html('');
            var invalidCredMessage = "Invalid Credentials!";
            $(".invalidCred").append(invalidCredMessage);
}
else {
    window.location.href = "https://web7-1-alecsandrul.c9users.io/UI/pages/";
}
}

});