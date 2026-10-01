<?php

$cta_image   = get_field('cta_image');
$cta_content = get_field('cta_content');
$cta_link    = get_field('cta_link');

?>

<section class="home-cta" id="cta">

    <!-- CTA IMAGE -->
    <div class="image-wrapper">

        <?php if ($cta_image) : ?>

            <?php
            $cta_image_url = wp_get_attachment_image_url($cta_image, 'full');

            $cta_image_alt = get_post_meta(
                $cta_image,
                '_wp_attachment_image_alt',
                true
            );
            ?>

            <?php if ($cta_image_url) : ?>

                <img
                    class="full-image"
                    src="<?php echo esc_url($cta_image_url); ?>"
                    alt="<?php echo esc_attr($cta_image_alt ?: 'Smile transformation'); ?>"
                >

            <?php endif; ?>

        <?php endif; ?>

    </div>

    <!-- CTA CONTENT -->
    <div class="container">

        <div class="inner">

            <div class="content-wrapper">

                <?php if ($cta_content) : ?>

                    <?php echo wp_kses_post($cta_content); ?>

                <?php endif; ?>


                <?php if ($cta_link) : ?>

                    <a
                        class="btn btn-gold"
                        href="<?php echo esc_url($cta_link['url']); ?>"
                        target="<?php echo esc_attr($cta_link['target'] ?: '_self'); ?>"
                        <?php if (!empty($cta_link['target']) && $cta_link['target'] === '_blank') : ?>
                            rel="noopener noreferrer"
                        <?php endif; ?>
                    >
                        <?php echo esc_html($cta_link['title']); ?>
                    </a>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>