<?php
require_once "db.php";
$q = $db->prepare("SELECT * FROM `act` WHERE `device_id`=:device_id");
$q->execute([
    "device_id" => $_SESSION['device_id']
]);
$r = $q->fetch();
echo '{"balance": {"amount": "'.$r['balance'].',00 eCoin","currency": "UNK","raw_value": "'.$r['balance'].'"}}';