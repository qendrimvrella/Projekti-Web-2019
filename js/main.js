//  IMG Slider
var slider_content = document.getElementById('box-img');
var image = ['a','b','c','d'];
var i = image.length;

function nextImage(){
    if(i<image.length){
        i=i+1;
    }else{
        i=1;
    }
    slider_content.innerHTML = "<img src=\"./sources/"+image[i-1]+".jpg\">";
}

function prewImage(){
    if(i<image.length+1 && i>1){
        i=i-1;
    }else{
        i= image.length;
    }
    slider_content.innerHTML = "<img src=\"./sources/"+image[i-1]+".jpg\">";
}

// LogIn

function loginPopUp(){
    document.getElementById('modal-wrapper').style.display='block';
}

function closePopUp(){
    document.getElementById('modal-wrapper').style.display='none'
}

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



