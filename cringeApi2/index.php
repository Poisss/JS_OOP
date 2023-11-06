<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Api 2</title>
    </head>
    <body>
        <?php
        $path= $_SERVER['REQUEST_URI'];
        $command=explode('/',$path);
        match ($command[3]) {
            '' => include 'layouts/main.php',
            'user' => include 'layouts/user.html',
            'balance' => include 'layouts/balance.php',
            'add_money' => include 'layouts/add_money.php',
            'add_purchase' => include 'layouts/add_purchase.php',
            'search' => include 'layouts/search.php',
            default => include 'layouts/error.php',
        };
        ?>
    </body>
</html>