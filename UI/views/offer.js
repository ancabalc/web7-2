 /*global $*/
$(window).ready(function(){
//     //add event listener pt butonul de add offer
//     var offersContainer = $(".offers-js");
//     var offers = new Offers();
//     var offersDef =offers.addOffer();
//     offersDef.done();

    function getOfferValues() {
        var applicationId = $('#application_id').val();
        var descriptionText = $('#description').val();
        var userId = $('#user_id').val();
        
        return {'application_id':applicationId, 'description':descriptionText , 'user_id':userId}
        
    }
    
    $('#saveOffer').on('click', function(){
        var getOfferValues = getOfferValues();
        window.location = "submit_offer.html";
    });
    
});