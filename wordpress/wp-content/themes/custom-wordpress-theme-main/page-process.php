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
