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

            <div class="services-grid">

                <?php foreach ($services as $service) : ?>

                    <?php
                    $service_image = $service['image'];
                    $service_name  = $service['title'];
                    ?>

                    <div class="service-card">

                        <!-- SERVICE IMAGE -->
                        <?php if ($service_image) : ?>

                            <?php get_image(
                                $service_image,
                                'service',
                                $service_name ?: 'Cosmetic dentistry service'
                            ); ?>

                        <?php endif; ?>


                        <!-- SERVICE TITLE -->
                        <div class="service-card-label">

                            <?php if ($service_name) : ?>

                                <h3>
                                    <?php echo esc_html($service_name); ?>
                                </h3>

                            <?php endif; ?>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>
