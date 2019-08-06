<div class="col-md content">
	<div class="p-4">
		<div class="row mb-3">
			<div class="align-self-center col-md-3">
				<p class="text-capitalize mb-0 text-primary"><i class="fa fa-unlink mr-2"></i>Selamat Datang, <b><?php echo $this->session->userdata("nama") ?></b></p>
			</div>
			<div class="col-md">
				<form id="headerSearchForm" class="header-search input-group w-100 border border-primary" action="#">
                <input id="headerSearchField" class="header-search-input form-control form-control-icon-text" type="text" placeholder="Yuk cari karyawan..">
                <div class="input-group-append focus-hide">
                  <i class="fa fa-search icon-text icon-text-lg"></i>
                </div>
                <div class="input-group-append focus-show">
                  <span id="headerSearchResultsClear">
                    <i class="fa fa-close icon-text icon-text-lg"></i>
                  </span>
                </div>
              </form>
			</div>
			<div class="col-md-3">
				<button type="button" class="btn btn-white btn-block"><?php echo date('Y-m-d'); ?></button>
			</div>
		</div>
		<hr class="border-primary">
		<div class="text-center mb-3">
			<h3 class="text-primary font-weight-bold">Simulasi Penggajian</h3>
			<a href="javascript:void" title="" class="border-primary btn btn-white" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-adn"></i> Insert gajian</a>
		</div>
		<table class="table bg-white table-bordered" style="width:100%">
			<thead class="bg-primary text-white">
				<tr>
					<th>#</th>
					<th>Tanggal</th>
					<th>User ID</th>
					<th>Minus</th>
					<th>Plus</th>
					<th>Gaji</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$opl = "SELECT * FROM tbl_log";
				$kl = $this->db->query($opl);
				if ($kl->num_rows() > 0) {
					foreach ($kl->result() as $kos) {?>
				<tr>
					<th><?php echo $kos->log_id ?></th>
					<td class="bg-light text-capitalize"><?php echo $kos->log_reg ?></td>
					<td><?php echo $kos->pg_id ?></td>
					<td><?php echo $kos->log_min ?></td>
					<td><?php echo $kos->log_plus ?></td>
					<td><?php echo $kos->log_gaji ?></td>
					<td><?php echo $kos->log_total ?></td>
				</tr>
			<?php }} ?>
			</tbody>
		</table>
	</div>
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
    	<form action="<?php echo base_url(); ?>admin/tambah_penggajian" method="POST">
    		<div class="form-group">
			<label for=""><span class="text-primary">*</span> Nama Pegawai</label>
			<select name="pg_id" class="form-control">
				<option value="">Pilih Pegawai</option>
				<?php 
				$oml = "SELECT * FROM tbl_pg";
				$kk = $this->db->query($oml);
				foreach ($kk->result() as $kuy) {
				?>
				<option value="<?php echo $kuy->pg_id ?>"><?php echo $kuy->pg_nama . ' - ' . $kuy->pg_ktp . ' - ' . $kuy->pg_gaji ?></option>
				<?php } ?>
			</select>
    		</div>
    		<div class="form-row">
    			<div class="form-group col-md">
    				<label for="">Jumlah Alfa</label>
    				<input type="text" name="" class="form-control" placeholder="Masukan alfa">
    			</div>
    			<div class="form-group col-md">
    				<label for="">Jumlah Lembur</label>
    				<input type="text" name="" class="form-control" placeholder="Masukan lembur">
    			</div>
    		</div>
    		<hr>
    		<ul class="small">
    			<li>Jumlah minus/absen misal 12 hari di tulis 12 jika kosong tulis 0.</li>
    			<li>Jumlah lembur misal 12 jam di tulis 12 jika kosong tulis 0.</li>
    		</ul>
    		

    		<button type="submit" class="btn btn-primary">Insert Gajian</button>
    	</form>
    	<!-- End Form -->
      </div>
    </div>
  </div>
</div>