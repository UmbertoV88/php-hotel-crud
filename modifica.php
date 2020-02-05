<?php
include 'function.php';
$sql = "SELECT * FROM stanze WHERE id = " . $_GET['stanza_id'];
$result = esegui_query($sql);

include 'layout/head.php';


?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1> Modifica stanza  </h1>
        </div>
        <div class="col-sm-6 text-right">
            <a id="botton-right" class="btn btn-success" href="index.php"> Torna alla Home page </a>
        </div>
    </div>



    <div class="row">
        <div class="col-sm-12">

            <?php
            if ($result && $result->num_rows > 0) {

                if(!empty($_GET['success'])) {
                    if($_GET['success'] == 'true'){?>
                        <div class="alert alert-success" role="alert">
                          Stanza modifica con successo!
                        </div>
                        <?php
                    }else{?>
                        <div class="alert alert-danger" role="alert">
                          Si è verificato un errore!
                        </div>
                    <?php
                    }
                }

                 // output data of each row
                $row = $result->fetch_assoc()?>

                <form method="post" action="update.php">
                    <input type="hidden" name="stanza_id" value="<?php echo $row['id'] ?>">
                  <div class="form-group">
                    <label for="numero_stanza"> Numero Stanza </label>
                    <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="Numero stanza" required value="<?php echo $row['room_number'] ?>">
                  </div>
                  <div class="form-group">
                      <label for="piano"> Piano </label>
                      <input name="piano" type="text" class="form-control" id="piano" placeholder="Piano" required value="<?php echo $row['floor'] ?>" >
                  </div>
                  <div class="form-group">
                      <label for="letti"> Numero Letti </label>
                      <input name="numero_letti" type="text" class="form-control" id="letti" placeholder="Numero Letti" required value="<?php echo $row['beds'] ?>">
                  </div>
                  <button type="submit" class="btn btn-primary"> Modifica Stanza </button>
                </form>

               <?php
            } elseif ($result) { ?>
                <p> Stanza inesistente </p>
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
