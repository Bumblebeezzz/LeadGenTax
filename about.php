<?php
/**
 * About Page - LeadGenTax
 */
require_once __DIR__ . '/includes/config.php';

$page_title = 'About Us - ' . SITE_NAME;
$page_description = 'Learn about LeadGenTax and how we help accounting firms grow with AI-powered marketing solutions.';

include TEMPLATES_PATH . '/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-content">
            <h1 class="page-title">About Us</h1>
            <p class="page-subtitle">Transforming accounting practices through innovative marketing solutions</p>
        </div>
    </section>

    <!-- About Content -->
    <section class="section">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto;">
                <h2 class="section-title" style="text-align: left; margin-bottom: 40px;">Our Mission</h2>
                <p style="font-size: 18px; line-height: 1.8; color: var(--text-light); margin-bottom: 40px;">
                    At LeadGenTax, we understand that accounting firms face unique challenges in today's competitive market. 
                    Our mission is to provide cutting-edge marketing solutions that help practices grow sustainably while 
                    maintaining the highest standards of professionalism.
                </p>
                <p style="font-size: 18px; line-height: 1.8; color: var(--text-light); margin-bottom: 40px;">
                    We combine artificial intelligence, data-driven strategies, and proven marketing techniques to deliver 
                    results that matter. Every solution is tailored to the specific needs of accounting professionals, ensuring 
                    maximum ROI and client satisfaction.
                </p>
                <p style="font-size: 18px; line-height: 1.8; color: var(--text-light); margin-bottom: 60px;">
                    Our commitment extends beyond just delivering services—we build long-term partnerships with accounting firms, 
                    providing ongoing support, strategic guidance, and continuous optimization to ensure sustained growth. 
                    We believe that every accounting practice deserves access to enterprise-level marketing tools and expertise, 
                    regardless of size, and we're dedicated to making that vision a reality.
                </p>

                <h2 class="section-title" style="text-align: left; margin-bottom: 40px; font-size: 36px;">Why Choose LeadGenTax</h2>
                <div style="display: grid; gap: 30px; margin-bottom: 60px;">
                    <div style="padding: 30px; border-left: 4px solid var(--gold); background: var(--silver-bg);">
                        <h3 style="font-family: 'Playfair Display', serif; font-size: 24px; color: var(--black); margin-bottom: 12px;">Proven Track Record</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">220+ accounting firms trust us with their marketing. Our clients see an average ROI of 3x within the first year, with 98% client retention rate. We've generated over $2.5 million in additional revenue for our clients combined.</p>
                    </div>
                    <div style="padding: 30px; border-left: 4px solid var(--gold); background: var(--silver-bg);">
                        <h3 style="font-family: 'Playfair Display', serif; font-size: 24px; color: var(--black); margin-bottom: 12px;">AI-Powered Solutions</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">We leverage the latest AI technology including ElevenLabs for voice, n8n for automation, and advanced chatbots to automate routine tasks. This allows you to focus on what you do best—serving your clients—while we handle lead generation, appointment booking, and customer inquiries 24/7.</p>
                    </div>
                    <div style="padding: 30px; border-left: 4px solid var(--gold); background: var(--silver-bg);">
                        <h3 style="font-family: 'Playfair Display', serif; font-size: 24px; color: var(--black); margin-bottom: 12px;">Dedicated Support</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">Our team of marketing experts is always available to help you succeed. We're not just a service provider—we're your growth partner. From initial setup to ongoing optimization, you'll have direct access to your dedicated account manager who understands your practice's unique needs.</p>
                    </div>
                    <div style="padding: 30px; border-left: 4px solid var(--gold); background: var(--silver-bg);">
                        <h3 style="font-family: 'Playfair Display', serif; font-size: 24px; color: var(--black); margin-bottom: 12px;">Industry Expertise</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">We specialize exclusively in accounting firm marketing. Our deep understanding of the accounting industry, compliance requirements, and client acquisition challenges means we create campaigns that resonate with your target audience and comply with professional standards.</p>
                    </div>
                    <div style="padding: 30px; border-left: 4px solid var(--gold); background: var(--silver-bg);">
                        <h3 style="font-family: 'Playfair Display', serif; font-size: 24px; color: var(--black); margin-bottom: 12px;">Transparent Reporting</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">You'll receive detailed monthly reports showing exactly how your marketing investment is performing. We track leads, appointments, conversions, and ROI, giving you complete visibility into your marketing results. No hidden fees, no surprises—just clear, actionable insights.</p>
                    </div>
                    <div style="padding: 30px; border-left: 4px solid var(--gold); background: var(--silver-bg);">
                        <h3 style="font-family: 'Playfair Display', serif; font-size: 24px; color: var(--black); margin-bottom: 12px;">Scalable Solutions</h3>
                        <p style="color: var(--text-light); line-height: 1.8;">Whether you're a solo practitioner or a multi-partner firm, our solutions scale with your practice. Start with our 14-day free trial, then choose the plan that matches your growth stage. As your practice expands, we're here to support your continued success with advanced features and dedicated resources.</p>
                    </div>
                </div>

                <div style="text-align: center; padding: 60px 0; border-top: 1px solid var(--silver-light);">
                    <h2 class="section-title" style="font-size: 36px; margin-bottom: 20px;">Ready to Grow Your Practice?</h2>
                    <p style="font-size: 18px; color: var(--text-light); margin-bottom: 40px;">Start with a free 14-day audit and discover how we can help you achieve your growth goals.</p>
                    <a href="/audit" class="btn cta-button">Get Free Audit →</a>
                </div>
            </div>
        </div>
    </section>

<?php include TEMPLATES_PATH . '/footer.php'; ?>

