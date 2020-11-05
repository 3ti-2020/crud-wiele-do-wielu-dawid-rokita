const leftmenu = document.querySelector(".leftmenu");
const grid = document.querySelector(".grid");
const item2 = document.querySelector(".item2");

let licznik3 = 0;

leftmenu.addEventListener('click', function(){
    if(licznik3 === 0){
        grid.className = "grid2";
        item2.className = "item22";
        licznik3 ++;
    }else{
        grid.className = "grid";
        item2.className = "item2";
        licznik3 = 0;
    }
})