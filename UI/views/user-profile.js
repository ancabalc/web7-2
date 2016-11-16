$(window).ready(function(){
   
    
    var users = new Users();
    var userDef = users.getProfileData();
    userDef.done(populateUser);
    var image = null;
    var id ;
    
    function populateUser(){
        var userModel = users.model;
        $(".abc").append("<h2>"+userModel.name+"'s Profile</h2>");
        $("[name='name']").val(userModel.name);
        $("[name='job']").val(userModel.job);
        console.log(userModel.job);
        $("[name='description']").val(userModel.description);
        image = userModel.image;
        id = userModel.id;
        $(".img-responsive").attr("src", 'https://preview.c9users.io/sergiu87/web7-2/api/uploads/' + userModel.image);
        
    }
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.img-responsive').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function(){
    readURL(this);
});
    
    $("[type='submit']").on("click",function(ev){
        ev.preventDefault();
          
        
        var formData = new FormData();
        var nameValue = $("[name='name']").val();
        var jobValue = $("#job").val();
        var descriptionValue = $("#description").val();
        var fileInput = $("[name='image']")[0];
        formData.append("name",nameValue);
        formData.append("id",id);
        formData.append("job", jobValue);
        formData.append("description",descriptionValue);
        //here we are appending to the form data, our image
        if(fileInput.files[0]) {
          formData.append("image",fileInput.files[0]);
        } else {
            formData.append("image",image);
        }
        
        $.ajax({
            url:"/api/users/update?id="+id,
            type:"POST",
            data:formData,
            processData:false,
            contentType:false,
            success:function(resp){
                window.location.href = "/UI/pages/user-profile.html";
            },
            error:function(){
                console.log("oopsss");
            }
        });
        
    });
})