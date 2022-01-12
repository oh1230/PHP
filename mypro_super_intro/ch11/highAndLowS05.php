<?php

    //array関数を使ってトランプの画像名を配列で作成
    $cards = array("Jk.png","01.png","02.png","03.png","04.png","05.png","06.png",
        "07.png","08.png","09.png","10.png","11.png","12.png","13.png");
    //0～13の範囲でランダム数値を1つ取得
    $rightCard = mt_rand(0,13);

    $leftCard = $_POST['leftCard'];
    $select = $_POST['select'];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>High & Low ゲーム</title>
	</head>
    <body>
	<div style="text-align: center">
		<h1>High & Low ゲーム</h1>
		<hr style="height:1; background-color:gray" />
	</div>
	<br>
	<div style="text-align: center">
		<table style="margin-left:20%; margin-right:20%">
			<tr>
				<td style="text-align: center; width: 30%">
    				<?php echo '<img src="../cards/',$cards[$leftCard],'">'; ?>
    			</td>
    			<td style="width: 30%"></td>
    			<td style="text-align: center; width: 30%">
    				<?php echo '<img src="../cards/',$cards[$rightCard],'">'; ?>
    			</td>
			</tr>
		</table>
		<br>
		<?php echo "「 $select 」を選択しました。<br>"; ?>
	</div>
    </body>
</html>