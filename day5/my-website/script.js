console.log("Javascript was loaded");
const slides = document.querySelectorAll('.slide');
const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');

let currentSlide = 0;

nextBtn.addEventListener('click', () => {
    console.log("Next Button was clicked");
    slides[currentSlide].classList.remove('current');
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('current');
});

prevBtn.addEventListener('click', () => {
    console.log("Previous Button was clicked");
    slides[currentSlide].classList.remove('current');
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    slides[currentSlide].classList.add('current');
});