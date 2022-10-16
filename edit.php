<?php
require_once "DBBlackbox.php";
require_once "Album.php";


session_start();



// flashed messages
$messages = [];

if (!empty($_SESSION['flashed_messages'])) {
    $messages = $_SESSION['flashed_messages'];
    unset($_SESSION['flashed_messages']);
}

// find the ID of the record we want to edit in the request
// OR NOT - if we are creating a new record
$id = $_GET['id'] ?? null;

// somehow we must determine whether this is creating a new record
// or updating an existing one. The presence of `id=` in the URL
// is a good indicator
if ($id) {

    // somehow retrieve existing data from some storage
    $albums = find($id, 'Album');
} else {

    // prepare empty data
    $albums = new Album;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .flashed_messages {
            background-color: aqua;
            border: 1px solid black;
            padding: 1rem;
        }

        a {
            text-decoration: none;
            font-weight: bold;
            color: blue;
        }
    </style>

</head>
<header>
    <a href="list.php">List of Albums</a>
</header>

<body>

    <?php if (!empty($messages)) : ?>
        <div class="flashed_messages"><?= $messages ?></div>
    <?php endif; ?>

    <?php if ($id) : ?>

        <form action="save.php?id=<?php $id ?>" method="post">

        <?php else : ?>
            <form action="save.php" method="post" ?>
            <?php endif ?>
            Name:<br>
            <input type="text" name="name" value="<?= htmlspecialchars((string)$albums->name) ?>"><br>
            <br>

            Author:<br>
            <input type="text" name="author" value="<?= htmlspecialchars((string)$albums->author) ?>"><br>
            <br>

            Year:<br>
            <input type="number" name="year" value="<?= ((int)$albums->year) ?>"><br>
            <br>



            <button type="submit">Save</button>

            </form>
</body>

</html>