<div class="collaborateur-profile">
    <div class="col-g">
    <?php if(has_post_thumbnail()) :  ?>
        <img src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>" >
        <?php endif; ?>
    <h1>Nom collabo : <?php the_title() ?></h1>
    <p> <?php the_content() ?></p>
    </div>
    <div class="col-d">
         <ul class="collaborateur-contact">
         <?php if ($telephone = get_post_meta(get_the_ID(), 'téléphone', true)) : ?>
            <li>Téléphone : <?php echo esc_html($telephone); ?></li>
            <?php endif; ?>

            <?php if($mail = get_post_meta(get_the_ID(),'mail', true)): ?>
                <li>Mail: <?php echo esc_html($mail) ?></li>
                <?php endif; ?>

            <?php if($linkedin = get_post_meta(get_the_ID(), 'linkedin', true)): ?>
            
                <li><?php echo esc_html($linkedin)?></li>
                <?php endif; ?>
         </ul>
            
    
         
    </div>
    
</div>