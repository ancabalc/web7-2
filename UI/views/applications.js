$(window).ready(function(){
    var applicationsContainer = $(".js-applications-container .row");
    var applications = new Applications();
    
    var applicationsDef = applications.getApplications();
    applicationsDef.done(listApplications);
    //console.log(applicationsContainer);
    

    
    function listApplications(){
        var applicationsModels = applications.models;
        applicationsContainer.html("");
        for (var i=0; i<applicationsModels.length; i++){
            var applicationHtml = 
                '<div class="col-md-12" style="background: lightblue">'+
                        '<div class="wow fadeInLeft col-md-8" data-wow-duration=".3" data-wow-delay=".3s">'+
                            '<div class="bg-color-lightblue margin-b-20">'+
                                '<div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">'+
                                    //'<img class="img-responsive" src="../layout/img/770x860/01.jpg" alt="Team Image">'+
                                '</div>'+
                            '</div>'+
                            
                            '<h3 class="app-look col-md-12">' +applicationsModels[i].title +'</h3>'+
                            '<p class="app-look col-md-12">'+ applicationsModels[i].description +'</p>'+
                            '<a class="link" class="app-look col-md-12" href="submit-offer.html">Apply for it</a>'+
                       
                        '</div>'+
                        '</div>';
            applicationsContainer.append(applicationHtml);
            
        }
        
    }
    
      $( ".search-application" ).click( function() {
            
            var applicationDef = applications.search($('#search').val());
            applicationDef.done(listApplications);
    });
});