<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MassData</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="{{asset('dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{asset('plugins/morris/morris.css" rel="stylesheet')}}" type="text/css" />
    <!-- jvectormap -->
    <link href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{asset('plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
    @yield('register')
    </div>
     <!-- jQuery 2.1.3 -->
     <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
     <!-- jQuery UI 1.11.2 -->
     <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
     <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     <script>
       $.widget.bridge('uibutton', $.ui.button);
     </script>
     <!-- Bootstrap 3.3.2 JS -->
     <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
     <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
     <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>    
     <!-- Morris.js charts -->
     <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
     <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
     <!-- Sparkline -->
     <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
     <!-- jvectormap -->
     <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
     <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
     <!-- jQuery Knob Chart -->
     <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
     <!-- daterangepicker -->
     <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
     <!-- datepicker -->
     <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
     <!-- Bootstrap WYSIHTML5 -->
     <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
     <!-- iCheck -->
     <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
     <!-- Slimscroll -->
     <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
     <!-- FastClick -->
     <script src='plugins/fastclick/fastclick.min.js'></script>
     <!-- AdminLTE App -->
     <script src="dist/js/app.min.js" type="text/javascript"></script>
 
     <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
     <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>
 
     <!-- AdminLTE for demo purposes -->
     <script src="dist/js/demo.js" type="text/javascript"></script>
     <script type="text/javascript">
       $(function () {
         $("#example1").dataTable(
           {
           "bPaginate": true,
           "bLengthChange": false,
           "bFilter": false,
           "bSort": true,
           "bInfo": true,
           "bAutoWidth": false
         });
         $('#example2').dataTable({
           "bPaginate": true,
           "bLengthChange": false,
           "bFilter": false,
           "bSort": true,
           "bInfo": true,
           "bAutoWidth": false
         });
       });
     </script>
</body>
</html>