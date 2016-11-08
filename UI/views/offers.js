/*global $ */
$(window).ready(function(){
    //add event listener pt butonul de add offer
    var offersContainer = $(".offers-js");
    var offers = new Offers();
    var offersDef =offers.getOffers();
    offersDef.done(listOffers);
    
    
    function getValues() {
        var appTitle = $('#application-title').val();
        var appDescription = $('#application-description').val();
        var appActive = $('#application-active').val();
        
        return {'title':appTitle, 'description':appDescription}
    }
    
   
    function listOffers(){
        var offersModel = offers.models;
        for (var i=0; i < offersModel.length; i++){
           var offersHtml = 
           "<div class='col-sm-6'>"+
           "<h3>" + offersModel[i].user_name + "</h3>" +
            "<p>" + offersModel[i].description + "</p>"+
            "</div>";
            
           
            offersContainer.append(offersHtml);
        }
    }
    
    $('#saveOffer').on('click', function(){
        var getOfferValues = listOffers();
        window.location = "submit_offer.html";
    });
    
});
