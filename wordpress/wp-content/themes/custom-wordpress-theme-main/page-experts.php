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