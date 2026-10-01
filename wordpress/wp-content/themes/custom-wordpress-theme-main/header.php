<!doctype html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php
$enable_sticky_header = get_field('enable_sticky_header', 'option');
$logo                 = get_field('logo', 'option');
$left_menu            = get_field('left_menu', 'option');
$right_menu           = get_field('right_menu', 'option');
?>

<div id="page">

    <header class="main-header">

        <div class="container">

            <!-- LEFT -->
            <div class="left">

                <?php if ($left_menu) : ?>

                    <div class="menu-wrapper">

                        <?php
                        wp_nav_menu([
                            'menu'        => $left_menu,
                            'container'   => 'nav',
                            'container_class' => 'navbar navbar-expand-md p-0',
                            'container_aria_label' => 'Left navigation',
                            'menu_class'  => 'menu navbar-nav',
                            'fallback_cb' => false,
                            'items_wrap'  => '<ul id="%1$s" class="menu navbar-nav">%3$s</ul>',
                            'depth'       => 1,
                        ]);
                        ?>

                    </div>

                <?php endif; ?>

            </div>


            <!-- LOGO -->
            <div class="logo-wrapper">

                <a href="<?php echo esc_url(home_url('/')); ?>">

                    <?php if ($logo) : ?>

                        <?php get_image(
                            $logo,
                            'logo',
                            get_bloginfo('name')
                        ); ?>

                    <?php endif; ?>

                </a>

            </div>


            <!-- RIGHT -->
            <div class="right">

                <?php if ($right_menu) : ?>

                    <div class="menu-wrapper">

                        <?php
                        wp_nav_menu([
                            'menu'        => $right_menu,
                            'container'   => 'nav',
                            'container_class' => 'navbar navbar-expand-md p-0',
                            'container_aria_label' => 'Right navigation',
                            'menu_class'  => 'menu navbar-nav',
                            'fallback_cb' => false,
                            'items_wrap'  => '<ul id="%1$s" class="menu navbar-nav">%3$s</ul>',
                            'depth'       => 1,
                        ]);
                        ?>

                        <!-- APPOINTMENT BUTTON -->
                        <a
                            class="btn btn-gold"
                            href="<?php echo esc_url(home_url('/#cta')); ?>"
                        >
                            Schedule an appointment
                        </a>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </header>