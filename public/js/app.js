document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slide');
    if (slides.length === 0) return;
    let currentSlide = 0;
    
    function showSlide(index) {
        slides.forEach(slide => {
            slide.classList.remove('active');
        });
        slides[index].classList.add('active');
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }
    
    // Show first slide immediately
    showSlide(0);
    
    // Start slideshow
    setInterval(nextSlide, 2500);
});
