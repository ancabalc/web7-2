/*global $*/
$(window).ready(function(){
        
  $(".role").on('click', function () {
      if($(this).val() == 'provider') {
            $(".job").fadeIn(400);
        } else {
            $(".job").fadeOut(200);
        }
  });
   
        $("[type='submit']").on("click",function(ev){
        ev.preventDefault();
        

        var formData = new FormData();
        var user = new Users();
        var name = $('.username').val();
        var email = $('.useremail').val();
        var password = $('.userpassword').val();
        var repassword = $('.userrepassword').val();
        var job = $('.job').val();
        var role = $("input[name=rolec]:checked").val();
        var description = $('.description').val();
        var image = $("[name='image']")[0];
        
        formData.append("name",name);
        formData.append("email",email);
        formData.append("password",password);
        formData.append("repassword",repassword);
        formData.append("job",job);
        formData.append("role",role);
        formData.append("description",description);
        formData.append("file",image.files[0]);  
        
        user.save(formData);
        
        validateName();
        validateEmail();
        validatePassword();        
        validateJob();
        validateDescription();
        validateImage();
            
        });
        
});    


function validateName(){        
    var x = $('.username').val();
    if (x == null || x == "") {
        if  ($('.username').is(':last-child')){
         $('.username').parent().append("<p class='nameer'>Name must be filled out</p>");
        } 
        return false;
    } else {
         $('.nameer').remove();    
    }
}
    
function validateEmail(){
    var y = $('.useremail').val();
    var patternEmail =  /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    if(patternEmail.test(y)){
        $('.emailer').remove();  
    } else {
        if  ($('.useremail').is(':last-child')){
        $('.useremail').parent().append("<p class='emailer'>Please use a valid email adress, ex: yourname@whatever.com</p>");
        } 
        return false;
    } 
}

function validatePassword(){
    var z = $('.userpassword').val(); 
    var w = $('.userrepassword').val();
    var patternPassword =  /[A-Za-z0-9$#_]{6,25}$/;
     if(patternPassword.test(z)){
        if (z===w){
          $('.passworder').remove();      
        }             
         else {
            if  ($('.userrepassword').is(':last-child')){
            $('.userrepassword').parent().append("<p class='passworder'>Passwords do not match</p>");
        } 
        return false;     
         }
    } else {
        if  ($('.userpassword').is(':last-child')){
        $('.userpassword').parent().append("<p class='passworder'>Please type a valid password, with a length of minimum 6 characters</p>");
        } 
        return false;
    } 
}

function validateJob(){        
    var q = $("input[name=rolec]:checked").val();
    var j = $('.job').val();
    if ((q === "provider") && ((j == null) || (j == "")))  {
        if  ($('.job').is(':last-child')){
         $('.job').parent().append("<p class='jober'>You must post the job you're offering</p>");
        } 
        return false;
    } else {
         $('.jober').remove();    
    }
}

function validateDescription(){  
    var d = $('.description').val();
    if (d == null || d == "") {
        if  ($('.description').is(':last-child')){
         $('.description').parent().append("<p class='descriptioner'>Description must be provided</p>");
        } 
        return false;
    } else {
         $('.descriptioner').remove();    
    }
}

function validateImage(){
    var im =$('input[type="file"]').val();
    if (im == null || im == "") {
        if  ($('.image').is(':last-child')){
         $('.image').parent().append("<p class='imageer'>An image is required</p>");
        } 
        return false;
    } else {
         $('.imageer').remove();    
    }
}

