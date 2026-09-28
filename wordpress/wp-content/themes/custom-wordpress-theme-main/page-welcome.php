<?php

$welcome_image   = get_field('welcome_image');
$welcome_review  = get_field('welcome_review');
$reviewer_name   = get_field('reviewer_name');
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
                            $reviewer_name ?: 'Patient review'
                        ); ?>

                    <?php endif; ?>


                    <!-- REVIEW -->
                    <div class="review">

                        <div class="rating-icons">
                            ★★★★★
                        </div>


                        <?php if ($welcome_review) : ?>

                            <p>
                                <?php echo esc_html($welcome_review); ?>
                            </p>

                        <?php endif; ?>


                        <?php if ($reviewer_name) : ?>

                            <h4>
                                <?php echo esc_html($reviewer_name); ?>
                            </h4>

                        <?php endif; ?>

                    </div>

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
                            class="btn btn-gold"
                            href="<?php echo esc_url($welcome_link['url']); ?>"
                            target="<?php echo esc_attr($welcome_link['target'] ?: '_self'); ?>"
                        >
                            <?php echo esc_html($welcome_link['title']); ?>
                        </a>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</section>