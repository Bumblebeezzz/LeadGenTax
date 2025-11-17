<?php
/**
 * Case Studies Page - LeadGenTax.au
 */
require_once __DIR__ . '/includes/config.php';

$page_title = 'Case Studies - ' . SITE_NAME;
$page_description = 'Real results from real accounting firms. See how LeadGenTax.au helped practices achieve significant growth.';

include TEMPLATES_PATH . '/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-content">
            <h1 class="page-title">Case Studies</h1>
            <p class="page-subtitle">Real results from real accounting firms</p>
        </div>
    </section>

    <!-- Main Case Study -->
    <section class="case-study-section section-dark">
        <div class="container">
            <h2 class="section-title"><strong>Mitchell & Associates</strong></h2>
            <p class="section-subtitle">+318% Leads in 90 Days</p>
            <div class="case-study-content">
                <div class="case-study-before">
                    <h3>Before</h3>
                    <div class="case-study-stats">
                        <div class="case-stat">
                            <span class="case-stat-number">12</span>
                            <span class="case-stat-label">Leads/Month</span>
                        </div>
                        <div class="case-stat">
                            <span class="case-stat-number">3</span>
                            <span class="case-stat-label">Appointments/Month</span>
                        </div>
                        <div class="case-stat">
                            <span class="case-stat-number">$0</span>
                            <span class="case-stat-label">Marketing Budget</span>
                        </div>
                    </div>
                </div>
                <div class="case-study-arrow">→</div>
                <div class="case-study-after">
                    <h3>After 90 Days</h3>
                    <div class="case-study-stats">
                        <div class="case-stat highlight">
                            <span class="case-stat-number">50</span>
                            <span class="case-stat-label">Leads/Month</span>
                            <span class="case-stat-change">+318%</span>
                        </div>
                        <div class="case-stat highlight">
                            <span class="case-stat-number">15</span>
                            <span class="case-stat-label">Appointments/Month</span>
                            <span class="case-stat-change">+400%</span>
                        </div>
                        <div class="case-stat highlight">
                            <span class="case-stat-number">$2,500</span>
                            <span class="case-stat-label">Monthly Revenue</span>
                            <span class="case-stat-change">New</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="case-study-testimonial">
                <p class="testimonial-quote">"The results exceeded our expectations. We're now booking more appointments than we can handle. The AI receptionist alone has transformed how we operate, and the Google Ads campaigns are bringing in exactly the type of clients we want to work with."</p>
                <p class="testimonial-author">— Sarah Mitchell, Partner at <strong>Mitchell & Associates</strong></p>
            </div>
        </div>
    </section>

    <!-- 3-Month Results Table -->
    <section class="section section-dark">
        <div class="container">
            <h2 class="section-title">Expected Results - First 3 Months</h2>
            <p class="section-subtitle">Typical progression for accounting firms using our complete solution</p>
            <div style="max-width: 1000px; margin: 0 auto; overflow-x: auto;">
                <table class="results-table">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Leads</th>
                            <th>Appointments</th>
                            <th>Clients Signed</th>
                            <th>Revenue Generated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Month 1</strong></td>
                            <td>15-20</td>
                            <td>8-12</td>
                            <td>3-5</td>
                            <td><strong>$9,000 - $15,000</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Month 2</strong></td>
                            <td>25-35</td>
                            <td>12-18</td>
                            <td>5-8</td>
                            <td><strong>$15,000 - $24,000</strong></td>
                        </tr>
                        <tr class="highlight-row">
                            <td><strong>Month 3</strong></td>
                            <td>35-45</td>
                            <td>18-25</td>
                            <td>8-12</td>
                            <td><strong>$24,000 - $36,000</strong></td>
                        </tr>
                    </tbody>
                </table>
                <div style="text-align: center; margin-top: 40px; padding: 30px; background: rgba(212, 175, 55, 0.1); border-left: 4px solid var(--gold);">
                    <p style="font-size: 20px; color: var(--gold); font-weight: 600; margin-bottom: 10px;">Average ROI: 3.5x</p>
                    <p style="color: var(--silver); font-size: 16px;">98% client retention rate</p>
                </div>
                <div style="text-align: center; margin-top: 30px;">
                    <a href="/contact" class="cta-button" style="background: #FF6B35; border-color: #FF6B35; color: var(--white); padding: 18px 40px; font-size: 16px; font-weight: 600;">🚀 Start Your 318% Growth → Free Audit</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Case Studies -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">More Success Stories</h2>
            <div style="display: grid; gap: 40px; max-width: 1000px; margin: 0 auto;">
                <div style="padding: 50px; background: var(--silver-bg); border-left: 4px solid var(--gold);">
                    <h3 style="font-family: 'Playfair Display', serif; font-size: 28px; color: var(--black); margin-bottom: 20px;"><strong>Davidson Tax Services</strong></h3>
                    <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 20px;">
                        A mid-size practice in Sydney saw a 250% increase in new client inquiries within 6 months. 
                        The combination of our AI receptionist and optimized website resulted in a fully booked calendar.
                    </p>
                    <p style="color: var(--gold); font-weight: 600;">Results: 250% increase in inquiries | 6 months</p>
                </div>
                <div style="padding: 50px; background: var(--silver-bg); border-left: 4px solid var(--gold);">
                    <h3 style="font-family: 'Playfair Display', serif; font-size: 28px; color: var(--black); margin-bottom: 20px;"><strong>Morgan Accounting Group</strong></h3>
                    <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 20px;">
                        This boutique firm needed to scale without hiring additional staff. Our AI receptionist solution 
                        allowed them to handle 3x more calls while maintaining the personal touch their clients expect.
                    </p>
                    <p style="color: var(--gold); font-weight: 600;">Results: 3x call capacity | No additional staff needed</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section section-dark">
        <div class="container" style="text-align: center;">
            <h2 class="section-title">Ready to Write Your Success Story?</h2>
            <p class="section-subtitle">Join 220+ accounting firms that trust LeadGenTax.au</p>
            <a href="/contact" class="cta-button" style="margin-top: 40px;">Get Your Free Audit</a>
        </div>
    </section>

<?php include TEMPLATES_PATH . '/footer.php'; ?>

