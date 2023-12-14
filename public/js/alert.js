
function abrirConf(){
    document.getElementById("conf").style.display = "block";

}

function fecharConf(){
    document.getElementById("conf").style.display = "none";
}
function abrirConf_user(){
    document.getElementById("conf_user").style.display = "block";

}

function fecharConf_user(){
    document.getElementById("conf_user").style.display = "none";
}

document.querySelector(".back").addEventListener("click"),function (event){
    fecharConf();
    return false;
}

