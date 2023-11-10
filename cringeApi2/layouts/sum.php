<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Сумма</h1>
        <p class="comment"></p>
        <script>
            let comment=document.querySelector('.comment')
            function sumNumber(){
                fetch('http://localhost/cringeProject/cringeApiTwo2/sum')
                .then((e)=>e.json())
                .then((data)=>{
                    data['user'].forEach(element => {
                        comment.innerHTML='Сумма: '+element['balance']
                    });
                })
            }
            sumNumber()
            setInterval(sumNumber, 1000)
        </script>
        <a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>
    </body>
</html>