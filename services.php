<?php
/**
 * Services Page - TaxPro.au
 */
require_once __DIR__ . '/includes/config.php';

$page_title = 'Our Services - ' . SITE_NAME;
$page_description = 'Comprehensive marketing solutions for accounting firms: Google Ads Management, Website Development, and AI Agents.';

include TEMPLATES_PATH . '/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="page-header-content">
            <h1 class="page-title">Our Services</h1>
            <p class="page-subtitle">Comprehensive marketing solutions designed to grow your accounting practice</p>
        </div>
    </section>

    <!-- Google Ads Management Section -->
    <section id="google-ads" class="services-section">
        <div class="container">
            <h2 class="section-title">Google Ads Management</h2>
            <p class="section-subtitle">Targeted campaigns that bring qualified leads to your practice</p>
            
            <!-- Free Audit Notice - Premium Design -->
            <div style="background: linear-gradient(135deg, rgba(212, 175, 55, 0.15) 0%, rgba(212, 175, 55, 0.05) 50%, rgba(192, 192, 192, 0.1) 100%); border: 3px solid var(--gold); padding: 50px 40px; margin: 50px 0; text-align: center; position: relative; overflow: hidden; box-shadow: 0 20px 60px rgba(212, 175, 55, 0.2), inset 0 0 50px rgba(212, 175, 55, 0.05);">
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

            <!-- Google Ads Pricing Cards -->
            <div class="pricing-grid" style="background: transparent; margin-top: 60px;">
                <div class="pricing-card" style="background: var(--white); border: 2px solid rgba(212, 175, 55, 0.3);">
                    <div class="pricing-badge" style="background: var(--gold); color: var(--black);">Most Popular</div>
                    <h3 class="pricing-title" style="color: var(--black);">14-Day Free Trial</h3>
                    <div class="pricing-price">
                        <span class="price-amount" style="color: var(--gold);">$0</span>
                        <span class="price-period" style="color: var(--black);">Setup Fee</span>
                    </div>
                    <p class="pricing-description" style="color: var(--black) !important;">Pay only for Google Ads clicks. No setup or management fees.</p>
                    <ul class="pricing-features" style="color: var(--black) !important;">
                        <li style="color: var(--black) !important;">✓ Complete Google Ads setup</li>
                        <li style="color: var(--black) !important;">✓ Intent-based keywords</li>
                        <li style="color: var(--black) !important;">✓ Negative keyword lists</li>
                        <li style="color: var(--black) !important;">✓ Daily bid optimization</li>
                        <li style="color: var(--black) !important;">✓ Exclusive suburb targeting</li>
                        <li style="color: var(--black) !important;">✓ 14-day performance report</li>
                        <li style="color: var(--black) !important;">✓ Typical budget: $30-50/day</li>
                        <li style="color: var(--black) !important;">✓ Free website audit (if applicable)</li>
                    </ul>
                    <a href="/contact" class="cta-button" style="width: 100%; margin-top: 30px;">Start Free Trial</a>
                </div>
                
                <div class="pricing-card featured" style="background: var(--white); border: 2px solid var(--gold);">
                    <div class="pricing-badge" style="background: var(--gold); color: var(--black);">Best Value</div>
                    <h3 class="pricing-title" style="color: var(--black);">Starter</h3>
                    <div class="pricing-price">
                        <span class="price-amount" style="color: var(--gold);">$1,000</span>
                        <span class="price-period" style="color: var(--black);">/month</span>
                    </div>
                    <p class="pricing-description" style="color: var(--black) !important;">Ideal for practices with $1k-3k/month ad spend.</p>
                    <div style="background: rgba(212, 175, 55, 0.1); padding: 15px; margin-bottom: 20px; border-left: 3px solid var(--gold);">
                        <p style="color: var(--gold); font-weight: 600; font-size: 14px; margin: 0; text-align: center;">
                            Starts after 2 weeks free trial (no strings attached)
                        </p>
                    </div>
                    <ul class="pricing-features" style="color: var(--black) !important;">
                        <li style="color: var(--black) !important;">✓ All trial features included</li>
                        <li style="color: var(--black) !important;">✓ Bi-weekly optimization</li>
                        <li style="color: var(--black) !important;">✓ Monthly performance reports</li>
                        <li style="color: var(--black) !important;">✓ Email & phone support</li>
                        <li style="color: var(--black) !important;">✓ Call tracking integration</li>
                        <li style="color: var(--black) !important;">✓ Landing page analysis</li>
                    </ul>
                    <a href="/contact" class="cta-button" style="width: 100%; margin-top: 30px;">Get Started</a>
                </div>
                
                <div class="pricing-card" style="background: var(--white); border: 2px solid rgba(212, 175, 55, 0.3);">
                    <div class="pricing-badge" style="background: var(--gold); color: var(--black);">Growth</div>
                    <h3 class="pricing-title" style="color: var(--black);">Growth</h3>
                    <div class="pricing-price">
                        <span class="price-amount" style="color: var(--gold);">$2,000</span>
                        <span class="price-period" style="color: var(--black);">/month</span>
                    </div>
                    <p class="pricing-description" style="color: var(--black) !important;">For practices with $3k-8k/month ad spend.</p>
                    <ul class="pricing-features" style="color: var(--black) !important;">
                        <li style="color: var(--black) !important;">✓ All Starter features</li>
                        <li style="color: var(--black) !important;">✓ Daily optimization</li>
                        <li style="color: var(--black) !important;">✓ Performance Max campaigns</li>
                        <li style="color: var(--black) !important;">✓ A/B testing & experiments</li>
                        <li style="color: var(--black) !important;">✓ Priority support</li>
                        <li style="color: var(--black) !important;">✓ Dedicated account manager</li>
                    </ul>
                    <a href="/contact" class="cta-button" style="width: 100%; margin-top: 30px;">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Website Development Section -->
    <section id="website-development" class="section section-dark">
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

                <div class="services-grid" style="grid-template-columns: repeat(2, 1fr); gap: 40px;">
                    <!-- Essential Package -->
                    <div class="service-card" style="background: var(--black-light); border: 2px solid rgba(212, 175, 55, 0.3);">
                        <div class="service-icon">🌐</div>
                        <h3 class="service-title" style="color: var(--gold);">Essential Website</h3>
                        <div class="service-pricing">
                            <span class="service-price" style="color: var(--gold);">$2,500 AUD</span>
                            <span class="service-price-month" style="color: var(--silver-light);">One-time payment</span>
                        </div>
                        <p class="service-description" style="color: var(--silver-light);">
                            Perfect for small to medium accounting firms looking to establish a professional online presence. 
                            Ideal for 2-5 pages with essential features.
                        </p>
                        <ul class="service-features-list" style="color: var(--white) !important;">
                            <li style="color: var(--white) !important;">✓ 2-5 pages mobile-first design</li>
                            <li style="color: var(--white) !important;">✓ SEO optimization with Schema.org markup</li>
                            <li style="color: var(--white) !important;">✓ Contact form with Google Sheets integration</li>
                            <li style="color: var(--white) !important;">✓ Fast loading times (optimized performance)</li>
                            <li style="color: var(--white) !important;">✓ SSL security certificate included</li>
                            <li style="color: var(--white) !important;">✓ Google Analytics 4 integration</li>
                            <li style="color: var(--white) !important;">✓ 1-month support and maintenance</li>
                            <li style="color: var(--white) !important;">✓ Basic content management system</li>
                        </ul>
                        <a href="/contact" class="cta-button" style="width: 100%; margin-top: 30px;">Request Quote</a>
                    </div>

                    <!-- Professional Package -->
                    <div class="service-card featured-service" style="background: var(--black-light); border: 2px solid var(--gold);">
                        <div class="service-icon">🌐</div>
                        <h3 class="service-title" style="color: var(--gold);">Professional Website</h3>
                        <div class="service-pricing">
                            <span class="service-price" style="color: var(--gold);">Custom Pricing</span>
                            <span class="service-price-month" style="color: var(--silver-light);">5-10 pages with advanced features</span>
                        </div>
                        <p class="service-description" style="color: var(--silver-light);">
                            Comprehensive website solution for established accounting firms. Includes advanced features, 
                            custom functionality, and extended support for 5-10 pages.
                        </p>
                        <ul class="service-features-list" style="color: var(--white) !important;">
                            <li style="color: var(--white) !important;">✓ 5-10 pages mobile-first design</li>
                            <li style="color: var(--white) !important;">✓ Advanced SEO optimization with Schema markup</li>
                            <li style="color: var(--white) !important;">✓ Multiple lead capture forms with automation</li>
                            <li style="color: var(--white) !important;">✓ Blog/news section for content marketing</li>
                            <li style="color: var(--white) !important;">✓ Client portal integration (optional)</li>
                            <li style="color: var(--white) !important;">✓ Online appointment booking system</li>
                            <li style="color: var(--white) !important;">✓ Multi-language support (optional)</li>
                            <li style="color: var(--white) !important;">✓ Advanced analytics and conversion tracking</li>
                            <li style="color: var(--white) !important;">✓ SSL security certificate included</li>
                            <li style="color: var(--white) !important;">✓ 3-month support and maintenance</li>
                            <li style="color: var(--white) !important;">✓ Content management system (CMS)</li>
                            <li style="color: var(--white) !important;">✓ Custom design and branding</li>
                            <li style="color: var(--white) !important;">✓ Performance optimization and CDN</li>
                            <li style="color: var(--white) !important;">✓ Social media integration</li>
                        </ul>
                        <div style="margin-top: 30px; padding: 20px; background: rgba(212, 175, 55, 0.1); border-left: 3px solid var(--gold);">
                            <p style="color: var(--gold); font-weight: 600; font-size: 14px; margin-bottom: 8px;">Best Value</p>
                            <p style="color: var(--silver); font-size: 14px; line-height: 1.6;">Includes all Essential features plus advanced functionality and extended support</p>
                        </div>
                        <a href="/contact" class="cta-button" style="width: 100%; margin-top: 20px;">Request Custom Quote</a>
                    </div>
                </div>

                <div style="text-align: center; margin-top: 60px; padding: 40px; background: rgba(212, 175, 55, 0.05); border: 1px solid rgba(212, 175, 55, 0.2);">
                    <h3 style="font-family: 'Playfair Display', serif; font-size: 24px; color: var(--gold); margin-bottom: 20px;">Website Improvement Services</h3>
                    <p style="color: var(--silver-light); line-height: 1.8; margin-bottom: 30px;">
                        Already have a website? We can improve your existing site with SEO optimization, performance enhancements, 
                        conversion rate optimization, and modern design updates. Contact us for a free website audit.
                    </p>
                    <a href="/contact" class="cta-button">Request Free Website Audit</a>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Agents Section -->
    <section id="ai-agents" class="services-section">
        <div class="container">
            <h2 class="section-title">AI Response Services</h2>
            <p class="section-subtitle">24/7 automated customer support and lead qualification</p>
            <div class="services-grid" style="grid-template-columns: repeat(2, 1fr);">
                <!-- Website AI Agent -->
                <div class="service-card featured-service">
                    <div class="service-icon">🤖</div>
                    <h3 class="service-title">Website AI Agent</h3>
                    <div class="service-pricing">
                        <span class="service-price">$1,000 setup</span>
                        <span class="service-price-month">+ $299/month</span>
                    </div>
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
                    <div style="margin-top: 30px; padding: 20px; background: rgba(212, 175, 55, 0.1); border-left: 3px solid var(--gold);">
                        <p style="color: var(--gold); font-weight: 600; font-size: 14px; margin-bottom: 8px;">Available with Growth Plan</p>
                        <p style="color: var(--text-light); font-size: 14px; line-height: 1.6;">Custom training included • Book a free 30-Minute Strategy Call</p>
                    </div>
                    <a href="/contact" class="cta-button" style="width: 100%; margin-top: 20px;">Book Free Strategy Call</a>
                </div>

                <!-- Phone AI Agent -->
                <div class="service-card featured-service">
                    <div class="service-icon">📞</div>
                    <h3 class="service-title">Phone AI Agent</h3>
                    <div class="service-pricing">
                        <span class="service-price">$1,000 setup</span>
                        <span class="service-price-month">+ $500/month</span>
                    </div>
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
                    <div style="margin-top: 30px; padding: 20px; background: rgba(212, 175, 55, 0.1); border-left: 3px solid var(--gold);">
                        <p style="color: var(--gold); font-weight: 600; font-size: 14px; margin-bottom: 8px;">Available with Growth Plan</p>
                        <p style="color: var(--text-light); font-size: 14px; line-height: 1.6;">24/7 call handling • Book a free 30-Minute Strategy Call</p>
                    </div>
                    <a href="/contact" class="cta-button" style="width: 100%; margin-top: 20px;">Book Free Strategy Call</a>
                </div>
            </div>
        </div>
    </section>

<?php include TEMPLATES_PATH . '/footer.php'; ?>
