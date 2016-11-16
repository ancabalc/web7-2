/*global $*/
function Offers(options) {
    this.applicationId = options.application_id;
    this.desc = options.description;
    this.models = [];
}

Offers.prototype.getOffers = function(applicationId) {
    var that = this;
    return $.ajax({
            url:"/api/offers",
            type:"GET",
            dataType:"json",
            success:function(resp){
                //console.log(resp);
                that.models = [];
                for(var i = 0; i<resp.length; i++){
                    var offers = new Offers(resp[i]);
                    that.models.push(offers);
                }
                //console.log('Offers:' , that.models);
            },
            error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            }
        });
};