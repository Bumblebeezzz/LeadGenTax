<?php
/**
 * Home Page - LeadGenTax.au
 */
require_once __DIR__ . '/includes/config.php';

$page_title = 'Lead Generation for Accountants Sydney | Tax Client Growth Australia';
$page_description = 'Generate more tax clients in Sydney, Melbourne & Brisbane. Accounting lead generation services for CPAs – get 30+ qualified leads/month.';

include TEMPLATES_PATH . '/header.php';
?>

    <!-- Hero Section -->
    <section class="hero" style="position: relative; overflow: hidden; min-height: 90vh; display: flex; align-items: center; justify-content: center;">
        <!-- Background Video -->
        <video autoplay muted loop playsinline style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: 0; object-fit: cover; opacity: 0.4;">
            <source src="/static/videos/LeadGenTax.mov" type="video/quicktime">
            <source src="/static/videos/LeadGenTax.mov" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- Overlay for better text readability -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.6) 50%, rgba(0, 0, 0, 0.75) 100%); z-index: 1;"></div>
        <div class="hero-content" style="position: relative; z-index: 2;">
            <h1 class="hero-title">
                Accounting Lead Generation Sydney<br>
                <span class="accent">Get 30+ Tax Clients Monthly</span>
            </h1>
            <p class="hero-subtitle">Stop chasing clients. Let qualified <strong>tax leads</strong> come to your firm in <strong>Sydney, Melbourne & Brisbane</strong>. Proven CPA marketing that works.</p>
            <div class="hero-cta">
                <a href="#contact" class="cta-button cta-primary">Start Free 14-Day Trial →</a>
            </div>
        </div>
    </section>

    <!-- Trust Badges Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid" style="grid-template-columns: repeat(3, 1fr); gap: 40px;">
                <div class="stat-item">
                    <span class="stat-label" style="color: var(--gold); font-size: 18px; font-weight: 600;">✓ 500+ Australian Accountants Served</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label" style="color: var(--gold); font-size: 18px; font-weight: 600;">✓ ATO-Compliant Lead Flow</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label" style="color: var(--gold); font-size: 18px; font-weight: 600;">✓ Google Partner Agency</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="services-section">
        <div class="container">
            <h2 class="section-title">Why Accountants Choose LeadGenTax.au</h2>
            <div style="max-width: 900px; margin: 0 auto; margin-top: 50px;">
                <ul class="service-features-list" style="list-style: none; padding: 0;">
                    <li style="padding: 25px; background: var(--black-light); border-left: 4px solid var(--gold); margin-bottom: 20px; display: flex; align-items: flex-start;">
                        <span style="color: var(--gold); font-weight: 700; margin-right: 15px; font-size: 24px;">✓</span>
                        <div>
                            <strong style="color: var(--gold); font-size: 18px; display: block; margin-bottom: 8px;">Exclusive Tax Leads</strong>
                            <span style="color: var(--silver-light); font-size: 16px; line-height: 1.7;">Only pre-qualified BAS, GST & SMSF clients.</span>
                        </div>
                    </li>
                    <li style="padding: 25px; background: var(--black-light); border-left: 4px solid var(--gold); margin-bottom: 20px; display: flex; align-items: flex-start;">
                        <span style="color: var(--gold); font-weight: 700; margin-right: 15px; font-size: 24px;">✓</span>
                        <div>
                            <strong style="color: var(--gold); font-size: 18px; display: block; margin-bottom: 8px;">Local SEO Dominance</strong>
                            <span style="color: var(--silver-light); font-size: 16px; line-height: 1.7;">Rank #1 for "accountant near me" in your suburb.</span>
                        </div>
                    </li>
                    <li style="padding: 25px; background: var(--black-light); border-left: 4px solid var(--gold); margin-bottom: 20px; display: flex; align-items: flex-start;">
                        <span style="color: var(--gold); font-weight: 700; margin-right: 15px; font-size: 24px;">✓</span>
                        <div>
                            <strong style="color: var(--gold); font-size: 18px; display: block; margin-bottom: 8px;">Zero Upfront Cost</strong>
                            <span style="color: var(--silver-light); font-size: 16px; line-height: 1.7;">Pay only per booked appointment.</span>
                        </div>
                    </li>
                    <li style="padding: 25px; background: var(--black-light); border-left: 4px solid var(--gold); margin-bottom: 20px; display: flex; align-items: flex-start;">
                        <span style="color: var(--gold); font-weight: 700; margin-right: 15px; font-size: 24px;">✓</span>
                        <div>
                            <strong style="color: var(--gold); font-size: 18px; display: block; margin-bottom: 8px;">Full CRM Sync</strong>
                            <span style="color: var(--silver-light); font-size: 16px; line-height: 1.7;">Leads auto-import to Xero Practice Manager, MYOB AE or Karbon.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Social Proof Section -->
    <section class="testimonials-section section-dark">
        <div class="container">
            <h2 class="section-title">Real Results for Australian CPAs</h2>
            <div style="max-width: 800px; margin: 50px auto; text-align: center; padding: 50px; background: var(--black-light); border: 2px solid var(--gold);">
                <blockquote style="font-family: 'Playfair Display', serif; font-size: 28px; color: var(--gold); line-height: 1.6; margin: 0 0 30px 0; font-style: italic;">
                    "+42 new tax clients in 90 days. Best ROI we've ever had."
                </blockquote>
                <cite style="color: var(--silver-light); font-size: 18px; font-style: normal;">— Sarah Chen, CPA, North Sydney</cite>
            </div>
        </div>
    </section>

    <!-- Local Focus Section -->
    <section class="section section-dark">
        <div class="container">
            <h2 class="section-title">Lead Generation for Accountants – Sydney, Melbourne, Brisbane</h2>
            <p class="section-subtitle" style="margin-bottom: 40px;">We target <strong style="color: var(--gold);">high-intent tax searches</strong> in your postcode:</p>
            <div style="max-width: 900px; margin: 0 auto;">
                <ul class="service-features-list" style="list-style: none; padding: 0;">
                    <li style="padding: 20px; background: var(--black-light); border-left: 4px solid var(--gold); margin-bottom: 15px; color: var(--silver-light); font-size: 18px;">
                        <strong style="color: var(--gold);">Sydney CBD & North Shore</strong> – 1,200+ monthly searches
                    </li>
                    <li style="padding: 20px; background: var(--black-light); border-left: 4px solid var(--gold); margin-bottom: 15px; color: var(--silver-light); font-size: 18px;">
                        <strong style="color: var(--gold);">Melbourne CBD & Eastern Suburbs</strong> – 1,000+ monthly searches
                    </li>
                    <li style="padding: 20px; background: var(--black-light); border-left: 4px solid var(--gold); margin-bottom: 15px; color: var(--silver-light); font-size: 18px;">
                        <strong style="color: var(--gold);">Brisbane CBD & Southside</strong> – 800+ monthly searches
                    </li>
                </ul>
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


    <!-- Final CTA Section -->
    <section id="contact" class="contact-section section-dark">
        <div class="container">
            <h2 class="section-title">Ready for More Tax Clients?</h2>
            <p class="section-subtitle">Book a 5-min strategy call. No obligation.</p>
            <div style="max-width: 600px; margin: 50px auto;">
                <form id="footer-contact-form" class="contact-form">
                    <div class="form-group">
                        <input type="text" name="firm_name" placeholder="Your Firm Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Phone" required>
                    </div>
                    <!-- Honeypot field -->
                    <input type="text" name="website" style="display: none;" tabindex="-1" autocomplete="off">
                    <button type="submit" class="cta-button" style="width: 100%; background: #FF6B35; border-color: #FF6B35; color: var(--white);">Get My 30 Leads →</button>
                    <div id="form-message" class="form-message"></div>
                </form>
                <p style="text-align: center; color: var(--silver); font-size: 14px; margin-top: 20px;">
                    100% privacy. Leads delivered within 48 hours.
                </p>
            </div>
        </div>
    </section>

<?php include TEMPLATES_PATH . '/footer.php'; ?>
