 <footer class="footer">
        <!--<p class="pull-right"><a href="#">Hasierara joan</a></p>-->
        <div class="row">
          <div class="span4">
            <a href="#">Loturak</a>
          </div>
          <div class="span4">
            <a href="#">Lizentziak</a>
          </div>
        </div>
       <!-- <p>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>. Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
        <p>Icons from <a href="http://glyphicons.com">Glyphicons Free</a>, licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>-->
      </footer>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Link jQuery via Google + local fallback, see h5bp.com -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>

    <!-- Bootstrap JS, the minified bundle -->
   <!-- <script src="assets/js/bootstrap.min.js"></script>-->
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-widget.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/google-code-prettify/prettify.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-transition.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-alert.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-modal.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-dropdown.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-scrollspy.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-tab.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-tooltip.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-popover.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-button.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-collapse.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-carousel.js"></script>
    <script src="/CodeIgniter_2.1.0/assets/js/bootstrap-typeahead.js"></script>
    <!--<script src="assets/js/application.js"></script>-->
    <!-- If needed, initialize scripts on this page -->
    <script>
      // Activate Google Prettify for pretty-printing code
    //  addEventListener('load', prettyPrint, false);
      $(document).ready(function(){
        // Add prettyprint class to pre elements
       // $('pre').addClass('prettyprint');
        $('.dropdown-toggle').dropdown();  
        $('.carousel').carousel();
        $('a[rel=popover]')
          .popover({
            html: true,
            placement: get_popover_placement
          })
          .click(function(e) {
            e.preventDefault()
          })
        });
        function get_popover_placement() {
          return 'top';
        }
    </script>
    <!-- Analytics
    ================================================== -->
    <!--<script>
      var _gauges = _gauges || [];
      (function() {
        var t   = document.createElement('script');
        t.type  = 'text/javascript';
        t.async = true;
        t.id    = 'gauges-tracker';
        t.setAttribute('data-site-id', '4f0dc9fef5a1f55508000013');
        t.src = '//secure.gaug.es/track.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(t, s);
      })();
    </script>-->
