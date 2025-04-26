document.addEventListener('DOMContentLoaded', () => {
    const sr = ScrollReveal({
        distance: '60px',
        duration: 2500,
        delay: 200,
        //reset: true

    });
    sr.reveal('.header_logo', { delay: 400 });
    sr.reveal('.section', { delay: 600 });
    sr.reveal('.services_items', { delay: 700 });
    sr.reveal('.app-right', { delay: 700, origin: 'right' });
    sr.reveal('.app-center', { delay: 700, origin: 'center' });
    sr.reveal('.app-left', { delay: 700, origin: 'left' });
});