<h1>Тест</h1>
    <div class="content">

    </div>
<a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>
<script>
    let content=document.querySelector('.content')
    let test=[]
    let answer=0
    let page=0
    function shuffle(array) {
        return array.sort(() => Math.random() - 0.5);
    }
    function test1() {
        fetch('http://localhost/cringeProject/cringeApiTwo2/test')
                .then((e)=>e.json())
                .then((data)=>{
                    data['test'].forEach((element,index) => {
                        test.push({id:element['id'],question:element['question'],answer:[element['answer_false_1'],
                        element['answer_false_2'],element['answer_false_3'],element['answer_true']],right:null});
                        test[index]['answer']=shuffle(test[index]['answer']);
                        console.log(test);
                    })
                    page1(page)
                });
    }
    function answer1(id1,answer1) {
        fetch('http://localhost/cringeProject/cringeApiTwo2/answer', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({id:id1,answer:answer1})
                })
                .then((e)=>e.json())
                .then((data)=>{

                });
    }
    function page1(x){
        content.innerHTML='<h1>Выберите правильный ответ на вопрос</h1>'
    }
    test1()
</script>