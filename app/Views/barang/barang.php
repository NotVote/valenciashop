<?php
// Assuming you have your database connection details
$hostname = "localhost";
$username = "root";
$password = "";
$database = "tokoacc";

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php 
if(!empty($_POST['add_barang'])){
    $id = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga_barang'];
    $tgl = $_POST['tgl_input'];
    
   mysqli_query($conn,"insert into barang values('','$id','$nama','$harga','$tgl')")
    or die(mysqli_error($conn));
    echo '<script>window.location="barang.php"</script>';
}

$query = mysqli_query($conn, "SELECT max(id_barang) as kodeTerbesar FROM barang");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>

  <div class="col-md-9 mb-2">
    <div class="row">

    <!-- barang -->
    <div class="col-md-12 mb-3">
        <div class="card">
        <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fa fa-shopping-cart"></i> <b>Tambah Barang</b></div>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-20">
                        <label><b>Kode Barang</b></label>
                        <input type="text" name="id_barang" class="form-control" value="<?php echo $kodeBarang;?>" required>
                        </div>
                        <div class="form-group col-md-20">
                        <label><b>Nama Barang</b></label>
                        <input type="text" name="nama_barang" class="form-control" required>
                        </div>
                        <div class="form-group col-md-20">
                        <label><b>Harga Barang</b></label>
                        <input type="number" name="harga_barang" class="form-control" required>
                        </div>
                        <div class="form-group col-md-5">
                        <label><b>Tanggal Input</b></label>
                            <div class="input-group">
                                <input type="text" name="tgl_input" class="form-control" value="<?php echo  date("j F Y, G:i");?>" >
                                <div class="input-group-append">
                                    <button name="add_barang" value="simpan" class="btn btn-purple" type="submit">
                                    <i class="fa fa-plus mr-2"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end barang -->


    <!-- table barang -->
   <div class="col-md-20 mb-2">
        <div class="card">
        <div class="card-header bg-purple">
                <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Barang</b></div>
            </div>
            <div class="card-body">
            <table class="table" id="table" style="width: 80px; height: 70px;">
                        <thead class="thead-purple">
                            <tr>
                                <th>No</th>
                                <th>Id Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Tanggal Input</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $data_barang = mysqli_query($conn,"SELECT * FROM barang");
                        while($d = mysqli_fetch_array($data_barang)){
                            ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['id_barang']; ?></td>
                            <td><?php echo $d['nama_barang']; ?></td>
                            <td><?php echo $d['harga_barang']; ?></td>
                            <td><?php echo $d['tgl_input']; ?></td>
                            <td>
                                <a class="btn " href="home/edit?id=<?php echo $d['id']; ?>">
                                <i class="mdi mdi-border-color"></i> </a>
                                <a href="<?= base_url('/home/hapus_barang/' . $d['id']) ?>">
    <button class="btn" title="Delete">
        <i class="mdi mdi-minus-circle-outline"></i>
    </button>
</a>
<?php
include 'config.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $hapus_data = mysqli_query($conn, "DELETE FROM barang WHERE id ='$id'");
    echo '<script>window.location="barang.php"</script>';
}
?>
                            </td>
						</tr>
                        <?php }?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end table barang -->

    </div>
  </div>

  <?php 
	include 'config.php';
	if(!empty($_GET['id'])){
		$id= $_GET['id'];
		$hapus_data = mysqli_query($conn, "DELETE FROM barang WHERE id_barang ='$id'");
		echo '<script>window.location="barang.php"</script>';
	}

?>

