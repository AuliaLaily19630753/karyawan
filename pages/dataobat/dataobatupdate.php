<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Data Obat</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <?php
            include_once "../database/database.php";

            $id = $_GET['id'];
            echo $id;
            $findSQL = "SELECT * FROM data_obat WHERE id = ?";
            $database = new Database();
            $connection = $database->getConnection();
            $statement = $connection->prepare($findSQL);
            $statement->bindParam(1, $id);
            $statement->execute();
            $data = $statement->fetch();

            if (isset($_POST['button_simpan'])) {
                $id = $_POST['id'];
                $id_obat = $_POST['id_obat'];
                $nama_obat = $_POST['nama_obat'];
                $jenis_obat = $_POST['jenis_obat'];
                $harga = $_POST['harga'];

                $updateSQL = "UPDATE `data_obat` SET `id_obat` = ?, `nama_obat` = ?, `jenis_obat` = ?, `harga` = ? WHERE `data_obat`.`id` = ?";

                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($updateSQL);
                $statement->bindParam(1, $id_obat);
                $statement->bindParam(2, $nama_obat);
                $statement->bindParam(3, $jenis_obat);
                $statement->bindParam(4, $harga);
                $statement->bindParam(5, $id);
                $statement->execute();

                header('Location: main.php?page=bagian');
            }
            ?>
        </div>
    </div>
    <div>
        <form action="" method="post">
            <!-- <div class="mb-3">
                <label for="id" class="form-label">Id </label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            </div> -->
            <input type="hidden"  id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            <div class="mb-3">
                <label for="id_obat" class="form-label">Id Obat</label>
                <input type="text" class="form-control" id="id_obat" name="id_obat" value="<?php echo $data['id_obat'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?php echo $data['nama_obat'] ?>" required>
          </div>
            <div class="mb-3">
                <label for="jenis_obat" class="form-label">Jenis Obat</label>
                <select class="form-select" aria-label="Default select example" name="jenis_obat" required>
                    <option value="">Pilih Jenis Obat</option>
                    <option value="Kapsul" <?php echo ($data['jenis_obat'] == 'Kapsul') ? " selected" : "" ?>>Kapsul</option>
                    <option value="Tablet" <?php echo ($data['jenis_obat'] == 'Tablet') ? " selected" : "" ?>>Tablet</option>
                    <option value="Sirup" <?php echo ($data['jenis_obat'] == 'Sirup') ? " selected" : "" ?>>Sirup</option>
                    <option value="Bubuk" <?php echo ($data['jenis_obat'] == 'Bubuk') ? " selected" : "" ?>>Bubuk</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
        </form>
    </div>
</main> 