<?php include_once 'user_header.php'; ?>
	<?php
		if (count($articles)) {
			foreach ($articles as $row) {
				$url=base_url('uploads/'.$row->Image);
	?>
				<div class="container">
					<h2><?= $row->Title ?></h2>
					<p style="float: left;">By <?= $row->Username ?></p>
					<center>
						<br><br><br>
					<?php
						if (!empty($row->Image)) {
							?>
							<img width="40%" height="10%" src="<?= $url ?>">
							<br><br>
							<?php	
						}
					?>
					</center>
					
					
					<p align="justify" style="width: 90%;overflow: auto;font-size: 2em;"><?= $row->Body ?></p>			
					
				</div>
	<?php
			}
		}
		else{
			echo "<p>No records found</p>";
		}
	?>

<?php include_once 'user_header.php'; ?>