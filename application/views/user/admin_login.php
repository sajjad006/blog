<?php include_once 'user_header.php'; ?>

<div class="container">
  <?= form_open('login/admin_login'); ?>
  <fieldset>
    <legend>Admin Login</legend>
    <?php 
      if ($this->session->flashdata('error')) {
        ?>
          <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Oh snap!</strong> <a href="#" class="alert-link">Invalid Username/Password
          </div>  
        <?php
      }
    ?>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Username" name="username" value="<?= set_value('username') ?>">
        <?php echo form_error('username');  ?>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" value="<?= set_value('password') ?>">
        <?php echo form_error('password');  ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

</div>
<?php include_once 'user_footer.php'; ?>