$(window).ready(function(){
    var applicationsContainer = $(".js-applications-container .row");
    var applications = new Applications();
    
    var applicationsDef = applications.getApplications();
    applicationsDef.done(listApplications);
    //console.log(applicationsContainer);
    
    $( ".search-application" ).click( function() {
            var applicationDef = applications.search($('#search').val());
            applicationDef.done(listApplication);
    });
    
    function listApplications(){
        var applicationsModels = applications.models;
        for (var i=0; i<applicationsModels.length; i++){
            var applicationHtml = 
                '<div class="col-sm-4 sm-margin-b-50">'+
                        '<div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">'+
                            '<div class="bg-color-white margin-b-20">'+
                                '<div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">'+
                                    //'<img class="img-responsive" src="../layout/img/770x860/01.jpg" alt="Team Image">'+
                                '</div>'+
                            '</div>'+
                            
                            '<h3 class="app-look">' +applicationsModels[i].title +'</h3>'+
                            '<p class="app-look">'+ applicationsModels[i].description +'</p>'+
                            '<a class="link" class="app-look" href="submit-offer.html">Apply for it</a>'+
                       
                        '</div>'+
                        '</div>';
            applicationsContainer.append(applicationHtml);
            
        }
        
    }
});