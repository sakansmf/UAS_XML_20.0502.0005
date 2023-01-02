<?php
session_start();
if (isset($_POST['edit'])) {
	$users = simplexml_load_file('files/members.xml');
	foreach ($users->user as $user) {
		if ($user->id == $_POST['id']) {
			$user->firstname = $_POST['firstname'];
			$user->lastname = $_POST['lastname'];
			$user->address = $_POST['address'];
			break;
		}
	}
	file_put_contents('files/members.xml', $users->asXML());
	$_SESSION['message'] = 'Member berhasil di updated';
	header('location: index.php');
} else {
	$_SESSION['message'] = 'Pilih nama memeber yang ingin anda edit';
	header('location: index.php');
}
