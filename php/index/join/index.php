<?php
session_start();
require_once __DIR__ . '/../pdo_connect.php';

// エラーレベルの設定
error_reporting(E_ALL ^ E_NOTICE);

// ブランクの確認
if (!empty($_POST)) {
	if ($_POST['username'] == '') {
		$error['username'] = 'blank';
	}

	if ($_POST['mail'] == '') {
		$error['mail'] = 'blank';
	}

	if ($_POST['password'] == '' || ($_POST['password1']) == '') {
		$error['password'] = 'blank';
	}

	if (strlen($_POST['password']) < 4) {
		$error['password'] = 'length';
	}

	if ($_POST['password'] !== $_POST['password1']) {
		$error['password'] = 'diff';
	}

// 重複アカウントのチェック: レシピ->677
	$sql = ('SELECT COUNT(*) AS cnt FROM users WHERE mail= :mail OR username= :username');
	$prepare = $db->prepare($sql);
	$prepare->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
	$prepare->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
	$prepare->execute();
	$result  = $prepare->fetchColumn();
	if ($result > 0) {
		$error['username'] = 'duplicate';
	}

	if (empty($error)){
		$_SESSION['join'] = $_POST;

		if (!empty($_FILES)) {
			// 画像をアップロードする
			$image = date('YmdHis') . $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], '../member_picture/' . $image);
			$_SESSION['join']['image'] = $image;
		}

		header('Location: check.php');
		exit();
	}
}

	// if (empty($error)){
	// 	$sql = sprintf('SELECT COUNT(*) AS cnt FROM members WHERE email="%s"',
	// 	mysql_real_escape_string($_POST['email'])
	// 	);
	// 	$record = mysql_query($sql) or die(mysql_error());
	// 	$table = mysql_fetch_assoc($record);
	// 	if ($table['cnt'] > 0){
	// 		$error['email'] = 'duplicate';
	// 	}
	// }

// 書き直しオプション
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-Edge">
	<title>ユーザー登録</title>
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

<div id="header_MyPage">
	<h2>ユーザー登録</h2>
</div>
</header>

<main>
<div id="form">
	<h3>ID・パスワードの入力</h3>

<form action="" method="post" enctype="multipart/form-data">
<table>
<tbody>
	<tr>
		<th>User Name</th>
		<td><input name="username" type="text"></td>
	</tr>
	<tr>
	<tr>
		<th>mail</th>
		<td><input name="mail" type="text"></td>
	</tr>
	<tr>
		<th>Password</th>
		<td><input name="password" type="password"></td>
	</tr>
	<tr>
		<th>New Password （確認）</th>
		<td><input name="password1" type="password"></td>
	</tr>
</tbody>
</table>
	<p><input type="submit" value="Sign Up" id="formbtn"></p>
</form>

	<?php if($error['username'] == 'blank'): ?>
		<p class="error">* ユーザー名を入力してください。</p>
	<?php endif; ?>
	<?php if ($error['mail'] == 'blank'): ?>
		<p class="error">* メールアドレスを入力してください。</p>
	<?php endif; ?>
	<?php if ($error['password'] == 'blank'): ?>
		<p class="error">* パスワードを入力してください。</p>
	<?php endif; ?>

	<?php if ($error['password'] == 'length'): ?>
		<p class="error">* パスワードは4文字以上設定してください。</p>
	<?php endif; ?>
	<?php if ($error['password'] == 'diff'): ?>
		<p class="error">* 入力されたパスワードが違います。</p>
	<?php endif; ?>

	<?php if ($error['username'] == 'duplicate'): ?>
		<p class="error">* メールアドレスもしくは、ユーザー名は既に登録されています。</p>
	<?php endif; ?>
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