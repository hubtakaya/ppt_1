<?php
require_once __DIR__ . '/../conf/database_conf.php';
require_once __DIR__ . '/../lib/h.php';

try {
	$db = new PDO($dsn, $dbUser, $dbPass);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo 'データベースに接続しました。';
} catch (PDOException $e) {
	echo "<p>" . '接続できませんでした。理由： ' . h($e->getMessage()) . "</p>";
}