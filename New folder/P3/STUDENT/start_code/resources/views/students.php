<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>

    <h4>List of student: </h4>


    <?php foreach ($students as $student) {?>
        <ul>
            <li> <?php echo $student["name"] . " in class " . $student["class"] . " is " . $student["age"] ?></li>
        </ul>
    <?php }?>
</body>

</html>