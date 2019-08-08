<div class="col-md content">
	<div class="p-4">
		<div class="row mb-3">
			<div class="align-self-center col-md-3">
				<p class="text-capitalize mb-0 text-primary"><i class="fa fa-unlink mr-2"></i>Selamat Datang, <b><?php echo $this->session->userdata("nama") ?></b></p>
			</div>
			<div class="col-md p-0 z-4">
        
				<form id="headerSearchForm">
                <input id="search1" class="header-search-input form-control form-control-icon-text" type="text" placeholder="Yuk cari karyawan..">
                <div class="input-group-append focus-hide">
                  <i class="fa fa-search icon-text icon-text-lg"></i>
                </div>
                <div class="input-group-append focus-show">
                  <span id="headerSearchResultsClear">
                    <i class="fa fa-close icon-text icon-text-lg"></i>
                  </span>
                </div>
              </form>
              <ul id="result" class="p-0 position-absolute w-100">
              </ul>
      </div>
			<div class="col-md-3">
				<button type="button" class="btn btn-white btn-block"><?php echo date('Y-m-d'); ?></button>
			</div>
		</div>
		<hr class="border-primary">
		<div class="text-center mb-3">
			<h3 class="text-primary font-weight-bold">Ketentuan Karyawan</h3>
			<a href="javascript:void" class="btn btn-white border-primary" title="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-gears mr-2"></i>Tambah Ketentuan</a>
		</div>
		<table class="table bg-white table-bordered" style="width:100%">
			<thead class="bg-primary text-white">
				<tr>
					<th>#</th>
					<th>Judul Ketentuan</th>
					<th>Kisaran Ketentuan</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$opl = "SELECT * FROM tbl_kt";
				$kl = $this->db->query($opl);
				if ($kl->num_rows() > 0) {
					foreach ($kl->result() as $kos) {?>
				<tr>
					<th><?php echo $kos->kt_id ?></th>
					<td class="text-capitalize"><?php echo $kos->kt_nama ?></td>
					<th>Rp <?php echo $kos->kt_price ?></th>
					<td><a href="javascript:void(0)" title="" data-toggle="modal" data-target="#editM-<?php echo $kos->kt_id ?>">Actions</a>
					</td>
				</tr>
			<?php }} ?>
			</tbody>
		</table>
	</div>
	<div id="overlay"></div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <!-- <small class="text-muted">Nomor induk hanya berlaku untuk satu pegawai</small> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<!-- Form -->
        	<form action="<?php echo base_url(); ?>admin/tambah_ketentuan" method="POST">
        		<div class="form-group">
        			<label for="">Nama Ketentuan</label>
        			<input type="text" name="kt_nama" required class="form-control" placeholder="Masukan ketentuan">
        		</div>
        		<div class="form-group">
        			<label for="">Nominal Ketentuan</label>
        			<input name="kt_price" required class="form-control uang" placeholder="Masukan nominal">
        		</div>
			  <button type="submit" class="btn btn-primary">Insert Ketentuan</button>
			</form>
        	<!-- End Form -->

      </div>
    </div>
  </div>
</div>
	<!--Edit Modal -->
<?php 
$rtl = "SELECT * FROM tbl_kt";
$emp = $this->db->query($rtl);
if ($emp->num_rows() > 0) {
	foreach ($emp->result() as $has) {?>
<div class="modal fade" id="editM-<?php echo $has->kt_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <!-- <small class="text-muted">Nomor induk hanya berlaku untuk satu pegawai</small> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<!-- Form -->
        	<form action="<?php echo base_url(); ?>admin/update_ketentuan" method="POST">
        		<div class="form-group">
        			<label for="">Nama Ketentuan</label>
        			<input type="hidden" name="kt_id" value="<?php echo $has->kt_id ?>">
        			<input type="text" name="kt_nama" required class="form-control" placeholder="Masukan ketentuan" value="<?php echo $has->kt_nama ?>">
        		</div>
        		<div class="form-group">
        			<label for="">Nominal Ketentuan</label>
        			<input name="kt_price" required class="form-control uang" placeholder="Masukan nominal" value="<?php echo $has->kt_price ?>">
        		</div>
			  <button type="submit" class="btn btn-primary">Update Ketentuan</button>
			</form>
        	<!-- End Form -->

      </div>
    </div>
  </div>
</div>
<?php }} ?>