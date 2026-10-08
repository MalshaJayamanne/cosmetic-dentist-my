<?php

$apart_image   = get_field('apart_image');
$apart_content = get_field('apart_content');

?>

<section class="apart-section" id="about">

    <div class="container">

        <div class="apart">

            <div class="apart-left">

                <?php if ($apart_image) : ?>

                    <?php
                    get_image(
                        $apart_image,
                        'apart',
                        'Patient enjoying a drink outdoors'
                    );
                    ?>

                <?php endif; ?>

            </div>


            <div class="apart-right">

                <?php if ($apart_content) : ?>

                    <?php echo wp_kses_post($apart_content); ?>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>