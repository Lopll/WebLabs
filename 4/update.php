<?php
require('db.php');
$items = $xml->item;

    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        $id = $_GET['ID'];
        
        foreach($items as $item)
        {
            if($item['ID'] == $id)
            {
                $name = $item->Name;
                $price = $item->Price;
                $time = $item->HoursToApply;
                break;
            }
        }
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $id = $_POST['ID'];
        foreach($items as $item)
        {
            if($item['ID'] == $id)
            {
                $item->Name = $_POST['updateItemName'];
                $item->Price = $_POST['updateItemPrice'];
                $item->HoursToApply = $_POST['updateItemTime'];
                break;
            }
        }
        $xml->saveXML('data.xml');
        header('location:index.php');
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="amog.css">
</head>
<body class="adminBody">
    <br>
    <h1><a href="index.php" class="">Назад</a></h1>

    <br>
    <h3>Обновить товары</h3>
    <div class="prodList">
            <form action="#" class = "prodCard" method="POST">

                <span class="adminText">Наименование<br>(род. падеж с маленькой буквы):</span>
                <input class="adminText" type="text" name="updateItemName" value="<?php echo $name; ?>">
                <br>
                <span class="adminText">Цена:</span>
                <input class="adminText" type="text" name="updateItemPrice" value="<?php echo $price; ?>">
                <br>
                <span class="adminText">Часы выполнения:</span>
                <input class="adminText" type="text" name="updateItemTime" value="<?php echo $time; ?>">
                <input type="hidden" name="ID" value= "<?php echo $id;?>">
                <br>
                <button name="submit" type="submit">Обновить</button>
                
                
                
            </form>
    </div>
</body>
</html>