<?php get_header(); ?>


<?php
$hero_image   = get_field('hero_image');
$hero_content = get_field('hero_content');
?>

<section class="hero">

    <?php if ($hero_image) : ?>

        <?php
        get_image(
            $hero_image,
            'Patient smiling'
        );
        ?>

    <?php endif; ?>


    <div class="container">

        <div class="inner">

            <div class="content-wrapper">

                <?php if ($hero_content) : ?>

                    <div class="hero-form">
                        <?php echo wp_kses_post($hero_content); ?>
                    </div>

                <?php endif; ?>


                <div class="form-wrapper">

                    <form
                        class="form"
                        id="form"
                        action="#"
                        method="post"
                    >

                        <div class="form-field">

                            <label
                                class="screen-reader-text"
                                for="lf-name"
                            >
                                Name
                            </label>

                            <input
                                id="lf-name"
                                type="text"
                                name="name"
                                placeholder="NAME"
                                required
                            >

                        </div>


                        <div class="form-field">

                            <label
                                class="screen-reader-text"
                                for="lf-email"
                            >
                                Email
                            </label>

                            <input
                                id="lf-email"
                                type="email"
                                name="email"
                                placeholder="EMAIL"
                                required
                            >

                        </div>


                        <div class="form-field">

                            <label
                                class="screen-reader-text"
                                for="lf-phone"
                            >
                                Phone number
                            </label>

                            <input
                                id="lf-phone"
                                type="tel"
                                name="phone"
                                placeholder="PHONE NUMBER"
                            >

                        </div>


                        <div class="form-field">

                            <label
                                class="screen-reader-text"
                                for="lf-message"
                            >
                                Message
                            </label>

                            <input
                                id="lf-message"
                                type="text"
                                name="message"
                                placeholder="MESSAGE"
                            >

                        </div>


                        <div class="form-submit">

                            <button
                                class="theme-gold"
                                type="submit"
                            >
                                Schedule an appointment
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

<?php
$process_content = get_field('process_content');
$process_link    = get_field('process_link');
$process_steps   = get_field('process_steps');
?>

<section class="process" id="process">

    <div class="container">

        <!-- PROCESS HEADER -->
        <div class="title-wrapper">

            <div class="content-wrapper white-heading">

                <?php if ($process_content) : ?>

                    <?php echo wp_kses_post($process_content); ?>

                <?php endif; ?>


                <!-- PROCESS BUTTON -->
                <?php if ($process_link) : ?>

                    <a
                        class="theme-gold"
                        href="<?php echo esc_url($process_link['url']); ?>"
                        target="<?php echo esc_attr($process_link['target'] ?: '_self'); ?>"
                        <?php if (!empty($process_link['target']) && $process_link['target'] === '_blank') : ?>
                            rel="noopener noreferrer"
                        <?php endif; ?>
                    >
                        <?php echo esc_html($process_link['title']); ?>
                    </a>

                <?php endif; ?>

            </div>

        </div>


        <!-- PROCESS STEPS -->
        <?php if ($process_steps) : ?>

            <div class="process-steps row">

                <?php $step_number = 1; ?>

                <?php foreach ($process_steps as $step) : ?>

                    <div class="col-12 col-lg-4">

                        <div
                            class="step-card"
                            id="step-<?php echo esc_attr($step_number); ?>"
                        >

                            <span class="step-numbering">
                                <?php echo esc_html($step_number); ?>
                            </span>

                            <div class="content">

                                <?php if (!empty($step['title'])) : ?>

                                    <h3>
                                        <?php echo esc_html($step['title']); ?>
                                    </h3>

                                <?php endif; ?>


                                <?php if (!empty($step['content'])) : ?>

                                    <div class="description">
                                        <?php echo wp_kses_post($step['content']); ?>
                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                    <?php $step_number++; ?>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>

<?php

$welcome_image   = get_field('welcome_image');
$reviews         = get_field('review');
$welcome_content = get_field('welcome_content');
$welcome_link    = get_field('welcome_link');

?>

