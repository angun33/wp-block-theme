<footer id="page-footer" class="page-width">
  <nav class="footer-menu flex-1">
	  <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
  </nav>



  <div id="copyright">
    &copy; <?php echo esc_html( date_i18n( __( 'Y', 'encore' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>