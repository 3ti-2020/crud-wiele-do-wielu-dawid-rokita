const btn = document.querySelector(".zalogujsie");
const bg = document.querySelector(".bg-modal");
const close = document.querySelector(".close");


btn.addEventListener('click', function(){
    bg.style.display = "flex";
})

close.addEventListener('click', function(){
    bg.style.display = "none";
})