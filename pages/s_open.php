<?php
require_once "db.php";
$q = $db->prepare("SELECT * FROM `act` WHERE `id`=:id");
$q->execute([
    "id" => $_POST['device_account']
]);
$r = $q->fetch();
if(!$r){
    echo "no account was found";
    exit;
}
$_SESSION['device_id'] = $r['device_id'];
echo '{"session_config":{"pid":'.$r['id'].',"account_id":"'.$r['id'].'", "country":"FR","saved_lang":"fr","shop_account_initialized":false,"device_link_updated":false,"owned_titles_modified":1644863224000,"shared_titles_last_modified":1644863224000,"age":21,"server_time":1651414832241,"devices":{"device":[{"name":"CTR","initial_device_account_id":"452531609","npns_ready":true,"id":4}]},"parental_controls":{"parental_control":[{"device":"CTR","type":"game_rating_age","value":0},{"device":"CTR","type":"game_rating_lock","value":0},{"device":"CTR","type":"shopping","value":0}]},"auto_billing_contracted":false,"id":"'.$r['device_id'].'"}}';