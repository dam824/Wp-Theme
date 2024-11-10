<?php get_header() ?>

<!-- Bannière principale avec image de fond et titre H1 -->
<section class="home-banner" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/home-banner-img.png');">
    <div class="home-banner-content">
        <h1>Plus qu'un avocat,<br> un partenaire au quotidien</h1>
        <p>L’expertise des grands cabinets, l’accessibilité d’un cabinet <span>à taille humaine.</span></p>
    </div>
</section>
<!-- sections about -->
<section class="home-about">
    <div class="about-main-title">
        <h2>
            Un cabinet entièrement dédié au droit du travail qui<br> s’engage à créer des solutions sur-mesure pour répondre<br> aux besoins spécifiques de chacun de ses clients
        </h2>
    </div>
    <div class="about-section-text">
        <div class="about-text">
            <p>
                Nous mettons un point d’honneur à vous offrir des réponses concrètes et des conseils juridiques au<br> plus près de vos besoins. Grâce à notre réactivité et notre flexibilité, nous sommes en mesure de vous<br> fournir des réponses rapides et adaptées à chaque situation. Composée d’avocats passionnés et<br> expérimentés, notre équipe se distingue par son fort engagement à défendre vos intérêts et à<br> contribuer à la réussite de vos projets. Nous mettons un point d'honneur à vous offrir un accès direct et<br> simplifié à des conseils juridiques, afin de vous soutenir à chaque étape.
            </p>
            <div class="about-btn">
                <button>EN SAVOIR PLUS
                    <span class="svg-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M3.55975 1.05512L19.0553 1.0549M19.0553 1.0549L19.0553 16.3301M19.0553 1.0549L1.05504 19.0552" stroke="#C9171E" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>

    </div>
</section>
<!-- sections red -->
<section class="home-about-red">
    <div class="about-red-title">
        <h2>L'excellence juridique à votre service :<br>
            <span class="about-red-title-italic">nos domaines d'intervention en droit social</span>
        </h2>
    </div>
    <div class="about-red-caroussel">
        <!-- Points de pagination -->
        <div class="carousel-indicators">
            <span class="indicator active"></span>
            <span class="indicator"></span>
            <span class="indicator"></span>
        </div>

        <div class="caroussel-slide-1">
            <h3>Conseil</h3>
            <div class="about-red-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing<br> elit. Dorean amelai consecteur.</p>
            </div>
        </div>
        <div class="caroussel-slide-2">
            <h3>Contentieux</h3>
            <div class="about-red-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing<br> elit. Dorean amelai consecteur.</p>
            </div>
        </div>
        <div class="caroussel-slide-3">
            <h3>Formation</h3>
            <div class="about-red-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing<br> elit. Dorean amelai consecteur.</p>
            </div>
        </div>

        <!-- Flèches de navigation -->
        <div class="carousel-navigation">
            <span class="prev">&lt;</span>
            <span class="next">&gt;</span>
        </div>
    </div>

</section>
<!-- sections chiffres  -->
<section class="home-about-confiance">
    <div class="confiance-title">
        <h3>Pourquoi faire <span>confiance</span> à notre cabinet ? </h3>
    </div>
    <div class="confiance-number">
        <div class="number-left">
            <p class="number-left-main">+20</p>
            <p class="number-left-content">années <br> d'expérience</p>
        </div>
        <div class="number-right">
            <p class="number-right-main">+2000</p>
            <p class="number-right-content">affaire résolues</p>
        </div>
    </div>
</section>
<!-- sections klp accompagne  -->
<section class="home-about-accompagnement">
    <div class="accompagnement-title">
        <h2>KLP Partners vous accompagne<br>
            <span>partout en France<span>
        </h2>
    </div>
    <div class="accompagnement-content">
        <div class="accompagnement-content-img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/accompagnement-photo.png" alt="image tour effeil">
        </div>
        <div class="accompagnement-content-list">
            <ul>
                <li>
                    <span>Paris</span>
                    <a href="/cabinet-paris" class="location-link">

                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/Arrow_Forward.svg">
                        Notre cabinet à Paris

                    </a>
                </li>
                <li>
                    <span>Versailles</span>
                    <a href="/cabinet-versailles" class="location-link">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/Arrow_Forward.svg">
                        Notre cabinet à Versailles

                    </a>
                </li>
                <li>
                    <span>Marseille</span>
                    <a href="/cabinet-marseille" class="location-link">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/Arrow_Forward.svg">
                        Notre cabinet à Marseille

                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- sections klp accompagne  -->
<section class="home-notre-equipe">
    <div class="notre-equipe-title">
        <h3>Une équipe d’avocats<br>
            spécialisée en <span>droit social</span> </h3>
    </div>
    <div class="notre-equipe-card">
        <div class="card card-1" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/avocat-1.jpg');">
            <div class="card-overlay">
                <h4>CARINE KALFON</h4>
                <p>Associée fondatrice</p>
            </div>
            <div class="arrow-icon">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/arrow-white.svg" alt="Arrow Icon">
            </div>
        </div>
        <div class="card card-2" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/avocat-2.jpg');">
            <div class="card-overlay">
                <h4>DELPHINE PICQUE</h4>
                <p>Associée fondatrice</p>
            </div>
            <div class="arrow-icon">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/arrow-white.svg" alt="Arrow Icon">
            </div>
        </div>
    </div>
</section>
<div class="section-separator"></div>
<!-- sections klp actus  -->
<section class="home-section-actualites">
    <div class="actualites-titre">
        <h2>Les dernières actualités du <span>cabinet KLP Partners</span></h2>
    </div>
    <div class="actualites-content">
        <!-- boucle actus  -->
        <div class="actu-container">
            <h4>Conseil</h4>
            <p>Text...</p>
            <p>date</p>
        </div>
        <div class="actu-container">
            <h4>Conseil</h4>
            <p>Text...</p>
            <p>date</p>
        </div>
        <div class="actu-container">
            <h4>Conseil</h4>
            <p>Text...</p>
            <p>date</p>
        </div>
    </div>
    <div class="actualite-boutton">
        <button>TOUTE NOS ACTUALITES</button>
    </div>
</section>
<?php get_footer() ?>