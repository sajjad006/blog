<?php include_once 'user_header.php'; ?>

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
					?>
					<tr>
						<td><?= $id ?></td>
						<td><?= $row->Title ?></td>
						<td><?= date('d-m-Y',strtotime($row->Date)) ?></td>
						<td>
							<a href="<?= base_url('user/readArticle/'.$id) ?>" class="btn btn-primary">Read</a>
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

<?php include_once 'user_footer.php'; ?>