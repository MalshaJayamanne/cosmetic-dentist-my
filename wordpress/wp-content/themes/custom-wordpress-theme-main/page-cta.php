<?php

$cta_image   = get_field('cta_image');
$cta_content = get_field('cta_content');
$cta_link    = get_field('cta_link');

?>

<section class="cta" id="cta">

    <div class="cta-grid">

        <div class="cta-txt">

            <?php if ($cta_content) : ?>
                <?php echo wp_kses_post($cta_content); ?>
            <?php endif; ?>

            <?php if ($cta_link) : ?>
                <a
                    class="btn btn-gold"
                    href="<?php echo esc_url($cta_link['url']); ?>"
                    target="<?php echo esc_attr($cta_link['target'] ?: '_self'); ?>"
                >
                    <?php echo esc_html($cta_link['title']); ?>
                </a>
            <?php endif; ?>

        </div>


        <div class="cta-img">

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
                        src="<?php echo esc_url($cta_image_url); ?>"
                        alt="<?php echo esc_attr($cta_image_alt ?: 'Smile transformation'); ?>"
                    >

                <?php endif; ?>

            <?php endif; ?>

        </div>

    </div>

</section>