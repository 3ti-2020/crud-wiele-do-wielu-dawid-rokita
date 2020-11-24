const tekst = document.querySelector(".tekst");
const dodaj = document.querySelector(".dodaj");
const lista = document.querySelector(".lista");


dodaj.addEventListener('click', function(){
    lista.innerHTML =  lista.innerHTML + "<li>" + tekst.value + "<a class='del'> X</a>" + "</li>";
    tekst.value = "";
})

