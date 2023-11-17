<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            table{
                border-collapse: collapse;
            }
            .header{
                background-color: blanchedalmond;
            }
            td{
                min-width: 100px;
                border: 1px solid black;
                padding: 5px;
            }
            .game{
                cursor: pointer;
                z-index: 100;
            }
            .up{
                background: right no-repeat url('http://localhost/cringeProject/cringeApi2/img/arrow-up.png');
                background-size: 10px 10px;
            }
            .down{
                background: right no-repeat url('http://localhost/cringeProject/cringeApi2/img/arrow_down.png');
                background-size: 25px 12px;
            }
        </style>
    </head>
    <body>
        <h1>Таблица</h1>
        <table class="header">
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
            let active=null
            game.forEach(element=>{
                element.addEventListener('click',(event)=>{
                    if(name==event.target.innerText){
                        sort=(sort=='ASC')?'DESC':'ASC';
                        table1(name,sort)
                        if(active.classList.contains('up')){
                            active.classList.remove('up')
                            active.classList.add('down')                            
                        }else{
                            active.classList.remove('down')
                            active.classList.add('up')

                        }
                    }
                    else{
                        name=event.target.innerText
                        sort='ASC'
                        if(active!=null){
                            active.classList.remove('up')
                            active.classList.remove('down')
                        }
                        active=event.target
                        active.classList.add('up')
                        table1(name,sort)
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
            table1('point','desc');
        </script>
        <a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>
    </body>
</html>