<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM form WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$vliegtuig = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['leerling'])  && isset($_POST['klas']) && isset($_POST['bdate']) && isset($_POST['edate']) && isset($_POST['school']) && isset($_POST['status'] ) ) {
    $leerling = $_POST['leerling'];
    $klas = $_POST['klas'];
    $bdate = $_POST['bdate'];
    $edate = $_POST['edate'];
    $school = $_POST['school'];
    $status = $_POST['status'];

    $sql = 'UPDATE form SET leerling=:leerling, klas=:klas, bdate=:bdate, edate=:edate, school=:school, status=:status WHERE id=:id';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':leerling' => $leerling, ':klas' => $klas, ':bdate' => $bdate, ':edate' => $edate, ':school' => $school,  ':status' => $status, ':id' => $id])) {
        header("Location: index.php");
    }



}


?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update vluchten</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?= $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Leerling</label>
                        <input value="<?= $vliegtuig->leerling; ?>" type="text" name="leerling" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Klas</label>
                        <input type="text" value="<?= $vliegtuig->klas; ?>" name="klas" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Begin Datum</label>
                        <input type="text" value="<?= $vliegtuig->bdate; ?>" name="bdate" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Eind Datum</label>
                        <input type="text" value="<?= $vliegtuig->edate; ?>" name="edate" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">School</label>
                        <input type="text" value="<?= $vliegtuig->school; ?>" name="school" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Status</label>
                        <input type="text" value="<?= $vliegtuig->status; ?>" name="status" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update Vlucht</button>
                    </div>
                </form>
            </div>
        </div>
    </div>