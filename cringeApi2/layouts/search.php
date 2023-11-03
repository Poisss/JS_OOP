<?php
if(empty($_POST['categories'])){
    $api=file_get_contents('http://localhost/cringeProject/cringeApiTwo2/categories');
    $text=json_decode($api);
?>
<h1>Посмотреть покупки</h1>
<h2>Категория</h2>
<form action="" method="post">
    <p>
        <input type="radio" name="categories" value="all,Все продукты">Все продукты
    </p>
    <?php
    foreach ($text as $key => $value) {
        foreach ($value as $key1 => $value1) {
            echo('<p><input type="radio" name="categories" value="'.$value1->id.','.$value1->name.'">'.$value1->name.'</p>');
        }
    }
    ?>
    <input type="submit" value="Показать">
</form>
<?php
}else{
echo("<h1>".explode(',',$_POST['categories'])[1]."</h1>");
    if(explode(',',$_POST['categories'])[0]=='all'){
        $api2=file_get_contents('http://localhost/cringeProject/cringeApiTwo2/search');
        $text=json_decode($api2);
    }else{
        $api2=file_get_contents('http://localhost/cringeProject/cringeApiTwo2/search/'.$_POST['categories'][0]);
        $text=json_decode($api2);
    }
    foreach ($text as $key => $value) {
        foreach ($value as $key1 => $value1) {
            echo('<p>'.$value1->name.' - '.$value1->price.'p ('.$value1->category.')</p>');
        }
    }
}
?>
<a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>