<?php include ('connect/db.php'); ?>
<?php include ('connect/validation.php');  ?>

<?php

if(isset($_POST['number'])){
    global $id;
    $id=$_POST['number'];
    $name=sanitize_string($_POST['name']);
    $address=sanitize_string($_POST['address']);
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['add'])){
       if(required_input($name) && required_input($address)){ 
           if(minmum_input($name, 3) && max_input($name, 25)){ 
                if(max_input($address, 20) && minmum_input($address, 3)){
                   if(is_numeric($id)){ 
                        $query = "INSERT INTO student (id_student, name_student, address_stu)
                        VALUES($id, '$name', '$address')";

                        $sql=mysqli_query($conn, $query);
                        $succes.="ADDED SUCCESSFULLY";                    
                        redirect("index.php");

                        if(!$sql)
                            die("not found");

                   }else{
                      $Errors.="please_enter_id_numeric";
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
    
    }else{
        redirect("index.php");
    }
    
    if(isset($_POST['del']) && is_numeric($id)){

        $sel ="SELECT * FROM student where id_student = $id";
        $value = mysqli_query($conn, $sel);

       ///////////////////////////// delete ////////////
    
            if(mysqli_num_rows($value) > 0){
                $query = "DELETE FROM student where id_student = $id";
                $stmt = mysqli_query($conn, $query);
                $succes.="DELETED_SUCCESSFULLY";
                redirect("index.php");

            }else{
                $Errors.="Student Not found";
                redirect('index.php');
            }
    
        }

        ////////////////////// delete aLL ////////////////

        if(isset($_POST["delete"])){
            $query = "DELETE FROM student";
            $stmt = mysqli_query($conn, $query);
            $succes.="DELETED_SUCCESSFULLY";
            redirect("index.php");
        }
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    
    <link rel="stylesheet" href="css/style.css">
    <title>Management Student</title>
</head>
<body>
    <div id="cont">
        <div id="div">
         <aside>   
           <form action="" method="post"> 
                <img src="img/Logo.jpg" alt="Logo" width="150px">
         
        
               <h3>Control Panel</h3> 
               
                <label for="id">Number Student</label><br>
                <input type="text" name="number" id="id" placeholder="Enter Number Student"><br>
              
                <label for="name">Name Student</label><br>
                <input type="text" name="name" id="name" placeholder="Enter Name Student"><br>
                
                <label for="address">Address Student</label><br>
                <input type="text" name="address" id="address" placeholder="Enter Address Student"><br>

                <button name="add">Add Student</button><br>
                <button name="del">Delet Student</button>
                <button name="delete">Delet ALL Student</button>
                <button name="updat">Update Student</button>
            </form>
          </aside>  
        </div>

        <main>
            <table id="tbl">
              <thead>  
                    <tr>
                        <td>Id Student</td>
                        <td>Name Student</td>
                        <td>Address Student</td>
                    </tr>
               </thead> 

               <tbody>
                <?php   
                        $stmt = "SELECT * FROM student";
                        $result =mysqli_query($conn,$stmt);
                
                ?>
                <?php if(mysqli_num_rows($result) > 0): ?> 
                    <?php while($rows = mysqli_fetch_assoc($result)): ?> 
                        <tr>
                            <td> <?php echo $rows['id_student'];  ?> </td>
                            <td> <?php echo $rows['name_student'];  ?> </td>
                            <td> <?php echo $rows['address_stu'];  ?> </td>
                        </tr>
                    <?php endwhile; ?>    
                <?php endif; ?>
               </tbody>
            </table>
        </main>
    </div>
    
</body>
</html>

<?php if($Errors): ?>
    <h5 class="alert alert-success text-center"> <?php echo $Errors; ?> </h5>
<?php  endif; ?>

<?php if($succes): ?>
    <h5 class="alert alert-success text-center"> <?php echo $succes; ?> </h5>
<?php  endif; ?>