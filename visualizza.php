<!-- Pagina dettaglio stanza -->
<?php
// connessione al DB
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

    // recupero i dettagli della singola stanza
    $sql = "SELECT * FROM stanze WHERE id = " . $_GET['stanza_id'];
    $result = $conn->query($sql);

    // chiudo la connessione
    $conn->close();
}
// visualizz i dettagli della stanza


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
                 <div class="col-sm-12">
                     <h1> Dettaglio stanza </h1>
                 </div>
             </div>

             <div class="row">
                 <div class="col-sm-12">

                     <?php
                     if ($result && $result->num_rows > 0) {

                          // output data of each row
                         $row = $result->fetch_assoc()?>
                         <div class="card" style="width: 18rem;">
                           <div class="card-body">
                                 <h5 class="card-title">Dettagli stanza <?php echo $row['id']?></h5>
                                 <ul class="room_list">
                                     <li> Numero stanza : <?php echo $row['room_number']?></li>
                                     <li> Piano : <?php echo $row['floor']?></li>
                                     <li> Numero letti : <?php echo $row['beds']?></li>
                                     <li> Data creazione : <br> <?php echo $row['created_at']?></li>
                                     <li> Data aggiornamento  : <br> <?php echo $row['updated_at']?></li>
                                 </ul>
                                 <a id="botton-right" class="btn btn-success" href="index.php"> Torna alla Home page </a>
                           </div>
                         </div>
                        <?php
                     } elseif ($result) { ?>
                         <p> Non ci sono risultati </p>
                         <?php
                     } else {
                         ?>
                         <p> Si è verificato un errore </p>
                         <?php
                     }
                     ?>

                 </div>
             </div>
         </div>
     </body>
 </html>
