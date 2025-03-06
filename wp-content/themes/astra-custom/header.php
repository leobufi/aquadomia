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
    if (!in_array($args->theme_location, ['secondary_menu', 'mobile_menu'])) {
        return $items;
    }

    $phone_contact = get_theme_mod('contact_phone', '01 23 45 67 89');

    $mail_svg = Astra_Icons::get_icons('contact');
    $phone_svg = Astra_Icons::get_icons('phone');

    if ($args->theme_location === 'secondary_menu') {
        $items = str_replace('Contact', $mail_svg . '</div>', $items);

        $phone_item = '<div class="menu-contact-icons">
            <li class="menu-phone-icon">
                ' . $phone_svg . '
                <span class="phone-contact">' . esc_html($phone_contact) . '</span>
            </li>';
        $items = $phone_item . $items;
    }

    if ($args->theme_location === 'mobile_menu') {
        $contact_pos = strpos($items, '>Contact<');
        if ($contact_pos !== false) {
            $li_start = strrpos(substr($items, 0, $contact_pos), '<li');
            $li_end = strpos($items, '</li>', $contact_pos) + 5;

            $new_contact_items = '
                <li class="menu-item menu-item-type-custom">
                    <a href="/contact" class="menu-link">
                      ' . $mail_svg . '
                      <span>Contact Mail</span>
                    </a>
                </li>
                <li class="phone menu-item menu-item-type-post_type menu-item-object-page border-bottom">
                    ' . $phone_svg . '
                    <span class="phone-contact">' . esc_html($phone_contact) . '</span>
                </li>';

            $items = substr($items, 0, $li_start) . $new_contact_items . substr($items, $li_end);
        }
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
