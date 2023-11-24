<h1>PokeDex</h1>
<input type="text" class="input">
<button class="btn">
    Показать
</button>
<br>
<div class="div">
</div>
<a href="http://localhost/cringeProject/cringeApi2/">Вернуться на главную</a>
<script>
    let input=document.querySelector('.input')
    let btn=document.querySelector('.btn')
    let div=document.querySelector('.div')
    let pokemon=[]
    let pokemon_stats=[]
    let pokemon_battle_stats=[]
    let pokemon_images=[]
    function click1(x){
                fetch('https://pokeapi.co/api/v2/pokemon/'+x)
                .then((e)=>e.json())
                .then((data)=>{
                    pokemon=[]
                    pokemon_stats=[]
                    pokemon.push(x) 
                    pokemon.push(data['name'])   
                    data['types'].forEach(element => {
                        pokemon.push(element['type']['name']);
                    });
                    click2(data['species']['url'])
                    pokemon_stats.push(data['height']) 
                    pokemon_stats.push(data['weight']) 
                    data['stats'].forEach(element => {
                        pokemon_battle_stats.push(element['base_stat']);
                    });
                    pokemon_images.push(data['sprites']['back_default'])
                    pokemon_images.push(data['sprites']['back_shiny']) 
                    pokemon_images.push(data['sprites']['front_default']) 
                    pokemon_images.push(data['sprites']['front_shiny'])   
                    console.log(pokemon_battle_stats);
                });
                setTimeout(click3, 200);
     }
     function click2(x){
                fetch(x)
                .then((e)=>e.json())
                .then((data)=>{
                    pokemon.push(data['color']['name'])
                });
     }
     function click3(){
        div.innerHTML=''
        div.innerHTML+='<h1>Pokemon '+pokemon[0]+' - '+pokemon[4]+' '+pokemon[1]+' ('+pokemon[2]+' + '+pokemon[3]+
        ')</h1><hr><h1>Stats</h1><h2>height: '+pokemon_stats[0]+'</h2><h2>weight: '+pokemon_stats[1]+'</h2><hr><h1>Battle Stats</h1><h2>hp: '+
        pokemon_battle_stats[0]+'</h2><h2>attack: '+pokemon_battle_stats[1]+'</h2><h2>defense: '+pokemon_battle_stats[2]+
            '</h2><h2>special-attack: '+pokemon_battle_stats[3]+'</h2><h2>special-defense: '+pokemon_battle_stats[4]+
            '</h2><h2>speed: '+pokemon_battle_stats[5]+'<hr><h1>Imageg</h1>'    
        pokemon_images.forEach(element => {
            div.innerHTML+='<img src="'+element+'">'
        })        
     }
     btn.addEventListener('click',()=>{
        click1(input.value);
    })
</script>