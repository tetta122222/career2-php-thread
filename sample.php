<?php

$dsn = 'mysql:dbname=school;host=localhost';
$user = 'root';
$password = 'password';

try{
    $dbh = new PDO($dsn, $user, $password);

    $sql = 'select * from thread';
    foreach ($dbh->query($sql) as $row) {
        // echo $row['name'].'さんは'.$row['club'].'所属です。<br />';
        echo '<p>'.$row['name'].'</p>';
        echo '<p>'.$row['content'].'</p>';
        echo '<p>'.$row['create_at'].'</p>';
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

