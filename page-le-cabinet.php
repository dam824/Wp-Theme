<?php
/*
Template Name: Le Cabinet
Description: Template dédié à la page "Le Cabinet"
*/

get_header();

$cabinet_query = get_cabinets();
$collaborateur_query = get_collaborateurs(); // Appel des requêtes définies dans inc/queries.php
?>

<div class="cabinet">

    <!-- Section Header -->
    <div class="cabinet__header">
        <div class="cabinet__intro">
            <div class="cabinet__title">
                <h1 class="animated-text">Avec vous,<br><span>partout et toujours</span></h1>
            </div>
            <div class="cabinet__subtitle">
                <p>Grâce à la transversalité et à la différence de leur parcours, les avocats du Cabinet KLP PARTNERS se distinguent par leur vaste champ d’expertise.
                    La fidélité de leurs clients atteste de leur engagement sans faille.  </p>
            </div>
        </div>

        <!-- Section Collaborateurs -->
        <?php if (!empty($collaborateur_query)) : ?>
            <div class="cabinet__founders">
                <?php foreach ($collaborateur_query as $collaborateur): ?>
                    <div class="cabinet__founder">
                        <div class="cabinet__founder-img">
                            <?php if (!empty($collaborateur['featured_image'])) : ?>
                                <img src="<?php echo esc_url($collaborateur['featured_image']); ?>" alt="<?php echo esc_attr($collaborateur['title']); ?>">
                            <?php else : ?>
                                <p>Aucune image trouvée</p>
                            <?php endif; ?>
                        </div>
                        <div class="cabinet__founder-info">
                            <div class="cabinet__founder-name">
                                <h4> <?php echo esc_html($collaborateur['title']); ?></h4> <!-- Correction : utilisation de get_the_title() -->
                            </div>
                            <div class="cabinet__founder-description">
                                <p><?php echo esc_html($collaborateur['fonction']); ?> </p> <!-- Utilisation de get_the_excerpt() pour un résumé -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> <!-- Réinitialisation des données après la boucle -->
            </div>

        <?php else : ?>
            <p>Aucun collaborateur trouvé.</p>
        <?php endif; ?>
    </div>

    <!-- Section Title -->
    <div class="cabinet__text-slide">
        <div class="cabinet__text-wrapper" data-text="KLP vous accompagne partout en France ">
            <h2>KLP vous accompagne partout en France</h2>
        </div>
    </div>



    <!-- Section Locations -->
    <div class="cabinet__locations">
        <?php if (!empty($cabinet_query)) : ?>
            <?php foreach ($cabinet_query as $cabinet) : ?>
                <div class="cabinet__location-content">
                    <div class="cabinet__location-header">
                        <div class="cabinet__location-title">
                            <h3 class="animated-text"><?php echo esc_html($cabinet['title']); ?></h3>
                        </div>
                        <div class="cabinet__location-description">
                            <p><?php echo wp_kses_post($cabinet['content']); ?></p>
                        </div>
                    </div>
                    <div class="cabinet__location-img">
                        <?php if (!empty($cabinet['featured_image'])) : ?>
                            <img src="<?php echo esc_url($cabinet['featured_image']); ?>" alt="<?php echo esc_attr($cabinet['title']); ?>">
                        <?php else : ?>
                            <p>Aucune image trouvée</p>
                        <?php endif; ?>
                    </div>

                    <!-- AJOUT ICI : Section cabinet__location-details -->
                    <div class="cabinet__location-details">
                        <p><span>Adresse :</span> <?php echo esc_html($cabinet['adresse']); ?></p>
                        <p><span>Horaires :</span> <?php echo esc_html($cabinet['horaires']); ?></p>
                        <p><span>Email :</span> <a href="mailto:<?php echo esc_html($cabinet['mail']); ?>"><?php echo esc_html($cabinet['mail']); ?></a></p>
                        <p><span>Téléphone :</span> <a href="tel:<?php echo esc_html($cabinet['telephone']); ?>"><?php echo esc_html($cabinet['telephone']); ?></a></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Aucun cabinet trouvé.</p>
        <?php endif; ?>

    </div>


    <!-- Section les plus du cabinets -->
    <div class="cabinet__lesplus">
        <div class="cabinet__lesplus-intro">
            <h2>Les plus du <br><em>cabinet KLP Partners</em></h2>
            <p>Rorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <div class="cabinet__lesplus-grid">
            <div class="parent">
                <div class="div-g">
                    <div class="div1">
                        <h3 class="cabinet__lesplus-title">Expertise</h3>
                        <p>Rorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nunc vulputate libero et velit interdum, ac aliquet odio mattis.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
                    </div>
                    <div class="div2">
                        <h3 class="cabinet__lesplus-title">Adaptabilité</h3>
                        <p>Rorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nunc vulputate libero et velit interdum, ac aliquet odio mattis.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
                    </div>
                </div>
                <div class="div-d">
                    <div class="div3">
                        <h3 class="cabinet__lesplus-title">Proximité</h3>
                        <p>Rorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nunc vulputate libero et velit interdum, ac aliquet odio mattis.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
                    </div>
                    <div class="div4">
                        <h3 class="cabinet__lesplus-title">Accompagnement</h3>
                        <p>Rorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nunc vulputate libero et velit interdum, ac aliquet odio mattis.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
       <!-- Section citation -->
       <div class="cabinet__citation">
        <div class="cabinet__citation-svg">"</div>
        <div class="cabinet__citation-text">
            <p>KLP Partners, c’est bien plus qu’un simple <br /> cabinet d’avocat. C’est ...lorem ipsum dolor <br /> sit amet, consectetur adipiscing elit. </p>
        </div>
        <div class="cabinet__citation-signature">
            <p> --- Les fondatrices</p>
        </div>
    </div>

 


</div>

</div>

<?php
get_footer();
?>