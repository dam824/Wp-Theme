<div class="cabinet-profile">
    <div class="cabinet-header">
    <div class="cabinet-titre"><h1>Avec vous,<br> <i>partout et toujours<i></h1></div>
    <div class="cabinet-content"><p>Grâce à la transversalité et à la différence de leur parcours, les avocats du Cabinet KLP PARTNERS se distinguent par leur vaste champ d’expertise.
    La fidélité de leurs clients atteste de leur engagement sans faille.  </p></div>
    </div>

    <div class="collaborateurs"><!-- ici les collaborateur --></div>
    <div class="cabinet-banner"><!-- ici la banner --></div>
    <div class="cabinet-post-titre">
        <h2><?php echo the_title() ?></h2>
        <p><?php echo the_content() ?></p>
    </div>
    <div class="cabinet-post-thumbnail">
    <?php if(has_post_thumbnail()): ?>
        <img src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>" >
        <?php endif ;?>
    </div>
    <div class="cabinet-contact">
        <div class="cabinet-adresse">
            <h3>ADRESSE</h3>
            <?php if($adresse = get_post_meta(get_the_ID(),'adresse', true)): ?>
            <p>
                <?php echo esc_html($adresse) ?>

            </p>
            <?php endif; ?>
        </div>
        <div class="cabinet-telephone">
        <h3>TELEPHONE: </h3>
        <?php if($telephone = get_post_meta(get_the_ID(),'téléphone', true)): ?>
            <p> <?php echo esc_html($telephone)?> </p>
            <?php endif; ?>
        </div>
        <div class="cabinet-mail">
        <h3>
            MAIL
        </h3>
        <?php if($mail = get_post_meta(get_the_ID(),'mail',true)): ?>
            <p><?php echo esc_html($mail) ?></p>
            <?php endif; ?>
        </div>
        <div class="cabinet-horaires">
        <h3>HORAIRES</h3>
        <?php if($horaires = get_post_meta(get_the_ID(),'horaires', true)): ?>
            <p><?php echo esc_html($horaires)?></p>
            <?php endif; ?>
        </div>
    </div>
</div>