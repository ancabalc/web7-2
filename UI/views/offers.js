/*global $*/
$(window).ready(function(){
    
    var offer = new Offer(1);
    var offersDef = offer.getOffers(1);
    offersDef.done(listOffers);
    
    function listOffers() {
        var offersModels = offer.models;
        for(var i=0;i<offersModels.length;i++) {
            var offerHtml = "<h2>name</h2>" +
            "<p class='offerDesc'>" + offersModels[i].desc + " </p>";
            $('.list-offers').append(offerHtml);
        }
    }
});
    