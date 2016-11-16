function Applications(){
    this.models = [];
}

Applications.prototype.getApplications = function(){
    var that = this;
    return $.ajax({
            url:"/api/applications/listApplications",
            type:"GET",
            dataType:"json",
            success:function(resp){
                for(var i = 0; i<resp.length; i++){
                       var app = new Application(resp[i]);
                       that.models.push(app);
                }
            },
            error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            }
    });
    }
Applications.prototype.search = function(text){
    var that= this;
    that.models= [];
    return $.ajax({
            url:"https://web7-2-andrada17.c9users.io/api/applications/search?value="+text,
            type:"GET",
            dataType:"json",
            success:function(resp){
                for(var i = 0; i<resp.length; i++){
                    var app = new Application(resp[i]);
                    that.models.push(app);
                }
            },
            error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            }
        });
};

