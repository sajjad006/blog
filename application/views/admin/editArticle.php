<?php
  $id=$article->ID;
?>

<?php include_once 'admin_header.php'; ?>

<div class="container">
  <?= form_open_multipart('admin/updateArticle/'.$id); ?>
  <fieldset>
    <legend>Edit Article</legend>
    <?php
    	if ($this->session->flashdata('error')){
    		?>
    		<div class="alert alert-dismissible alert-danger">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Oh snap!</strong> <a href="#" class="alert-link"><?= $this->session->flashdata('error') ?></a>
			</div>
    		<?php
    	}
    	elseif ($this->session->flashdata('success')) {
    		?>
    		<div class="alert alert-dismissible alert-success">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Well done!</strong> <a href="#" class="alert-link"><?= $this->session->flashdata('success') ?></a>.
			</div>
    		<?php
    	}
    ?>

    <div class="form-group">
      <label for="inputTitle" class="col-lg-2 control-label">Article Title</label>
      <div class="col-lg-10">
        <?= form_input(['name'  => 'title', 'id'    => 'inputTitle', 'value' => set_value('title', $article->Title),'class' => 'form-control', 'placeholder' => 'Title']); ?>
        <!-- <input type="text" class="form-control" id="inputTitle" placeholder="Title" name="title" value="<?= set_value('title') ?>"> -->
        <?php echo form_error('title');  ?>
      </div>
    </div>
    <div class="form-group">
      <label for="inputBody" class="col-lg-2 control-label">Article Body</label>
      <div class="col-lg-10">
        <!-- <textarea rows="10" class="form-control" id="inputBody" placeholder="Body" name="body" value="<?= set_value('body') ?>"></textarea> -->
        <?= form_textarea(['name'  => 'body', 'id'=> 'inputBody', 'value' => set_value('body', $article->Body),'class' => 'form-control', 'placeholder' => 'Body', 'rows'=>'10']); ?>        
        <?php echo form_error('body');  ?>
      </div>
    </div>

    <!-- <div class="form-group">
      <style type="text/css">
        .image{
          background-color: powderblue;color: white;
        }
        .image:hover{
          cursor: pointer;
        }
      </style>
      <label for="inputImage" class="col-lg-2 control-label image">Choose Article Image
      <div class="col-lg-10">
        <div>
          <input style="display: none;" type="file" class="form-control" id="inputImage" placeholder="Image" name="image" value="<?= set_value('image') ?>"> 
        </div>
        <?php echo form_error('image');  ?>
      </div>
    
      </label>
    </div> -->

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<br><br>
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

</div>

<?php include_once 'admin_footer.php'; ?>