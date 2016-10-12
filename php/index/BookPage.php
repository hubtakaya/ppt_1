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
	<title>『』のページ</title>
	<meta name="Keywords" content="本,おすすめ,推薦図書">
	<meta name="Description" content="読んだことのある本についてユーザーの
	皆さんが自由に感想を投稿していきます。
	同じく読んだことがある人と意見を交換するも良し、
	新しく読む本を見つけるきっかけにするも良しのサイトです。">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- stylesheet -->
	<link rel="stylesheet" href="css/bookPage.css" media="all">
</head>

<body>
<header>
<div id="other_nav">
	<div id="nav_msg">
	<ul>
	<?php if ($_SESSION['auth'] == 'true'): ?>
		<li><a href="MyPage.php"><div id="icon_pro"></div></a></li>
	<?php endif; ?>
		<li><a href="signIn.php">■ログイン</a></li>
		<li><a href="#">■本を探す</a></li>
		<li><a href="topPage.php">■ホームに戻る</a></li>
	</ul>
	</div><!-- #nav_msg -->
</div>

<div id="header_MyPage">
	<h2>『』</h2>
</div>
</header>

<div class="container">

<article id="book" class="clearfix">
	<div id="book_img">
		<img src="#" alt="">
	</div><!-- /#book_img -->
	<div id="book_msg">
		<h3 id="book_msg_title"></h3>
		<p id="book_msg_intro"></p>
	</div><!-- /#book_msg -->
</article><!-- /#book -->

<article id="comment">

<div class="comment clearfix">
	<div class="icon">
		<img src="#">
		<p class="username"></p>
	</div><!-- /.icon -->
	<div class="msg">
		<p></p>
	</div><!-- /.msg -->
</div><!-- /.comment -->

<div class="comment clearfix">
	<div class="icon">
		<img src="#">
		<p class="username"></p>
	</div><!-- /.icon -->
	<div class="msg">
		<p></p>
	</div><!-- /.msg -->
</div><!-- /.comment -->

</article><!-- /#comment -->

</div><!-- /.container -->

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