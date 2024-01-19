<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>練習6-6-output</title>
</head>
<body>
    <button onclick="location.href='top.php'">トップへ戻る</button>

    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('update kanko set kanko_name=?, japan_region=?, japan_mei=?, japan_city=?, remarks=? where id=?');

    if (empty($_POST['japan_city'])) {
        echo '市町村名を入力してください';
    } else if (empty($_POST['kanko_name'])) {
        echo '観光地名を入力してください';
    } else if (empty($_POST['remarks'])) {
        echo '説明を入力してください';
    } else {
        if ($sql->execute([htmlspecialchars($_POST['kanko_name']), $_POST['japan_region'],  $_POST['japan_mei'], $_POST['japan_city'], $_POST['remarks'], $_POST['id']])) {
            echo '更新に成功しました。';
        } else {
            echo '更新に失敗しました。';
        }
    }
    ?>

    <hr>
    <table>
        <tr><th>名所番号</th><th>地方名</th><th>都道府県名</th><th>市町村名</th><th>観光地名</th><th>説明</th></tr>

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
