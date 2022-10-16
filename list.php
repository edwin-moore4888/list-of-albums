<?php

require_once "DBBlackbox.php";

$collection = select();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <a href="edit.php">Back to Edit Form</a>
</header>

<body>

    <?php foreach ($collection as $album) : ?>
        <h2>Album</h2>
        <ul>

            <li>Album Name: <strong><?= $album['name'] ?></strong></li>
            <li>Album Author: <strong><?= $album['author'] ?></strong></li>
            <li>Album Year: <strong><?= $album['year'] ?></strong></li>
        </ul>
    <?php endforeach ?>

</body>

</html>