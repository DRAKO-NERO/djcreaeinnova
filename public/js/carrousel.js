document.addEventListener('DOMContentLoaded', function () {
    let carousels = document.querySelectorAll('.carousel');

    carousels.forEach((carousel) => {
        let items = carousel.querySelectorAll('.carousel-item');

        items.forEach((el) => {
            // Limpiamos clones previos si existían
            let children = Array.from(el.children);
            if (children.length > 1) {
                for (let k = 1; k < children.length; k++) {
                    children[k].remove();
                }
            }

            // Calculamos cuántos elementos mostrar según la pantalla
            let minPerSlide = 4; // Escritorio por defecto
            
            if (window.innerWidth < 576) {
                minPerSlide = 1; // Celulares: SOLO 1 elemento
            } else if (window.innerWidth < 992) {
                minPerSlide = 2; // Tablets: 2 elementos
            }

            // Clonamos solo si se requiere mostrar más de 1 por vista
            let next = el.nextElementSibling;
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    next = items[0];
                }
                let cloneChild = next.cloneNode(true);
                el.appendChild(cloneChild.children[0]);
                next = next.nextElementSibling;
            }
        });
    });
});