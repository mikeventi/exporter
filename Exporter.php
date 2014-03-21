<?php
ini_set('display_errors', 1);
require('Exporter.class.php');

$export = new Exporter();

$fields = array(
        'firstname',
        'lastname',
        'address',
        'city',
        'state',
        'zip',
        'workphone',
        'homephone',
        'mobilephone',
        'email',
        'driverlicense',
        'driverlicensestate');

$export->setFields($fields);
$export->setFilename('myfile' . time());

if ($exporter = $export->save()) {
    echo "Success";
    $export->downloadCSV();
} else {
    echo "nope";
}

?>
