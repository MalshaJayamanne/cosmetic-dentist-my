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


        <?php if ($gallery_images) : ?>

            <div class="image-list">

                <?php foreach ($gallery_images as $gallery_image) : ?>

                    <?php
                    $image_id = is_array($gallery_image)
                        ? ($gallery_image['ID'] ?? 0)
                        : $gallery_image;
                    ?>

                    <?php if ($image_id) : ?>

                        <div class="image-item">

                            <?php
                            echo wp_get_attachment_image(
                                $image_id,
                                'full',
                                false,
                                array(
                                    'alt' => 'Smile transformation result'
                                )
                            );
                            ?>

                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>