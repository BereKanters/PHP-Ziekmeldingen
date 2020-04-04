<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM vluchten WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
    header("Location: index.php");
}
?>

<?php
require 'db.php';
$vid = $_GET['vid'];
$sql = 'DELETE FROM vliegtuigen WHERE vid=:vid';
$statement = $connection->prepare($sql);
if ($statement->execute([':vid' => $vid])) {
    header("Location: index.php");
}
