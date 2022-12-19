<?php
require('db.php');
$items = $xml->item;
    if(isset($_GET['ID']))
    {
        $id = $_GET['ID'];
        $i = 0;
        foreach($items as $item)
        {
            if($item['ID'] == $id)
            {
                unset($items[$i]);
                break;
            }
            $i++;
        }
        $xml->saveXML("data.xml");
        header('location:index.php');
    }


?>

