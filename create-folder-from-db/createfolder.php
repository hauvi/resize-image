<?php
// include_once("../include/session.php");
define("PG_DB"  , "sinhthaitayninh");
define("PG_HOST", "localhost");
define("PG_USER", "postgres");
define("PG_PORT", "5432");
define("PG_PASS","postgres");
$dbcon = pg_connect("dbname=" . PG_DB . " user=" . PG_USER . " password=" . PG_PASS . " host=" . PG_HOST);
$sql = "select distinct fullname as name from data.loai_v2 where kingdom ='Animalia' order by fullname";
$thucthi = pg_query($dbcon, $sql);
while ($kq = pg_fetch_assoc($thucthi)) {
    $path = 'animalia/';
    $folderName = trim($kq['name'],'.');
    $path_folder = $path . $folderName;
    if( !file_exists($path_folder) ) {
       if( !mkdir($path_folder, 0755, true)){
        echo $path_folder.' >> cant create';
        echo '<br>';
       }else{
        echo $path_folder.' >> created';
        echo '<br>';
       }
    } else {
        echo $path_folder.' >> exist';
        echo '<br>';
    }
    // echo $path_folder;
    // echo '<br>';
}
