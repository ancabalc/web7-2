/*global $*/
function Offer(options) {
    this.userId = options.user_id;
    this.applicationId = options.application_id;
    this.desc = options.description;
    this.models = [];
}

Offer.prototype.getOffers = function(applicationId,userId) {
    var that = this;
    return $.ajax({
            url:"/api/controllers/offers?id="+applicationId+"&userId="+userId,
            type:"GET",
            dataType:"json",
            success:function(resp){
                //console.log(resp);
                that.models = [];
                for(var i = 0; i<resp.length; i++){
                    var offers = new Offer(resp[i]);
                    that.models.push(offers);
                }
                //console.log('Offers:' , that.models);
            },
            error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            }
        });
};