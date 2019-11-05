<?php
require_once 'header.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit workout information</title>
</head>
<body>
<?php
if(!empty($_GET['id'])){
    //connect to sql database
    connnetDb();

try{
    $id=intval($_GET['id']);
    $result=$pdo->query("SELECT * FROM workout WHERE id=$id");
}catch (PDOException $e){
    die( $e->getMessage() );
}


    //To obtain the result array
    $result_arr=$result->fetch(PDO::FETCH_ASSOC);
}else{
    die('id not define');
}
?>
<form action="editworkout_server.php" method="post">
    <label>ID：</label><input type="text" name="id" value="<?php echo $result_arr['id']?>">
    <label>Name：</label><input type="text" name="name" value="<?php echo $result_arr['name']?>">
    <label>Calorielist：</label><input type="text" name="age" value="<?php echo $result_arr['calorielist']?>">
    <input type="submit" value="Submit">
</form>
</body>
</html>