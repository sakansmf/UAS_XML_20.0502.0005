<?php
session_start();
$id = $_GET['id'];

$users = simplexml_load_file('files/members.xml');

//iterasi yang dibutuhkan @saka
$index = 0;
$i = 0;

foreach ($users->user as $user) {
	if ($user->id == $id) {
		$index = $i;
		break;
	}
	$i++;
}

unset($users->user[$index]);
file_put_contents('files/members.xml', $users->asXML());

$_SESSION['message'] = 'Data member berhasil di Hapus';
header('location: index.php');
