<?php
/*
Template Name: Actualités
Description: Template dédié à la page "Actualités"
*/

get_header();


$articles= get_articles_by_categories();
$categories = get_categories_data();

?>
<?php 
echo '<h2>Articles Récupérés :</h2>';
var_dump(count($articles));
echo '<h2>Catégories Récupérées :</h2>';
var_dump(count($categories));

?>
<div class="cabinet">
    <h1>Hello Actualités</h1>
    <div class="actualites__header">
        <div class="actualites__header-title">Toutes les actualités du
            cabinet KLP Partners</div>
        <div class="actualites__header-subtitle">Explorez nos actualités juridiques et plongez dans l’univers de notre cabinet. Analyses, conseils pratiques et décryptages des enjeux actuels pour vous informer, vous guider et enrichir votre compréhension du droit."</div>
    </div>
    <div class="actualites__banner">
        <!-- image -->
    </div>
    <!-- Menu blog -->
        <div class="blog">
            <div class="actualites__blog-menu">
                <!-- Tout voir / Contentieux / Conseil / Formation -->
                <ul>
                    <li data-category="all" class="filter__active">Tout voir</li>
                    <?php foreach($categories as $category): ?>
                        <li data-category="<?php echo esc_attr($category->slug) ?>">
                         <?php echo esc_html($category->name) ?>
                        </li>
                        <?php endforeach; ?>
                       
                </ul>
            </div>
            <div class="actualites__blog-card">
                <!-- Les cartes des articles générées par AJAX seront injectées ici -->
                <?php //foreach($articles as $article):   ?>
                    <!-- <div class="card" data-category="<?php //echo esc_attr(get_the_category($article->ID)[0]->slug); ?>">
                        <h3><?php //echo esc_html($article->post_title); ?></h3>
                        <p><?php //echo esc_html(wp_trim_words($article->post_content, 15, '...')); ?></p>
                        <a href="<?php //echo get_permalink($article->ID); ?>">Lire la suite</a>
                    </div> -->
                <?php //endforeach   ?>
            </div>
        </div>
</div>



<?php
get_footer();
?>