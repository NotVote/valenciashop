<!-- <?php include 'template/header.php';?> -->

  <div class="col-md-7 mb-2">
    <div class="row">

    <!-- barang -->
    <div class="col-md-12 mb-2">
    <?php
       $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "tokoacc";

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn){
        die("Connection Failed: " . mysqli_connect_error());
    }
    
    date_default_timezone_set('Asia/Jakarta');  
?>  
<?php
include "config.php";
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga_barang'];

    $result = mysqli_query($conn, "UPDATE barang SET nama_barang='$nama',harga_barang='$harga' WHERE id=$id");
    if(!$result){
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>NOOO!</strong> data gagal di update.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
        ";
        } else{
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>YESSS!</strong> data berhasil di update.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
        ";
        }
}
?>

<?php
// $id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM barang ");
while($data = mysqli_fetch_array($result))
{
    $idb = $data['id_barang'];
    $nama = $data['nama_barang'];
    $harga = $data['harga_barang'];
    $tgl = $data['tgl_input'];
}
?>
     <div class="row">
 <div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Barang</h4>

        
            <div class="card-body">
            
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <label><b>Id Barang</b></label>
                        <input type="text" class="form-control" value="<?php echo $idb ?>" >
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Nama Barang</b></label>
                        <input type="text" name="nama_barang" class="form-control" value="<?php echo $nama; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Harga Barang</b></label>
                        <input type="number" name="harga_barang" class="form-control" value="<?php echo $harga; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label><b>Tanggal Input</b></label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?php echo $tgl; ?>" >
                                <div class="input-group-append">
                                    <button class="btn btn-purple ml-3" name="update" type="submit">
                                    <i class="fa fa-check mr-2"></i>Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end barang -->

    </div><!-- end row col-md-9 -->
  </div>

<!-- <?php include 'template/footer.php';?> -->
