<style>
    *{
        margin: 0;
    }
    .wrap{
        margin: 0 auto;
        width: 1200px;
    }
    h1{
        display: inline;
    }
    hr{
        margin: 20px 0;
    }
    .btn-basket{
        float: right;
        display: grid;
        align-items: center;
        justify-items: center;
        width: 100px;
        height: 100px;
        border: 1px solid black;
    }
    .block{
        display:grid;
        grid-template-columns: 4fr 1fr;
        gap: 10px;
    }
    .content{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 10px;
    }
    .item{
        display: grid;
        align-items: center;
        justify-items: center;
        border: 1px solid black;
        height: 200px;
    }
    .btn-basket-click{
        padding: 5px;
    }
    .basket{
        position: relative;
    }
    .dialog{
        width: 250px;
        position: absolute;
        top: 150px;
        left: 1250px;
    }
    .pull{
        display: none;
    }
</style>
<div class="wrap">
    <h1>Магазин</h1>
    <div class="btn-basket">
        Корзина
    </div>
    <div class="block">
        <div class="content">
           
        </div>
        <div class="basket">
            <dialog class="dialog">
                <h1>Корзина</h1>
                <div class="pull">
                    <hr>
                    <div class="dialog-content">

                    </div>
                    <hr>
                    <h1>
                        Всего: <span class="price"></span>р
                    </h1>
                    <hr>
                    <button>
                        Купить
                    </button>
                    <button class="btn-clear">
                        Очистить
                    </button>
                </div>
                <div class="clear">
                    Пусто
                </div>
                <button class="btn-close">
                    Закрыть
                </button>
            </dialog>
        </div>
    </div>
</div>
<script>
let dialog=document.querySelector('.dialog')
let btn_basket=document.querySelector('.btn-basket')
let btn_close=document.querySelector('.btn-close')
let content=document.querySelector('.content')
let dialog_content=document.querySelector('.dialog-content')
let price=document.querySelector('.price')
let btn_clear=document.querySelector('.btn-clear')
let basket=[]
let pull=document.querySelector('.pull')
let clear=document.querySelector('.clear')
btn_clear.addEventListener('click',()=>{
    basket=[]
    pull.style.display='none'
    clear.style.display='block'
})
btn_basket.addEventListener('click',()=>{   
        if(basket.length>0){
            dialog_content.innerHTML=''
            let sum_p=0
            basket.forEach((element)=>{
                fetch('http://localhost/cringeProject/cringeApiTwo2/basket/'+element['id'])
                .then((e)=>e.json())
                .then((data)=>{
                    dialog_content.innerHTML+='<p>'+data['product']['name']+': '+element['qty']+' - '+data['product']['price']+'p</p>'
                    sum_p+=data['product']['price']*element['qty']
                    price.innerHTML=sum_p
                });
            })
            pull.style.display='block'
            clear.style.display='none'
            dialog.showModal()
        }
        else{
            pull.style.display='none'
            clear.style.display='block'
            dialog.showModal()
        }
})
btn_close.addEventListener('click',()=>{
        dialog.close()
})
function product(){
    fetch('http://localhost/cringeProject/cringeApiTwo2/basket')
                .then((e)=>e.json())
                .then((data)=>{
                    data['product'].forEach(element=> {
                        content.innerHTML+='<div class="item"><p>'+element['name']+'</p><p>Цена: '+element['price']+
                            'р</p><button class="btn-basket-click" value="'+element['id']+'">В корзину</button><p>Остаток: '+element['qty']+'</p></div>'
                    });
                });
                setTimeout(click1, 200);
}
function click1(){
    let x=document.querySelectorAll('.btn-basket-click')
    x.forEach(element=>{
        element.addEventListener('click',(e)=>{
            let pr=false
            let ind=null
            basket.forEach((element,index) => {
                if(element['id']==e.target.value){
                    pr=true
                    ind=index
                }
            })
            if(pr){
                basket[ind]['qty']++
            }else{
                basket.push({id:e.target.value,qty:1})
            }
            console.log(basket); 
        })
    })
}
product()

</script>