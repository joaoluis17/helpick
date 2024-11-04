import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Adiciona o evento a todos os formulários da página
document.addEventListener("DOMContentLoaded", function () {
    // Seleciona todos os formulários da página
    const formularios = document.querySelectorAll("form");

    // Para cada formulário, adiciona o evento 'keypress' aos inputs
    formularios.forEach((form) => {
        form.addEventListener("keypress", function (event) {
            // Verifica se a tecla pressionada é 'Enter'
            if (event.key === "Enter") {
                event.preventDefault(); // Impede o comportamento padrão do Enter
                form.submit(); // Envia o formulário
            }
        });
    });
});

document.querySelector('form').addEventListener('submit', function(event) {
    const content = document.querySelector('textarea[name="content"]').value;
    if (!content.trim()) {
        event.preventDefault();
        alert("Por favor, escreva algo antes de enviar seu comentário.");
    }
});

