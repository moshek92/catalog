<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $time = time() + 60 * 60 * 24 * 7;
    echo date("d/m/Y H:i:s", $time);



    $sizes = ['S', 'M', 'L', 'XL', 'XXL'];


    ?>
    <p></p>

    <select>
        <option>Choose your size...</option>
        <?php
        foreach ($sizes as $size) {
            echo "<option>$size</option>";
        }
        ?>

    </select>


</body>

</html>