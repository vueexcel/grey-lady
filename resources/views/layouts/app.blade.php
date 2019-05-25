<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GreyLady | Listings</title>
  
  <?php echo View::make('layouts.header-scripts') ?>

  @yield('header-scripts')

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue fixed">

<div class="wrapper">

  <header class="main-header">
    <?php echo View::make('layouts.header') ?>
  </header>


  <aside class="main-sidebar">
    <?php echo View::make('layouts.navigation') ?>
  </aside>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">

      <!-- Main content -->
      <section class="content">        
        @yield('content') 
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">    
    <?php echo View::make('layouts.footer') ?>
    <?php echo View::make('modal.welcome') ?>
  </footer>

</div>
<!-- ./wrapper -->

  <?php echo View::make('layouts.footer-scripts') ?>

  @yield('footer-scripts')
  

</body>
</html>
