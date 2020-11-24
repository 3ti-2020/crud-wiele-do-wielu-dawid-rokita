const tekst = document.querySelector(".tekst");
const dodaj = document.querySelector(".dodaj");
const lista = document.querySelector(".lista");


dodaj.addEventListener('click', function(){
    lista.innerHTML =  lista.innerHTML + "<ul><li>" + tekst.value + "</li></ul>";
})

