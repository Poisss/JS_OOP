<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Последний пользователь</h1>
        <p class="user"></p>
        <script>
            let user=document.querySelector('.user')
            function userLast(){
                fetch('http://localhost/cringeProject/cringeApiTwo2/userLast')
                .then((e)=>e.json())
                .then((data)=>{
                    data['user'].forEach(element => {
                        user.innerHTML= 'Имя: '+element['name']+'<br>Баланс: '+element['balance']
                    });
                })
            }
            userLast()
            setInterval(userLast, 1000)
        </script>
        <a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>
    </body>
</html>