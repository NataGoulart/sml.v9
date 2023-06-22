{
    window.open("excluircarrinho.php?id=" +Id, "_self");
}

function adicionar() {
    var quantidadeElement = document.querySelector(".quantidade");
    var quantidade = parseInt(quantidadeElement.innerHTML);
    quantidade++;
    quantidadeElement.innerHTML = quantidade;
    document.getElementById("574543").innerHTML = quantidade * document.getElementById("valorunitario").innerHTML;
}

function diminuir() {
    var quantidadeElement = document.querySelector(".quantidade");
    var quantidade = parseInt(quantidadeElement.innerHTML);
    if (quantidade > 1) {
        quantidade--;
        quantidadeElement.innerHTML = quantidade;
        document.getElementById("574543").innerHTML = quantidade * document.getElementById("valorunitario").innerHTML;
    }
}
