<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            td{
                min-width: 100px;
                border: 1px solid black;
            }
            .game{
                cursor: pointer;
                z-index: 100;
            }
        </style>
    </head>
    <body>
        <h1>Таблица</h1>
        <table>
            <tr>
                <td>name</td>
                <td>team</td>
                <td class="game">game</td>
                <td class="game">goal</td>
                <td class="game">pass</td>
                <td class="game">point</td>
            </tr>
        </table>
        <table class="table">

        </table>
        <script>
            let table=document.querySelector('.table')
            let game=document.querySelectorAll('.game')
            let name=''
            let sort='ASC'
            game.forEach(element=>{
                element.addEventListener('click',(event)=>{
                    if(name==event.target.innerText){
                        sort=(sort=='ASC')?'DESC':'ASC';
                        table1(name,sort)
                        console.log(sort)
                    }
                    else{
                        name=event.target.innerText
                        sort='ASC'
                        table1(name,sort)
                        console.log(sort)
                    }
                })
            });
            function table1(x,y){
                let url ='http://localhost/cringeProject/cringeApiTwo2/table'  
                table.innerHTML=''
                fetch(url, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({name:x,sort:y})
                })
                .then((e)=>e.json())
                .then((data)=>{
                    data['table'].forEach(element => {
                        table.innerHTML+= '<tr><td>'+element['name']+'</td><td>'+element['team']+'</td><td>'
                            +element['game']+'</td><td>'+element['goal']+'</td><td>'+element['pass']+'</td><td>'+element['point']+'</td><tr>'
                    });
                })
            };
            table1('all','ASC');
        </script>
        <a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>
    </body>
</html>