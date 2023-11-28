<div class="row">
 <div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Donasi input</h4>
      <form class="forms-sample" action="/home/actinput_donasi" method="POST">

         <div class="form-group">
          <label for="jumlah">Jumlah Donasi:</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>

         <div class="form-group">
          <label for="jumlah">Jumlah Donasi:</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>

        <div class="form-group">
          <label for="level">Level:</label>
          <select type="number" class="form-control" id="level" name="level" required>
            <option>-</option>
            <?php foreach ($levels as $level) { ?>
<option value="<?= $level->level_id ?>"><?= $level->level?></option>
            <?php } ?>
          </select>
        </div>

       
        <button type="submit" class="btn btn-primary">Kirim Donasi</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="app.js"></script>
  </body>
  </html>