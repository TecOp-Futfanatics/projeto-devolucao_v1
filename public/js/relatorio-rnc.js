document.addEventListener("DOMContentLoaded", function(){
    var inputImagem = document.getElementById("inputImagem");

    inputImagem.addEventListener("change", exibirPreviaImagens);
})

function exibirPreviaImagens() {
    var previaImagens = document.getElementById("previaImagens");
    previaImagens.innerHTML = "";
    var files = document.getElementById("inputImagem").files;
    
    for (var i = 0; i < files.length; i++) {
        let file = files[i];
        
        if(file.type.includes("png") || 
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
            removeButton.addEventListener("click", function() {
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