<section class="welcome" id="welcome">

    <div class="welcome-wrap">

        <div class="container">

            <div class="welcome-grid">

                <!-- LEFT SIDE -->
                <div class="welcome-left">

                    <?php if ($welcome_image) : ?>

                        <?php get_image(
                            $welcome_image,
                            'welcome',
                            'Patient review'
                        ); ?>

                    <?php endif; ?>


                    <!-- REVIEW -->
                    <?php if ($reviews) : ?>

                        <div class="review">

                            <div class="swiper welcome-review-swiper">

                                <div class="swiper-wrapper">

                                    <?php foreach ($reviews as $review) : ?>

                                        <div class="swiper-slide">

                                            <div class="rating-icons">
                                                ★★★★★
                                            </div>

                                            <?php if (!empty($review['text'])) : ?>

                                                <p>
                                                    <?php echo esc_html($review['text']); ?>
                                                </p>

                                            <?php endif; ?>

                                            <?php if (!empty($review['name'])) : ?>

                                                <h4>
                                                    <?php echo esc_html($review['name']); ?>
                                                </h4>

                                            <?php endif; ?>

                                        </div>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                        </div>

                    <?php endif; ?>


                </div>


                <!-- RIGHT SIDE -->
                <div class="welcome-right">

                    <div>

                        <?php if ($welcome_content) : ?>

                            <?php echo wp_kses_post($welcome_content); ?>

                        <?php endif; ?>

                    </div>


                    <!-- BUTTON -->
                    <?php if ($welcome_link) : ?>

                        <a
                            class="theme-gold"
                            href="<?php echo esc_url($welcome_link['url']); ?>"
                            target="<?php echo esc_attr($welcome_link['target'] ?: '_self'); ?>"
                            <?php if (!empty($welcome_link['target']) && $welcome_link['target'] === '_blank') : ?>
                                rel="noopener noreferrer"
                            <?php endif; ?>
                        >
                            <?php echo esc_html($welcome_link['title']); ?>
                        </a>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</section>


<?php

$service_title = get_field('service_title');
$services      = get_field('services');

?>

<section class="services" id="services">

    <div class="container">

        <!-- SECTION TITLE -->
        <?php if ($service_title) : ?>

            <div class="section-head">
                <?php echo wp_kses_post($service_title); ?>
            </div>

        <?php endif; ?>


        <!-- SERVICES -->
        <?php if ($services) : ?>

            <div class="services-swiper swiper">

                <div class="swiper-wrapper">

                    <?php for ($i = 0; $i < 2; $i++) : ?>

                        <?php foreach ($services as $service) : ?>

                            <?php
                            $service_image = $service['image'];
                            $service_name  = $service['title'];
                            $service_link  = $service['link'];
                            ?>

                            <div class="swiper-slide">

                                <div class="service-card">

                                    <!-- SERVICE IMAGE -->
                                    <?php if ($service_image) : ?>

                                        <?php if ($service_link) : ?>

                                            <a
                                                class="service-card-image-link"
                                                href="<?php echo esc_url($service_link['url']); ?>"
                                                target="<?php echo esc_attr($service_link['target'] ?: '_self'); ?>"
                                                <?php if (!empty($service_link['target']) && $service_link['target'] === '_blank') : ?>
                                                    rel="noopener noreferrer"
                                                <?php endif; ?>
                                            >
                                                <?php
                                                get_image(
                                                    $service_image,
                                                    'service',
                                                    $service_name ?: 'Cosmetic dentistry service'
                                                );
                                                ?>
                                            </a>

                                        <?php else : ?>

                                            <?php
                                            get_image(
                                                $service_image,
                                                'service',
                                                $service_name ?: 'Cosmetic dentistry service'
                                            );
                                            ?>

                                        <?php endif; ?>

                                    <?php endif; ?>


                                    <!-- SERVICE TITLE -->
                                    <?php if ($service_name) : ?>

                                        <div class="service-card-label">

                                            <?php if ($service_link) : ?>

                                                <h3>
                                                    <a
                                                        class="service-card-title"
                                                        href="<?php echo esc_url($service_link['url']); ?>"
                                                        target="<?php echo esc_attr($service_link['target'] ?: '_self'); ?>"
                                                        <?php if (!empty($service_link['target']) && $service_link['target'] === '_blank') : ?>
                                                            rel="noopener noreferrer"
                                                        <?php endif; ?>
                                                    >
                                                        <?php echo esc_html($service_name); ?>
                                                    </a>
                                                </h3>

                                            <?php else : ?>

                                                <h3>
                                                    <?php echo esc_html($service_name); ?>
                                                </h3>

                                            <?php endif; ?>

                                        </div>

                                    <?php endif; ?>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    <?php endfor; ?>

                </div>

                <!-- SWIPER ARROWS -->
                <div class="swiper-button-prev services-prev"></div>
                <div class="swiper-button-next services-next"></div>

            </div>

        <?php endif; ?>

    </div>

</section>


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
                        class="theme-gold"
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

<?php

$apart_image   = get_field('apart_image');
$apart_content = get_field('apart_content');

?>

<section class="apart-section" id="about">

    <div class="container">

        <div class="apart">

            <div class="apart-left">

                <?php if ($apart_image) : ?>

                    <?php
                    get_image(
                        $apart_image,
                        'apart',
                        'Patient enjoying a drink outdoors'
                    );
                    ?>

                <?php endif; ?>

            </div>


            <div class="apart-right">

                <?php if ($apart_content) : ?>

                    <?php echo wp_kses_post($apart_content); ?>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>

<?php

$doctor_title = get_field('doctor_title');
$doctors      = get_field('doctors');

?>

