<?php
/**
 * Testimonials Page - TaxPro.au
 */
require_once __DIR__ . '/includes/config.php';

$page_title = 'Testimonials - ' . SITE_NAME;
$page_description = 'Read what accounting firms across Australia say about TaxPro.au and our marketing solutions.';

include TEMPLATES_PATH . '/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-content">
            <h1 class="page-title">Testimonials</h1>
            <p class="page-subtitle">Trusted by accounting firms across Australia</p>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="testimonials-section">
        <div class="container">
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-text">TaxPro.au transformed our practice. The AI receptionist alone has saved us 15 hours per week, and the Google Ads campaigns are bringing in high-quality leads consistently. We've seen a 200% increase in new clients since implementing their solution.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">JD</div>
                        <div class="testimonial-info">
                            <p class="testimonial-name">James Davidson</p>
                            <p class="testimonial-role">Principal, Davidson Tax Services</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-text">We've seen a 250% increase in new client inquiries since implementing their marketing solution. The ROI is incredible, and the support team is always responsive. Best decision we made for our firm's growth.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">LM</div>
                        <div class="testimonial-info">
                            <p class="testimonial-name">Lisa Morgan</p>
                            <p class="testimonial-role">Director, Morgan Accounting Group</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-text">Best investment we've made for our firm. The website looks professional, the AI handles calls perfectly, and we're getting more qualified leads than ever before. The team at TaxPro.au truly understands our business.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">RW</div>
                        <div class="testimonial-info">
                            <p class="testimonial-name">Robert Williams</p>
                            <p class="testimonial-role">Founder, Williams & Co Accountants</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-text">The AI receptionist is a game-changer. It never misses a call, books appointments accurately, and our clients can't tell the difference. Combined with the Google Ads campaigns, we're seeing steady growth month over month.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">SM</div>
                        <div class="testimonial-info">
                            <p class="testimonial-name">Sarah Mitchell</p>
                            <p class="testimonial-role">Partner, Mitchell & Associates</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-text">Professional, reliable, and results-driven. TaxPro.au helped us modernize our marketing approach without breaking the bank. The monthly reports keep us informed, and the ROI speaks for itself.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">PT</div>
                        <div class="testimonial-info">
                            <p class="testimonial-name">Paul Thompson</p>
                            <p class="testimonial-role">Managing Partner, Thompson & Partners</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-text">We were skeptical about AI at first, but TaxPro.au proved us wrong. The receptionist handles everything perfectly, and we've freed up significant time to focus on client work. Highly recommended.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">AC</div>
                        <div class="testimonial-info">
                            <p class="testimonial-name">Amanda Chen</p>
                            <p class="testimonial-role">Director, Chen Accounting Solutions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section section-dark">
        <div class="container" style="text-align: center;">
            <h2 class="section-title">Join Our Success Stories</h2>
            <p class="section-subtitle">See what TaxPro.au can do for your accounting practice</p>
            <a href="/contact" class="cta-button" style="margin-top: 40px;">Get Your Free Audit</a>
        </div>
    </section>

<?php include TEMPLATES_PATH . '/footer.php'; ?>

