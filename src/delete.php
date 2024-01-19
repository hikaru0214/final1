<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
    <button onclick="location.href='top.php'">トップへ戻る</button>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from kanko where id=?');
    if ($sql->execute([$_POST['id']])) {
        echo '削除に成功しました';
    } else {
        echo '削除に失敗しました';
    }
    
?>
    <br><hr><br>
	<table>
    <tr><th>名所番号</th><th>地方名</th><th>都道府県名</th><th>市町村名</th><th>観光地名</th><th>説明</th></tr>
<?php
    foreach ($pdo->query('select * from kanko') as $row) {
        echo '<tr>';
        echo '<td>',$row['id'],'</td>';
        echo '<td>',$row['japan_region'],'</td>';
        echo '<td>',$row['japan_mei'],'</td>';
        echo '<td>',$row['japan_city'],'</td>';
        echo '<td>',$row['kanko_name'],'</td>';
        echo '<td>',$row['remarks'],'</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
    </body>
</html>

