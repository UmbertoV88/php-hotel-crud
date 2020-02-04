<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db-hotel";

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
echo ("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connection ok " ;

    $sql = "SELECT room_number, floor FROM stanze";
    $result = $conn->query($sql);


    $conn->close();
}
?>


<!DOCTYPE html>
 <html lang="it" dir="ltr">
     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!--  FONTAWESOME -->
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
         <!--  GOOGLE FONTS -->
         <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
         <!--  FOGLIO CSS -->
         <link rel="stylesheet" href="style.css">
         <!-- BOOTSTRAP -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <title> PHP Hotel CRUD</title>
     </head>
     <body>
         <div class="container">
             <div class="row">
                 <div class="col-sm-6">
                     <h1> Tutte le stanze dell'hotel </h1>

                 </div>
                 <div class="col-sm-6 text-right">
                     <a id="crea_stanza" class="btn btn-success" href="#"> Crea una nuova stanza </a>
                 </div>
             </div>

             <div class="row">
                 <div class="col-sm-12">

                     <div class="table-responsive">
                       <table class="table">
                         <thead>
                             <th> Room Number</th>
                             <th> Floor </th>
                             <th> Actions </th>
                         </thead>
                         <tbody>
                             <?php
                             if ($result && $result->num_rows > 0) {

                                  // output data of each row
                                 while($row = $result->fetch_assoc()) { ?>
                                     <tr>
                                         <td> <?php echo $row['room_number'] ?> </td>
                                         <td> <?php echo $row['floor'] ?> </td>
                                         <td>
                                             <a class="btn btn-info" href="#"> Visualizza </a>
                                             <a class="btn btn-warning" href="#"> Modifica </a>
                                             <a class="btn btn-danger" href="#"> Cancella </a>
                                         </td>
                                     </tr>
                                     <?php
                                 }
                             } elseif ($result) { ?>
                                 <tr>
                                     <td colspan="3"> Non ci sono risultati </td>
                                 </tr>
                                 <?php
                             } else {
                                 ?>
                                 <tr>
                                     <td colspan="3"> Si è verificato un errore </td>
                                 </tr>
                                 <?php
                                 echo "query error";
                             }
                             ?>
                         </tbody>
                       </table>
                     </div>


                 </div>
             </div>
         </div>
     </body>
 </html>