<section class="experts" id="experts">

    <div class="container">

        <?php if ($doctor_title) : ?>

            <div class="section-head">
                <?php echo wp_kses_post($doctor_title); ?>
            </div>

        <?php endif; ?>


        <?php if (!empty($doctors)) : ?>

            <!-- =====================================================
                 DOCTOR TABS
            ====================================================== -->

            <div class="expert-tabs" role="tablist">

                <?php foreach ($doctors as $index => $doctor) : ?>

                    <?php
                    $doctor_name = $doctor['title'] ?? '';
                    $active      = ($index === 0);
                    $panel_id    = 'panel-doctor-' . $index;
                    $tab_id      = $panel_id . '-tab';
                    ?>

                    <button
                        id="<?php echo esc_attr($tab_id); ?>"
                        class="expert-tab <?php echo $active ? 'active' : ''; ?>"
                        type="button"
                        role="tab"
                        aria-selected="<?php echo $active ? 'true' : 'false'; ?>"
                        aria-controls="<?php echo esc_attr($panel_id); ?>"
                        data-index="<?php echo esc_attr($index); ?>"
                    >
                        <?php echo esc_html($doctor_name); ?>
                    </button>

                <?php endforeach; ?>

            </div>


            <!-- =====================================================
                 DOCTOR CARD SWIPER
            ====================================================== -->

            <div
                class="swiper doctors-main"
                id="doctors-main-swiper"
            >

                <div class="swiper-wrapper">

                    <?php foreach ($doctors as $index => $doctor) : ?>

                        <?php
                        $doctor_name    = $doctor['title'] ?? '';
                        $doctor_image   = $doctor['image'] ?? '';
                        $doctor_content = $doctor['content'] ?? '';

                        $panel_id = 'panel-doctor-' . $index;
                        $tab_id   = $panel_id . '-tab';
                        ?>

                        <div class="swiper-slide">

                            <div
                                class="expert-panel"
                                id="<?php echo esc_attr($panel_id); ?>"
                                role="tabpanel"
                                aria-labelledby="<?php echo esc_attr($tab_id); ?>"
                            >

                                <!-- =================================================
                                     DOCTOR IMAGE
                                ================================================== -->

                                <div class="expert-left">

                                    <?php if ($doctor_image) : ?>

                                        <?php
                                        get_image(
                                            $doctor_image,
                                            'doctor',
                                            $doctor_name ?: 'Doctor'
                                        );
                                        ?>

                                    <?php endif; ?>

                                </div>


                                <!-- =================================================
                                     DOCTOR CONTENT
                                ================================================== -->

                                <div class="expert-right">

                                    <?php if ($doctor_content) : ?>

                                        <?php echo wp_kses_post($doctor_content); ?>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        <?php endif; ?>

    </div>

</section>

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

<?php

$faq_title = get_field('faq_title');
$faq_link  = get_field('faq_link');
$faqs      = get_field('faqs');

?>

<section class="faq" id="faq">

    <div class="container">

        <!-- =====================================================
             FAQ SECTION HEADING
        ====================================================== -->

        <div class="section-head">

            <?php if ($faq_title) : ?>

                <?php echo wp_kses_post($faq_title); ?>

            <?php endif; ?>


            <?php if ($faq_link) : ?>

                <a
                    href="<?php echo esc_url($faq_link['url']); ?>"
                    target="<?php echo esc_attr($faq_link['target'] ?: '_self'); ?>"
                    class="theme-gold"
                    <?php if (!empty($faq_link['target']) && $faq_link['target'] === '_blank') : ?>
                        rel="noopener noreferrer"
                    <?php endif; ?>
                >
                    <?php echo esc_html($faq_link['title']); ?>
                </a>

            <?php endif; ?>

        </div>


        <!-- =====================================================
             FAQ ACCORDION
        ====================================================== -->

        <?php if (!empty($faqs)) : ?>

            <div
                class="accordion faq-accordion"
                id="faqAccordion"
            >

                <?php foreach ($faqs as $index => $faq) : ?>

                    <?php

                    $question = $faq['question'] ?? '';
                    $answer   = $faq['answer'] ?? '';

                    $faq_number = $index + 1;

                    $heading_id  = 'faqHeading' . $faq_number;
                    $collapse_id = 'faqCollapse' . $faq_number;

                    ?>

                    <div class="accordion-item">

                        <!-- =================================================
                             QUESTION
                        ================================================== -->

                        <h3
                            class="accordion-header"
                            id="<?php echo esc_attr($heading_id); ?>"
                        >

                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                                aria-expanded="false"
                                aria-controls="<?php echo esc_attr($collapse_id); ?>"
                            >

                                <?php echo esc_html($question); ?>

                            </button>

                        </h3>


                        <!-- =================================================
                             ANSWER
                        ================================================== -->

                        <div
                            id="<?php echo esc_attr($collapse_id); ?>"
                            class="accordion-collapse collapse"
                            aria-labelledby="<?php echo esc_attr($heading_id); ?>"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body">

                                <?php if ($answer) : ?>

                                    <?php echo wp_kses_post($answer); ?>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>


<?php get_footer(); ?>


