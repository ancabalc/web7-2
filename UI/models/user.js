
/*global loginEmail */
/*global loginPassword */
/*global $ */
function User(options){
    this.email = options.email;
    this.password = options.password;
}
User.prototype.Login = function(email,password) {
            
            var ajaxxx = {
                url:"/api/accounts/login",
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

function Users(){
    this.models = [];
}

Users.prototype.add = function(userData){
    var that= this;
    $.ajax({
            url:"/api/accounts/create",
            data:userData,
            dataType:"json",
            type:"POST",
            success:function(){
                that.model = userData;
                window.location.href ="/UI/pages/index.html";
            },
           error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            }
        });
}