const btn = document.querySelector(".linkb");
const bg = document.querySelector(".bg-modal");
const close = document.querySelector(".close");
const robocze = document.querySelector(".robocze");
const lower = document.querySelector(".lower");
const insert = document.querySelector(".linka");
const item3 = document.querySelector(".item3");
const leftmenu = document.querySelector(".leftmenu");
const grid = document.querySelector(".grid");
const item2 = document.querySelector(".item2");

let licznik = 0;
let licznik2 = 0;
let licznik3 = 0;

btn.addEventListener('click', function(){
    bg.style.display = "flex";
})

close.addEventListener('click', function(){
    bg.style.display = "none";
})

robocze.addEventListener('click', function(){

    if(licznik === 0){
        lower.style.display = "flex";
        licznik ++;
    }else{
        lower.style.display = "none";
        licznik = 0;
    }
    
})

insert.addEventListener('click', function(){
    if(licznik2 === 0){
        item3.style.display = "block";
        insert.className = "fas fa-minus linka";
        licznik2 ++;
    }else{
        item3.style.display = "none";
        insert.className = "fas fa-plus linka";
        licznik2 = 0;
    }
   
})

leftmenu.addEventListener('click', function(){
    if(licznik3 === 0){
        grid.className = "grid2";
        item2.className = "item22";
        licznik3 ++;
    }else{
        grid.className = "grid";
        item2.className = "item2";
        item3.style.display = "none";
        insert.className = "fas fa-plus linka";
        licznik3 = 0;
        licznik2 = 0;
    }
})