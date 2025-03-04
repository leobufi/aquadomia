<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
<?php
	astra_content_after();

	astra_footer_before();
  ?>
  <footer id="colophon" class="site-footer">
      <div class="footer-main">
          <!-- Première section -->
          <div class="footer-address">
              <?php
              $menu = wp_get_nav_menu_object('footer');
              if ($menu) {
                  $address = get_field('address', $menu);
                  if ($address) {
                      $lines = explode("\n", $address);
                      if (!empty($lines[0])) {
                          echo '<p class="address-title">' . $lines[0] . '</p>';
                      }
                      if (count($lines) > 1) {
                          $remaining_lines = array_slice($lines, 1);
                          echo '<p class="address-content">' . implode("\n", $remaining_lines) . '</p>';
                      }
                  }
              }
              ?>
          </div>

          <!-- Deuxième section -->
          <div class="footer-formation">
              <?php
              if ($menu) {
                $formation = get_field('mention_organisme_formation_pro', $menu);
                if ($formation) {
                    $lines = explode("\n", $formation);
                    if (!empty($lines[0])) {
                        echo '<p class="formation-title">' . $lines[0] . '</p>';
                    }
                    if (count($lines) > 1) {
                        $remaining_lines = array_slice($lines, 1);
                        echo '<p class="formation-content">' . implode("\n", $remaining_lines) . '</p>';
                    }
                  }
              }
              ?>
          </div>

          <!-- Troisième section -->
          <div class="footer-contact">
              <?php
                $contact_icon = Astra_Icons::get_icons('contact');
                $phone_icon = Astra_Icons::get_icons('phone');
              ?>
              <div class="contact-email">
                  <?php echo $contact_icon; ?>
                  <?php echo get_theme_mod('contact_email'); ?>
              </div>
              <div class="contact-separator"></div>
              <div class="contact-phone">
                  <?php echo $phone_icon ?>
                  <?php echo get_theme_mod('contact_phone'); ?>
              </div>
          </div>
      </div>

      <div class="footer-bottom">
          <!-- Section réseaux sociaux -->
          <div class="social-links">
              <?php
              if ($menu) {
                  $social_networks = array(
                      'instagram' => array(
                          'name' => 'Instagram',
                          'icon' => Astra_Icons::get_icons('instagram')
                      ),
                      'facebook' => array(
                          'name' => 'Facebook',
                          'icon' => Astra_Icons::get_icons('facebook')
                      ),
                      'linkedin' => array(
                          'name' => 'LinkedIn',
                          'icon' => Astra_Icons::get_icons('linkedin')
                      ),
                      'tik_tok' => array(
                          'name' => 'TikTok',
                          'icon' => Astra_Icons::get_icons('tiktok')
                      ),
                      'youtube' => array(
                          'name' => 'YouTube',
                          'icon' => Astra_Icons::get_icons('youtube')
                      )
                  );

                  foreach ($social_networks as $key => $network) {
                      $link = get_field($key, $menu);
                      if ($link) {
                          echo '<a href="' . esc_url($link) . '" class="social-icon ' . $key . '" target="_blank" rel="noopener noreferrer">';
                          echo $network['icon'];
                          echo '</a>';
                      }
                  }
              }
              ?>
          </div>

          <!-- Section liens légaux et copyright -->
          <div class="legal-copyright">
              <span class="copyright">© Aquadomia 2025</span>
              <a href="/mentions-legales">Mentions légales</a>
              <a href="/cgv">CGV</a>
          </div>
      </div>
  </footer>
  <?php astra_footer_after(); ?>
	</div><!-- #page -->
<?php
	astra_body_bottom();
	wp_footer();
?>
</body>
</html>
