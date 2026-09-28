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
                    $service_link  = $service['link'];
                    ?>

                    <div class="service-card">

                        <!-- SERVICE IMAGE -->
                        <?php if ($service_image) : ?>

                            <?php
                            $service_image_url = wp_get_attachment_image_url(
                                $service_image,
                                'full'
                            );

                            $service_image_alt = get_post_meta(
                                $service_image,
                                '_wp_attachment_image_alt',
                                true
                            );
                            ?>

                            <?php if ($service_image_url) : ?>

                                <img
                                    src="<?php echo esc_url($service_image_url); ?>"
                                    alt="<?php echo esc_attr(
                                        $service_image_alt ?: $service_name
                                    ); ?>"
                                >

                            <?php endif; ?>

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