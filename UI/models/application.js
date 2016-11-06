/* global $ */
function application(){
    this.models = [];
}

application.prototype.saveApplicationData = function(getAppValue){
    var that = this;
    return $.ajax({
            url:"",
            type:"POST",
            dataType:"json",
            success:function(resp){
               
            },
            error:function(xhr,status,errorMessage){
                
            }
    });
}