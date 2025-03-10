<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.8.10' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.8.9' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( 'https://wpastra.com/pricing/', 'dashboard', 'free-theme', 'dashboard' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( 'https://wpastra.com/pricing/', 'customizer', 'free-theme', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

function astra_register_custom_fonts() {
    $custom_fonts = Astra_Font_Families::get_custom_fonts();

    foreach ( $custom_fonts as $font_name => $font_data ) {
        wp_enqueue_style( 'astra-custom-font-' . sanitize_title( $font_name ), get_template_directory_uri() . '/assets/fonts/' . sanitize_title( $font_name ) . '.min.css', array(), ASTRA_THEME_VERSION );
    }
}
add_action( 'wp_enqueue_scripts', 'astra_register_custom_fonts', 15 );

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// function astra_add_custom_fonts_to_customizer( $fonts ) {
//     $custom_fonts = Astra_Font_Families::get_custom_fonts();
//     return array_merge( $fonts, $custom_fonts );
// }
// add_filter( 'astra_font_families', 'astra_add_custom_fonts_to_customizer' );

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';


/* ENQUEUE CUSTOM FUNCTIONS */

function enqueue_custom_scripts() {
    wp_enqueue_script( 'custom-scroll-header-script', get_template_directory_uri() . '/assets/js/minified/custom-scroll-header-script.min.js', array(), null, true );
    wp_enqueue_script( 'hover-image', get_template_directory_uri() . '/assets/js/minified/hover-image.min.js', array(), null, true );
    wp_enqueue_script( 'product-cat', get_template_directory_uri() . '/assets/js/minified/product-cat.min.js', array(), null, true );
    wp_enqueue_script( 'blog-filter', get_template_directory_uri() . '/assets/js/minified/blog-filter.min.js', array(), null, true );
    wp_enqueue_script( 'back-to-blog-btn', get_template_directory_uri() . '/assets/js/minified/back-to-blog-btn.min.js', array(), null, true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/minified/slick.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'footer', get_template_directory_uri() . '/assets/js/minified/footer.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'product-page', get_template_directory_uri() . '/assets/js/minified/product-page.min.js', array(), null, true );
}
add_action( 'wp_footer', 'enqueue_custom_scripts' );

function enqueue_custom_styles() {
    wp_enqueue_style('media-queries', get_stylesheet_directory_uri() . '/assets/css/minified/media-queries.min.css', array(), null, 'all');
    wp_enqueue_style('pinpoint-booking-custom', get_stylesheet_directory_uri() . '/assets/css/minified/compatibility/woocommerce/pinpoint-booking-custom.min.css', array('DOPBSP-css-dopselect'), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles', 200);

function astra_enqueue_infinite_scroll() {
  wp_enqueue_script('infinite-scroll', get_template_directory_uri() . '/assets/js/minified/infinite-scroll-blog-filter.min.js', array('jquery'), null, true);
    wp_localize_script('infinite-scroll', 'astra_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'astra_enqueue_infinite_scroll');

function enqueue_slick_slider() {
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_slider');

/* REMOVE WOOCOMMERCE HOOKS */

function custom_remove_woocommerce_hooks() {
  remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
  remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

  remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
  remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

  remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
  remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
  remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
}
add_action('init', 'custom_remove_woocommerce_hooks');

/* ALLOW SVG */

function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

/* UNDISPLAY BUTTONS FROM PINPOINT BOOKING */

function custom_modify_display_buttons($content) {
    if (strpos($content, 'add_to_cart_button') !== false || strpos($content, 'product_type_simple') !== false ) {
        return '';
    }
    return $content;
}
add_filter('woocommerce_loop_add_to_cart_link', 'custom_modify_display_buttons', 10, 1);

/* INJECTER MAIN WRAPPER + MODIFIER TITRE RELATED PRODUCTS */

function custom_related_products_section() {
    if ( ! is_product() ) {
        return;
    }

    global $product;

    $related_products = wc_get_related_products( $product->get_id() );

    if ( $related_products ) : ?>
        <div class="main-wrapper pdg-top-sml">
            <section class="related products">
                <?php
                $heading = __( 'Formations Complémentaires', 'woocommerce' ); // Remplacement du titre
                if ( $heading ) :
                ?>
                    <h3 class="inset-title"><?php echo esc_html( $heading ); ?></h3>
                <?php endif; ?>

                <?php woocommerce_product_loop_start(); ?>
                    <?php foreach ( $related_products as $related_product ) : ?>
                        <?php
                        $post_object = get_post( $related_product );

                        setup_postdata( $GLOBALS['post'] = $post_object );

                        wc_get_template_part( 'content', 'product' );
                        ?>
                    <?php endforeach; ?>
                <?php woocommerce_product_loop_end(); ?>
            </section>
        </div>
    <?php
    endif;

    wp_reset_postdata();
}
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'custom_related_products_section', 20 );

/* REMPLACE ADD TO CART BUTTON PAGE PRODUIT */

function custom_woocommerce_template_single_add_to_cart() {
    global $product;

    if ( $product instanceof WC_Product ) {
        /**
         * Single product add to cart action.
         *
         * @since 1.0.0
         */
        global $post;

        $dopbsp_woocommerce_options = array(
            'calendar' => get_post_meta($post->ID, 'dopbsp_woocommerce_calendar', true)
        );

        if ($dopbsp_woocommerce_options['calendar'] != '' && $dopbsp_woocommerce_options['calendar'] != '0') {
        echo '<div class="main-wrapper align-right">';
        do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );
        echo '</div>';
      } else if ($product->get_price()) {
          echo '<div id="add-to-cart" class="main-wrapper pdg-top-sml">';
          do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );
          echo '</div>';
        }

    }
}

function replace_woocommerce_add_to_cart_template() {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    add_action( 'woocommerce_single_product_summary', 'custom_woocommerce_template_single_add_to_cart', 30 );
}
add_action( 'init', 'replace_woocommerce_add_to_cart_template' );


/* INJECTE MAIN WRAPPER PAGE BOUTIQUE */

function custom_add_main_wrapper_shop_start() {
    if ( is_shop() ) {
        echo '<div class="main-wrapper">';
    }
}
add_action( 'woocommerce_before_main_content', 'custom_add_main_wrapper_shop_start', 15 );

function custom_add_main_wrapper_shop_end() {
    if ( is_shop() ) {
        echo '</div><!-- .main-wrapper -->';
    }
}
add_action( 'woocommerce_after_main_content', 'custom_add_main_wrapper_shop_end', 5 );

/* AJAX REQUESTS FOR BLOG FILTER */

function astra_load_more_posts() {
    $query_vars = json_decode(stripslashes($_POST['query_vars']), true);
    $query_vars['paged'] = $_POST['page'];

    $query = new WP_Query($query_vars);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>
            <a class="article-link-wrapper" href="<?php the_permalink(); ?>">
              <article id="post-<?php the_ID(); ?>" class="ast-article-single article-wrapper" data-post-id="<?php the_ID(); ?>">
                <header class="entry-header">
                  <h2 class="entry-title">
                    <?php the_title(); ?>
                  </h2>
                </header>
                <div class="entry-meta">
                  <span class="entry-date"><?php the_date('d.m.Y'); ?></span>
                  <span class="entry-author"><?php the_author(); ?></span>
                </div>
              </article>
            </a>
            <?php
        endwhile;
    endif;

    wp_reset_postdata();
    die();
}
add_action('wp_ajax_load_more_posts', 'astra_load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'astra_load_more_posts');

function load_filtered_posts() {
  $filter_year = isset($_GET['filter_year']) ? intval($_GET['filter_year']) : '';

  // Créer une nouvelle instance de WP_Query pour interroger uniquement les articles
  $args = array(
    'post_type' => 'post', // Interroger uniquement les articles
    'posts_per_page' => -1, // Afficher tous les articles si une année est sélectionnée, sinon 10 articles
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
        <article id="post-<?php the_ID(); ?>" class="ast-article-single article-wrapper" data-post-id="<?php the_ID(); ?>">
          <header class="entry-header">
            <h2 class="entry-title">
              <?php the_title(); ?>
            </h2>
          </header>
          <div class="entry-meta">
            <span class="entry-date"><?php the_date('d.m.Y'); ?></span>
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

  die();
}
add_action('wp_ajax_load_filtered_posts', 'load_filtered_posts');
add_action('wp_ajax_nopriv_load_filtered_posts', 'load_filtered_posts');


/* HANDLE INSURANCE UPDATE */

// Fonction pour obtenir les IDs d'assurance selon l'environnement
function get_insurance_ids() {
    // Détecter l'environnement (à adapter selon votre configuration)
    $is_production = (strpos($_SERVER['HTTP_HOST'], 'aquadomia.wpenginepowered.com') !== false);
    $is_production_bis = (strpos($_SERVER['HTTP_HOST'], 'aquadomia.com') !== false);

    if ($is_production || $is_production_bis) {
        return array(
            'basic' => 56506,
            'premium' => 56505
        );
    } else {
        return array(
            'basic' => 56477,
            'premium' => 56480
        );
    }
}

// Fonction pour obtenir tous les IDs d'assurance possibles
function get_all_insurance_ids() {
    return array(56477, 56480, 56506, 56505);
}

// Ajouter le JavaScript pour la mise à jour AJAX
add_action('wp_footer', 'add_insurance_ajax_script');
function add_insurance_ajax_script() {
    if (is_cart()) {
        $all_insurance_ids = get_all_insurance_ids();
        ?>
        <script>
        jQuery(document).ready(function($) {
            // Gérer le changement des cases à cocher d'assurance
            $('.insurance-checkbox').on('change', function() {
                var $checkbox = $(this);

                // Décocher les autres cases d'assurance
                $('.insurance-checkbox').not(this).prop('checked', false);

                // Activer le bouton de mise à jour du panier
                $('button[name="update_cart"]').prop('disabled', false);
                $('input[name="update_cart"]').prop('disabled', false);
            });

            // Gérer la suppression d'un produit du panier
            $(document).on('click', '.remove', function(e) {
                var $removeButton = $(this);
                var productId = $removeButton.data('product_id');
                var insurance_ids = ['56477', '56480', '56506', '56505'];

                // Si c'est une assurance qui est supprimée
                if (insurance_ids.includes(productId)) {
                    e.preventDefault(); // Empêcher le comportement par défaut

                    $.ajax({
                        url: wc_add_to_cart_params.ajax_url,
                        type: 'POST',
                        data: {
                            action: 'remove_insurance',
                            product_id: productId,
                            security: wc_add_to_cart_params.nonce
                        },
                        success: function(response) {
                            if (response.success) {
                                // Décocher la case correspondante
                                $('.insurance-checkbox[value="' + productId + '"]').prop('checked', false);

                                // Recharger les fragments du panier
                                if (response.fragments) {
                                    $.each(response.fragments, function(key, value) {
                                        $(key).replaceWith(value);
                                    });
                                }

                                // Activer le bouton de mise à jour
                                $('button[name="update_cart"]').prop('disabled', false);
                                $('input[name="update_cart"]').prop('disabled', false);
                            }
                        }
                    });
                }
            });
        });
        </script>
        <?php
    }
}

// Gérer la suppression AJAX de l'assurance
add_action('wp_ajax_remove_insurance', 'handle_remove_insurance');
add_action('wp_ajax_nopriv_remove_insurance', 'handle_remove_insurance');
function handle_remove_insurance() {
    check_ajax_referer('wc_add_to_cart_nonce', 'security');

    if (!isset($_POST['product_id'])) {
        wp_send_json_error();
        return;
    }

    $product_id = absint($_POST['product_id']);
    $insurance_products = array(56477, 56480, 56506, 56505);

    // Vérifier que c'est bien une assurance
    if (!in_array($product_id, $insurance_products)) {
        wp_send_json_error();
        return;
    }

    // Trouver et supprimer l'assurance du panier
    $cart_id = WC()->cart->generate_cart_id($product_id);
    $cart_item_key = WC()->cart->find_product_in_cart($cart_id);

    if ($cart_item_key) {
        WC()->cart->remove_cart_item($cart_item_key);
        WC()->session->set('selected_insurance_' . $product_id, false);
    }

    // Renvoyer les fragments mis à jour
    WC_AJAX::get_refreshed_fragments();
}

// Conserver l'état des cases à cocher après la mise à jour du panier
add_action('woocommerce_update_cart_action_cart_updated', 'handle_insurance_update');
function handle_insurance_update($cart_updated) {
    $all_insurance_ids = get_all_insurance_ids();

    // Supprimer d'abord toutes les assurances existantes
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if (in_array($cart_item['product_id'], $all_insurance_ids)) {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }

    // Réinitialiser les sessions
    foreach ($all_insurance_ids as $id) {
        WC()->session->set('selected_insurance_' . $id, false);
    }

    // Ajouter la nouvelle assurance si sélectionnée
    if (isset($_POST['add_insurance']) && is_array($_POST['add_insurance'])) {
        foreach ($_POST['add_insurance'] as $insurance_id) {
            if (in_array($insurance_id, $all_insurance_ids)) {
                WC()->cart->add_to_cart($insurance_id, 1);
                WC()->session->set('selected_insurance_' . $insurance_id, true);
            }
        }
    }

    return $cart_updated;
}

// Restaurer l'état des cases à cocher au chargement du panier
add_action('woocommerce_cart_loaded_from_session', 'restore_insurance_selections');
function restore_insurance_selections() {
    $all_insurance_ids = get_all_insurance_ids();

    // Forcer la réinitialisation des sessions à false
    foreach ($all_insurance_ids as $id) {
        WC()->session->set('selected_insurance_' . $id, false);
    }

    // Vérifier si les produits d'assurance sont dans le panier
    foreach (WC()->cart->get_cart() as $cart_item) {
        if ($cart_item['product_id'] == 56477) {
            WC()->session->set('selected_insurance_56477', true);
        } elseif ($cart_item['product_id'] == 56480) {
            WC()->session->set('selected_insurance_56480', true);
        }
    }
}

// Supprimer le message "Panier mis à jour" lors de la sélection d'assurance
add_filter('woocommerce_cart_updated_notice_type', function($notice_type) {
    if (isset($_POST['add_insurance'])) {
        return 'hidden';
    }
    return $notice_type;
});

/* CUSTOMIZER SETTINGS */

function add_contact_customizer_settings($wp_customize) {
    // Ajouter une nouvelle section
    $wp_customize->add_section('contact_section', array(
        'title'    => 'Informations de contact',
        'priority' => 30,
    ));

    // Ajouter le champ email
    $wp_customize->add_setting('contact_email', array(
        'default'   => 'contact@aquadomia.com',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('contact_email', array(
        'label'    => 'Email de contact',
        'section'  => 'contact_section',
        'type'     => 'email',
    ));

    // Ajouter le champ téléphone
    $wp_customize->add_setting('contact_phone', array(
        'default'   => '+33 (0)4 13 333 800',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label'    => 'Numéro de téléphone',
        'section'  => 'contact_section',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'add_contact_customizer_settings');



// function disable_image_compression() {
//     // Qualité maximale pour tous les types d'images
//     add_filter('jpeg_quality', function() {
//         return 100;
//     });

//     add_filter('wp_editor_set_quality', function() {
//         return 100;
//     });

//     add_filter('wp_compress_image', function() {
//         return false;
//     });

//     add_filter('webp_quality', function() {
//         return 100;
//     });

//     // Désactiver le redimensionnement des grandes images
//     // add_filter('big_image_size_threshold', '__return_false');

//     // Forcer l'utilisation des images originales pour WooCommerce
//     add_filter('woocommerce_get_image_size_thumbnail', function($size) {
//         return array(
//             'width' => 0,
//             'height' => 0,
//             'crop' => 0,
//         );
//     });

//     add_filter('woocommerce_get_image_size_single', function($size) {
//         return array(
//             'width' => 0,
//             'height' => 0,
//             'crop' => 0,
//         );
//     });

//     add_filter('woocommerce_get_image_size_gallery_thumbnail', function($size) {
//         return array(
//             'width' => 0,
//             'height' => 0,
//             'crop' => 0,
//         );
//     });

//     // Utiliser l'image originale au lieu des tailles générées
//     add_filter('image_downsize', function($out, $id, $size) {
//         $img_url = wp_get_attachment_url($id);
//         return array($img_url, 0, 0, false);
//     }, 10, 3);
// }
// add_action('init', 'disable_image_compression');

// // Désactiver la génération des tailles d'images supplémentaires
// add_filter('intermediate_image_sizes_advanced', function($sizes) {
//     return array();
// });
