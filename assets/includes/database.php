<?php
$dsn = 'mysql:host=localhost;dbname=Memory;charset=utf8';
$userofdb = 'root';
$passwordofdb = 'root';

try {
	$dbh = new PDO($dsn, $userofdb, $passwordofdb);
} catch (PDOException $e) {
	print_r(
		array (
			"ERROR" => $e->getMessage()
		)
	);
	die();
};
?>