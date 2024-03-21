<?php  defined("BASEPATH") or exit("No direct access allowed"); ?>
               </div>
            </div>
         </div>
         <!--
         <div class="mouse-cursor cursor-outer"></div>
         <div class="mouse-cursor cursor-inner"></div>
         -->
      </div>
      <!--
      <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
      -->
      <script src="<?php echo $root; ?>assets/js/jquery.js"></script>
      <!--[if lt IE 10]> <script type="text/javascript" src="<?php echo $root; ?>assets/js/ie8.js"></script> <![endif]-->
      <script src="<?php echo $root; ?>assets/js/plugins.js"></script>
      <script src="<?php echo $root; ?>assets/js/init.js"></script>
      <!--
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5bpEs3xlB8vhxNFErwoo3MXR64uavf6Y&amp;callback=initMap"></script>
        -->

      <script>
        function icon_app_click(x,kode) {
          x.classList.toggle("change_app");
          if (kode=='open') {
            document.getElementById('icon-nav').setAttribute( "onClick", "icon_app_click(this,'close');" );
             document.querySelector('#list_menu_app').classList.add('menu_app_open');
             document.querySelector('#list_menu_app').classList.remove('menu_app_close');
          }else if (kode=='close') {
            document.getElementById('icon-nav').setAttribute( "onClick", "icon_app_click(this,'open');" );
             document.querySelector('#list_menu_app').classList.remove('menu_app_open');
             document.querySelector('#list_menu_app').classList.add('menu_app_close');
          }
        }
      </script>

   </body>
</html>