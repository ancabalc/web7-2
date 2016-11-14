/* global $ */
$(window).ready(function(){
    function getValues() {
        var appTitle = $('#application-title').val();
        var appDescription = $('#application-description').val();
        var appActive = $('#application-active').val();
        
        return {'title':appTitle, 'description':appDescription , 'active':appActive};
    }
    
    $('#saveApplication').on('click', function(e){
        e.preventDefault();
        var getAppValues = getValues();
        var application = new Application();
        application.saveApplicationData(getAppValues);
    });
});