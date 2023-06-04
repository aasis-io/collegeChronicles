<?php

$categoryName = $_POST['categoryName'];

$conn = mysqli_connect('localhost', 'root', '', 'my_news');
$sql = "select * from category where name='$categoryName' limit 1";

$var = $conn->query($sql);

if($var->num_rows > 0){
    echo "Already taken.";
}else{
    echo "success";
}

?>