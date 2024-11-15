<?php get_header() ?>

<!-- Bannière principale avec image de fond et titre H1 -->
<?php get_template_part('/template-parts/sections/hero-section'); ?>
<!-- sections about -->
<?php get_template_part('/template-parts/sections/home-about'); ?>
<!-- sections red -->
<section class="home-about-red">
    <div class="about-red-title">
        <h2 class="animated-text">L'excellence juridique à votre service :<br>
            <span class="about-red-title-italic">nos domaines d'intervention en droit social</span>
        </h2>
    </div>
    <?php get_template_part('/template-parts/sections/home-carousel'); ?>

</section>
<!-- sections chiffres  -->
<?php get_template_part('/template-parts/sections/chiffre-section'); ?>
<!-- sections klp accompagne  -->
<?php get_template_part('/template-parts/sections/accompagnement'); ?>
<!-- sections klp team  -->
<?php get_template_part('/template-parts/sections/notre-equipe'); ?>
<div class="section-separator"></div>
<!-- sections klp actus  -->
<?php get_template_part('template-parts/sections/actualites'); ?>
<?php get_footer() ?>