<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<?php
$hero_image   = get_field('hero_image');
$hero_content = get_field('hero_content');
?>

<section class="hero" id="hero">
    <div class="row">

        <div class="col-lg-6 hero-image">

            <?php if ($hero_image) : ?>

                <?php
                $hero_image_url = wp_get_attachment_image_url($hero_image, 'full');
                $hero_image_alt = get_post_meta($hero_image, '_wp_attachment_image_alt', true);
                ?>

                <?php if ($hero_image_url) : ?>
                    <img
                        src="<?php echo esc_url($hero_image_url); ?>"
                        alt="<?php echo esc_attr($hero_image_alt ?: 'Patient smiling'); ?>"
                    >
                <?php endif; ?>

            <?php endif; ?>

        </div>

        <div class="col-lg-6">

            <div class="hero-form">

                <?php if ($hero_content) : ?>
                    <?php echo $hero_content; ?>
                <?php endif; ?>

                <form class="form" id="form" action="#" method="post">

                    <div class="mb-4 text-center">
                        <label class="screen-reader-text" for="lf-name">Name</label>
                        <input
                            id="lf-name"
                            type="text"
                            name="name"
                            placeholder="NAME"
                            required
                        >
                    </div>

                    <div class="mb-4 text-center">
                        <label class="screen-reader-text" for="lf-email">Email</label>
                        <input
                            id="lf-email"
                            type="email"
                            name="email"
                            placeholder="EMAIL"
                            required
                        >
                    </div>

                    <div class="mb-4 text-center">
                        <label class="screen-reader-text" for="lf-phone">Phone number</label>
                        <input
                            id="lf-phone"
                            type="tel"
                            name="phone"
                            placeholder="PHONE NUMBER"
                        >
                    </div>

                    <div class="mb-4 text-center">
                        <label class="screen-reader-text" for="lf-message">Message</label>
                        <input
                            id="lf-message"
                            type="text"
                            name="message"
                            placeholder="MESSAGE"
                        >
                    </div>

                    <div>
                        <button class="btn btn-gold" type="submit">
                            Schedule an appointment
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</section>

<?php get_footer();
