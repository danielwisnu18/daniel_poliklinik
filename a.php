<form class="form row" method="POST" action="" name="myForm" onsubmit="return(validate());">


    <?php 
        $nama = '';
        $alamat = '';
        $no_hp = '';
        if (isset ($_GET['id'])) {
            $ambil = mysqli_query($mysqli, "SELECT * FROM dokter where id ='" . $_GET['id'] . "'");
            while ($row = mysqli_fetch_array($ambil)) {
                $nama = $row['nama'];
                $alamat = $row ['alamat'];
                $no_hp = $row ['no_hp'];
            }
    ?>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <?php
        }
?>

    <div class="col">
        <label for="inputnama" class="form-label fw-bold">
            nama
        </label>
        <input type="text" class="form-control" name="nama" id="inputnama" placeholder="nama" value="<?php echo $nama ?>">
    </div>
    <div class="col">
        <label for="inputalamat" class="form-label fw-bold">
            alamat
        </label>
        <input type="text" class="form-control" name="alamat" id="inputalamat" placeholder="alamat" value="<?php echo $alamat ?>">
    </div>
    <div class="col mb-2">
        <label for="inputTanggalAkhir" class="form-label fw-bold">
        No HP
        </label>
        <input type="text" class="form-control" name="no_hp" id="inputno_hp" placeholder="no_hp" value="<?php echo $no_hp ?>">
    </div>
    <div class="col">
        <button type="submit" class="btn btn-primary rounded-pill px-3" name="simpan">Simpan</button>
    </div>
    <div class="col">
        <button type="submit" class="btn btn-primary rounded-pill px-3" name="ubah">ubah</button>
    </div>
</form>

<?php
$result = mysqli_query($mysqli, "SELECT * FROM dokter");
$no = 1;
while ($data = mysqli_fetch_array($result)) {
?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data['nama'] ?></td>
        <td><?php echo $data['alamat'] ?></td>
        <td><?php echo $data['no_hp'] ?></td>
        <td>
            <a class="btn btn-success rounded-pill px-3" href="index.php?page=dokter&id=<?php echo $data['id'] ?>">Ubah</a>
            <a class="btn btn-danger rounded-pill px-3" href="index.php?page=dokter&id=<?php echo $data['id'] ?>&aksi=hapus">Hapus</a>
        </td>
    </tr>
<?php
}
?>