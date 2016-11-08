function Providers(){
    this.models = [];
}

Providers.prototype.getTopThree = function(){
     var that= this;
      return $.ajax({
            url:"/api/users/listUsers",
            type:"GET",
            dataType:"json",
            success:function(resp){
               for(var i = 0; i<resp.length; i++){
                    var provider = new Provider(resp[i]);
                    that.models.push(provider);
                }
            },
            error:function(){
                console.log("Error displaying providers");
            }
        });
    }