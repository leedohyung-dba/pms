<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $pageTitle; ?> | <?= __('NSS'); ?></title>

    <!-- Bootstrap -->
    <?= $this->Html->css('../vendors/bootstrap/dist/css/bootstrap.min') ?>
    <!-- Font Awesome -->
    <?= $this->Html->css('../vendors/font-awesome/css/font-awesome.min') ?>
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <?= $this->Html->script('../vendors/jquery/dist/jquery.min') ?>  
    <?= $this->Html->script('../vendors/bootstrap/dist/js/bootstrap.min') ?>


    <!-- Custom Theme Style -->
    <?= $this->Html->css('custom') ?>
    <?= $this->Html->css('login') ?>

    <!-- Switchery -->
    <?= $this->Html->css('../vendors/switchery/dist/switchery.min') ?>
    <!-- Switchery -->
    <?= $this->Html->script('../vendors/switchery/dist/switchery.min') ?>
    <!-- Custom Theme Scripts -->
    <?= $this->Html->script('custom') ?>

  </head>

  <body class="login">
    <div class="login_wrapper">
      <div class="x_panel">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
      </div>
    </div>
  </body>
</html>