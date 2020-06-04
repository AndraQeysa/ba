<?php
    include '../koneksi.php';

    $sql = "SELECT * FROM buku ORDER BY judul";

    $res = mysqli_query($kon, $sql);
    
    $buku = array();

    while($data = mysqli_fetch_assoc($res)) {
        $buku[] = $data;
    }

    include '../aset/header.php';

?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md">
        </div>
    </div>
</div>

<div class="card">
  <div class="card-header">
    <h2 class="card-title"><i class="fas fa-edit"></i>Data Buku</h5>
  </div>
  <div class="card-body">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Judul</th>
        <th scope="col">Pengarang</th>
        <th scope="col">Stok</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <?php
        $no = 1;
        foreach($buku as $p) {?>
        
        <tr>
            <th scope="row"><?=$no?></th>
            <td><?=$p['#']?></th>
            <td><?=$p['Judul']?></th>
            <td><?= $p['Pengarang']?></th>
            <td><?= $p['Stok']?></th>
            <td>
            </td>
            <td>
                <a href="#" class="badge badge-success">Detail</a>
                <a href="#" class="badge badge-warning">Edit</a>
                <a href="#" class="badge badge-danger">Hapus</a>
            </td>
        </tr>

        <?php
            $no++;
        }
    ?>
  </div>
</div>

<?php
    include '../aset/footer.php';
?>