<?php

$footer_background = get_field('footer_background', 'option');
$footer_logo       = get_field('footer_logo', 'option');
$footer_copyright  = get_field('footer_copyright', 'option');
$edm_logo          = get_field('edm_logo', 'option');

$footer_mobile   = get_field('footer_mobile', 'option');
$footer_email    = get_field('footer_email', 'option');
$footer_location = get_field('footer_location', 'option');

$footer_content = get_field('footer_content', 'option');
$footer_link    = get_field('footer_link', 'option');

?>

<footer class="footer">

    <?php if ($footer_background) : ?>

        <?php
        get_image(
            $footer_background,
            'footer-bg-image',
            ''
        );
        ?>

    <?php endif; ?>


    <div class="container">

        <div class="footer-content">


            <!-- =====================================
                 COLUMN 1
                 LOGO / SOCIAL / COPYRIGHT
            ====================================== -->

            <div class="footer-left">

                <?php if ($footer_logo) : ?>

                    <div class="footer-logo-wrapper">

                        <?php
                        get_image(
                            $footer_logo,
                            'footer-logo',
                            'The Cosmetic Dentists of Austin'
                        );
                        ?>

                    </div>

                <?php endif; ?>


                <!-- SOCIAL MEDIA -->

                <div class="footer-social">

                    <span>Follow Us</span>

                    <div class="footer-social-wrapper">

                        <?php
                        get_template_part('templates/social', 'media');
                        ?>

                    </div>

                </div>


                <!-- COPYRIGHT -->

                <?php if ($footer_copyright || $edm_logo) : ?>

                    <div class="footer-copyright">

                        <p class="footer-legal">

                            <?php if ($footer_copyright) : ?>

                                <span>
                                    <?php echo esc_html($footer_copyright); ?>
                                </span>

                            <?php endif; ?>


                            <?php if ($edm_logo) : ?>

                                <span class="footer-website-by">
                                    &nbsp;&nbsp;Website By
                                </span>

                                <?php
                                get_image(
                                    $edm_logo,
                                    'footer-edm-logo',
                                    'EDM'
                                );
                                ?>

                            <?php endif; ?>

                        </p>

                    </div>

                <?php endif; ?>

            </div>


            <!-- =====================================
                 COLUMN 2
                 CONTACT
            ====================================== -->

            <div class="footer-contact-column">

                <?php if (!empty($footer_mobile)) : ?>

                    <div class="footer-item">

                        <h5>Mobile</h5>

                        <a
                            href="<?php echo esc_url($footer_mobile['url']); ?>"
                            target="<?php echo esc_attr($footer_mobile['target'] ?? '_self'); ?>"
                            <?php if (($footer_mobile['target'] ?? '') === '_blank') : ?>
                                rel="noopener noreferrer"
                            <?php endif; ?>
                        >
                            <?php echo esc_html($footer_mobile['title']); ?>
                        </a>

                    </div>

                <?php endif; ?>


                <?php if ($footer_location) : ?>

                    <div class="footer-item">

                        <h5>Location</h5>

                        <p>
                            <?php echo nl2br(esc_html($footer_location)); ?>
                        </p>

                    </div>

                <?php endif; ?>


                <?php if (!empty($footer_email)) : ?>

                    <div class="footer-item">

                        <h5>E Mail</h5>

                        <a
                            href="<?php echo esc_url($footer_email['url']); ?>"
                            target="<?php echo esc_attr($footer_email['target'] ?? '_self'); ?>"
                            <?php if (($footer_email['target'] ?? '') === '_blank') : ?>
                                rel="noopener noreferrer"
                            <?php endif; ?>
                        >
                            <?php echo esc_html($footer_email['title']); ?>
                        </a>

                    </div>

                <?php endif; ?>

            </div>


            <!-- =====================================
                 COLUMN 3
                 OFFICE HOURS
            ====================================== -->

            <div class="footer-hours-column">

                <?php if (have_rows('office_hours', 'option')) : ?>

                    <div class="footer-item office-hours-wrapper">

                        <h5>Office Hours</h5>

                        <ul class="office-hours">

                            <?php while (have_rows('office_hours', 'option')) : the_row(); ?>

                                <?php
                                $day  = get_sub_field('day');
                                $time = get_sub_field('time');
                                ?>

                                <?php if ($day || $time) : ?>

                                    <li>

                                        <span>
                                            <?php echo esc_html($day); ?>
                                        </span>

                                        <span>
                                            <?php echo esc_html($time); ?>
                                        </span>

                                    </li>

                                <?php endif; ?>

                            <?php endwhile; ?>

                        </ul>

                    </div>

                <?php endif; ?>

            </div>


            <!-- =====================================
                 COLUMN 4
                 APPOINTMENT CTA
            ====================================== -->

            <div class="footer-right">

                <div class="footer-cta">

                    <?php if ($footer_content) : ?>

                        <div class="footer-cta-content">

                            <?php echo wp_kses_post($footer_content); ?>

                        </div>

                    <?php endif; ?>


                    <?php if (!empty($footer_link)) : ?>

                        <a
                            href="<?php echo esc_url($footer_link['url']); ?>"
                            class="theme-gold"
                            target="<?php echo esc_attr($footer_link['target'] ?? '_self'); ?>"
                            <?php if (($footer_link['target'] ?? '') === '_blank') : ?>
                                rel="noopener noreferrer"
                            <?php endif; ?>
                        >
                            <?php echo esc_html($footer_link['title']); ?>
                        </a>

                    <?php endif; ?>

                </div>

            </div>


        </div>

    </div>

</footer>


<?php wp_footer(); ?>

</body>
</html>