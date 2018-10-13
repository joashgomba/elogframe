<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} </title>

    <!-- Bootstrap -->
    <link href="{!! asset('theme/vendors/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{!! asset('theme/vendors/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{!! asset('theme/vendors/nprogress/nprogress.css') !!}" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="{!! asset('theme/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="{!! asset('theme/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') !!}" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="{!! asset('theme/vendors/normalize-css/normalize.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/vendors/ion.rangeSlider/css/ion.rangeSlider.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css') !!}" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="{!! asset('theme/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet">

    <link href="{!! asset('theme/vendors/cropper/dist/cropper.min.css') !!}" rel="stylesheet">

    <!-- Custom Theme Style -->
       <link href="{!! asset('theme/build/css/custom.min.css') !!}" rel="stylesheet">



      <meta name="_token" content="{{ csrf_token() }}" />


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('home') }}" class="site_title"><i class="fa fa-bullseye"></i> <span>eLogframe</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{!! asset('theme/images/avatar.png') !!}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

          @include('theme.sidebar')


          </div>
        </div>

      @include('theme.header')

        <!-- page content -->

          @yield('content')
        <!-- /page content -->

        @include('theme.footer')
      </div>
    </div>

    <!-- jQuery -->
    <script src="{!! asset('theme/vendors/jquery/dist/jquery.min.js') !!}"></script>
    <!-- Bootstrap -->
    <script src="{!! asset('theme/vendors/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <!-- FastClick -->
    <script src="{!! asset('theme/vendors/fastclick/lib/fastclick.js') !!}"></script>
    <!-- NProgress -->
    <script src="{!! asset('theme/vendors/nprogress/nprogress.js') !!}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{!! asset('theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') !!}"></script>
    <!-- iCheck -->
    <script src="{!! asset('theme/vendors/iCheck/icheck.min.js') !!}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{!! asset('theme/vendors/moment/min/moment.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="{!! asset('theme/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{!! asset('theme/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/jquery.hotkeys/jquery.hotkeys.js') !!}"></script>
    <script src="{!! asset('theme/vendors/google-code-prettify/src/prettify.js') !!}"></script>
    <!-- jQuery Tags Input -->
    <script src="{!! asset('theme/vendors/jquery.tagsinput/src/jquery.tagsinput.js') !!}"></script>
    <!-- Switchery -->
    <script src="{!! asset('theme/vendors/switchery/dist/switchery.min.js') !!}"></script>
    <!-- Select2 -->
    <script src="{!! asset('theme/vendors/select2/dist/js/select2.full.min.js') !!}"></script>
    <!-- Parsley -->
    <script src="{!! asset('theme/vendors/parsleyjs/dist/parsley.min.js') !!}"></script>
    <!-- Autosize -->
    <script src="{!! asset('theme/vendors/autosize/dist/autosize.min.js') !!}"></script>
    <!-- jQuery autocomplete -->
    <script src="{!! asset('theme/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') !!}"></script>
    <!-- starrr -->
    <script src="{!! asset('theme/vendors/starrr/dist/starrr.js') !!}"></script>

    <!-- Datatables -->
    <link href="{!! asset('theme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('theme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') !!}" rel="stylesheet">
    
    <!-- Custom Theme Scripts -->
    <script src="{!! asset('theme/build/js/custom.min.js') !!}"></script>


    <!-- Datatables -->
    <script src="{!! asset('theme/vendors/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-buttons/js/buttons.flash.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-buttons/js/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-buttons/js/buttons.print.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') !!}"></script>
    <script src="{!! asset('theme/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/jszip/dist/jszip.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/pdfmake/build/pdfmake.min.js') !!}"></script>
    <script src="{!! asset('theme/vendors/pdfmake/build/vfs_fonts.js') !!}"></script>



    <!-- Initialize datetimepicker -->
    <script>

        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#quarter_one_start_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#quarter_one_end_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#quarter_two_start_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#quarter_two_end_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#quarter_three_start_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#quarter_three_end_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#quarter_four_start_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#quarter_four_end_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#reporting_date').datetimepicker({
            format: 'YYYY-MM-DD'
        });


    </script>



  </body>
</html>
