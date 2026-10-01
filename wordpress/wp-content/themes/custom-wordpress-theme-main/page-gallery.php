<?php

$gallery_title  = get_field('gallery_title');
$gallery_images = get_field('gallery_images');

?>

<section class="gallery" id="gallery">

    <div class="container">

        <?php if ($gallery_title) : ?>

            <div class="section-head">
                <?php echo wp_kses_post($gallery_title); ?>
            </div>

        <?php endif; ?>


        <?php if (!empty($gallery_images)) : ?>

            <div class="image-list">

                <?php foreach ($gallery_images as $gallery_image) : ?>

                    <?php

                    $image_id = is_array($gallery_image)
                        ? ($gallery_image['ID'] ?? 0)
                        : $gallery_image;

                    if (!$image_id) {
                        continue;
                    }

                    $image_url = wp_get_attachment_image_url(
                        $image_id,
                        'full'
                    );

                    $image_alt = get_post_meta(
                        $image_id,
                        '_wp_attachment_image_alt',
                        true
                    );

                    if (!$image_alt) {
                        $image_alt = 'Smile transformation result';
                    }

                    ?>

                    <a
                        href="<?php echo esc_url($image_url); ?>"
                        class="image-item"
                        data-fancybox="gallery"
                        aria-label="View smile transformation"
                    >

                        <?php
                        echo wp_get_attachment_image(
                            $image_id,
                            'full',
                            false,
                            array(
                                'class'   => 'full-image',
                                'alt'     => $image_alt,
                                'loading' => 'lazy',
                            )
                        );
                        ?>

                        <span class="gallery-overlay" aria-hidden="true">

                            <i class="fa-solid fa-magnifying-glass"></i>

                        </span>

                    </a>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>