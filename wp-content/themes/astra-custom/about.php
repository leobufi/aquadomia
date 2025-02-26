<?php
/**
 * Template Name: About page

 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

<?php endif ?>

	<div class ="about-page" id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>
    <div class="team-main-container">
      <div class="page-title-container">
        <div class="inset-title">
          <h2>L'équipe</h2>
        </div>
      </div>
      <div class="main-profil-wrapper">
        <?php
          $users = get_users();
          foreach ($users as $user) {
            $is_associated = get_field('associe', 'user_' . $user->ID);

            if ($is_associated) {
              $first_name = get_user_meta($user->ID, 'first_name', true);
              $last_name = get_user_meta($user->ID, 'last_name', true);
              $account_role = get_field('account_role', 'user_' . $user->ID);
              $image_profil = get_field('image_profil', 'user_' . $user->ID);
              $biographical_info = get_user_meta($user->ID, 'description', true);
              ?>
                <div class="user-info">
                    <div class="user-name">
                        <div>
                          <h2><?php echo esc_html($first_name) . ' ' . esc_html($last_name); ?></h2>
                          <p class="associe">Associé</p>
                        </div>
                        <p class="role"><?php echo esc_html($account_role); ?></p>
                    </div>
                    <div class="user-image">
                        <?php if ($image_profil) : ?>
                            <img src="<?php echo esc_url($image_profil); ?>" alt="<?php echo esc_attr($first_name) . ' ' . esc_attr($last_name); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="user-bio">
                        <p><?php echo esc_html($biographical_info); ?></p>
                    </div>
                </div>
              <?php
            }
          }
        ?>

      </div>
      <div class="sub-profil-wrapper">
        <div class="slick-slider">
          <?php
            $users = get_users();
            foreach ($users as $user) {
              $is_associated = get_field('associe', 'user_' . $user->ID);
              $account_role = get_field('account_role', 'user_' . $user->ID);

              if (!$is_associated & ! empty($account_role)) {
                  $first_name = get_user_meta($user->ID, 'first_name', true);
                  $last_name = get_user_meta($user->ID, 'last_name', true);
                  $image_profil = get_field('image_profil', 'user_' . $user->ID);
                  $biographical_info = get_user_meta($user->ID, 'description', true);
                  ?>
                  <div class="user-info">
                    <div class="user-image">
                        <?php if ($image_profil) : ?>
                            <img src="<?php echo esc_url($image_profil); ?>" alt="<?php echo esc_attr($first_name) . ' ' . esc_attr($last_name); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="user-name">
                        <h2><?php echo esc_html($first_name) . ' ' . esc_html($last_name); ?></h2>
                        <p class="role"><?php echo esc_html($account_role); ?></p>
                    </div>
                    <div class="user-bio">
                        <p><?php echo esc_html($biographical_info); ?></p>
                    </div>
                  </div>
                <?php
              }
            }
          ?>
        </div>
      </div>

    </div>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
