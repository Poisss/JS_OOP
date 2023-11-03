<?php
if(empty($_POST['balance'])){
?>
<h1>
    Добавить деньги на счет
</h1>
<form action=""  method="post">
    <input type="number" name="balance">
    <input type="submit">
</form>
<?php
}
else{
    $api=file_get_contents('http://localhost/cringeProject/cringeApiTwo2/addMoney/'.$_POST['balance']);
    $text=json_decode($api);
    echo('<h1>'.$text->status.'</h1>');
}
?>
<a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>