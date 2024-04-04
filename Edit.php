<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
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
<body>
<div id="cont">
        <div id="div">
         <aside>   
           <form action="update.php" method="post"> 
                <img src="img/Logo.jpg" alt="Logo" width="150px">
         
        
               <h3>Control Panel</h3> 
               
                <label for="id">Number Student</label><br>
                <input type="text" name="number" id="id" placeholder="Enter Id for Update Info"><br>
              
                <button name="add">Update Student</button>
            </form>
          </aside>  
        </div>    

</body>
</html>