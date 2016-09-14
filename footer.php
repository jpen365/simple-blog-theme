<?php
/**
 * The footer for our theme.
 *
 * Displays all of the footer section following the page content and sidebar
 *
 * @package Simple Blog Theme
 */
?></div>
<!-- /.row -->

<hr>

<!-- Footer -->
<footer>
  <div class="row">
    <div class="col-lg-12">
      <p>Copyright &copy; <?php bloginfo( 'name' ); ?> <?php echo current_time( 'Y' );?></p>
    </div>
    <!-- /.col-lg-12 -->
  </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->


<?php wp_footer(); ?>
</body>

</html>