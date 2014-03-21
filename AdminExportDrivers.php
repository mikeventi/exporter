<?php
require('Exporter.class.php');

$exporter = new Exporter();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Exporter</title>
    <link rel="stylesheet" href="Exporter.css" type="text/css" media="screen" charset="utf-8" />
    <script src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.4/mootools-yui-compressed.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

<h1>Export Drivers</h1>



<h2>Data Fields</h2>
<label for="all-fields">Include All Fields</label>
<input type="checkbox" id="all-fields" name="all-fields" />
<div id="field-lists">
    <ul id="available_fields">
    <?php foreach ($exporter->getAvailableFields() as $v): ?>
        <li><input type="checkbox" /><p><?php echo $v; ?></p></li>
    <?php endforeach; ?>
    </ul>
    <ul id="use_fields">
    </ul>
</div>
<div class="clear"></div>
<h2>Options</h2>
<label for="limit">Limit</label>
<select name="limit" id="limit" size="1">
    <option value="0">All</option>
    <option value="25">25</option>
    <option value="50">50</option>
    <option value="75">75</option>
</select>
<br />
<label for="filter">Filter</label>
<select name="filter" id="filter" size="1">
    <option value="all">Active - All Clubs</option>
    <option value="all">Active - Glen Cove, NY</option>
    <option value="all">Active - Chester, NJ</option>
</select>

<h2>File Structure</h2>
<label class="title medium"></label>
    <div class="inputContainer"><label class="input medium "><input style="width:250px" maxlength="40" name="filename" value="" type="text"/></label></div>



Button

<script src="Exporter.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>