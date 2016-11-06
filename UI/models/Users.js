function Users(){
    this.models = [];
}
Users.prototype.getUser = function(userId){
    var that= this;
    return $.ajax({
            url:"https://web7-2-sergiu87.c9users.io/api/users/get?id="+userId,
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