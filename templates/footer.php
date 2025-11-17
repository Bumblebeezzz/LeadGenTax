
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <img src="/static/images/logo-leadgentax.png" alt="<?php echo e(SITE_NAME); ?>" style="height: 35px; margin-bottom: 20px; filter: brightness(0.9);">
                    <p>Marketing solutions for accounting firms. Generate more appointments and grow your practice with AI-powered tools and proven strategies.</p>
                </div>
                <div class="footer-section">
                    <h4>Contact</h4>
                    <p>Email: <a href="mailto:<?php echo e(CONTACT_EMAIL); ?>"><?php echo e(CONTACT_EMAIL); ?></a></p>
                    <p>Phone: <a href="tel:<?php echo str_replace(' ', '', CONTACT_PHONE); ?>"><?php echo e(CONTACT_PHONE); ?></a></p>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/case-studies">Case Studies</a></li>
                        <li><a href="/testimonials">Testimonials</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 <?php echo e(SITE_NAME); ?>. All rights reserved.</p>
                <p style="margin-top: 8px; color: var(--silver); font-size: 11px; opacity: 0.8;">ABN 22 689 463 894</p>
            </div>
        </div>
    </footer>

    <!-- Contact Pop-up (only on home page) -->
    <?php if (strpos($current_path, '/') === false || $current_path === '/' || $current_path === '/index.php' || empty($current_path)): ?>
    <div id="contact-popup" class="contact-popup">
        <div class="popup-content">
            <button class="popup-close" id="popupClose">&times;</button>
            <h3>Get Your Free 14-Day Audit</h3>
            <p>Discover how we can help your accounting firm generate +25 appointments per year.</p>
            <form id="popup-contact-form" class="contact-form">
                <div class="form-group">
                    <input type="text" name="first_name" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <input type="text" name="firm_name" placeholder="Firm Name">
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" placeholder="Phone (Optional)">
                </div>
                <!-- Honeypot field -->
                <input type="text" name="website" style="display: none;" tabindex="-1" autocomplete="off">
                <button type="submit" class="cta-button">Request Free Audit</button>
                <div id="popup-form-message" class="form-message"></div>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <!-- ElevenLabs ConvAI Widget (Phone Call Conversation) -->
    <elevenlabs-convai agent-id="agent_4801ka50mtksf3sb4tqbp231qstk"></elevenlabs-convai>
    <script src="https://unpkg.com/@elevenlabs/convai-widget-embed" async type="text/javascript"></script>

    <!-- Scripts -->
    <script src="/static/js/main.js?v=<?php echo time(); ?>"></script>
    <script src="/static/js/animations.js?v=<?php echo time(); ?>"></script>
</body>
</html>
