<h1>Автор</h1>
<select name="" id="" class="author">
    <option value="" disabled selected>Выберите автора</option>
</select>
<h1>Книги</h1>
<select name="" id="" class="book">
    <option value="" disabled selected>Выберите автора</option>
</select>
<h1>Цена: <span class="price"></span></h1>
<script>
let author=document.querySelector('.author')
let book=document.querySelector('.book')
let price=document.querySelector('.price')
function author1(){
    fetch('http://localhost/cringeProject/cringeApiTwo2/author')
                .then((e)=>e.json())
                .then((data)=>{
                    data['author'].forEach(element => {
                        author.innerHTML+='<option value="'+element['id']+'">'+element['name']+'</option>';
                    });
                });
}
function book1(x){
    fetch('http://localhost/cringeProject/cringeApiTwo2/book/'+x)
                .then((e)=>e.json())
                .then((data)=>{
                    book.innerHTML='<option value="" disabled selected>Выберите автора</option>'
                    data['book'].forEach(element => {
                        book.innerHTML+='<option value="'+element['price']+'">'+element['name']+'</option>';
                    });
                });
}
author1()
author.addEventListener('change', () => {
    book1(author.value);
    price.innerHTML=''
});
book.addEventListener('change', () => {
    price.innerHTML=book.value;
    
});
</script>
<a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>