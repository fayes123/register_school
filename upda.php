<?php include ('connect/db.php') ?>
<?php include ('connect/validation.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    
    <title>Document</title>
</head>
<body>
<?php



if($_SERVER['REQUEST_METHOD'] === "POST"){    
    if(isset($_POST['updat'])){
        $id =$_POST['id'];

        $name = sanitize_string($_POST['name']);
        $address = sanitize_string($_POST['address']);

        if(required_input($name) && required_input($address)){ 
            if(minmum_input($name, 3) && max_input($name, 25)){ 
                 if(max_input($address, 20) && minmum_input($address, 3)){

                        $query = "UPDATE student SET name_student ='$name', address_stu ='$address'
                        WHERE id_student=$id";
 
                         $sql=mysqli_query($conn, $query);
 
                         if(!$sql)
                            $Errors.="Not Found";
                         else{
                            $succes.="UPDATED SUCCESSFULLY";                    
                            redirect("index.php");
                         }   
 
                 }else{
                     $Errors.="address max 20 And minLenght 3";
                     redirect("index.php");
                 }
 
            }else{
                 $Errors.="name max 25 And minmum lenght 3";
                 redirect("index.php");
            }
 
        }else{
             $Errors.="fieldsrequired";
             redirect("index.php");
        }
    }
}else{
    header('locatiom:index.ph');
}
    ?>
</body>
</html>


<?php if($Errors): ?>
    <h5 class="alert alert-success text-center"> <?php echo $Errors; ?> </h5>
<?php  endif; ?>

<?php if($succes): ?>
    <h5 class="alert alert-success text-center"> <?php echo $succes; ?> </h5>
<?php  endif; ?>