<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-contact">
                <h3>Contactez-nous</h3>
                <p>KLP Partners à votre service</p>
                <a href="/contact" class="footer-button">Contacter le cabinet</a>
            </div>
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Nos pages</h4>
                    <?php
                    //display menu footer
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-menu',
                        'container' => false
                    ));
                    ?>
                </div>
                <div class="footer-column">
                    <h4>Nos bureaux</h4>
                    <ul>
                        <li>Paris</li>
                        <li>Versailles</li>
                        <li>Martigues</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?>| Réalisé par Redcat Studio </p>
            <p><a href="/mentions-legales">Mentions légales</a> | <a href="/politique-confidentialite">Politique de confidentialité</a></p>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>