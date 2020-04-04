<?php
require 'db.php';
$message = '';
if(isset($_POST['Toevoegen'])) {

    $leerling = $_POST['leerling'];
    $type = $_POST['type'];
    $bdate = $_POST['bdate'];
    $edate = $_POST['edate'];
    $school = $_POST['school'];
    $status = $_POST['status'];


    $query = "INSERT INTO form (leerling, klas, bdate, edate, school, status)".
        "VALUES ('$leerling', '$type', '$bdate', '$edate', '$school', '$status')";

    $stm = $connection->prepare($query);
    if($stm->execute()){
        echo "Uw informatie is toegevoegd";
    } else {
        echo "Iets is fout gegaan!";
    }
}
?>



<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Voeg leerling toe</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?= $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="name">leerling</label>
                        <input type="text" name="leerling" id="leerling" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Klas</label>
                        <input type="text" name="klas" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Begin Datum</label>
                        <input type="text" name="bdate" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Eind Datum</label>
                        <input type="text" name="edate" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">School</label>
                        <input type="text" name="school" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Status</label>
                        <input type="text" name="status" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="Toevoegen" class="btn btn-info">Voeg vliegtuig toe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
