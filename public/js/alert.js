function abrirConf() {
    document.getElementById("conf").style.display = "block";
}

function fecharConf() {
    document.getElementById("conf").style.display = "none";
}

function abrirConf_user() {
    document.getElementById("conf_user").style.display = "block";
}

function fecharConf_user() {
    document.getElementById("conf_user").style.display = "none";
}

document.querySelector(".back").addEventListener("click", function (event) {
    fecharConf();
    return false;
});

function abrirSucesso() {
    document.getElementById("confnewUser").style.display = "block";
}

function fecharSucesso() {
    document.getElementById("confnewUser").style.display = "none";
}

function abrirErro() {
    document.getElementById("conf_newUser").style.display = "block";
}

function fecharErro() {
    document.getElementById("conf_newUser").style.display = "none";
}

document.querySelector(".back").addEventListener("click", function (event) {
    fecharSucesso();
    return false;
});
