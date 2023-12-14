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


const senha = document.getElementById("senha");
const confsenha = document.getElementById("confsenha");


senha.addEventListener("submit",(event)=>{
    event.preventDefault();
    checkPassword()
})

function checkPassword(){
    const passwordValue = senha.value;
    const confValue = confsenha.value;

    if(confValue === ""){
        errorSenha(confValue,"A confirmação de senha é obrigatória!")
    }else if (confValue!== passwordValue){
        errorSenha(confValue,"As senhas não são iguais")
    }else{
        const formItem = confsenha.parentElement;
        formItem.className="input-field"
    }
}

function errorSenha(input,message){
    const formItem = confsenha.parentElement;
    const textMessage = formItem.querySelector("span")

    textMessage.innerText = message;

    formItem.className = "input-field error"
}