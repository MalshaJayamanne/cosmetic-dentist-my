<?php
$hero_image   = get_field('hero_image');
$hero_content = get_field('hero_content');
?>

<section class="hero">

    <?php if ($hero_image) : ?>

        <?php
        get_image(
            $hero_image,
            'Patient smiling'
        );
        ?>

    <?php endif; ?>


    <div class="container">

        <div class="inner">

            <div class="content-wrapper">

                <?php if ($hero_content) : ?>

                    <div class="hero-form">
                        <?php echo wp_kses_post($hero_content); ?>
                    </div>

                <?php endif; ?>


                <div class="form-wrapper">

                    <form
                        class="form"
                        id="form"
                        action="#"
                        method="post"
                    >

                        <div class="form-field">

                            <label
                                class="screen-reader-text"
                                for="lf-name"
                            >
                                Name
                            </label>

                            <input
                                id="lf-name"
                                type="text"
                                name="name"
                                placeholder="NAME"
                                required
                            >

                        </div>


                        <div class="form-field">

                            <label
                                class="screen-reader-text"
                                for="lf-email"
                            >
                                Email
                            </label>

                            <input
                                id="lf-email"
                                type="email"
                                name="email"
                                placeholder="EMAIL"
                                required
                            >

                        </div>


                        <div class="form-field">

                            <label
                                class="screen-reader-text"
                                for="lf-phone"
                            >
                                Phone number
                            </label>

                            <input
                                id="lf-phone"
                                type="tel"
                                name="phone"
                                placeholder="PHONE NUMBER"
                            >

                        </div>


                        <div class="form-field">

                            <label
                                class="screen-reader-text"
                                for="lf-message"
                            >
                                Message
                            </label>

                            <input
                                id="lf-message"
                                type="text"
                                name="message"
                                placeholder="MESSAGE"
                            >

                        </div>


                        <div class="form-submit">

                            <button
                                class="theme-gold"
                                type="submit"
                            >
                                Schedule an appointment
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>