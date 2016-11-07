/*global $*/
$(window).ready(function(){
    
    
    var providersContainer = $(".puneaici");
    var provider = new Providers();
    
    var providerDef = provider.getTopThree();
    providerDef.done(listProviders);
    
    
    
    function listProviders(){
        var providerModels = provider.models;
        for (var i=0; i<providerModels.length; i++){
            var providerData = providerModels[i];
            var providerHtml = "<div class='col-sm-4 sm-margin-b-50'>" +
                        "<div class='bg-color-white margin-b-20'>" +
                        "<div class='wow zoomIn' data-wow-duration='.3' data-wow-delay='.1s'>" +
                         "<img class='img-responsive' src='../layout/img/770x860/01.jpg' alt='Team Image'>" +
                            "</div>" +
                        "</div>" +
                        "<h4><a href='#'>"+ providerData.name + "</a> <span class='text-uppercase margin-l-20'>" + providerData.description + "</span></h4>" +
                        "<p>"+providerData.description + "</p>" +
                    "</div>";
               
                    providersContainer.append(providerHtml);
        }
    }
    
    
}); 