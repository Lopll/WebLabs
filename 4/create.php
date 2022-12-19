<?php
require('db.php');
$items = $xml->item;
if(!empty($_POST))
{
    if(isset($_POST["submit"]))
    {
        $name = $_POST['createItemName'];
        $price = $_POST['createItemPrice'];
        $time = $_POST['createItemTime'];
        $newItem = $xml->addChild('item','');
        $newItem->addChild('Name', $name);
        $newItem->addChild('Price', $price);
        $newItem->addChild('HoursToApply', $time);
        $newItem->addChild('img', "imgs/among-us.svg");

        $lastItem = $items[($xml->count())-1];
        
        $newItem->addAttribute('ID', $lastItem['ID']+1);
        
        $xml->saveXML('data.xml');
    }
     
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
    <br>
    <h3>Создать товар</h3>
    <div>
            <form action="#"  class = "prodCard" method="POST">
                <span class="adminText">Наименование<br>(род. падеж с маленькой буквы):</span>
                <br>
                <input class="adminText" type="text" name="createItemName" placeholder="Введите наименование">
                <br>
                <span class="adminText">Цена:</span>
                <br>
                <input class="adminText" type="text" name="createItemPrice" placeholder="Введите цену">
                <br>
                <span class="adminText">Часы выполнения:</span>
                <br>
                <input class="adminText" type="text" name="createItemTime" placeholder="Введите кол-во часов">
                <br>
                <button type="submit" name="submit">Создать товар</button>
                
            </form>
    </div>




</body>
</html>