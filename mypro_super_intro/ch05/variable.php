<?php
    //名前用の変数
    $name = "神田ゴロウ";

    //身長用の変数
    $height = 169.5;

    //年齢用の変数
    $age = 19;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
    <body>
	<?php
	   echo $name, 'さんの身長は',$height,"cmです。<br>";
	   echo "年齢は",$age,"歳です。";
	?>
    </body>
</html>