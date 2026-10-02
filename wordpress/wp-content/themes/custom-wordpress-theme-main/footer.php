<?php

$footer_background = get_field('footer_background', 'option');
$footer_logo       = get_field('footer_logo', 'option');
$footer_copyright  = get_field('footer_copyright', 'option');
$edm_logo          = get_field('edm_logo', 'option');

$social          = get_field('social', 'option');
$footer_mobile   = get_field('footer_mobile', 'option');
$footer_email    = get_field('footer_email', 'option');
$footer_location = get_field('footer_location', 'option');
$schedule        = get_field('schedule', 'option');

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


            <!-- =========================
                 LEFT
            ========================== -->

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


                <?php if (!empty($social)) : ?>

                    <div class="footer-social">

                        <span>Follow Us</span>

                        <div class="footer-social-wrapper">

                            <?php foreach ($social as $item) : ?>

                                <?php
                                $icon = $item['icon'] ?? '';
                                $link = $item['link'] ?? '';

                                if (empty($link)) {
                                    continue;
                                }

                                $url    = $link['url'] ?? '';
                                $title  = $link['title'] ?? '';
                                $target = $link['target'] ?? '_self';

                                if (empty($url)) {
                                    continue;
                                }
                                ?>

                                <a
                                    href="<?php echo esc_url($url); ?>"
                                    target="<?php echo esc_attr($target); ?>"
                                    <?php if ($target === '_blank') : ?>
                                        rel="noopener noreferrer"
                                    <?php endif; ?>
                                    aria-label="<?php echo esc_attr($title ?: 'Social media'); ?>"
                                >

                                    <?php if ($icon) : ?>

                                        <i
                                            class="<?php echo esc_attr($icon); ?>"
                                            aria-hidden="true"
                                        ></i>

                                    <?php endif; ?>

                                </a>

                            <?php endforeach; ?>

                        </div>

                    </div>

                <?php endif; ?>


                <div class="footer-copyright">

                    <p class="footer-legal">

                        <?php if ($footer_copyright) : ?>

                            <span>
                                <?php echo esc_html($footer_copyright); ?>
                            </span>

                        <?php endif; ?>


                        <?php if ($edm_logo) : ?>

                            <span class="footer-website-by">
                                Website By
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

            </div>


            <!-- =========================
                 CONTACT
            ========================== -->

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


            <!-- =========================
                 OFFICE HOURS
            ========================== -->

            <div class="footer-hours-column">

                <?php if (!empty($schedule)) : ?>

                    <div class="footer-item office-hours-wrapper">

                        <h5>Office Hours</h5>

                        <ul class="office-hours">

                            <?php foreach ($schedule as $day) : ?>

                                <?php
                                $day_name  = $day['day'] ?? '';
                                $day_hours = $day['hours'] ?? '';

                                if (!$day_name && !$day_hours) {
                                    continue;
                                }
                                ?>

                                <li>

                                    <span>
                                        <?php echo esc_html($day_name); ?>
                                    </span>

                                    <span>
                                        <?php echo esc_html($day_hours); ?>
                                    </span>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                <?php endif; ?>

            </div>


            <!-- =========================
                 CTA
            ========================== -->

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