<?php include_once 'admin_header.php'; ?>
	
<div class="container">
	<a href="addArticle" class="btn btn-primary pull-right">ADD ARTICLE</a>		
</div>
<?php
	
	if ($this->session->flashdata('error')){
    		?>
    		<div class="alert alert-dismissible alert-danger container">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Oh snap!</strong> <a href="#" class="alert-link"><?= $this->session->flashdata('error') ?></a>
			</div>
    		<?php
    	}
    	elseif ($this->session->flashdata('success')) {
    		?>
    		<div class="alert alert-dismissible alert-success container">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Well done!</strong> <a href="#" class="alert-link"><?= $this->session->flashdata('success') ?></a>.
			</div>
    		<?php
    	}

?>
<div class="container">
	<table class="table">
		<thead>
			<th>ID Number</th>
			<th>Title</th>
			<th>Date</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php

			if (count($articles)) {
			
				foreach ($articles as $row) {
					$id=$row->ID;
					$deleteurl=base_url('admin/deleteArticle/'.$id);
					$readurl=base_url('admin/readArticle/'.$id);
					$editurl=base_url('admin/editArticle/'.$id);
					?>
					<tr>
						<td><?= $id ?></td>
						<td><?= $row->Title ?></td>
						<td><?= date('d-m-Y',strtotime($row->Date)) ?></td>
						<td>
							<a href="<?= $readurl; ?>" class="btn btn-primary">Read</a>
							<a href="<?= $editurl; ?>" class="btn btn-primary">Edit</a>
							<a href="<?= $deleteurl; ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
					<?php
				}
			}
			else{
				?>
				<tr>
					<td colspan="3">No records found</td>
				</tr>
				<?php
			}	
				?>
		</tbody>
	</table>
</div>

<?php include_once 'admin_footer.php'; ?>