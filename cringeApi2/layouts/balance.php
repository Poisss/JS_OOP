<h1>Баланс</h1>
<?php
$api=file_get_contents('http://localhost/cringeProject/cringeApiTwo2/balance');
$text=json_decode($api);
echo('<h2>Внесено:: '.$text->spent+$text->balance.'</h2>');
echo('<h2>Потрачено: '.$text->spent.'</h2>');
echo('<h1>Осталось: '.$text->balance.'</h1>');
?>
<a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>