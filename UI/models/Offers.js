/*global $*/
function Offers(){
    this.models = [];
}

Offers.prototype.getOffers = function(){
    var that = this;
    return $.ajax({
            url:"https://web7-2-jeanina.c9users.io/api/offers/for-application",
            type:"POST",
            dataType:"json",
            success:function(resp){
                for(var i = 0; i<resp.length; i++){
                       var offer = new Offer(resp[i]);
                       that.models.push(offer);
                }
            },
            error:function(xhr,status,errorMessage){
                console.log("Error status:"+status);
            }
    });
}

