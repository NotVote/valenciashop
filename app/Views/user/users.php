
<div class="row">
 <div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Users Table</h4>
      <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
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
            foreach($users as $user) { ?>
              <tr>
                <td><?= $no++  ?></td>
                <td><?= $user->username  ?></td>
                <td><?= $user->password  ?></td>
                <td><?= $user->level  ?></td>
                <td >
                      <a href="<?= base_url('/home/reset_user/'. $user->user_id) ?>"><button class="btn " title="Reset"><i class=" mdi mdi-key"></i></button></a>

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
