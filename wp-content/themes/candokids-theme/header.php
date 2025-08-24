<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candokids</title>

    <?php wp_head(); ?>

</head>

<body>
    <!-- Preloader -->
    <div id="preloader" aria-hidden="true">
        <div class="preloader-inner">
            <img class="preloader-logo" src="https://napakenjack.github.io/private_projec1/wp-content/uploads/2025/08/icon.png"
                alt="" />
            <div class="preloader-spinner" role="status" aria-label="Loading"></div>
        </div>
    </div>

    <header>
        <!-- Header -->
        <div class="primary_menu_burger reveal" style="--d: 340ms">
            <!-- Logo section -->
            <div class="primary_menu_logo_container">

                <a class="primary_menu_logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="https://napakenjack.github.io/private_projec1/wp-content/uploads/2025/08/icon.png"
                        alt="Cando Kids Logo" />
                </a>
                <a class="primary_menu_logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="https://napakenjack.github.io/private_projec1/wp-content/uploads/2025/08/icon2.png"
                        alt="Cando Kids Logo" />
                </a>
            </div>

            <div class="primary_menu_logo_container_responsive">

                <a class="primary_menu_logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="https://napakenjack.github.io/private_projec1/wp-content/uploads/2025/08/icon.png"
                        alt="Cando Kids Logo" />
                </a>
                <a class="primary_menu_logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="https://napakenjack.github.io/private_projec1/wp-content/uploads/2025/08/icon2.png"
                        alt="Cando Kids Logo" />
                </a>
            </div>

            <button class="primary_menu_burger_button">
                <span class="burger_line"></span>
                <span class="burger_line"></span>
                <span class="burger_line"></span>
            </button>



            <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'primary_menu',
                //'menu'=> 'primary',
            )); ?>
            <div class="burger_dropdown_panel" id="burgerDropdownPanel"></div>
        </div>
    </header>