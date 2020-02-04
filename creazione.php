<?php

include 'layout/head.php';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1> Crea una nuova stanza  </h1>

        </div>
        <div class="col-sm-6 text-right">
            <a id="botton-right" class="btn btn-success" href="index.php"> Torna alla Home page </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="insert.php">
              <div class="form-group">
                <label for="numero_stanza"> Numero Stanza </label>
                <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="Numero stanza">
              </div>
              <div class="form-group">
                  <label for="piano"> Piano </label>
                  <input name="piano" type="text" class="form-control" id="piano" placeholder="Piano">
              </div>
              <div class="form-group">
                  <label for="letti"> Numero Letti </label>
                  <input name="numero_letti" type="text" class="form-control" id="letti" placeholder="Numero Letti">
              </div>
              <button type="submit" class="btn btn-primary"> Crea Stanza </button>
            </form>
        </div>
    </div>
</div>
