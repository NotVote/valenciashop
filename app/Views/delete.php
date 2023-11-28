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

    if (isset($_POST['DELETE'])) {
        $id = $_POST['id_barang'];

        $result = mysqli_query($conn, "DELETE FROM barang WHERE id=$id");

        if (!$result) {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>NOOO!</strong> Data gagal dihapus.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            ";
        } else {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>YESSS!</strong> Data berhasil dihapus.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            ";
        }
    }
    ?>
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
<?
    $id = $_GET['id_barang'];
    $query = mysqli_query($conn, "SELECT * FROM barang WHERE id=$id");
    while ($data = mysqli_fetch_array($query)) {
        $idb = $data['id_barang'];
        $nama = $data['nama_barang'];
        $harga = $data['harga_barang'];
        $tgl = $data['tgl_input'];
    }
    ?>

    <div class="card">
        <div class="card-header bg-purple">
            <div class="card-tittle text-white"><i class="fa fa-shopping-cart"></i> <b>Hapus Barang</b></div>
        </div>
        <div class="card-body">

            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <label><b>Id Barang</b></label>
                        <input type="text" class="form-control" value="<?php echo $idb ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label><b>Nama Barang</b></label>
                        <input type="text" class="form-control" value="<?php echo $nama; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label><b>Harga Barang</b></label>
                        <input type="number" class="form-control" value="<?php echo $harga; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label><b>Tanggal Input</b></label>
                        <input type="text" class="form-control" value="<?php echo $tgl; ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-danger" name="delete" type="submit">
                            <i class="fa fa-trash mr-2"></i>Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
