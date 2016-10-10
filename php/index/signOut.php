<?php
session_start ();
$_SESSION = array();
session_destroy();
// cookie に関する記述を追加。
header('Location: topPage.php');

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-Edge">
	<title>サインイン</title>
	<meta name="Keywords" content="本,おすすめ,推薦図書">
	<meta name="Description" content="読んだことのある本についてユーザーの
	皆さんが自由に感想を投稿していきます。
	同じく読んだことがある人と意見を交換するも良し、
	新しく読む本を見つけるきっかけにするも良しのサイトです。">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- stylesheet -->
	<link rel="stylesheet" href="css/base.css" media="all">
</head>

<body>
<header>
<div id="other_nav">
	<div id="nav_msg">
	<ul>
	<?php if ($_SESSION['auth'] == 'true'): ?>
		<li><a href="myPage.php"><div id="icon_pro"></div></a></li>
	<?php endif; ?>
		<li><a href="signIn.php">■ログイン</a></li>
		<li><a href="#">■本を探す</a></li>
		<li><a href="topPage.php">■ホームに戻る</a></li>
	</ul>
	</div><!-- #nav_msg -->
</div>

<div id="header_myPage">
	<h2>Sign In</h2>
</div>
</header>

<main>
<div id="form">
	<h3>ID・パスワードの入力</h3>
	<p>ログアウトしました。</p>
<?php
print_r ($_SESSION);
?>

<form action="" method="post">
<table>
<tbody>
	<tr>
		<th>User ID</th>
		<td><input name="mail" type="text"></td>
	</tr>
	<tr>
		<th>Password</th>
		<td><input name="password" type="password"></td>
	</tr>
</tbody>
</table>
	<p><input type="submit" value="Sign In" id="formbtn"></p>
</form><!-- #signin -->

<?php if ($error['login'] == 'blank'): ?>
	<p class="error">* メールアドレスとパスワードを入力してください</p>
<?php endif; ?>

<?php if ($error['login'] == 'failed'): ?>
	<p class="error">* メールアドレスかパスワードが間違っています。</p>
<?php endif; ?>

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