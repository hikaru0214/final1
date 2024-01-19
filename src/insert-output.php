<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <button onclick="location.href='top.php'">トップへ戻る</button>

    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('insert into kanko(japan_id,japan_region,japan_mei,japan_city,kanko_name,remarks) values (?, ?, ?, ?, ?, ?)');

    // Check if japan_id is set in the $_POST array
    if (!preg_match('/^[0-9]+$/',$_POST['id'])) { 
        echo '都道府県番号を整数で入力してください。';
    } else if (empty($_POST['japan_region'])) {
        echo '地方名を入力してください。';
    } else if (empty($_POST['japan_mei'])) {
        echo '都道府県を入力してください。';
    } else if (empty($_POST['japan_city'])) {
        echo '市町村名を入力してください。';
    } else if (empty($_POST['kanko_name'])) {
        echo '観光地名を入力してください。';
    } else if (empty($_POST['remarks'])) {
        echo '説明を入力してください。';
    } else if ($sql->execute([$_POST['id'],$_POST['japan_region'],$_POST['japan_mei'],$_POST['japan_city'],$_POST['kanko_name'],$_POST['remarks']])) {
        echo '<font color="red">追加に成功しました。</font>';
    } else {
        echo '<font color="red">追加に失敗しました。</font>';
    }
    ?>
    <br><hr><br>

    <table>
        <tr>
            <th>名所番号</th>
            <th>地方名</th>
            <th>都道府県名</th>
            <th>市町村名</th>
            <th>観光地名</th>
            <th>説明</th>
        </tr>
        <?php
        foreach ($pdo->query('select * from kanko') as $row) {
            echo '<tr>';
            echo '<td>', $row['id'], '</td>';
            echo '<td>', $row['japan_region'], '</td>';
            echo '<td>', $row['japan_mei'], '</td>';
            echo '<td>', $row['japan_city'], '</td>';
            echo '<td>', $row['kanko_name'], '</td>';
            echo '<td>', $row['remarks'], '</td>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>

</body>
</html>
