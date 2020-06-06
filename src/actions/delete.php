<?php
require_once '../../index.php';


$id = $_GET['id'];
echo $id;

$db->Delete($id);
/* Execute query, if it's completed, output that record is deleted else the error. */
