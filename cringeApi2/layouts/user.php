<?php
    $api=file_get_contents('http://localhost/cringeProject/cringeApiTwo2/user');
    $text=json_decode($api);
?>
<h1>Пользователи</h1>
<select name="" id="">
    <?php
        foreach ($text as $key => $value) {
            foreach ($value as $key1 => $value1) {
                echo('<option value="'.$value1->id.','.$value1->name.'">'.$value1->name.'</option>');
            }
        }
    ?>
</select>
<br><a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>