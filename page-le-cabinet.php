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



<!-- Section Locations -->
<div class="cabinet__locations">
    <div class="cabinet__locations-header">
        <div class="cabinet__location-title">
            <h2 class="animated-text">KLP vous accompagne partout en France</h2>
        </div>
    </div>

    <?php if (!empty($cabinet_query)) : ?>
        <?php foreach ($cabinet_query as $cabinet) : ?>
            <div class="cabinet__location-content">
                <div class="cabinet__location-title">
                    <h3 class="animated-text"><?php echo esc_html($cabinet['title']); ?></h3>
                </div>
                <div class="cabinet__location-content">
                    <p><?php echo wp_kses_post($cabinet['content']); ?></p>
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
                    <p><strong>Adresse :</strong> <?php echo esc_html($cabinet['adresse']); ?></p>
                    <p><strong>Horaires :</strong> <?php echo esc_html($cabinet['horaires']); ?></p>
                    <p><strong>Email :</strong> <a href="mailto:<?php echo esc_html($cabinet['mail']); ?>"><?php echo esc_html($cabinet['mail']); ?></a></p>
                    <p><strong>Téléphone :</strong> <a href="tel:<?php echo esc_html($cabinet['telephone']); ?>"><?php echo esc_html($cabinet['telephone']); ?></a></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun cabinet trouvé.</p>
    <?php endif; ?>

</div>

</div>

</div>

<?php
get_footer();
?>