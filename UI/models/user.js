function Users(){
    this.models = [];
}

Users.prototype.add = function(userData){
    var that= this;
    $.ajax({
            url:"https://web7-2-danciocoiu.c9users.io/api/accounts/create",
            data:userData,
            dataType:"json",
            type:"POST",
            success:function(){
                that.model = userData;
                window.location.href ="https://web7-2-danciocoiu.c9users.io/UI/pages/index.html";
            },
           error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            }
        });
}