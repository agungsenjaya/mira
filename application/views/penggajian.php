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
			<h3 class="text-primary font-weight-bold">Simulasi Penggajian</h3>
			<a href="javascript:void" title="" class="border-primary btn btn-white" data-toggle="modal" data-target="#dot"><i class="fa  fa-credit-card"></i> Insert gajian</a>
		</div>
		<table class="table bg-white table-bordered" style="width:100%">
			<thead class="bg-primary text-white">
				<tr>
					<th>#</th>
					<th>Tanggal</th>
					<th>User ID</th>
					<th>Absen</th>
					<th>Lemburan</th>
					<th>Gaji Peg</th>
					<th>Total Gaji</th>
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
	<div id="overlay">
		
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="dot"  role="dialog" aria-labelledby="dotLabel" aria-hidden="true">
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
			<label for=""><span class="text-primary">*</span> Masukan Nik Pegawai</label>
			<select id="drod" name="pg_id" class="form-control" required>
				<option value="">Masukan Nik</option>
				<?php 
				$oml = "SELECT * FROM tbl_pg";
				$kk = $this->db->query($oml);
				foreach ($kk->result() as $kuy) {
				?>
				<option value="<?php echo $kuy->pg_id ?>"><?php echo $kuy->pg_ktp?></option>
				<?php } ?>
			</select>
    		</div>
    		<div class="form-group">
    			<label for="">Nama Pegawai</label>
    			<input type="hidden" name="pg_id" id="wo">
    			<input type="text"  id="wa" disabled name="" class="form-control text-capitalize font-weight-bold" required>
    		</div>
    		<div class="form-group">
    			<label for="">Gaji Pegawai</label>
    			<input type="text" id="wu" disabled name="" class="form-control uang">
    		</div>
    		<div class="form-row">
    			<div class="form-group col-md">
    				<label for="">Jumlah Alfa</label>
    				<input id="numbers1" name="" class="form-control border-primary" placeholder="Masukan alfa" required>
    				<small class="font-shal"><span class="text-primary">*</span> Tulis total akumulasi hari misal 12</small>
    			</div>
    			<div class="form-group col-md">
    				<label for="">Jumlah Lembur</label>
    				<input id="numbers2" name="" class="form-control border-primary" placeholder="Masukan lembur" required>
    				<small class="font-shal"><span class="text-primary">*</span> Tulis total akumulasi jam misal 25</small>
    			</div>
    		</div>
    		<hr>

    		<button id="buha" type="submit" class="btn btn-primary" disabled>Insert Gajian</button>
    	</form>
    	<!-- End Form -->
      </div>
    </div>
  </div>
</div>