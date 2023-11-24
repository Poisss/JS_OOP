<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Студенты</h1>
        <div class="student">

        </div>
        <hr>
        <div class="info">

        </div>
        <a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>
        <script>
            let student=document.querySelector('.student');
            let info=document.querySelector('.info');
            function stat(x){
                fetch('http://localhost/cringeProject/cringeApiTwo2/student/'+x)
                .then((e)=>e.json())
                .then((data)=>{
                    data['student'].forEach(element => {
                        let sr=((Number(element['intelligence'])+Number(element['teamwork'])+Number(element['attack']))/3).toFixed(1)
                        info.innerHTML='<h2>Навыки боя: '+element['attack']+'</h2><h2>Интеллект: '+element['intelligence']+'</h2><h2>Командная работа: '+element['teamwork']+'</h2><br><h2>Оценка: '+sr+'</h2>'; 
                    });
                });
            }
            
            function info1(){
                let btn_student=document.querySelectorAll('.btn_student');
                btn_student.forEach(element=>{
                element.addEventListener('click',(event)=>{
                    stat(event.target.value)
                })
            });
            }
            function student1(){
                fetch('http://localhost/cringeProject/cringeApiTwo2/student')
                .then((e)=>e.json())
                .then((data)=>{
                    student.innerHTML=''
                    data['student'].forEach(element => {
                        student.innerHTML+= '<p><input type="radio" id="radio'+element['id']+'" class="btn_student" name="name" value="'+element['id']+'"><label for="radio'+element['id']+'">'+element['name']+'</label></p>';
                    });
                });
                setTimeout(info1, 1000);
            }
            student1()
        </script>
    </body>
</html>
