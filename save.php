<?php
require_once "DBBlackbox.php";
require_once "Album.php";
require_once "edit.php";

session_start();

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

// update data from request
$albums->name = $_POST['name'] ?? $albums->name;
$albums->author = $_POST['author'] ?? $albums->author;
$albums->year = $_POST['year'] ?? $albums->year;

// ...

if ($id) {
    update($id, $albums);
} else {
    $id = insert($albums);
}

// flash a success message
$_SESSION['flashed_messages'] = 'Data was successfully saved!';

// redirect to edit
header('Location: edit.php?id=' . $id);
