        <!-- header -->
        @include('adm.header')
        <!-- end header  -->
        
        <!-- side bar -->
        @include('adm.sidebar')
        <!-- end side bar -->

        <!-- top navigation -->
        @include('adm.nav')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        @include('adm.footer')
        <!-- /footer content -->
