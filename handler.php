<?php
include "registered.php";
$dsn = "mysql:host=localhost;dbname=pdc10_db";
$user = "root";
$psswrd = "";

$pdo = new PDO($dsn, $user, $psswrd);
$result = Registered::handleUpload($_FILES['choose_file']);
if ($result == "error"){
	header('Location: index.php?error=' . "error file type");
}
else{
	if ($result !== FALSE) {
		try {
			$register = new Registered($_POST['completeName'], $_POST['email'], $_POST['password'], $result['showimage']);
			$result = $register->save();
			header('Location: index.php?success=1');
		}
		catch (Exception $e) {
			error_log($e->getMessage());
		}
	} else {
		header('Location: index.php?error=' . $e->getMessage());
	}
}
?>