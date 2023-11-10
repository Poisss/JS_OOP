<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Таблица</h1>
        <table class="table">
            <tr>
                <td>name</td>
                <td>team</td>
                <td class="game">game</td>
                <td class="game">goal</td>
                <td class="game">pass</td>
                <td class="game">point</td>
            </tr>
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
                        console.log(sort)
                    }
                    else{
                        name=event.target.innerText
                        sort='ACS'
                        console.log(sort)
                    }
                })
            })
            // function table(){     
            //     fetch('http://localhost/cringeProject/cringeApiTwo2/table', {
            //     method: 'POST',
            //     body: param
            //     })
            //     .then((e)=>e.json())
            //     .then((data)=>{
            //         data['table'].forEach(element => {
            //             table.innerHTML= '<tr><td>'+element['name']+'</td><td>'+element['team']+'</td><td>'
            //                 +element['game']+'</td><td>'+element['goal']+'</td><td>'+element['pass']+'</td><td>'+element['point']+'</td><tr>'
            //         });
            //     })
            // }
            // table()
        </script>
        <a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>
    </body>
</html>