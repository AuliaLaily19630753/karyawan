<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Tambah Data Obat</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <?php
            include_once "../database/database.php";

            if(isset($_POST['button_simpan'])){
                $id = $_POST['id'];
                $id_obat = $_POST['id_obat'];
                $nama_obat = $_POST['nama_obat'];
                $jenis_obat = $_POST['jenis_obat'];
                $harga = $_POST['harga'];

                $insertSQL = " INSERT INTO data_obat VALUES ('".$id."','".$id_obat."','".$nama_obat."','"
                .$jenis_obat."','".$harga."')";
 
                $insertSQL =" INSERT INTO data_obat VALUES (?, ?, ?, ?, ?)";
            
                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($insertSQL);
                $statement->bindParam(1, $id);
                $statement->bindParam(2, $id_obat);
                $statement->bindParam(3, $nama_obat);
                $statement->bindParam(4, $jenis_obat);
                $statement->bindParam(5, $harga);
                $statement->execute();

                header('Location: main.php?page=bagian');
            }
    
            ?>
        </div>
      </div>
      <div>
          <form action="" method="post">
          <div class="mb-3">
            <label for="id" class="form-label">Id </label>
            <input type="text" class="form-control" id="id_" name="id" required>
          </div>
          <div class="mb-3">
            <label for="id_obat" class="form-label">Id Obat</label>
            <input type="text" class="form-control" id="id_obat" name="id_obat" required>
          </div>
          <div class="mb-3">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" class="form-control" id="nama_obat" name="nama_obat" required>
          </div>
          <div class="mb-3">
            <label for="jenis_obat" class="form-label">Jenis Obat</label>
            <select class="form-select" aria-label="Default select example" name="jenis_obat" required>
                <option value="" selected> Pilih Jenis Obat </option>
                <option value="Kapsul">Kapsul</option>
                <option value="Tablet">Tablet</option>
                <option value="Sirup">Sirup</option>
                <option value="Bubuk">Bubuk</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" required>
          </div>
              <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
          </form>
      </div>
</main>