<?php
$path= $_SERVER['REQUEST_URI'];
$command=explode('/',$path);
if($command[3]=='hello'){
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode(['message'=>'hello i api']);
}
else if($command[3]=='get_user'){
    header('Content-Type: application/json');
    http_response_code(200);
    $login=$command[4];
    $password=$command[5];
    $db=new PDO('mysql:host=localhost;dbname=cringne_api;port=3307','root','root');
    $result=$db->query("select * from users where login='$login' and password='$password'");
    $user=$result->fetchAll(PDO::FETCH_ASSOC)[0];
    echo json_encode(['id'=>$user['id'],'login'=>$user['login'],'password'=>$user['password']]);
}
else if($command[3]=='get_number'){
    header('Content-Type: application/json');
    http_response_code(200);
    $random=rand(1,100);
    echo json_encode(['message'=>$random]);
}
else if($command[3]=='sum'){
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode(['message'=>$command[4]+$command[5]]);
}
else if($command[3]=='get_temp'){
    header('Content-Type: application/json');
    http_response_code(200);
    $date=$command[4];
    $db=new PDO('mysql:host=localhost;dbname=cringne_api;port=3307','root','root');
    $result=$db->query("select * from temps where date='$date'");
    $temp=$result->fetchAll(PDO::FETCH_ASSOC)[0];
    echo json_encode(['temp'=>$temp['temp']]);
}
else if($command[3]=='triangle'){
    header('Content-Type: application/json');
    http_response_code(200);
    if($command[4]==$command[5] && $command[4]==$command[6]){
        $type='равносторонний';
    }
    elseif($command[4]==$command[5] || $command[4]==$command[6]|| $command[5]==$command[6]){
        $type='равнобедренный';
    }
    else{
        $type='разносторонний';
    }
    echo json_encode(['type'=>$type]);
}
else{
    header('Content-Type: application/json');
    http_response_code(404);
    echo json_encode(['message'=>'Error']);
}
?>