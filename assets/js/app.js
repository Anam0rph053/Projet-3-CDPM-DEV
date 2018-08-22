
window.addEventListener("load", function(){
    document.getElementById("file_upload").onchange = function(event){
        var reader = new FileReader();
        reader.onload = function(e){
            $("#image_uploaded").attr('src',e.target.result);
        }
        reader.readAsDataURL(event.srcElement.files[0]);
    }
});



