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

Users.prototype.save = function(formData){
    $.ajax({
            url:"/api/accounts/create",
            type:"POST",
            data:formData,
            processData:false,
            contentType:false,
            success:function(resp){
                    if (Object.keys(resp.errors).length === 0){
                        window.location.href = "index.html";
                    }
            },
            error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            }
        });
}