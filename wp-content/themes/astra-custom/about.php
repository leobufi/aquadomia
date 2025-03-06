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

    <div class="about-headline">
      <h2>
        <?php
          $baseline = get_post_meta(get_the_ID(), 'baseline', true);
          echo esc_html($baseline);
        ?>
      </h2>
    </div>

    <div class="team-main-container">
      <div id="stats-certifs" class="main-wrapper pdg-top-sml">
        <div class="inset-title">
          <h2>Nos formations</h2>
        </div>
        <div class="content">
          <h2>Des formations certifiées</h2>
          <p>
            <?php
              $texte_nos_formations = get_post_meta(get_the_ID(), 'texte_nos_formations', true);
              echo esc_html($texte_nos_formations);
            ?>
          </p>
        </div>
        <div class="inset-title">
          <h2>Formations certifiées</h2>
        </div>
        <div class="stats-certifs">
          <div class="stat">
            <?php
              $nombre_formations_certif = get_post_meta(get_the_ID(), 'nombre_formations_certif', true);
              echo esc_html($nombre_formations_certif);
            ?>
          </div>
          <?php
          $logo_certif_1 = get_post_meta(get_the_ID(), 'logo_certif_1', true);
          $logo_certif_1_url = wp_get_attachment_url($logo_certif_1);
          $file_certif_1 = get_post_meta(get_the_ID(), 'file_certif_1', true);
          $file_certif_1_url = wp_get_attachment_url($file_certif_1);
          $logo_certif_2 = get_post_meta(get_the_ID(), 'logo_certif_2', true);
          $logo_certif_2_url = wp_get_attachment_url($logo_certif_2);
          $file_certif_2 = get_post_meta(get_the_ID(), 'file_certif_2', true);
          $file_certif_2_url = wp_get_attachment_url($file_certif_2);
          if ( ! empty( $logo_certif_1 ) ) {
            echo '<div class="certif">';
              echo '<img src="' . esc_url( $logo_certif_1_url ) . '" alt="Certification formation plongée" />';
              if (!empty ($file_certif_1)) {
                echo '<a href="' . esc_url($file_certif_1_url) . '" target="_blank">Télécharger les certificats</a>';
              }
            echo '</div>';
          }
          if ( ! empty( $logo_certif_2 ) ) {
            echo '<div class="certif">';
              echo '<img src="' . esc_url( $logo_certif_2_url ) . '" alt="Certification formation plongée" />';
              if (!empty ($file_certif_2)) {
                echo '<a href="' . esc_url($file_certif_2_url) . '" target="_blank">Télécharger les certificats</a>';
              }
            echo '</div>';
          }
          ?>
        </div>
      </div>
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
              $diplomes_certifs = get_user_meta($user->ID, 'diplomes_certifs', true);
              $lines = explode("\n", $diplomes_certifs);
              $certificats = get_user_meta($user->ID, 'certificats', true);
              $certificats_url = wp_get_attachment_url($certificats);
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
                        <?php if (!empty($diplomes_certifs)) {
                          echo '<div class="user-certifs">';
                          echo '<span>Nos diplômes et certications</span>';
                          foreach ($lines as $line) {
                            $line = trim($line);
                            if (!empty($line)) {
                                echo '<p>→ ' . esc_html($line) . '</p>';
                            }
                          }
                          echo '</div>';
                        }
                        if (!empty ($certificats)) {
                          echo '<a href="' . esc_url($certificats_url) . '" target="_blank">Télécharger les certificats</a>';
                        }
                        ?>
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
