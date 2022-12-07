<?php
require('db.php');
if(!empty($_GET))
{
    if(isset($_GET['deleteByName']))
    {
        $name = $_GET['deleteByName'];
        $db->query("DELETE FROM catalog WHERE Name='$name'");
    }

    if(isset($_GET["createItemName"]) && isset($_GET["createItemPrice"]) && isset($_GET["createItemTime"]))
    {
        $name = $_GET['createItemName']; // TOASK: hot to ignore this statements if we have not get?
        $price = $_GET['createItemPrice'];
        $time = $_GET['createItemTime'];
        $db->query("INSERT INTO catalog(Name, img, Price, HoursToApply) VALUE('$name','imgs/among-us.svg', $price, $time)");
    }
    else{
        "<script>alert('Нехватка введённых данных!')</script>";
    }
            

    if(isset($_GET['updateItemName']))
    {
        $name = $_GET['updateItemName'];
        $price = $_GET['updateItemPrice'];
        $time = $_GET['updateItemTime'];
        $id = $_GET['id'];
        $db->query("UPDATE catalog SET Name='$name', Price=$price, HoursTOApply=$time WHERE id=$id");
    }
}
$items = $db->query("SELECT * FROM catalog")->fetchAll(PDO::FETCH_ASSOC);
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
    <h3>Удалить товар</h3>
    <div>
            <form action="#"  class = "prodCard">
                <span class="adminText">Наименование<br>(род. падеж с маленькой буквы):</span>
                <input class="adminText" type="text" name="deleteByName" placeholder="Введите наименование">
                <br>
                <button>Удалить товар</button>
                
            </form>
    </div>

    <br>
    <h3>Создать товар</h3>
    <div>
            <form action="#"  class = "prodCard">
                <span class="adminText">Наименование<br>(род. падеж с маленькой буквы):</span>
                <input class="adminText" type="text" name="createItemName" placeholder="Введите наименование">
                <br>
                <span class="adminText">Цена:</span>
                <input class="adminText" type="text" name="createItemPrice" placeholder="Введите цену">
                <br>
                <span class="adminText">Часы выполнения:</span>
                <input class="adminText" type="text" name="createItemTime" placeholder="Введите кол-во часов">
                <br>
                <button>Создать товар</button>
                
            </form>
    </div>




    <br>
    <h3>Обновить товары</h3>
    <div class="prodList">
        <?php foreach($items as $item)  {?>
            <form action="#" class = "prodCard">

                <span class="adminText">Наименование<br>(род. падеж с маленькой буквы):</span>
                <input class="adminText" type="text" name="updateItemName" value="<?php echo $item["Name"]; ?>">
                <br>
                <span class="adminText">Цена:</span>
                <input class="adminText" type="text" name="updateItemPrice" value="<?php echo $item["Price"]; ?>">
                <br>
                <span class="adminText">Часы выполнения:</span>
                <input class="adminText" type="text" name="updateItemTime" value="<?php echo $item["HoursToApply"]; ?>">
                <input class="adminText" style="display:none;" type="text" name="id" value= "<?php echo $item["ID"];?>">
                <br>
                <button>Обновить</button>
                
                
                
            </form>
        <?php } ?>
    </div>
</body>
</html>