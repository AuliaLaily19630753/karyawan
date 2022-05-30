<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Obat</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

      <div class="table-responsive">
      <a href="?page=dataobatcreate" class="btn btn-success mb-3"><span data-feather="plus"></span> Data Baru</a>
        
      <table class="table table-striped table-sm">
          <thead>
            <tr>
            <th scope="col">#</th>
              <th scope="col">Id Obat</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Jenis Obat</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $selectSQL = "SELECT * FROM  data_obat";
            $database = new Database();
            $connection = $database->getConnection();
            $statement = $connection->prepare($selectSQL);
            $statement->execute();
         
            $no = 1;
            while($data = $statement->fetch(PDO::FETCH_ASSOC)) {
            ?>
             <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $data['id_obat'] ?></td>
              <td><?php echo $data['nama_obat'] ?></td>
              <td><?php echo $data['jenis_obat'] ?></td>
              <td>
                <a href="?page=dataobatupdate&id=<?php echo $data['id_obat'] ?>" class="badge bg-warning">
                  <span data-feather="edit">
                </a>
                <a href="?page=dataobatdelete&id=<?php echo $data['id_obat'] ?>" class="badge bg-danger">
                  <span data-feather="x-octagon">
                </a>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </main> 