<?php

$articles = [
    1 => 'First article text demo',
    2 => 'Second article text demo'
];

$article = '';

if (isset($_GET['article'])) {

    $index = $_GET['article'];

    if (isset($articles[$index])) {

        $article = $articles[$index];
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>GET</title>
    <meta charset="UTF-8">
</head>

<body>
    <ul>
        <li><a href="search.php?article=1">Article 1</a></li>
        <li><a href="search.php?article=2">Article 2</a></li>
        <li><a href="search.php">Reset</a></li>
    </ul>
    <?php if ($article) : ?>
        <p><?= $article; ?></p>
    <?php endif; ?>
</body>

</html>