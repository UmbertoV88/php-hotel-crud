<?php

include 'function.php';
$sql = "SELECT id, room_number, floor FROM stanze";
$result = esegui_query($sql);

include 'layout/head.php';

?>
         <div class="container">
             <div class="row">
                 <div class="col-sm-6">
                     <h1> Tutte le stanze dell'hotel </h1>

                 </div>
                 <div class="col-sm-6 text-right">
                     <a id="botton-right" class="btn btn-success" href="creazione.php"> Crea una nuova stanza </a>
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
                                             <a class="btn btn-info" href="visualizza.php?stanza_id=<?php echo $row['id'] ?>"> Visualizza </a>
                                             <a class="btn btn-warning" href="modifica.php?stanza_id=<?php echo $row['id'] ?>"> Modifica </a>
                                             <a class="btn btn-danger" href="cancellazione.php"> Cancella </a>
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
