<footer class="footer">
    <div class="footer-container">
        <div class="footer-left">
            <h3>Contactez-nous !</h3>
            <p>KLP Partners à votre service</p>
            <button class="contact-button">Contacter le cabinet</button>
        </div>
        <div class="footer-right">
            <div class="footer-links">
                <h4>Nos pages</h4>
                <?php
                // Afficher le menu du footer
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class' => 'footer-menu',
                    'container' => false
                ));
                ?>
            </div>
            <div class="footer-addresses">
                <h4>Nos bureaux</h4>
                <ul>
                    <li>Paris</li>
                    <li>Versailles</li>
                    <li>Martigues</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2024 | Réalisé par Redcat Studio</span>
        <span>Mentions légales | Politique de confidentialité</span>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>