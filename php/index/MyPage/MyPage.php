<?php
session_start();

// サインインチェック
if (!($_SESSION['auth']) == 'true') {
	// サインインしていない
	header('Location: signIn.php');
	exit();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-Edge">
	<title>マイページ</title>
	<meta name="Keywords" content="本,おすすめ,推薦図書">
	<meta name="Description" content="読んだことのある本についてユーザーの
	皆さんが自由に感想を投稿していきます。
	同じく読んだことがある人と意見を交換するも良し、
	新しく読む本を見つけるきっかけにするも良しのサイトです。">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- stylesheet -->
	<link rel="stylesheet" href="../css/MyPage.css" media="all">
</head>

<body>
<header>
<div id="other_nav">
	<div id="nav_msg">
	<ul>
	<?php if ($_SESSION['auth'] == 'true'): ?>
		<li><a href="MyPage.php"><div id="icon_pro"></div></a></li>
	<?php endif; ?>
		<li><a href="signOut.php">■ログアウトする</a></li>
		<li><a href="#">■本を探す</a></li>
		<li><a href="topPage.php">■ホームに戻る</a></li>
	</ul>
	</div><!-- #nav_msg -->
</div>

<div id="header_MyPage">
	<h2>My Page</h2>
</div>
</header>

<article>
	<div id="profile">
		<img src="">
		<div id="name">
		<?php
		echo "<p>" . $_SESSION['username'] . " さんのページ</p>";
		?>
		</div>
	</div>
	<div id="category">
		<ul>
			<li><a href="#">>> プロフィール変更</a></li>
			<li><a href="#">>> 投稿した本を見る</a></li>
			<li><a href="#">>> 本を投稿する</a></li>
			<li><a href="#">>> プロフィール変更</a></li>
		</ul>
	</div>
</article>

<div id="dammy"></div>

<main>
<div id="form">
	<h3>マイページ</h3>

<form action="" type="post">
<table>
<tbody>
	<tr>
		<th>氏</th>
		<td><input name="ID" type="text"></td>
	</tr>
	<tr>
	<tr>
		<th>名</th>
		<td><input name="ID" type="text"></td>
	</tr>
	<tr>
	<tr>
		<th>User Name</th>
		<td><input name="ID" type="text"></td>
	</tr>
	<tr>
	<tr>
		<th>User ID</th>
		<td><input name="ID" type="text"></td>
	</tr>
	<tr>
		<th>Password</th>
		<td><input name="password" type="password"></td>
	</tr>
	<tr>
		<th>New Password</th>
		<td><input name="password" type="password"></td>
	</tr>
	<tr>
		<th>New Password （確認）</th>
		<td><input name="password" type="password"></td>
	</tr>
</tbody>
</table>
	<p><input type="submit" value="Save" id="formbtn"></p>
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