<?php

include 'function.php';

if(
    !empty($_POST) && !empty($_POST['stanza_id']) &&
    controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['numero_letti']))
) {
    // recuperare i dati della stanza da salvare
    $numero_stanza = intval($_POST['numero_stanza']);
    $piano = intval($_POST['piano']);
    $letti = intval($_POST['numero_letti']);
    $id_stanza = $_POST['stanza_id'];
    // salvare la stanza nel db
    $sql = "UPDATE stanze SET room_number = $numero_stanza,floor = $piano, beds = $letti,updated_at = NOW() WHERE id = $id_stanza";
    $result = esegui_query($sql);

} else {
    $result = false;
};

if($result) {
    $get_message = '?success=true&stanza_id=' . $id_stanza;
}else{
    $get_message = '?success=false&stanza_id=' . $id_stanza;
};
// visualizza la pagina di conferma di prenotazione tramite un redirect ad altra pagina
header('Location: modifica.php' . $get_message);
