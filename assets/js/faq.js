document.addEventListener('DOMContentLoaded', () => {
    const accordion_arrow = document.querySelectorAll('.accordion .arrow');
    accordion_arrow.forEach(el => {

        el.addEventListener('click', e => {
            e.target.parentNode.parentNode.classList.toggle('open');
        });

    });
});