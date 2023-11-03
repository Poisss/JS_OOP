<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        $path= $_SERVER['REQUEST_URI'];
        $command=explode('/',$path);
        if($command[3]=='ex1'){
            if(empty($_POST['temp'])){
                ?>
                <form action="" method="post">
                    <p>
                        Temp:<input type="date" name="temp" required >
                    </p>
                    <input type="submit" value="Отправить">
                </form>
                <?php
            }else{
                $api=file_get_contents('http://localhost/cringeProject/api/get_temp/'.$_POST['temp']);          
                $text=json_decode($api);
                if($text==null){
                    echo('Ошибка');
                }else{
                    echo ('<br>Temp: '.$text->temp);
                }
                
            }
        }
        if($command[3]=='ex2'){
            if(empty($_POST['a'])){
                ?>
                <form action="" method="post">
                    <p>
                        A:<input type="number" name="a" required >
                    </p>
                    <p>
                        B:<input type="number" name="b" required >
                    </p>
                    <p>
                        C:<input type="number" name="c" required >
                    </p>
                    <input type="submit" value="Отправить">
                </form>
                <?php
            }else{
                $api=file_get_contents('http://localhost/cringeProject/api/triangle/'.$_POST['a'].'/'.$_POST['b'].'/'.$_POST['c']);          
                $text=json_decode($api);
                if($text==null){
                    echo('Ошибка');
                }else{
                echo ('<br>Temp: '.$text->type);
                }
            }
        }
        if($command[3]=='ex3'){          
            if(empty($_POST['login'])){
            ?>
            <form action="" method="post">
                <p>
                    Login:<input type="text" name="login" required >
                </p>
                <p>
                    Password:<input type="text" name="password" required >
                </p>
                <input type="submit" value="Отправить">
            </form>
            <?php
            }else{
                $api=file_get_contents('http://localhost/cringeProject/api/get_user/'.$_POST['login'].'/'.$_POST['password']);          
                $text=json_decode($api);
                if($text==null){
                    echo('Ошибка');
                }else{
                echo ('<br>Id: '.$text->id);
                echo ('<br>Login: '.$text->login);
                echo ('<br>Password: '.$text->password);
                }
            }
        }
        ?>
    </body>
</html>
