<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function replace_menu_item_with_svg($items, $args) {

  if ($args->theme_location == 'secondary_menu') {

        $items = str_replace('Contact',
          '<svg width="42" height="30" viewBox="0 0 42 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M38.4518 1H3.54825C2.14089 1 1 2.14089 1 3.54825V26.1432C1 27.5505 2.14089 28.6914 3.54825 28.6914H38.4518C39.8591 28.6914 41 27.5505 41 26.1432V3.54825C41 2.14089 39.8591 1 38.4518 1Z" stroke="#1C2240" stroke-miterlimit="10"/>
              <path d="M1.4082 2.20235L19.5534 17.2254C20.3527 17.8949 21.5141 17.9109 22.3316 17.2664L40.5474 2.13403" stroke="#1C2240" stroke-miterlimit="10"/>
              <path d="M16.7197 14.8867L1.2002 27.1361" stroke="#1C2240" stroke-miterlimit="10"/>
              <path d="M25.2568 14.8458L40.7217 27.2978" stroke="#1C2240" stroke-miterlimit="10"/>
            </svg>
          </div>'
        , $items);

        $phone_contact = get_theme_mod('contact_phone', '01 23 45 67 89');

        $svg =
        '<div class="menu-contact-icons">
          <li class="menu-phone-icon">
            <svg width="32" height="35" viewBox="0 0 32 35" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_4233_176)">
            <path d="M8.1781 1.4634C8.98359 2.65286 10.0778 4.27249 10.9872 5.61208C11.9746 7.07004 11.8244 9.01591 10.6263 10.3064L8.92585 12.1397C8.15501 12.9712 8.02798 14.2097 8.61116 15.1797C9.91899 17.3508 12.6588 21.2339 17.1597 24.6175C18.3896 25.5413 20.0698 25.6106 21.3575 24.7676C22.0561 24.3115 22.7837 23.786 23.4217 23.3068C24.5419 22.4638 26.1124 22.5792 27.094 23.581L30.7981 27.3573C31.6209 28.1974 31.8115 29.4851 31.2312 30.5071C29.9782 32.7099 26.8515 35.6691 19.5184 32.8052C9.11639 28.746 0.195425 15.9246 0.437937 6.29342C0.458146 5.50815 0.720867 4.74885 1.20012 4.12525C1.89301 3.2245 3.13444 1.88779 5.07742 0.747411C6.13119 0.126697 7.49099 0.450046 8.17522 1.4634H8.1781Z" stroke="black" stroke-width="0.866113" stroke-miterlimit="10"/>
            </g>
            <defs>
            <clipPath id="clip0_4233_176">
            <rect width="32" height="34.4251" fill="white"/>
            </clipPath>
            </defs>
            </svg>
            <span class="phone-contact">' . esc_html($phone_contact) . '</span>
          </li>';
        $items = $svg . $items;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'replace_menu_item_with_svg', 10, 2);


?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
}
?>
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content"
	title="<?php echo esc_attr( astra_default_strings( 'string-header-skip-link', false ) ); ?>">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div
<?php
	echo wp_kses_post(
		astra_attr(
			'site',
			array(
				'id'    => 'page',
				'class' => 'hfeed site',
			)
		)
	);
	?>
>
	<?php
	astra_header_before();

	astra_header();

	astra_header_after();

	astra_content_before();
	?>
	<div id="content" class="site-content">
    <?php
      if (is_product_category()) {
        echo '<div class="product-cat-container">';
      } else {
        echo '<div class="ast-container">';
      }
    ?>
		<?php astra_content_top(); ?>
