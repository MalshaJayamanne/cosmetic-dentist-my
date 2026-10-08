<?php

/**
 * Testimonials (video) section.
 */

$has_acf = function_exists('get_field');

$testimonial_title = $has_acf
    ? get_field('testimonial_title')
    : '';

$testimonial_videos = $has_acf
    ? get_field('testimonial_videos')
    : array();

?>

<section class="testimonials" id="testimonials">

    <div class="container">

        <?php if ($testimonial_title) : ?>

            <div class="section-head">
                <?php echo wp_kses_post($testimonial_title); ?>
            </div>

        <?php endif; ?>


        <?php if (!empty($testimonial_videos)) : ?>

            <div class="video-grid">

                <?php foreach ($testimonial_videos as $index => $video) : ?>

                    <?php
                    $image = $video['image'] ?? '';
                    $link  = $video['link'] ?? '';

                    $image_id = is_array($image)
                        ? ($image['ID'] ?? 0)
                        : $image;

                    $video_url = is_array($link)
                        ? ($link['url'] ?? '')
                        : $link;

                    if (!$video_url) {
                        continue;
                    }

                    $label = sprintf(
                        'Play patient testimonial video %d',
                        $index + 1
                    );
                    ?>


                    <a
                        href="<?php echo esc_url($video_url); ?>"
                        class="video-card"
                        data-fancybox="testimonial-videos"
                        aria-label="<?php echo esc_attr($label); ?>"
                    >

                        <?php if ($image_id) : ?>

                            <?php
                            get_image(
                                $image_id,
                                'testimonial',
                                ''
                            );
                            ?>

                        <?php endif; ?>


                        <span
                            class="play-button"
                            aria-hidden="true"
                        >
                            <i class="fa-solid fa-play"></i>
                        </span>

                    </a>


                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>