<!DOCTYPE html>
<html>
<head>
  <title>ARTICLE LIST</title>
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
      <a class="navbar-brand" href="<?= base_url('user') ?>">Articles</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      
      <!-- <form class="navbar-form navbar-left" role="search" action="<?= base_url('user/searchArticle')?>"> -->
        <?= form_open('user/searchArticle', ['class'=>'navbar-form navbar-left', 'role'=>'search']); ?>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="query">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <?php echo form_error('query','<p class="navbar-text text-danger">', '</p>'); ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= base_url('login') ?>">Login</a></li>
      </ul>
    </div>
  </div>
</nav>