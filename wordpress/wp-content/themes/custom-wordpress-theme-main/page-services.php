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

            <div class="services-grid row">

                <?php foreach ($services as $service) : ?>

                    <?php
                    $service_image = $service['image'];
                    $service_name  = $service['title'];
                    $service_link  = $service['link'];
                    ?>

                    <div class="col-12 col-md-6 col-lg-4">

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

            </div>

        <?php endif; ?>

    </div>

</section>