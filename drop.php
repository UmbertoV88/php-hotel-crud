<?php

include 'function.php';

if(!empty($_POST['stanza_id'])) {
    $id_stanza = $_POST['stanza_id'];
    $sql = "DELETE FROM stanze WHERE id = $id_stanza";
    $result = esegui_query($sql);
} else {
    $result = false;
}
if($result) {
    $get_message = '?success=true';
}else{
    $get_message = '?success=false';
};
header('Location: index.php' . $get_message);
?>
