<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package yimd
 */
?>
  <div class="footer-container-inverse">
    <footer class="footer">
      <p>&copy; <?=date('Y')?>&nbsp;&nbsp;&middot;&nbsp;&nbsp;BY <a href="https://twitter.com/danyim" target="_blank">danyim</a></p>
      <?php wp_footer();?>
    </footer>
  </div>
  <!-- /.aa_footer -->
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
