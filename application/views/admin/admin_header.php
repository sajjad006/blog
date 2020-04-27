<!DOCTYPE html>
<html>
<head>
  <title>ADMIN PANEL</title>
  <?= link_tag('assets/css/bootstrap.min.css'); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">Articles</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= base_url('login/logout'); ?>">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>