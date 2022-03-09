<?php
    session_start();
	require_once'../db.php';
    require_once'../inc/header.php';
    require_once'navbar.php';

    if(!isset($_SESSION['user_status'])){
        header('location: ../../login.php');
    }

	$get_message_query = "SELECT * FROM guest_messages";
	$message_form_db = mysqli_query($db_conect,$get_message_query);
?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card mt-4">
						<div class="card-header bg-warning">
							<h5 class="card-title text-capatalize">Guest message list</h5>
						</div> 
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<td>SL</td>
									<td>Guest Name</td>
									<td>Guest Email</td>
									<td>Guest Subject</td>
									<td>Guest Message</td>
									<td>Acation</td>
								</thead>
								<tbody>
									<?php
									foreach($message_form_db as $key=> $message):
									?>
									<tr class="<?=($message['read_status'] == 1)? "bg-info":"text-dark"?>">
										<td><?= $key+1?></td>
										<td><?=$message['guest_name']?></td>
										<td><?=$message['guest_email']?></td>
										<td><?=$message['guest_subject']?></td>
										<td><?=$message['guest_message']?></td>
										<td>
											<?php if($message['read_status']==1):?>
												<a href="message_read.php?msg_id=<?= $message['id']?>" class="btn btn-sm btn-warning">Marks as red</a>
												<?php endif ?>
												<a href="message_delete.php?msg_id=<?= $message['id']?>" class="btn btn-sm btn-danger">Delete</a>
										</td>
									</tr>
									<?php endforeach?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
    require_once'../inc/header.php';
?>