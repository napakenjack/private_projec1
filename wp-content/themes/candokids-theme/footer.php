<!-- Footer -->
<footer>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-12 mb-3 mb-lg-0">
                <div class="footer-logo text-center text-lg-start">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/assets/icon.png" alt="Cando Kids Logo" style="max-width: 180px;">
                    <p class="mt-2">Empowering kids to learn and grow every day.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'menu_class' => 'footer-menu',
                )); ?>
            </div>
        </div>
    </div>

    <p>&copy; <?php echo date("Y"); ?> Cando Kids. All rights reserved.</p>
    <p>Designed by <a href="https://www.example.com" target="_blank">Akhmetzhanov Aidar</a></p>
    
</footer>


<?php wp_footer(); ?>
</body>

</html>