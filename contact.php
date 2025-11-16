<?php
/**
 * Contact Page - TaxPro.au
 */
require_once __DIR__ . '/includes/config.php';

$page_title = 'Contact Us - ' . SITE_NAME;
$page_description = 'Get in touch with TaxPro.au for a free 14-day audit. Discover how we can help your accounting firm grow.';

include TEMPLATES_PATH . '/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-content">
            <h1 class="page-title">Get Your Free Audit</h1>
            <p class="page-subtitle">Discover how we can help your accounting firm achieve +25 appointments per year</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto;">
                <div style="text-align: center; margin-bottom: 60px;">
                    <h2 class="section-title" style="color: var(--gold); font-size: 36px;">Request Your Free 14-Day Audit</h2>
                    <p class="section-subtitle" style="color: var(--silver);">Fill out the form below and we'll get back to you within 24 hours</p>
                </div>
                
                <form id="contact-page-form" class="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="firm_name" placeholder="Firm Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Phone (Optional)">
                    </div>
                    <div class="form-group">
                        <textarea name="message" rows="5" placeholder="Tell us about your practice and goals (Optional)"></textarea>
                    </div>
                    <!-- Honeypot field -->
                    <input type="text" name="website" style="display: none;" tabindex="-1" autocomplete="off">
                    <button type="submit" class="cta-button" style="width: 100%;">Request Free Audit</button>
                    <div id="contact-page-message" class="form-message"></div>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="section">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 60px; max-width: 900px; margin: 0 auto;">
                <div style="text-align: center;">
                    <h3 style="font-family: 'Playfair Display', serif; font-size: 24px; color: var(--black); margin-bottom: 20px;">Email</h3>
                    <p style="color: var(--text-light); font-size: 18px;">
                        <a href="mailto:<?php echo e(CONTACT_EMAIL); ?>" style="color: var(--gold); text-decoration: none;"><?php echo e(CONTACT_EMAIL); ?></a>
                    </p>
                </div>
                <div style="text-align: center;">
                    <h3 style="font-family: 'Playfair Display', serif; font-size: 24px; color: var(--black); margin-bottom: 20px;">Phone</h3>
                    <p style="color: var(--text-light); font-size: 18px;">
                        <a href="tel:<?php echo str_replace(' ', '', CONTACT_PHONE); ?>" style="color: var(--gold); text-decoration: none;"><?php echo e(CONTACT_PHONE); ?></a>
                    </p>
                </div>
            </div>
        </div>
    </section>

<?php include TEMPLATES_PATH . '/footer.php'; ?>

<script>
// Handle contact page form
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-page-form');
    const messageDiv = document.getElementById('contact-page-message');
    
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Sending...';
            
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
                } else {
                    messageDiv.className = 'form-message error';
                    messageDiv.textContent = result.message || 'An error occurred. Please try again.';
                }
            } catch (error) {
                messageDiv.className = 'form-message error';
                messageDiv.textContent = 'Network error. Please check your connection and try again.';
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });
    }
});
</script>

