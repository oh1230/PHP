<?php
    //正解数の変数
    $ansNum = 5;
    //予想数の変数
    $userNum = 7;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
	</head>
    <body>
		<h2>数字当てプログラム</h2>

		<div>
		<?php
            echo "予想数： $userNum <br>\n";
            echo "正解数： $ansNum <br>\n";

            if ($userNum == $ansNum) {
                echo "！！大当たり！！";
            }
            elseif ($userNum < $ansNum) {
                echo "$userNum より大きいです。";
            }
            elseif ($userNum > $ansNum) {
                echo "$userNum より小さいです。";
            }
		?>
		</div>
    </body>
</html>