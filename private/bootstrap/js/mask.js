$(document).ready(function(){
    $("#nome").mask("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
    $("#cpf").mask("000.000.000-00");
    $("#cnh").mask("000000000");
    $("#telefone").mask("(00)00000-0000");
    $("#cnpj").mask("00.000.00/0001-00");
});

var search = document.getElementById('search');
    search.addEventListener("keydown", function(event){
        if (event.key === 'Enter'){
            searchData();
        }
    })

function searchData(){
    window.location ='sistema.php?search='+search.value;
            
}