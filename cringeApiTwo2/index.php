<?php

$path= $_SERVER['REQUEST_URI'];
$command=explode('/',$path);
match ($command[3]) {
    '' => 'main',
    'user'=> user(),
    'userLast'=> userLast(),
    'table'=> table(),
    'sum'=> sum(),
    'commentLast'=> commentLast(),
    'categories'=> categories(),
    'addMoney'=> addMoney(),
    'addPurchase'=> addPurchase(),
    'search'=> search(),
    'balance'=> balance(),
    'test'=> test(),
    default => '404',
};
function test(){
    include 'database/db.php';
    header('Content-Type: application/json');
    http_response_code(200);
    $result2=$db->query("select price from products");
    $arr=$result2->fetchAll(PDO::FETCH_ASSOC);
    $spent=0;
    foreach ($arr as $key => $value) {        
        $spent+=$value['price'];
    }
    var_dump($spent);
};
function table(){
    include 'database/db.php';
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    http_response_code(200); 
    $data = json_decode(file_get_contents('php://input'), true);
    $name=$data['name'];
    $sort=$data['sort'];
    if($name=='all'){
        $result=$db->query("select *,(goal+pass) as point from user limit 10");
    }else{
        $result=$db->query("select *,(goal+pass) as point from user order by $name $sort limit 10");
    }
    $table=$result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['table'=>$table,'name'=>$name,'sort'=>$sort,]);
};
function commentLast(){
    include 'database/db.php';
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    http_response_code(200);
    $result=$db->query("select * from comment order by time desc limit 1");
    $comment=$result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['comment'=>$comment]);
};
function userLast(){
    include 'database/db.php';
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    http_response_code(200);
    $result=$db->query("select * from user order by id desc limit 1");
    $user=$result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['user'=>$user]);
};
function sum(){
    include 'database/db.php';
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    http_response_code(200);
    $result=$db->query("select sum(balance) as balance from user");
    $user=$result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['user'=>$user]);
};
function user(){
    include 'database/db.php';
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    http_response_code(200);
    $result=$db->query("select * from user");
    $user=$result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['user'=>$user]);
};
function balance(){
    include 'database/db.php';
    header('Content-Type: application/json');
    http_response_code(200);
    $result1=$db->query("select balance from user");
    $balance=$result1->fetchAll(PDO::FETCH_ASSOC)[0]['balance'];
    $result2=$db->query("select price from products");
    $arr=$result2->fetchAll(PDO::FETCH_ASSOC);
    $spent=0;
    foreach ($arr as $key => $value) {        
        $spent+=$value['price'];
    }
    echo json_encode(['balance'=>$balance,'spent'=>$spent]);
};
function addMoney(){
    include 'database/db.php';
    header('Content-Type: application/json');
    http_response_code(200);
    $money=explode('/', $_SERVER['REQUEST_URI'])[4];
    $db->query("update user set balance=balance+'$money' where id=1");
    echo json_encode(['status'=>'Деньги добавлены']);
};
function addPurchase(){
    include 'database/db.php';
    header('Content-Type: application/json');
    http_response_code(200);
    $name=$_REQUEST['name'];
    $categories=$_REQUEST['categories'];
    $price=$_REQUEST['price'];
    $result=$db->query("select balance from user");
    $balance=$result->fetchAll(PDO::FETCH_ASSOC)[0]['balance'];
    if($balance<$price){
        echo json_encode(['status'=>'Не хватает денег на балансе']);
    }else{
        $db->query("update user set balance=balance-'$price'");
        $db->query("insert into products (name,price,category_id) values('$name','$price','$categories')");
        echo json_encode(['status'=>'Товар добавлен']);
    }
    
};
function categories(){
    include 'database/db.php';
    header('Content-Type: application/json');
    http_response_code(200);
    $result=$db->query("select * from categories");
    $categories=$result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['categories'=>$categories]);
};
function search(){
    include 'database/db.php';
    header('Content-Type: application/json');
    http_response_code(200);
    $filter=explode('/', $_SERVER['REQUEST_URI']);
    if(!empty($filter[4])){
        $result=$db->query("select p.name as name,p.price as price,c.name as category from products as p join categories as c on p.category_id=c.id where category_id='$filter[4]'");
        $products=$result->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $result=$db->query("select p.name as name,p.price as price,c.name as category from products as p join categories as c on p.category_id=c.id");
        $products=$result->fetchAll(PDO::FETCH_ASSOC);
    }
    echo json_encode(['products'=>$products]);
};
