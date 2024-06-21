document.addEventListener("DOMContentLoaded", function () {
    var inputImagem = document.getElementById("inputImagem");
    var inputVariacao = document.getElementById("btnVariacao");

    inputImagem.addEventListener("change", exibirPreviaImagens);
    inputVariacao.addEventListener("click", exibirVariacao)
})

function exibirVariacao() {
    let spaceButton = document.getElementById("spaceButton");
    let container = document.createElement("div");

    let containerVariacao = document.createElement("div");
        containerVariacao.className = "col-md-4";
    let inputVariacao = document.createElement("input");
    let labelVariacao = document.createElement("label");

    let containerQuantidade = document.createElement("div");
        containerQuantidade.className = "col-md-4";
    let inputQuantidade = document.createElement("input");
    let labelQuantidade = document.createElement("label");

    let containerQuantidadeF = document.createElement("div");
        containerQuantidadeF.className = "col-md-4";
    let inputQuantidadeF = document.createElement("input");
    let labelQuantidadeF = document.createElement("label");

    container.className = "row justify-content-around ";

    inputVariacao.type = "text";
    inputVariacao.name = "variacaoAdicional";
    inputVariacao.className = "form-control";
    inputVariacao.id = "inputVariacao";

    labelVariacao.htmlFor = "inputVariacao";
    labelVariacao.textContent = "Variação:";
    labelVariacao.className = "form-label";

    inputQuantidade.type = "text";
    inputQuantidade.name = "quantidade";
    inputQuantidade.className = "form-control";
    inputQuantidade.id = "inputQuantidade";

    labelQuantidade.htmlFor = "inputQuantidade";
    labelQuantidade.textContent = "Quantidade:";
    labelQuantidade.className = "form-label";

    inputQuantidadeF.type = "text";
    inputQuantidadeF.name = "quantFaturado";
    inputQuantidadeF.className = "form-control";
    inputQuantidadeF.id = "inputQuantFaturado";

    labelQuantidadeF.htmlFor = "inputQuantFaturado";
    labelQuantidadeF.textContent = "Quantidade Faturado:";
    labelQuantidadeF.className = "form-label";

    containerVariacao.appendChild(labelVariacao);
    containerVariacao.appendChild(inputVariacao);
    containerQuantidade.appendChild(labelQuantidade);
    containerQuantidade.appendChild(inputQuantidade);
    containerQuantidadeF.appendChild(labelQuantidadeF);
    containerQuantidadeF.appendChild(inputQuantidadeF);

    spaceButton.appendChild(container);
    spaceButton.appendChild(containerVariacao);
    spaceButton.appendChild(containerQuantidade);
    spaceButton.appendChild(containerQuantidadeF);
}

function exibirPreviaImagens() {
    var previaImagens = document.getElementById("previaImagens");
    previaImagens.innerHTML = "";
    var files = document.getElementById("inputImagem").files;

    for (var i = 0; i < files.length; i++) {
        let file = files[i];

        if (file.type.includes("png") ||
            file.type.includes("jpg") ||
            file.type.includes("jpeg")) {
            let url = URL.createObjectURL(file);

            let imgContainer = document.createElement("div");
            imgContainer.style.position = "relative";
            imgContainer.style.display = "inline-block";
            imgContainer.style.margin = "10px";

            let img = document.createElement("img");
            img.src = url;
            img.width = 150;

            let removeButton = document.createElement("button");
            removeButton.innerHTML = "X";
            removeButton.style.position = "absolute";
            removeButton.style.top = "10px";
            removeButton.style.right = "10px";
            removeButton.style.backgroundColor = "white";
            removeButton.style.color = "black";
            removeButton.style.border = "none";
            removeButton.style.borderRadius = "50%";
            removeButton.style.cursor = "pointer";
            removeButton.style.fontSize = "16px";
            removeButton.style.width = "30px";
            removeButton.style.height = "30px";
            removeButton.addEventListener("click", function () {
                imgContainer.remove();
            });

            imgContainer.appendChild(img);
            imgContainer.appendChild(removeButton);
            previaImagens.appendChild(imgContainer);
        } else {
            alert("Imagem inválida: " + file.name);
        }
    }
}


