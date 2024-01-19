<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>練習6-8-edit</title>
</head>
<body>
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
            $pdo = new PDO($connect, USER, PASS);
            
            // Check if 'id' is set in the $_POST array
            $id = isset($_POST['id']) ? $_POST['id'] : null;

            // Check if $id is not null before executing the query
            if ($id !== null) {
                $sql = $pdo->prepare('select * from kanko where id=?');
                $sql->execute([$id]);

                foreach ($sql as $row) {
                    echo '<tr>';
                    echo '<form action="update-output.php" method="post">';
                    echo '<td> <input type="text" name="id" value="', $row['id'], '" readonly></td>';
                    echo '<td> <input type="text" name="japan_region" value="', $row['japan_region'], '" readonly></td>';
                    echo '<td> <input type="text" name="japan_mei" value="', $row['japan_mei'], '" readonly></td>';
                    echo '<td> <input type="text" name="japan_city" value="', $row['japan_city'], '"></td>';
                    echo '<td> <input type="text" name="kanko_name" value="', $row['kanko_name'], '"></td>';
                    echo '<td> <input type="text" name="remarks" value="', $row['remarks'], '"></td>';
                    echo '<td><input type="submit" value="更新"></td>';
                    echo '</form>';
                    echo '</tr>';
                    echo "\n";
                }
            } else {
                echo '<tr><td colspan="7">ID is not set.</td></tr>';
            }
        ?>
    </table>
    <button onclick="location.href='top.php'">トップへ戻る</button>
</body>
</html>
