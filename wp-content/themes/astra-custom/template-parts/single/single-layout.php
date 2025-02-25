<?php
/**
 * Template for Single post
 *
 * @package     Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

  function blocks_divided_content($content) {

    if (empty($content)) {
        return [
            'first_paragraph' => '',
            'first_half' => '',
            'second_half' => ''
        ];
    }

    $first_paragraph = '';
    if (preg_match('/<p>(.*?)<\/p>/', $content, $matches)) {
        $first_paragraph = $matches[0];
    }

    $remaining_content = str_replace($first_paragraph, '', $content);

    if (empty($remaining_content)) {
        return [
            'first_paragraph' => $first_paragraph,
            'first_half' => '',
            'second_half' => ''
        ];
    }

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $loaded = $dom->loadHTML(mb_convert_encoding($remaining_content, 'HTML-ENTITIES', 'UTF-8'));
    libxml_clear_errors();

    if (!$loaded) {
        return [
            'first_paragraph' => $first_paragraph,
            'first_half' => '',
            'second_half' => ''
        ];
    }

    $body = $dom->getElementsByTagName('body')->item(0);
    $children = $body->childNodes;

    $total_children = $children->length;
    $half_children = ceil($total_children / 2);

    $first_half_content = '';
    $second_half_content = '';

    for ($i = 0; $i < $total_children; $i++) {
        $child = $children->item($i);
        if ($i < $half_children) {
            $first_half_content .= $dom->saveHTML($child);
        } else {
            $second_half_content .= $dom->saveHTML($child);
        }
    }

    $first_half_content = force_balance_tags($first_half_content);
    $second_half_content = force_balance_tags($second_half_content);

    return [
        'first_paragraph' => $first_paragraph,
        'first_half' => $first_half_content,
        'second_half' => $second_half_content
    ];
  }
?>

  <div <?php astra_blog_layout_class( 'single-layout-1' ); ?>>
    <div class="page-title-container">
      <div>
        <h2>
          Le blog d'Aquadomia
        </h2>
        <span>Retrouvez toutes nos actualités !</span>
      </div>
      <button id="back-to-blog-index" data-post-id="<?php the_ID(); ?>" data-post-year="<?php echo get_the_date('Y'); ?>">Retour aux articles</button>
      <script>
        document.getElementById('back-to-blog-index').addEventListener('click', function() {
            const postId = this.getAttribute('data-post-id');
            const postYear = this.getAttribute('data-post-year');
            const blogUrl = '<?php echo esc_url(home_url('/blog')); ?>';
            window.location.href = `${blogUrl}?highlight=${postId}&filter_year=${postYear}`;
        });
      </script>
    </div>

    <?php astra_single_header_before(); ?>

    <?php if ( apply_filters( 'astra_single_layout_one_banner_visibility', true ) ) { ?>

        <header class="entry-header article-wrapper <?php astra_entry_header_class(); ?>">

          <?php astra_single_header_top(); ?>

          <?php astra_banner_elements_order(); ?>

          <?php astra_single_header_bottom(); ?>

        </header><!-- .entry-header -->

    <?php } ?>

      <?php astra_single_header_after(); ?>

      <div class="main-wrapper">
        <div class="entry-content clear"
        <?php
              echo wp_kses_post(
                astra_attr(
                  'article-entry-content-single-layout',
                  array(
                    'class' => '',
                  )
                )
              );
              ?>
        >

        <?php astra_entry_content_before(); ?>
        <div class="article-2cols-grid">
          <?php if ( has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
              <?php the_post_thumbnail('medium'); ?>
            </div>
            <?php else : ?>
            <div class="post-thumbnail">
              <?php
              $logo_id = 206;
              $logo_url = wp_get_attachment_url($logo_id);
              ?>
                  <div class="single-product-image">
                  <img src="<?php echo esc_url($logo_url) ?>" alt="Logo Aquadomia" />
                  </div>
            </div>
            <?php endif; ?>

            <?php  $content_blocks = blocks_divided_content(get_the_content()); ?>

          <?php if ( ! empty($content_blocks['first_paragraph'])  ) : ?>
            <div class="first-paragraph">
                <?php echo $content_blocks['first_paragraph']; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="article-2cols-grid">
          <div class="first-half">
              <?php echo $content_blocks['first_half']; ?>
          </div>

          <div class="second-half">
              <?php echo $content_blocks['second_half']; ?>
          </div>
        </div>
        <?php
          astra_edit_post_link(
            sprintf(
              /* translators: %s: Name of current post */
              esc_html__( 'Edit %s', 'astra' ),
              the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link">',
            '</span>'
          );
          ?>

        <?php astra_entry_content_after(); ?>

        <?php
          wp_link_pages(
            array(
              'before'      => '<div class="page-links">' . esc_html( astra_default_strings( 'string-single-page-links-before', false ) ),
              'after'       => '</div>',
              'link_before' => '<span class="page-link">',
              'link_after'  => '</span>',
            )
          );
          ?>
      </div><!-- .entry-content .clear -->
    </div>

</div>
