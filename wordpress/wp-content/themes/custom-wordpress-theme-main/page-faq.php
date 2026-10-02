<?php

$faq_title = get_field('faq_title');
$faq_link  = get_field('faq_link');
$faqs      = get_field('faqs');

?>

<section class="faq" id="faq">

    <div class="container">

        <!-- =====================================================
             FAQ SECTION HEADING
        ====================================================== -->

        <div class="section-head">

            <?php if ($faq_title) : ?>

                <?php echo wp_kses_post($faq_title); ?>

            <?php endif; ?>


            <?php if ($faq_link) : ?>

                <a
                    href="<?php echo esc_url($faq_link['url']); ?>"
                    target="<?php echo esc_attr($faq_link['target'] ?: '_self'); ?>"
                    class="theme-gold"
                    <?php if (!empty($faq_link['target']) && $faq_link['target'] === '_blank') : ?>
                        rel="noopener noreferrer"
                    <?php endif; ?>
                >
                    <?php echo esc_html($faq_link['title']); ?>
                </a>

            <?php endif; ?>

        </div>


        <!-- =====================================================
             FAQ ACCORDION
        ====================================================== -->

        <?php if (!empty($faqs)) : ?>

            <div
                class="accordion faq-accordion"
                id="faqAccordion"
            >

                <?php foreach ($faqs as $index => $faq) : ?>

                    <?php

                    $question = $faq['question'] ?? '';
                    $answer   = $faq['answer'] ?? '';

                    $faq_number = $index + 1;

                    $heading_id  = 'faqHeading' . $faq_number;
                    $collapse_id = 'faqCollapse' . $faq_number;

                    ?>

                    <div class="accordion-item">

                        <!-- =================================================
                             QUESTION
                        ================================================== -->

                        <h3
                            class="accordion-header"
                            id="<?php echo esc_attr($heading_id); ?>"
                        >

                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                                aria-expanded="false"
                                aria-controls="<?php echo esc_attr($collapse_id); ?>"
                            >

                                <?php echo esc_html($question); ?>

                            </button>

                        </h3>


                        <!-- =================================================
                             ANSWER
                        ================================================== -->

                        <div
                            id="<?php echo esc_attr($collapse_id); ?>"
                            class="accordion-collapse collapse"
                            aria-labelledby="<?php echo esc_attr($heading_id); ?>"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body">

                                <?php if ($answer) : ?>

                                    <?php echo wp_kses_post($answer); ?>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>