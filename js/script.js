// script.js

// Função para carregar o conteúdo de um arquivo HTML em um elemento
function loadHTML(elementId, filePath) {
    fetch(filePath)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            document.getElementById(elementId).innerHTML = data;
        })
        .catch(error => {
            console.error('Error loading HTML:', error);
        });
}

// Carregar o header e o footer
loadHTML('header', '../parts/header.html');
loadHTML('footer', '../parts/footer.html');
