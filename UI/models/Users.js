function Users(){
    this.models = [];
}
Users.prototype.getUser = function(userId){
    var that= this;
    return $.ajax({
            url:"/api/users/get?id="+userId,
            type:"GET",
            dataType:"json",
            success:function(resp){
                var user = new User(resp);
                that.model = user;
            },
            error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            }
        });
}

Users.prototype.add = function(userData){
    $.ajax({
            url:"/api/accounts/create",
            data:userData,
            dataType:"json",
            type:"POST",
            success:function(resp){
                 if (Object.keys(resp.errors).length === 0) {
                     window.location.href ="/UI/pages/index.html";
                } else {
                    console.log(resp.errors);
                }
           },
           error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            }
        });
}