<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    .input,.list-input-value{
        width: 300px;
        height: 30px;
        padding: 3px;
    }
    .list-input-value{
        border:1px solid black;
    }
    .list-input-value:hover{
        background:rgb(128, 128, 128,0.3)
    }
</style>
<h1>Введите имя</h1>
<input type="text" class="input"><br>
<div class="list-input">
    
</div>
<script>
let input=document.querySelector('.input')
let list_input=document.querySelector('.list-input')
input.addEventListener('input',()=>{
    fetch('http://localhost/cringeProject/cringeApiTwo2/input/', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({name:input.value})
                })
                .then((e)=>e.json())
                .then((data)=>{
                    list_input.innerHTML=''
                    data['name'].forEach(element => {
                        list_input.innerHTML+='<div class="list-input-value">'+element['name']+'</div>';
                    });
                    console.log(data['text']);
                });
})
</script>
<a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>    
</body>
</html>
