/**
 * Main JavaScript - LeadGenTax.au
 * Pop-up, form handling, animated stats
 */

// Mobile Navigation Toggle
document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (navToggle) {
        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!navToggle.contains(event.target) && !navMenu.contains(event.target)) {
            navMenu.classList.remove('active');
        }
    });
});

// Contact Pop-up (appears after 10 seconds - only on home page)
let popupShown = false;
const currentPath = window.location.pathname;
const isHomePage = currentPath === '/' || currentPath === '/index.php' || currentPath === '';

if (isHomePage) {
    setTimeout(function() {
        if (!popupShown) {
            const popup = document.getElementById('contact-popup');
            if (popup) {
                popup.classList.add('show');
                popupShown = true;
            }
        }
    }, 10000);
}

// Close Pop-up
const popupClose = document.getElementById('popupClose');
if (popupClose) {
    popupClose.addEventListener('click', function() {
        const popup = document.getElementById('contact-popup');
        if (popup) {
            popup.classList.remove('show');
        }
    });
}

// Close pop-up when clicking outside
document.addEventListener('click', function(event) {
    const popup = document.getElementById('contact-popup');
    if (popup && event.target === popup) {
        popup.classList.remove('show');
    }
});

// Animated Stats Counter
function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const timer = setInterval(function() {
        current += increment;
        if (current >= target) {
            element.textContent = Math.floor(target);
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

// Initialize stats animation on scroll
const statsObserver = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
            const statNumber = entry.target.querySelector('.stat-number');
            if (statNumber) {
                const target = parseInt(statNumber.getAttribute('data-target'));
                animateCounter(statNumber, target);
                entry.target.classList.add('counted');
            }
        }
    });
}, { threshold: 0.5 });

document.addEventListener('DOMContentLoaded', function() {
    const statItems = document.querySelectorAll('.stat-item');
    statItems.forEach(item => {
        statsObserver.observe(item);
    });
});

// Form Submission Handler
function handleFormSubmit(formId, messageId) {
    const form = document.getElementById(formId);
    const messageDiv = document.getElementById(messageId);
    
    if (!form) return;
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;
        submitButton.disabled = true;
        submitButton.classList.add('loading');
        submitButton.textContent = 'Sending...';
        
        // Get form data
        const formData = new FormData(form);
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        
        try {
            const response = await fetch('/api/contact.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(data)
            });
            
            const result = await response.json();
            
            if (result.success) {
                messageDiv.className = 'form-message success';
                messageDiv.textContent = result.message || 'Thank you! We will contact you within 24 hours.';
                form.reset();
                
                // Hide popup if it's the popup form
                if (formId === 'popup-contact-form') {
                    setTimeout(function() {
                        const popup = document.getElementById('contact-popup');
                        if (popup) {
                            popup.classList.remove('show');
                        }
                    }, 2000);
                }
            } else {
                messageDiv.className = 'form-message error';
                messageDiv.textContent = result.message || 'An error occurred. Please try again.';
            }
        } catch (error) {
            messageDiv.className = 'form-message error';
            messageDiv.textContent = 'Network error. Please check your connection and try again.';
        } finally {
            submitButton.disabled = false;
            submitButton.classList.remove('loading');
            submitButton.textContent = originalText;
        }
    });
}

// Initialize form handlers
document.addEventListener('DOMContentLoaded', function() {
    handleFormSubmit('footer-contact-form', 'form-message');
    handleFormSubmit('popup-contact-form', 'popup-form-message');
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href === '#') return;
        
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            
            // Close mobile menu if open
            const navMenu = document.getElementById('navMenu');
            if (navMenu) {
                navMenu.classList.remove('active');
            }
        }
    });
});

