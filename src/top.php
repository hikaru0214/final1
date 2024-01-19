<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>top</title>
</head>
<body>
    <h1>日本観光名所</h1>
    <hr>
    <button onclick="location.href='insert.php'">観光地を登録</button>
    <table>
        <tr>
            <th>名所番号</th>
            <th>地方名</th>
            <th>都道府県名</th>
            <th>市町村名</th>
            <th>観光地名</th>
            <th>説明</th>
            <th>更新</th>
            <th>削除</th>
        </tr>
        <?php
            $pdo = new PDO($connect, USER, PASS);
            foreach ($pdo->query('select * from kanko') as $row) {
                echo '<tr>';
                echo '<td>', $row['id'], '</td>';
                echo '<td>', $row['japan_region'], '</td>';
                echo '<td>', $row['japan_mei'], '</td>';
                echo '<td>', $row['japan_city'], '</td>';
                echo '<td>', $row['kanko_name'], '</td>';
                echo '<td>', $row['remarks'], '</td>';
                echo '<td>';
                echo '<form action="update.php" method="post">';
                echo '<input type="hidden" name="id" value="', $row['id'], '">';
                echo '<button type="submit">更新</button>';
                echo '</form>';
                echo '</td>';
                echo '<td>';
                echo '<form action="delete.php" method="POST">';
                echo '<input type="hidden" name="id" value="', $row['id'], '">';
                echo '<button type="submit">削除</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
                echo "\n";
            }
        ?>
    </table>
</body>
</html>
