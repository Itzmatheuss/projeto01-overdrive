function abrirConf(){
    document.getElementById("conf").style.display = "block";

}

function fecharConf(){
    document.getElementById("conf").style.display = "none";
}

function confirmarDelete(){
    document.getElementById("deleteForm").submit();
}

document.querySelector(".back").addEventListener("click"),function (event){
    event.preventDefault();
    fecharConf();
    return false;
}