import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';

// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    offset: 100,
    easing: 'ease-in-out',
});

document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Sticky navbar
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // Image Slider Functionality
    const slideRadios = document.querySelectorAll('.slide-radio');
    const slideDots = document.querySelectorAll('.slide-dot');
    let currentSlide = 0;
    const totalSlides = slideRadios.length;

    // Auto-play slider
    function nextSlide() {
        if (totalSlides > 0) {
            currentSlide = (currentSlide + 1) % totalSlides;
            slideRadios[currentSlide].checked = true;
            updateSlidePosition();
        }
    }

    function updateSlidePosition() {
        const slidesContainer = document.querySelector('.slides-container');
        if (slidesContainer) {
            slidesContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        // Update active dot
        slideDots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.style.backgroundColor = '#fff';
            } else {
                dot.style.backgroundColor = '#374151';
            }
        });
    }

    // Add click handlers to dots
    slideDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            slideRadios[currentSlide].checked = true;
            updateSlidePosition();
        });
    });

    // Add change handlers to radio buttons
    slideRadios.forEach((radio, index) => {
        radio.addEventListener('change', () => {
            if (radio.checked) {
                currentSlide = index;
                updateSlidePosition();
            }
        });
    });

    // Auto-play every 5 seconds
    if (totalSlides > 0) {
        setInterval(nextSlide, 5000);
        updateSlidePosition();
    }
});
