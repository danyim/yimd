<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SolidBootstrap
 */
?>
  <div class="container-fluid footer-container footer-container-inverse">
    <div class="container">
      <footer class="footer">
      	<p>&copy; <?= date('Y') ?>&nbsp;&nbsp;&middot;&nbsp;&nbsp;BY <a href="https://twitter.com/danyim" target="_blank">danyim</a></p>
      </footer>
      <!-- /.aa_footer -->
      <?php wp_footer(); ?>
    </div>
  </div>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-68479626-1', 'auto');
    ga('send', 'pageview');
  </script>
</body>
</html>
