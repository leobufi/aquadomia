<?php
/**
 * Template Name: Blog Archive
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif; ?>

<div id="primary" <?php astra_primary_class(); ?>>

	<?php astra_primary_content_top(); ?>
  <form id="article-filter-form" method="GET" action="">
    <div class="page-main-container">
      <header class="entry-header">
        <h1 class="entry-title" itemprop="headline">
          <?php
            $page_title = get_the_title();
            echo esc_html($page_title);
          ?>
        </h1>
        <span>Retrouvez toutes nos actualités !</span>
      </header>
      <label class="filter-title" for="filter-year">Par dates 🡓</label>
    </div>
    <div class="year-filters">
      <div class="slick-slider">
        <label>
          <input class="" type="radio" name="filter_year" value="" <?php echo !isset($_GET['filter_year']) ? 'checked' : ''; ?>>
          Tous
        </label>
        <?php
        // Récupérer toutes les années de publication des articles
        global $wpdb;
        $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date ASC");
        foreach ($years as $year) :
          ?>
          <label>
            <input type="radio" name="filter_year" value="<?php echo esc_attr($year); ?>" <?php echo isset($_GET['filter_year']) && $_GET['filter_year'] == $year ? 'checked' : ''; ?>>
            <?php echo esc_html($year); ?>
          </label>
          <?php
        endforeach;
        ?>
      </div>
    </div>
  </form>

  <main id="main" class="site-main">
    <?php
    // Récupérer l'année de filtre à partir de l'URL
    $filter_year = isset($_GET['filter_year']) ? intval($_GET['filter_year']) : '';

    // Créer une nouvelle instance de WP_Query pour interroger uniquement les articles
    $args = array(
      'post_type' => 'post', // Interroger uniquement les articles
      'posts_per_page' => $filter_year ? -1 : 10, // Afficher tous les articles si une année est sélectionnée, sinon 10 articles
      'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // Prendre en compte la pagination
      'orderby' => 'date', // Trier par date
      'order' => 'DESC', // Ordre décroissant
    );

    if ($filter_year) {
      $args['year'] = $filter_year;
    }

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) :
      while ($custom_query->have_posts()) :
        $custom_query->the_post();
        ?>
        <a class="article-link-wrapper" href="<?php the_permalink(); ?>">
          <article class="ast-article-single article-wrapper">
            <header class="entry-header">
              <h2 class="entry-title">
                <?php the_title(); ?>
              </h2>
            </header>
            <div class="entry-meta">
              <span class="entry-date"><?php the_date(); ?></span>
              <span class="entry-author"><?php the_author(); ?></span>
            </div>
          </article>
        </a>
        <?php
      endwhile;

      wp_reset_postdata(); // Réinitialiser la requête principale après la boucle personnalisée
    else :
      echo '<p>Aucun article trouvé.</p>'; // Message de débogage
    endif;
    ?>
  </main>

<?php astra_primary_content_bottom(); ?>

</div>
<!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif; ?>

<?php get_footer(); ?>
