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


        <?php if ($doctors) : ?>

            <div class="expert-tabs" role="tablist">

                <?php foreach ($doctors as $index => $doctor) : ?>

                    <?php
                    $doctor_name = $doctor['title'] ?? '';
                    $panel_id    = 'panel-doctor-' . $index;
                    $active      = ($index === 0);
                    ?>

                    <button
                        class="expert-tab <?php echo $active ? 'active' : ''; ?>"
                        type="button"
                        role="tab"
                        aria-selected="<?php echo $active ? 'true' : 'false'; ?>"
                        aria-controls="<?php echo esc_attr($panel_id); ?>"
                        data-target="<?php echo esc_attr($panel_id); ?>"
                    >
                        <?php echo esc_html($doctor_name); ?>
                    </button>

                <?php endforeach; ?>

            </div>


            <?php foreach ($doctors as $index => $doctor) : ?>

                <?php
                $doctor_name    = $doctor['title'] ?? '';
                $doctor_image   = $doctor['image'] ?? '';
                $doctor_content = $doctor['content'] ?? '';

                $panel_id = 'panel-doctor-' . $index;
                $active   = ($index === 0);
                ?>

                <div
                    class="expert-panel"
                    id="<?php echo esc_attr($panel_id); ?>"
                    role="tabpanel"
                    <?php echo !$active ? 'hidden' : ''; ?>
                >

                    <div class="expert-left">

                        <?php if ($doctor_image) : ?>

                            <?php get_image(
                                $doctor_image,
                                'doctor',
                                $doctor_name ?: 'Doctor'
                            ); ?>

                        <?php endif; ?>

                    </div>


                    <div class="expert-right">

                        <?php if ($doctor_content) : ?>

                            <?php echo wp_kses_post($doctor_content); ?>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</section>