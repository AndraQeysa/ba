<?php
    include '../koneksi.php';

    $sql = "SELECT * FROM buku ORDER BY judul";

    $res = mysqli_query($kon,$sql);
    
    $pinjam = array();

    while($data = mysqli_fetch_assoc($res)) {
        $pinjam[] = $data;
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
    <h2 class="card-title"><i class="fas fa-edit"></i>Data Anggota</h5>
  </div>
  <div class="card-body">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Peminjam</th>
        <th scope="col">Tanggal Pinjam</th>
        <th scope="col">Tanggal Jatuh Tempo</th>
        <th scope="col">Petugas</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <?php
        $no = 1;
        foreach($pinjam as $p) {?>
        
        <tr>
            <th scope="row"><?=$no?></th>
            <td><?=$p['nama']?></th>
            <td><?= date('d F Y', strtotime($p['tgl_pinjam']))?></th>
            <td><?= date('d F Y', strtotime($p['tgl_jatuh_tempo']))?></th>
            <td><?=$p['nama_petugas']?></th>
            <td>
            <?php
                if($p['status'] == "Dipinjam")
                {
                    echo '<h5><span class="badge badge-info">Dipinjam</span></h5>';
                }
                else
                {
                    echo '<h5><span class="badge badge-secondary">Kembali</span></h5>';
                }
            ?>
            </td>
            <td>
                <a href="#" class="badge badge-success">Detail</a>
                <a href="#" class="badge badge-warning">Edit</a>
                <a href="#" class="badge badge-denger">Hapus</a>
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