<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>観光地を登録</title>
</head>
<body>
    <h1>観光地を登録</h1>
    <form action="insert-output.php" method="post">
        <label for="id">都道府県コード(1~47):</label><br>
        <input type="text" name="id" id="id"><br>

        <label for="japan_region">地方名</label><br>
        <input type="text" name="japan_region" id="japan_region"><br>

        <label for="japan_mei">都道府県名</label><br>
        <input type="text" name="japan_mei" id="japan_mei"><br>

        <label for="japan_city">市町村名</label><br>
        <input type="text" name="japan_city" id="japan_city"><br>

        <label for="kanko_name">観光地名</label><br>
        <input type="text" name="kanko_name" id="kanko_name"><br>

        <label for="remarks">説明</label><br>
        <textarea name="remarks" id="remarks" cols="50" rows="6"></textarea><br>

        <button type="submit">追加</button>
    </form>
</body>
</html>
