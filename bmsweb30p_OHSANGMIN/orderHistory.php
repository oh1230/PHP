<?php
    /* プログラム名		：orderHistory.php
     * プログラム説明	：購入履歴
     * 作成日時			：2022/01/07
     * 作成者			：オ サン ミン
     */

    session_start();
    $id = $_SESSION['id'];
    $author = $_SESSION['author'];

    //権限が無かった場合、ログオウトさせる
    if (!isset($id) || !isset($author)) {
        $errMsg = "権限がありません。";
        $link = "logout.php";

        header("Location:error.php?errMsg={$errMsg}&link={$link}");
        exit;
    }

    require_once("dbprocess.php");

    $sql = "SELECT b.title,o.quantity,o.date FROM orderinfo o inner join bookinfo b on o.isbn=b.isbn";

    $result = executeQuery($sql);

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>ORDER HISTORY</title>
	</head>
    <body>
		<h1 align="center" style="margin-top: 21px;">書籍管理システム</h1>
		<hr align="center" size="5" color="orange" width="950">
		<table width="950" align="center">
			<tr>
				<td style="width: 33%">[<a href="./menu.php">メニュー</a>]&emsp;[<a href="./list.php">書籍一覧</a>]</td>
				<td style="width: 33%; text-align: center; padding-top: 3%"><h2>購入品確認</h2></td>
				<td style="width: 33%; text-align: left; padding-left: 17%">名前：<?=$id?><br>権限：<?=$author?></td>
			</tr>
		</table>
		<hr align="center" size="2" color="BLACK" width="950">
		<br>

		<table align="center" style="border: 0; width: 800">
			<tr >
				<th bgcolor="orange" width="267">TITLE</th>
				<th bgcolor="orange" width="267">数量</th>
				<th bgcolor="orange" width="266">注文日</th>
			</tr>
			<?php
			//検索結果を表示
			while($row = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td align="center"><?=$row["title"]?></td>
				<td align="center"><?=$row["quantity"]?>冊</td>
				<td align="center"><?=$row["date"]?></td>
			</tr>
			<?php
			}
			mysqli_free_result($result);
			?>
		</table>

		<br><br><br><br><br>
		<hr align="center" size="5" color="orange" width="950"></hr>
		<table align="center" width="950">
			<tr><td>copyright (c) 2021 all rights reserved.</td></tr>
		</table>
    </body>
</html>