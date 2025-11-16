<?php
/**
 * Home Page - TaxPro.au
 */
require_once __DIR__ . '/includes/config.php';

$page_title = SITE_NAME . ' - Marketing for Accounting Firms | +25 Appointments/Year';
$page_description = 'AI Receptionist 24/7 + Google Ads + Optimized Website. Generate +25 appointments per year for your accounting firm. Free 14-day audit.';

include TEMPLATES_PATH . '/header.php';
?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">
                +25 Qualified Appointments<br>
                <span class="accent">Per Year for Your Accounting Firm</span>
            </h1>
            <p class="hero-subtitle">AI Receptionist 24/7 · Google Ads · Conversion-Optimized Website</p>
            <div class="hero-cta">
                <a href="/contact" class="cta-button cta-primary">Start 14-Day Free Trial</a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number" data-target="220">0</span>
                    <span class="stat-plus">+</span>
                    <p class="stat-label">Firms Served</p>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-target="98">0</span>
                    <span class="stat-percent">%</span>
                    <p class="stat-label">Client Retention</p>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-target="3">0</span>
                    <span class="stat-x">x</span>
                    <p class="stat-label">Average ROI</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Ads Management Section -->
    <section class="services-section">
        <div class="container">
            <h2 class="section-title">Google Ads Management</h2>
            <p class="section-subtitle">Targeted campaigns that bring qualified leads to your practice</p>
            
            <!-- Free Audit Notice - Premium Design -->
            <div style="background: linear-gradient(135deg, rgba(212, 175, 55, 0.15) 0%, rgba(212, 175, 55, 0.05) 50%, rgba(192, 192, 192, 0.1) 100%); border: 3px solid var(--gold); padding: 50px 40px; margin: 50px 0; text-align: center; position: relative; overflow: hidden; box-shadow: 0 20px 60px rgba(212, 175, 55, 0.2), inset 0 0 50px rgba(212, 175, 55, 0.05); max-width: 1100px; margin-left: auto; margin-right: auto;">
                <!-- Decorative Elements -->
                <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(212, 175, 55, 0.2) 0%, transparent 70%); border-radius: 50%;"></div>
                <div style="position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: radial-gradient(circle, rgba(192, 192, 192, 0.15) 0%, transparent 70%); border-radius: 50%;"></div>
                
                <!-- Badge -->
                <div style="position: absolute; top: 20px; right: 20px; background: var(--gold); color: var(--black); padding: 8px 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-family: 'Lora', serif; transform: rotate(5deg); box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);">
                    FREE BONUS
                </div>
                
                <!-- Main Content -->
                <div style="position: relative; z-index: 1;">
                    <div style="font-size: 56px; margin-bottom: 20px; filter: drop-shadow(0 4px 8px rgba(212, 175, 55, 0.3));">✨</div>
                    <h3 style="font-family: 'Playfair Display', serif; font-size: 36px; color: var(--gold); margin-bottom: 20px; text-shadow: 0 2px 10px rgba(212, 175, 55, 0.3); letter-spacing: -0.5px;">
                        Free 14-Day Website Audit Included
                    </h3>
                    <p style="color: var(--text-dark); font-size: 18px; line-height: 1.9; margin-bottom: 40px; max-width: 800px; margin-left: auto; margin-right: auto; font-weight: 400;">
                        With our <strong style="color: var(--gold);">14-Day Free Trial</strong>, we provide a comprehensive, in-depth audit of your existing website (if applicable). 
                        Our expert analysis reveals your site's strengths and weaknesses across multiple performance matrices, giving you a complete understanding of your current digital presence.
                    </p>
                    
                    <!-- Two Column Grid -->
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; margin-top: 40px; text-align: left; max-width: 900px; margin-left: auto; margin-right: auto;">
                        <!-- Analysis Matrices -->
                        <div style="background: rgba(255, 255, 255, 0.6); padding: 30px; border-left: 4px solid var(--gold); border-radius: 8px; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08); backdrop-filter: blur(10px);">
                            <div style="display: flex; align-items: center; margin-bottom: 20px;">
                                <div style="font-size: 32px; margin-right: 12px;">📊</div>
                                <p style="color: var(--black); font-weight: 700; font-size: 18px; margin: 0; font-family: 'Playfair Display', serif;">Analysis Matrices</p>
                            </div>
                            <ul style="color: var(--text-dark); font-size: 15px; line-height: 2.2; list-style: none; padding: 0; margin: 0;">
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>Overall Score</span>
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>Business Details Score</span>
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>Techno Stack Score</span>
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>Listings Score</span>
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>Website Performance</span>
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>SEO Analysis</span>
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>Online Reputation Score</span>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Management Tools -->
                        <div style="background: rgba(255, 255, 255, 0.6); padding: 30px; border-left: 4px solid var(--gold); border-radius: 8px; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08); backdrop-filter: blur(10px);">
                            <div style="display: flex; align-items: center; margin-bottom: 20px;">
                                <div style="font-size: 32px; margin-right: 12px;">🔧</div>
                                <p style="color: var(--black); font-weight: 700; font-size: 18px; margin: 0; font-family: 'Playfair Display', serif;">Management Tools</p>
                            </div>
                            <ul style="color: var(--text-dark); font-size: 15px; line-height: 2.2; list-style: none; padding: 0; margin: 0;">
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>Google Tag Manager</span>
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>Google Analytics Pixel</span>
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>Google Ads Pixel</span>
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <span style="color: var(--gold); font-weight: 700; margin-right: 10px; font-size: 18px;">✓</span>
                                    <span>Google Ads Setup</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- CTA -->
                    <div style="margin-top: 40px;">
                        <a href="/contact" class="cta-button" style="display: inline-block; padding: 18px 40px; font-size: 16px; font-weight: 600; letter-spacing: 1px; box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);">
                            Claim Your Free Audit
                        </a>
                    </div>
                </div>
            </div>

            <!-- Three Google Ads Plans -->
            <div class="services-grid" style="grid-template-columns: repeat(3, 1fr); gap: 30px; margin-top: 60px;">
                <!-- 14-Day Free Trial -->
                <div class="service-card featured-service">
                    <div class="service-icon" style="font-size: 48px; margin-bottom: 20px;">📊</div>
                    <h3 class="service-title">14-Day Free Trial</h3>
                    <p class="service-description">
                        Start with zero risk. Pay only for Google Ads clicks—no setup or management fees. Perfect for testing our services and seeing real results.
                    </p>
                    <ul class="service-features-list">
                        <li>✓ Complete Google Ads setup</li>
                        <li>✓ Intent-based keywords</li>
                        <li>✓ Negative keyword lists</li>
                        <li>✓ Daily bid optimization</li>
                        <li>✓ Exclusive suburb targeting</li>
                        <li>✓ 14-day performance report</li>
                        <li>✓ Free website audit (if applicable)</li>
                        <li>✓ Typical budget: $30-50/day</li>
                    </ul>
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="/services#google-ads" class="cta-button">View Pricing & Details</a>
                    </div>
                </div>

                <!-- Starter -->
                <div class="service-card featured-service">
                    <div class="service-icon" style="font-size: 48px; margin-bottom: 20px;">🚀</div>
                    <h3 class="service-title">Starter</h3>
                    <p class="service-description">
                        Ideal for practices with $1k-3k/month ad spend. Includes all trial features plus bi-weekly optimization and dedicated support.
                    </p>
                    <div style="background: rgba(212, 175, 55, 0.1); padding: 15px; margin: 20px 0; border-left: 3px solid var(--gold);">
                        <p style="color: var(--gold); font-weight: 600; font-size: 14px; margin: 0; text-align: center;">
                            Starts after 2 weeks free trial (no strings attached)
                        </p>
                    </div>
                    <ul class="service-features-list">
                        <li>✓ All trial features included</li>
                        <li>✓ Bi-weekly optimization</li>
                        <li>✓ Monthly performance reports</li>
                        <li>✓ Email & phone support</li>
                        <li>✓ Call tracking integration</li>
                        <li>✓ Landing page analysis</li>
                    </ul>
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="/services#google-ads" class="cta-button">View Pricing & Details</a>
                    </div>
                </div>

                <!-- Growth -->
                <div class="service-card featured-service">
                    <div class="service-icon" style="font-size: 48px; margin-bottom: 20px;">⭐</div>
                    <h3 class="service-title">Growth</h3>
                    <p class="service-description">
                        For practices with $3k-8k/month ad spend. Includes daily optimization, Performance Max campaigns, and a dedicated account manager.
                    </p>
                    <ul class="service-features-list">
                        <li>✓ All Starter features</li>
                        <li>✓ Daily optimization</li>
                        <li>✓ Performance Max campaigns</li>
                        <li>✓ A/B testing & experiments</li>
                        <li>✓ Priority support</li>
                        <li>✓ Dedicated account manager</li>
                        <li>✓ AI Agents available</li>
                    </ul>
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="/services#google-ads" class="cta-button">View Pricing & Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Website Development Section -->
    <section class="section section-dark">
        <div class="container">
            <h2 class="section-title">Website Development & Optimization</h2>
            <p class="section-subtitle">Professional websites designed to convert visitors into clients</p>
            <div style="max-width: 1000px; margin: 0 auto;">
                <div style="background: var(--black-light); padding: 50px; border: 2px solid var(--gold); margin-bottom: 40px;">
                    <h3 style="font-family: 'Playfair Display', serif; font-size: 28px; color: var(--gold); margin-bottom: 20px; text-align: center;">Why Your Accounting Firm Needs a Professional Website</h3>
                    <p style="color: var(--silver-light); line-height: 1.8; margin-bottom: 30px; text-align: center;">
                        A well-designed website is your firm's digital storefront. It's often the first impression potential clients have of your practice. 
                        Our websites are built specifically for accounting firms, with conversion-focused design, SEO optimization, and seamless lead capture.
                    </p>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-top: 40px;">
                        <div style="text-align: center;">
                            <div style="font-size: 36px; margin-bottom: 10px;">📱</div>
                            <h4 style="color: var(--gold); font-weight: 600; margin-bottom: 10px;">Mobile-First</h4>
                            <p style="color: var(--silver); font-size: 14px;">Responsive design that looks perfect on all devices</p>
                        </div>
                        <div style="text-align: center;">
                            <div style="font-size: 36px; margin-bottom: 10px;">🔍</div>
                            <h4 style="color: var(--gold); font-weight: 600; margin-bottom: 10px;">SEO Optimized</h4>
                            <p style="color: var(--silver); font-size: 14px;">Schema markup and optimization for local search</p>
                        </div>
                        <div style="text-align: center;">
                            <div style="font-size: 36px; margin-bottom: 10px;">⚡</div>
                            <h4 style="color: var(--gold); font-weight: 600; margin-bottom: 10px;">Fast Loading</h4>
                            <p style="color: var(--silver); font-size: 14px;">Optimized performance for better user experience</p>
                        </div>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 40px;">
                    <a href="/services#website-development" class="cta-button">View Website Packages & Pricing</a>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Response Services Section -->
    <section class="services-section">
        <div class="container">
            <h2 class="section-title">AI Response Services</h2>
            <p class="section-subtitle">24/7 automated customer support and lead qualification</p>
            <div class="services-grid" style="grid-template-columns: repeat(2, 1fr);">
                <!-- Website AI Agent -->
                <div class="service-card featured-service">
                    <div class="service-icon">🤖</div>
                    <h3 class="service-title">Website AI Agent</h3>
                    <p class="service-description">
                        Intelligent chatbot that answers customer questions, books meetings, and qualifies leads 24/7 on your website. Never miss an opportunity with automated customer support that works around the clock.
                    </p>
                    <ul class="service-features-list">
                        <li>✓ 24/7 automated customer support and lead qualification</li>
                        <li>✓ Automatic meeting booking and calendar integration</li>
                        <li>✓ Human handoff option for complex queries or emergencies</li>
                        <li>✓ Multi-language support (EN, FR, ES, ZH, RU)</li>
                        <li>✓ Custom training on your products, services, and FAQs</li>
                    </ul>
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="/services#ai-agents" class="cta-button">View Pricing & Details</a>
                    </div>
                </div>

                <!-- Phone AI Agent -->
                <div class="service-card featured-service">
                    <div class="service-icon">📞</div>
                    <h3 class="service-title">Phone AI Agent</h3>
                    <p class="service-description">
                        AI-powered virtual receptionist that answers calls, answers questions, and books appointments outside business hours. Ensure every call is answered professionally, even when your office is closed.
                    </p>
                    <ul class="service-features-list">
                        <li>✓ 24/7 call answering outside business hours</li>
                        <li>✓ Natural conversation and customer question handling</li>
                        <li>✓ Automatic appointment booking and scheduling</li>
                        <li>✓ Human transfer option for emergencies or complex requests</li>
                        <li>✓ Call recording and analytics dashboard</li>
                    </ul>
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="/services#ai-agents" class="cta-button">View Pricing & Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Study Preview -->
    <section class="case-study-section section-dark">
        <div class="container">
            <h2 class="section-title">Case Study</h2>
            <p class="section-subtitle">Real results from a real accounting firm</p>
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
            <div style="text-align: center; margin-top: 60px;">
                <a href="/case-studies" class="cta-button">View Full Case Study</a>
            </div>
        </div>
    </section>


    <!-- Testimonials Preview -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-subtitle">Trusted by accounting firms across Australia</p>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-text">TaxPro.au transformed our practice. The AI receptionist alone has saved us 15 hours per week, and the Google Ads campaigns are bringing in high-quality leads consistently.</p>
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
                    <p class="testimonial-text">We've seen a 250% increase in new client inquiries since implementing their marketing solution. The ROI is incredible, and the support team is always responsive.</p>
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
                    <p class="testimonial-text">Best investment we've made for our firm. The website looks professional, the AI handles calls perfectly, and we're getting more qualified leads than ever before.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">RW</div>
                        <div class="testimonial-info">
                            <p class="testimonial-name">Robert Williams</p>
                            <p class="testimonial-role">Founder, Williams & Co Accountants</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 60px;">
                <a href="/testimonials" class="cta-button">Read More Testimonials</a>
            </div>
        </div>
    </section>

<?php include TEMPLATES_PATH . '/footer.php'; ?>
