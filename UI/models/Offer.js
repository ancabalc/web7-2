
/*global $*/

function Offer (options){
    //functie constructor ...seteaza date initiale
    this.description = options.description;
    this.application_id = options.application_id;
    this.user_id = options.user_id;
    
}

Offer.prototype.add = function addOffer (text,userId){
    // do an Ajax to add an offer https://preview.c9users.io/siitwebcluj/web7-2/UI/pages/submit-offer.html
    //Method Post
        var offerHtml = $(this).parent('li');
        var applicationId = offerHtml.data("application_id");
        var userId = offerHtml.data("user_id");
        var descriptiontText = offerHtml.children("textarea").val();
        
        return $.ajax({
                url:"../api/offers/create",
                data:{
                    application_id:applicationId,
                    description:descriptiontText,
                    user_id:userId,
                },
            type: "POST",
            success:function(){
                addOffer();
                console.log("Your offer was successfully added!");
            },
            error:function(){
                console.log("Error!! Your offer was not added!");
            }
            
        });
        
    }
