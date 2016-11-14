/*global $*/
function Offer(options) {
    this.applicationId = options.application_id;
    this.desc = options.description;
    this.models = [];
}

Offer.prototype.createOffer = function(options) {
    var that = this;
    return $.ajax({
            url:"/api/offers/create",//+applicationId,
            type:"POST",
            dataType:"json",
            data: options,
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