<?php
if(empty($_POST['categories'])){
    $api=file_get_contents('http://localhost/cringeProject/cringeApiTwo2/categories');
    $text=json_decode($api);
?>
<h1>Добавить покупку</h1>
<form action="" method="post">
<h2>Название</h2>
<p>
    <input type="text" name='name' required>
</p>
<h2>Цена</h2>
<p>
    <input type="number" name='price' required>
</p>
<h2>Категория</h2>
<p>
    <select name="categories" id="" required>
        <?php
            foreach ($text as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    echo('<option value="'.$value1->id.'">'.$value1->name.'</option>');
                }
            }
        ?>
    </select>
</p>
<p>
    <input type="submit">
</p>
</form>
<?php
 }else{
$name=$_POST['name'];
$price=$_POST['price'];
$categories=$_POST['categories'];

$url='http://localhost/cringeProject/cringeApiTwo2/addPurchase';
$data=[
    'name'=>$name,
    'price'=>$price,
    'categories'=>$categories,
];
$options=[
    'http'=>[
        'method'=>'POST',
        'content'=>http_build_query($data),
    ],
];
$context=stream_context_create($options);
$jsonFromAPI=file_get_contents($url,false,$context);
$text=json_decode($jsonFromAPI);
echo('<h1>'.$text->status.'</h1>');
}
?>
<a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>