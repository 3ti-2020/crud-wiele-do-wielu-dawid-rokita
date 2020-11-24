const tekst = document.querySelector(".tekst");
const dodaj = document.querySelector(".dodaj");
const lista1 = document.querySelector(".lista1");

dodaj.addEventListener('click', function(){
    lista1.innerHTML = tekst.value;
})