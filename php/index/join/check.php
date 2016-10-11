<?php
session_start();
require_once __DIR__ . '/../pdo_connect.php';

// if (!isset($_SESSION['join'])) {
// 	header('Location: signUp.php');
// 	exit();
// }

// join の二重配列を処理していく。
if (!empty($_POST)) {

	// 画像がアップされているか確認
	if (!isset($_SESSION['join']['image'])){
		$sql = ('INSERT INTO users SET username= :username, mail= :mail,
			password= :password, picture= :picture, created= :created'
		);
	} else {
		$sql = ('INSERT INTO users SET username= :username, mail= :mail,
			password= :password, created= :created'
		);
	}
	$prepare = $db->prepare($sql);
	$prepare->bindValue(':username', $_SESSION['join']['username'], PDO::PARAM_STR);
	$prepare->bindValue(':mail', $_SESSION['join']['mail'], PDO::PARAM_STR);
	$prepare->bindValue(':password', _password($_SESSION['join']['password']), PDO::PARAM_STR);
	// 文字列を渡す。PDOException が出るおそれアリ。
	$prepare->bindValue(':picture', $_SESSION['join']['picture'], PDO::PARAM_STR);
	$prepare->bindValue(':created', date('Y-m-d H:i:s'), PDO::PARAM_STR	);
	$prepare->execute();
}


// 登録ボタンの横に「書き直し」ボタンを設置する。


// if (!empty($_POST)){
// 	// 登録処理をする
// 	$sql = sprintf('INSERT INTO members SET name="%s", email="%s",
// 	password="%s", picture="%s", created="%s"',
// 	mysql_real_escape_string($_SESSION['join']['name']),
// 	mysql_real_escape_string($_SESSION['join']['email']),
// 	mysql_real_escape_string(sha1($_SESSION['join']['password'])),
// 	mysql_real_escape_string($_SESSION['join']['image']),
// 	date('Y-m-d H:i:s')
// 	);
// 	mysql_query($sql) or die(mysql_error());
// 	unset($_SESSION['join']);

// 	header('Location: thanks.php');
// 	exit;
// }


?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-Edge">
	<title>ユーザー登録 -確認</title>
	<meta name="Keywords" content="本,おすすめ,推薦図書">
	<meta name="Description" content="読んだことのある本についてユーザーの
	皆さんが自由に感想を投稿していきます。
	同じく読んだことがある人と意見を交換するも良し、
	新しく読む本を見つけるきっかけにするも良しのサイトです。">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- stylesheet -->
	<link rel="stylesheet" href="../css/base.css" media="all">
</head>

<body>
<header>
<div id="other_nav">
	<div id="nav_msg">
	<ul>
		<li><a href="signIn.php">■ログイン</a></li>
		<li><a href="#">■本を探す</a></li>
		<li><a href="index.html">■ホームに戻る</a></li>
	</ul>
	</div><!-- #nav_msg -->
</div>

<div id="header_myPage">
	<h2>ユーザー登録（確認）</h2>
</div>
</header>

<main>
<div id="form">
	<h3>ユーザー登録（確認）</h3>

<form action="" type="post">
<table>
<tbody>
	<tr>
		<th>username</th>
		<td><?php echo htmlspecialchars($_SESSION['join']['username'], ENT_QUOTES, 'UTF-8'); ?></td>
	</tr>
	<tr>
		<th>mail</th>
		<td><?php echo htmlspecialchars($_SESSION['join']['mail'], ENT_QUOTES, 'UTF-8'); ?></td>
	</tr>
	<tr>
		<th>Password</th>
		<td>表示されません</td>
	</tr>
</tbody>
</table>
	<div id="table_btn">
		<div id="subtn"><input type="submit" value="Sign UP" id="formbtn"></div>
		<div id="bkbtn"><a id="backbtn" href="index.php?action=rewrite">Back</a></div>
	</div>

</form><!-- #signin -->
</div><!-- #form -->
</main>

<footer>
	<div id="footer_nav">
	<div class="container">
		<div id="footer_nav_logo">
			<h3>推薦図書.com</h3>
		</div>
		<div id="footer_nav_nav">
			<ul>
				<li><a href="#">ホーム</a></li>
				<li><a href="#">書籍一覧</a></li>
				<li><a href="#">運営者情報</a></li>
				<li><a href="#">お問い合わせ</a></li>
			</ul>
		</div>
	</div><!-- /.container -->
	</div>
	<div id="footer_bottom">
	<div class="container">
		<p><small>Copyrights &copy; Cafe Leaf All Rights Reserved.</small></p>
	</div><!-- /.container -->
	</div><!-- /#footer_bottom -->
</footer>

</body>
</html>