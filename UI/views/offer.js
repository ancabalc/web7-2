 /*global $*/
 /*global Offer*/
$(window).ready(function(){
//     //add event listener pt butonul de add offer
//     var offersContainer = $(".offers-js");
//     var offers = new Offers();
//     var offersDef =offers.addOffer();
//     offersDef.done();

    function getOfferValues() {
        var applicationId = 1;//$('#application_id').val();
        var descriptionText = $('textarea[name=description]').val();
        
        return {'application_id':applicationId, 'description':descriptionText}
        
    }
    
    $('#saveOffer').on('click', function(e){
        e.preventDefault();
        var options = getOfferValues();
        //window.location = "submit_offer.html";
        var offer = new Offer(options);
        var offerDef = offer.createOffer(options);
        
    });
    
});