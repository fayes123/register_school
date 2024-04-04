<?php include ('connect/db.php') ?>
<?php include ('connect/validation.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    
    <title>Update Student</title>
<style>
    body{
        background-color: whitesmoke;
    }

    input{
        padding: 4px;
        border: 2px solid black;
        text-align: center;
        font-size: 17px;
    }

    aside{
        text-align: center;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 0;
        border: 1px solid black;
        padding: 10px;
        font-size: 20px;
        background-color: silver;
        color: blue;
   }

    
    aside button{
        width: 190px;
        padding: 8px;
        margin-top: 8px;
        font-size: 20px;
        font-weight: bold;
    }


</style>

</head>
<body>
<?php

if(isset($_POST['add'])){ 
    $id =$_POST['number'];    

    if(is_numeric($id)){ 
        $query ="SELECT * FROM student WHERE id_student = $id";

        $sql=mysqli_query($conn, $query);

    }
    
    if(!$sql){
        header("location:index.php");
    }

    if(mysqli_num_rows($sql) <= 0){
        $Errors.="Not Found Sudent";
        redirect("index.php");
    }


}
                    
?>


<aside>
    <form action="upda.php" method="post"> 
        <img src="img/Logo.jpg" alt="Logo" width="150px">    
        <h3>Control Panel</h3> 
        
        <?php if(mysqli_num_rows($sql) > 0): ?>
          <?php $row = mysqli_fetch_assoc($sql)?>
                
                <input type="hidden" value="<?php echo $row['id_student']; ?>" name="id">

                <label for="name">Name Student</label><br>
                <input type="text" name="name" value="<?php echo $row['name_student']; ?>" id="name" placeholder="Enter Name Student"><br>
                
                <label for="address">Address Student</label><br>
                <input type="text" name="address" value="<?php echo $row["address_stu"]; ?>" id="address" placeholder="Enter Address Student"><br>
        
        <?php endif; ?>
            
                <button name="updat">Update Student</button><br>
            </form>
          </aside>  
        </div>

    
</body>
</html>


<?php if($Errors): ?>
    <h5 class="alert alert-success text-center"> <?php echo $Errors; ?> </h5>
<?php  endif; ?>

<?php if($succes): ?>
    <h5 class="alert alert-success text-center"> <?php echo $succes; ?> </h5>
<?php  endif; ?>