/**
 * Scroll Animations - LeadGenTax.au
 * Sophisticated scroll-triggered animations
 */

// Scroll Animation Observer
const scrollObserver = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animated');
        }
    });
}, {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
});

// Initialize scroll animations
document.addEventListener('DOMContentLoaded', function() {
    // Add animate-on-scroll class to elements
    const animateElements = document.querySelectorAll('.service-card, .testimonial-card, .case-study-before, .case-study-after, .case-study-testimonial, .stat-item');
    
    animateElements.forEach((element, index) => {
        element.classList.add('animate-on-scroll');
        scrollObserver.observe(element);
    });
});

// Navbar scroll effect
const navbar = document.getElementById('navbar');
let lastScroll = 0;

window.addEventListener('scroll', function() {
    const currentScroll = window.pageYOffset;
    
    if (navbar) {
        if (currentScroll > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
    
    lastScroll = currentScroll;
});

// Parallax Effect for Hero Section - Subtle
const hero = document.querySelector('.hero');
if (hero) {
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop < hero.offsetHeight) {
            const parallaxSpeed = 0.3;
            const yPos = -(scrollTop * parallaxSpeed);
            hero.style.transform = `translateY(${yPos}px)`;
        }
    }, false);
}

// Fade in on load
window.addEventListener('load', function() {
    document.body.classList.add('fade-in');
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href === '#') return;
        
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
            const offsetTop = target.offsetTop - 80; // Account for fixed navbar
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
            
            // Close mobile menu if open
            const navMenu = document.getElementById('navMenu');
            if (navMenu) {
                navMenu.classList.remove('active');
            }
        }
    });
});

// Active nav link highlighting
const currentPath = window.location.pathname;
document.querySelectorAll('.nav-link').forEach(link => {
    const linkPath = link.getAttribute('href');
    if (linkPath === currentPath || (currentPath === '/' && linkPath === '/')) {
        link.style.color = 'var(--gold)';
        link.style.borderBottom = '2px solid var(--gold)';
    }
});
