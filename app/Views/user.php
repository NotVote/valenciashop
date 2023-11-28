 <div class="row">
 <div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"> </h4>
      <a href="<?= base_url('/home/tambah_user/') ?>"><button class="btn " title="Tambah"><i class="mdi mdi-plus"></i></button></a>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Password</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($gas as $dona) { ?>
              <tr>
                <td><?= $no++  ?></td>
                <td><?= $dona->username  ?></td>
                <td><?= $dona->password  ?></td>
                <td><?= $dona->level  ?></td>
                  <td >
                <!-- <a href="<?= base_url('/home/edit_user/'. $dona->id_user) ?>"><button class="btn " title="Edit"><i class="mdi mdi-border-color"></i></button></a> -->

                  <a href="<?= base_url('/home/hapus_user/'. $dona->id_user) ?>"><button class="btn " title="Delete"><i class="mdi mdi-minus-circle-outline "></i></button></a>
                </td>
                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
