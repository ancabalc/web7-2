/* global $ */
function Application(){
    this.models = [];
}

Application.prototype.saveApplicationData = function(getAppValue){
    var that = this;
    return $.ajax({
            url:"../../api/applications/create",
            type:"POST",
            dataType:"json",
            data:getAppValue,
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