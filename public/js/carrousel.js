// Buscar todos los carruseles en la página de forma independiente
let carousels = document.querySelectorAll('.carousel');

carousels.forEach((carousel) => {
    // Buscar los items solo dentro de ESTE carrusel en específico
    let items = carousel.querySelectorAll('.carousel-item');

    items.forEach((el) => {
        const minPerSlide = 4;
        let next = el.nextElementSibling;
        
        for (var i = 1; i < minPerSlide; i++) {
            if (!next) {
                // Vuelve al primer elemento de ESTE carrusel, no de toda la página
                next = items[0];
            }
            let cloneChild = next.cloneNode(true);
            el.appendChild(cloneChild.children[0]);
            next = next.nextElementSibling;
        }
    });
});