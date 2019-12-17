        <footer>
          <div class="pull-right">
            Kamartamu
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendors/gentelella/') }}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/gentelella/') }}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/gentelella/') }}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/gentelella/') }}/vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('vendors/gentelella/') }}/build/js/custom.min.js"></script>
    <script src="{{ asset('vendors/sweetalert/') }}/sweetalert.all.js"></script>
    <script>
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
        });
      }, 3000);
    </script>
    @yield('js')
  </body>
</html>