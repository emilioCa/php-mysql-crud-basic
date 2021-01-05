<?php
function showNotification($message, $type){
    $_SESSION['message'] = $message;
    $_SESSION['message_type'] = $type;
}
?>