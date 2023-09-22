
const ratingStars = document.querySelectorAll('#rating-stars i');
const ratingInput = document.getElementById('rating');

ratingStars.forEach(star => {
    star.addEventListener('click', () => {
        const ratingValue = parseInt(star.getAttribute('data-rating'));
        ratingInput.value = ratingValue;

        // Agrega una clase para mostrar visualmente la calificación seleccionada
        ratingStars.forEach(s => s.classList.remove('rated'));
        star.classList.add('rated');
    });
});

