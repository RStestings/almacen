<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <label for="">Usuario: </label>
        <input type="text" name="usuario" placeholder="Usuario:">
        
        <br>
        <br>

        <label for="">Password: </label>
        <input type="text" name="pass" placeholder="Password:">

        <br>
        <br>
        
        <input type="submit" value="OK">

    </form>

</body>
</html>