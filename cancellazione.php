<!-- Pagina di cancellazione della stanza  -->
<?php

include 'function.php';

$sql = "SELECT * FROM stanze WHERE id = " . $_GET['stanza_id'];
$result = esegui_query($sql);

include 'layout/head.php';

?>

<div class="container main">
    <div class="row">
        <div class="col-sm-12">
            <h1> Cancellazione stanza </h1>
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
                  </div>
                </div>

                <p> Confermi la cancellazione?</p>
                <form  action="drop.php" method="post">
                    <input type="hidden" name="stanza_id" value="<?php echo $row['id'] ?>">
                    <input type="submit" class="btn btn-success" value="Si,confermo">
                    <a class="btn btn-danger" href="index.php">NO</a>

                </form>
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
<?php include 'layout/footer.php'?>;
