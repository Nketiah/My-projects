<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<select name="supername" id="supername">
    <option value="" disabled selected>Supervisor Name</option>
    <?php
    foreach ($allnames as $name) {
        echo '<option value=" '.$name['Names'].' "> '.$name['Names'].' </option>';

    }
    ?>

</select>

</body>
</html>
