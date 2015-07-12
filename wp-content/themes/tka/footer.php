<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tka
 */

?>


    <div class="page-foot">
      <p class="copyright"><small>&copy; 2015 The Kitchen Adventurer. All rights reserved.</small></p>
    </div>

  </main><!-- #main -->

<?php if (!is_pjax()) : ?>
  <?php wp_footer(); ?>

  <script src="<?php echo get_template_directory_uri(); ?>/dist/js/application.min.js"></script>

  <!-- GA -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-35738109-1', 'auto');
    ga('send', 'pageview');
  </script>

  <!-- Twitter -->
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

  <!-- Pinterest -->
  <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js" data-pin-hover="true" data-pin-build="parsePinBtns"></script>
</body>
</html>
<?php endif; ?>
