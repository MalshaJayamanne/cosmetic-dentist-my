<?php

$apart_image   = get_field('apart_image');
$apart_content = get_field('apart_content');
$apart_list    = get_field('apart_list');

?>

<section class="apart-section" id="about">

    <div class="container">

        <div class="apart">

            <div class="apart-left">

                <?php if ($apart_image) : ?>

                    <?php get_image(
                        $apart_image,
                        'apart',
                        'Patient enjoying a drink outdoors'
                    ); ?>

                <?php endif; ?>

            </div>


            <div class="apart-right">

                <?php if ($apart_content) : ?>

                    <?php echo wp_kses_post($apart_content); ?>

                <?php endif; ?>


                <?php if ($apart_list) : ?>

                    <ul class="about-list">

                        <?php
                        $items = preg_split('/\r\n|\r|\n/', $apart_list);
                        ?>

                        <?php foreach ($items as $item) : ?>

                            <?php $item = trim($item); ?>

                            <?php if ($item) : ?>

                                <li>
                                    <?php echo esc_html($item); ?>
                                </li>

                            <?php endif; ?>

                        <?php endforeach; ?>

                    </ul>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>