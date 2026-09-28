<?php

$testimonial_title  = get_field('testimonial_title');
$testimonial_videos = get_field('testimonial_videos');

?>

<section class="testimonials" id="testimonials">

    <div class="container">

        <?php if ($testimonial_title) : ?>
            <div class="section-head">
                <?php echo wp_kses_post($testimonial_title); ?>
            </div>
        <?php endif; ?>


        <?php if ($testimonial_videos) : ?>

            <div class="video-grid">

                <?php foreach ($testimonial_videos as $video) : ?>

                    <?php
                    $video_image = $video['image'] ?? '';
                    $video_link  = $video['link'] ?? '';

                    $image_id = is_array($video_image)
                        ? ($video_image['ID'] ?? 0)
                        : $video_image;
                    ?>

                    <?php if ($video_link && !empty($video_link['url'])) : ?>

                        <a
                            class="video-card"
                            href="<?php echo esc_url($video_link['url']); ?>"
                            target="<?php echo esc_attr($video_link['target'] ?: '_self'); ?>"
                        >

                            <?php if ($image_id) : ?>

                                <?php get_image(
                                    $image_id,
                                    'testimonial',
                                    'Patient testimonial video'
                                ); ?>

                            <?php endif; ?>

                            <span class="play-button" aria-label="Play video">
                                <i class="fa-solid fa-play"></i>
                            </span>

                        </a>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>