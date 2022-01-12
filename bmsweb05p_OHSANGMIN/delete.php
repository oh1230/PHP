<?php
    $delIsbn = "00008";
    $delTitle = "perl";

    header ('Content-type: text/html; charset=UTF-8');

    $url = "localhost";
    $user = "root";
    $pass = "root123";
    $db = "mybookdb";

    $link = mysqli_connect($url,$user,$pass) or die("MySQLサーバへの接続に失敗しました。");

    mysqli_select_db($link, $db) or die ("$db の選択に失敗しました。");

    $sqlList = "SELECT * FROM bookinfo";
    $sqlDelete = "DELETE FROM bookinfo WHERE isbn = '{$delIsbn}'";

    $resultBefore = mysqli_query($link, $sqlList) or die ("SQL文「 $sqlList 」の発行に失敗しました。");
    $resultDelete = mysqli_query($link, $sqlDelete) or die ("SQL文「 $sqlDelete 」の発行に失敗しました。");
    $resultAfter = mysqli_query($link, $sqlList) or die ("SQL文「 $sqlList 」の発行に失敗しました。");


    $rowsBefore = mysqli_num_rows($resultBefore);
    $rowsAfter = mysqli_num_rows($resultAfter);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<div style="text-align:center">
    		<h2>書籍削除画面</h2>
    	</div>

    	<p style="margin-left: 20%; text-align:left">■更新前の書籍一覧表示</p>
    	<table style="margin-left: 20%; margin-right: 20%">
    		<tr>
    			<th style="width: 20%; text-align:left">ISBN</th>
    			<th style="width: 20%">書籍名</th>
    			<th style="width: 20%; text-align:right">価格</th>
    		</tr>
    		<?php
    		if ($rowsBefore > 0) {
    		    while ($row = mysqli_fetch_array($resultBefore)) {
    		?>
    		<tr>
    			<td><?=$row['isbn']?></td>
    			<td><?=$row['title']?></td>
    			<td style="text-align:right"><?=$row['price']?></td>
    		</tr>
    		<?php
                }
    		}
    		?>
    	</table>

    	<hr>
    	<p style="text-align: center">書籍「<?=$delTitle?>」を削除しました。</p>
    	<hr>

    	<p style="margin-left: 20%; text-align:left">■更新後の書籍一覧表示</p>
    	<table style="margin-left: 20%; margin-right: 20%">
    		<tr>
    			<th style="width: 20%; text-align:left">ISBN</th>
    			<th style="width: 20%">書籍名</th>
    			<th style="width: 20%; text-align:right">価格</th>
    		</tr>
    		<?php
    		if ($rowsAfter > 0) {
    		    while ($row = mysqli_fetch_array($resultAfter)) {
    		?>
    		<tr>
    			<td><?=$row['isbn']?></td>
    			<td><?=$row['title']?></td>
    			<td style="text-align:right"><?=$row['price']?></td>
    		</tr>
    		<?php
                }
    		}
    		?>
    	</table>
    	<?php
    	mysqli_free_result($resultBefore);
    	mysqli_free_result($resultAfter);

    	mysqli_close($link) or die("MySQLサーバの切断に失敗しました。");
    	?>
    </body>
</html>