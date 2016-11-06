$(window).ready(function(){
   
   var user = new Users();
   
        $("[type='submit']").on("click",function(ev){
        ev.preventDefault();
             
        var addeduser = {
            name: $('.username').val(),
            email:  $('.useremail').val(),
            password:  $('.userpassword').val(),
            repassword: $('.userrepassword').val(),
            role: $('.role').val()
         };
       user.add(addeduser);     
             
            
        });
});    