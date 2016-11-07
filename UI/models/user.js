
/*global loginEmail */
/*global loginPassword */
/*global $ */
function User(options){
    this.email = options.email;
    this.password = options.password;
}
User.prototype.Login = function(email,password) {
            
            var ajaxxx = {
                url:"https://web7-2-dabija999.c9users.io/api/accounts/login",
                data:{
                    login_email:loginEmail,
                    login_password:loginPassword
                },
                type:"POST",
                success:function(){
                    console.log("Successfuly logged in!");
                },
                error:function(){
                    console.log("Failed to log in!");
                }
            };
            return $.ajax(ajaxxx);
}
