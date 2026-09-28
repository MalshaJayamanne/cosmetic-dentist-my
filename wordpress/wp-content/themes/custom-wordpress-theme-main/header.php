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

    <header class="navbar">

        <!-- Mobile Toggle -->
        <button
            class="nav-toggle d-lg-none"
            type="button"
            id="navToggle"
            aria-label="Toggle navigation"
            aria-expanded="false"
            aria-controls="navbarExpand"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>


        <!-- Desktop Navigation -->
        <div
            class="navbar-expand-lg d-none d-lg-flex"
            id="navbarExpand"
        >

            <!-- LEFT MENU -->
            <?php if ($left_menu) : ?>

                <?php
                wp_nav_menu([
                    'menu'        => $left_menu,
                    'container'   => false,
                    'menu_class'  => 'nav-links',
                    'fallback_cb' => false,
                    'items_wrap'  => '<ul class="nav-links">%3$s</ul>',
                    'depth'       => 1,
                ]);
                ?>

            <?php endif; ?>


            <!-- LOGO -->
            <div class="navbar-brand">

                <a href="<?php echo esc_url(home_url('/')); ?>">

                    <?php if ($logo) : ?>

                        <?php get_image($logo, 'logo', get_bloginfo('name')); ?>

                    <?php endif; ?>

                </a>

            </div>


            <!-- RIGHT MENU -->
            <?php if ($right_menu) : ?>

                <?php
                wp_nav_menu([
                    'menu'        => $right_menu,
                    'container'   => false,
                    'menu_class'  => 'nav-links',
                    'fallback_cb' => false,
                    'items_wrap'  => '<ul class="nav-links">%3$s</ul>',
                    'depth'       => 1,
                ]);
                ?>

            <?php endif; ?>


            <!-- APPOINTMENT BUTTON -->
            <a
                class="btn btn-gold"
                href="<?php echo esc_url(home_url('/#cta')); ?>"
            >
                Schedule an appointment
            </a>

        </div>

    </header>