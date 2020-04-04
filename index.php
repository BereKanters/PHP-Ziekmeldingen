<?php
session_start();

if(isset($_SESSION['login'])) {
    $gebruiker = $_SESSION['login'];
}else {header('Location: login.php');}

?>

    <body>
    <?php require 'header.php'; ?>
    </body>
    <body>
    <div class="links1">

    </body>
    </div>

<?php
require 'db.php';
$sql = 'SELECT * FROM form';
$statement = $connection->prepare($sql);
$statement->execute();
$planes = $statement->fetchAll(PDO::FETCH_OBJ);
?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Alle leerlingen</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Leerling</th>
                                <th>Klas</th>
                                <th>Begin Datum</th>
                                <th>Einde Datum</th>
                                <th>School</th>
                                <th>Status</th>
                            </tr>

                            <?php foreach($planes as $vliegtuigen): ?>
                                <tr>
                                    <td><?= $vliegtuigen->id; ?></td>
                                    <td><?= $vliegtuigen->leerling; ?></td>
                                    <td><?= $vliegtuigen->klas; ?></td>
                                    <td><?= $vliegtuigen->bdate; ?></td>
                                    <td><?= $vliegtuigen->edate; ?></td>
                                    <td><?= $vliegtuigen->school; ?></td>
                                    <td><?= $vliegtuigen->status; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $vliegtuigen->id ?>" class="btn btn-info">Edit</a>
                                        <a onclick="return confirm('Weet je zeker dat dit wilt verwijderen?')" href="delete.php?id=<?= $vliegtuigen->vid ?>" class='btn btn-danger'>Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

<?php
require 'db.php';
$sql = 'SELECT * FROM form WHERE status = "Ziek"';
$statement = $connection->prepare($sql);
$statement->execute();
$planes = $statement->fetchAll(PDO::FETCH_OBJ);
?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Alle Zieke leerlingen</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Leerling</th>
                        <th>Klas</th>
                        <th>Begin Datum</th>
                        <th>Einde Datum</th>
                        <th>School</th>
                        <th>Status</th>
                    </tr>
                    <?php foreach($planes as $vliegtuigen): ?>
                        <tr>
                            <td><?= $vliegtuigen->id; ?></td>
                            <td><?= $vliegtuigen->leerling; ?></td>
                            <td><?= $vliegtuigen->klas; ?></td>
                            <td><?= $vliegtuigen->bdate; ?></td>
                            <td><?= $vliegtuigen->edate; ?></td>
                            <td><?= $vliegtuigen->school; ?></td>
                            <td><?= $vliegtuigen->status; ?></td>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>