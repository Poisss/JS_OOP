<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Последний комментарий</h1>
        <p class="comment"></p>
        <script>
            let comment=document.querySelector('.comment')
            function commentLast(){
                fetch('http://localhost/cringeProject/cringeApiTwo2/commentLast')
                .then((e)=>e.json())
                .then((data)=>{
                    data['comment'].forEach(element => {
                        comment.innerHTML= 'Тект: '+element['text']+'<br>Время: '+element['time']
                    });
                })
            }
            commentLast()
            setInterval(commentLast, 1000)
        </script>
        <a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>
    </body>
</html>