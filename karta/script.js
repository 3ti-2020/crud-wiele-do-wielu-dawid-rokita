const icon = document.querySelector("#icon");
const container = document.querySelector(".container");
const photocircle = document.querySelector(".photocircle");
const i = document.querySelectorAll(".i");
const item9 = document.querySelector(".item9");
const profile = document.querySelector(".profile");

let x = false;

icon.addEventListener('click', function(){
    if(icon.id === "icon"){
        icon.id = "icon2";
    }else{
        icon.id = "icon";
    }
    
    x = !x;
    // container.style.background = x ? '#FFFFFF' : '#DFC63B';

    i.forEach(element => {
        element.style.display = x ? "none" : "flex";
    });

        container.className = x ? "container2" : "container";
        item9.style.display = x ? "flex" : "none";
        profile.style.display = x ? "flex" : "none";

})
