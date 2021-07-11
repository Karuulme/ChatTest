<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <div class="row">
            <h3>Kayıt Alanı</h3>
            <form action="operation.php" method="POST">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Ad">
                </div>
                <div class="mb-3">
                    <input type="mail" name="mail" class="form-control" placeholder="Mail">
                </div>
                <div class="mb-3">
                    <input type="number" min="0" max="10" name="number" class="form-control" placeholder="Numara">
                </div>
                <button type="submit" name="kayit" class="btn btn-primary">Kayıt Ettir</button>
            </form>
        </div>
        <hr>
        <div class="row">
            <h3>Kullanıcılar Alanı</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ad</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Numara</th>
                        <th scope="col">Düzenle</th>
                        <th scope="col">Sil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('firebase_connection.php');
                    $ref_table = "UserList";
                    $fetchdata = $database->getReference($ref_table)->getValue();
                    print("Toplam Kayıt : ".array_push($fetchdata));
                    if ($fetchdata > 0) {
                        $i = 1;
                        foreach ($fetchdata as $key => $row) {
                            ?>
                            <tr>
                                <th scope="col"><?= $i++ ?></th>
                                <th scope="col"><?= $row['Mail'] ?></th>
                                <th scope="col"><?= $row['Name'] ?></th>
                                <th scope="col"><?= $row['Password'] ?></th>

                                <th>
                                    <a href="edit.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Düzenle</a>
                                </th>
                                <th>
                                    <form action="operation.php" method="POST">
                                        <button type="submit" name="delete" value="<?= $key ?>" class="btn btn-danger">Sil</button>
                                    </form>
                                </th>
                            </tr>

                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>












    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>