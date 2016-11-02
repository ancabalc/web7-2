/* global $ */
$(window).ready(function(){
    function getValues() {
        var appTitle = $('#application-title').val();
        var appDescription = $('#application-description').val();
        var appActive = $('#application-active').val();
        
        return {'title':appTitle, 'description':appDescription}
    }
    
    $('#saveApplication').on('click', function(){
        var getAppValues = getValues();
        window.location = "applications.html";
    });
});