<?php
$process_content = get_field('process_content');
$process_link    = get_field('process_link');
$process_steps   = get_field('process_steps');
?>

<section class="process" id="process">

    <div class="container">

        <!-- PROCESS HEADER -->
        <div class="process-head">

            <div>
                <?php if ($process_content) : ?>

                    <?php echo wp_kses_post($process_content); ?>

                <?php endif; ?>
            </div>


            <!-- BUTTON -->
            <?php if ($process_link) : ?>

                <a
                    class="btn btn-gold"
                    href="<?php echo esc_url($process_link['url']); ?>"
                    target="<?php echo esc_attr($process_link['target'] ?: '_self'); ?>"
                >
                    <?php echo esc_html($process_link['title']); ?>
                </a>

            <?php endif; ?>

        </div>


        <!-- PROCESS STEPS -->
        <?php if ($process_steps) : ?>

            <div class="process-steps">

                <?php
                $step_number = 1;
                ?>

                <?php foreach ($process_steps as $step) : ?>

                    <article
                        class="step-card"
                        id="step-<?php echo esc_attr($step_number); ?>"
                    >

                        <span class="step-numbering">
                            <?php echo esc_html($step_number); ?>
                        </span>


                        <?php if (!empty($step['title'])) : ?>

                            <h3>
                                <?php echo esc_html($step['title']); ?>
                            </h3>

                        <?php endif; ?>


                        <?php if (!empty($step['content'])) : ?>

                            <p>
                                <?php echo esc_html($step['content']); ?>
                            </p>

                        <?php endif; ?>

                    </article>

                    <?php $step_number++; ?>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>