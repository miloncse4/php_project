<?php
	session_start();
	require_once '../db.php';
	//print_r($_POST);

	$guest_name = $_POST['guest_name'];
	$guest_email = $_POST['guest_email'];
	$guest_subject = $_POST['guest_subject'];
	$guest_message = $_POST['guest_message'];

	$flag = true;

	if (!$guest_name) {
		$_SESSION['guest_name_err'] = "Guest name field first must be";
		$flag = false;
	}

	if (!$guest_email) {
		$_SESSION['guest_email_err'] = "Guest name field first must be";
		$flag = false;
	}

	if (!$guest_subject) {
		$_SESSION['guest_subject_err'] = "Guest name field first must be";
		$flag = false;
	}

	if (!$guest_message) {
		$_SESSION['guest_message_err'] = "Guest name field first must be";
		$flag = false;
	}

	if($flag){
		$message_insert_query = "INSERT INTO guest_messages (guest_name,guest_email,guest_subject,guest_message) 
		VALUE ('$guest_name','$guest_email','$guest_subject','$guest_message')";
		mysqli_query($db_conect,$message_insert_query);
		$_SESSION['guest_mesg_done'] = "Your message recived";
		header('location: ../index.php');

	}
	else{
		header('location: ../index.php');
	}

	
?>