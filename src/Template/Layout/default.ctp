<!DOCTYPE html>
<html>
<head>
    <title>
        <?= $pageTitle; ?> | <?= __('NSS'); ?>
    </title>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <?= $this->Html->css('../vendors/bootstrap/dist/css/bootstrap.min') ?>
    <!-- Font Awesome -->
    <?= $this->Html->css('../vendors/font-awesome/css/font-awesome.min') ?>
    <!-- iCheck -->
    <?= $this->Html->css('../vendors/iCheck/skins/flat/green') ?>
    <!-- Datatables -->
    <?= $this->Html->css('../vendors/datatables.net-bs/css/dataTables.bootstrap.min') ?>
    <?= $this->Html->css('../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min') ?>
    <?= $this->Html->css('../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min') ?>
    <?= $this->Html->css('../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min') ?>
    <?= $this->Html->css('../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min') ?>

    <!-- Custom Theme Style -->
    <?= $this->Html->css('custom') ?>

    <!-- jQuery -->
    <?= $this->Html->script('../vendors/jquery/dist/jquery.min') ?>
    <!-- Bootstrap -->
    <?= $this->Html->script('../vendors/bootstrap/dist/js/bootstrap.min') ?>

</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <!-- sidebar -->
          <?= $this->element('sidebar') ?>
        </div>
      </div>
      <!-- top navigation -->
      <?= $this->element('top_navigation') ?>
      <!-- page content -->
      <div class="right_col" role="main" style="height: 900px !important;">
        <div class="clearfix"></div>
        <div class="row">
      <?= $this->fetch('content') ?>
        </div>
      </div>

      <!-- footer content -->
      <?= $this->element('footer') ?>
    </div>
  </div>  
<!-- Custom Theme Scripts -->
<?= $this->Html->script('custom') ?>
</body>
</html>
