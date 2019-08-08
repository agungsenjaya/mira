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
		<div class="row">
			<div class="col-md">
			<div class="p-4 bg-white border-left border-primary">
				<div class="media">
				<i class="fa fa-user-circle fa-4x text-primary mr-2"></i>
				<div class="media-body mb-2">
					<?php foreach ($pegawai as $val): ?>
					<h4 class="text-capitalize mb-0 font-weight-bold text-primary" id="kj"><?php echo $val->pg_nama ?></h4>
					<span class="badge badge-primary"><?php echo $val->pg_reg ?> </span>
					<?php endforeach ?>
				</div>
			</div>
			<!-- table -->
			<input type="hidden" value="<?php echo $val->pg_id; ?>" id="jok">
			<table class="table table-sm mt-4">
				<tbody>
					<?php foreach ($pegawai as $ra): 
						$ids = $ra->pg_id;
						?>
					<tr>
						<td>Nomor KTP</td>
						<td>:</td>
						<th><?php echo $ra->pg_ktp;?></th>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<th><?php echo $ra->pg_kelamin;?></th>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td>:</td>
						<th class="text-capitalize">
							<?php 
			                  $ml = "SELECT * FROM tbl_jb WHERE jb_id=".$ra->jb_id;
			                  $mu = $this->db->query($ml);
			                  foreach ($mu->result() as $nos) {
			                    echo $nos->jb_name;
			                  }
			              ?>
						</th>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<th>
							<?php if ($ra->pg_status == 1): ?>
		        	 			<span class="badge badge-primary">Active</span>
		        	 			<?php else: ?>
		        	 			<span class="badge badge-dark">Deactive</span>
		        	 		<?php endif ?>
						</th>
					</tr>
					<tr>
						<td>Tanggal Keluar</td>
						<td>:</td>
						<th>
							<?php if ($ra->pg_phk > 0): ?>
								<?php echo $ra->pg_phk ?>
							 <?php else: ?>
							 	<?php echo '-' ?>
							<?php endif ?>
						</th>
					</tr>
					<tr>
						<td>Tanggal Update</td>
						<td>:</td>
						<th>
							<?php if ($ra->pg_upd > 0): ?>
								<?php echo $ra->pg_upd ?>
							 <?php else: ?>
							 	<?php echo '-' ?>
							<?php endif ?>
						</th>
					</tr>
					<tr>
						<td>Gajih</td>
						<td>:</td>
						<th>Rp <?php echo $ra->pg_gaji ?></th>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<th><?php echo $ra->pg_alamat;?></th>
					</tr>
					<input type="hidden" id="noi" name="" value="<?php echo $ra->pg_id ?>">
				</tbody>
			</table>
			<!-- End table -->
			</div>
			<!-- Button -->
			<p class="font-weight-bold mt-3">Action</p>
			<?php if ($ra->pg_status == 1): ?>
				<a href="javascript:void(0)" class="btn btn-danger" data-toggle="modal" data-target="#phk"><i class="fa fa-podcast mr-2"></i>NON AKTIF PEGAWAI</a>
				<?php else: ?>
					<a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#update"><i class="fa fa-inbox mr-2"></i>UPDATE PEGAWAI</a>
			<?php endif ?>
					<?php endforeach ?>
			<!-- End Button -->
			</div>
			<div class="col-md">
				<div class="p-4 bg-white border-left border-primary">
					<!-- Form -->
					<form action="<?php echo base_url(); ?>admin/update_pegawai" method="POST">
						<?php foreach ($pegawai as $ke): ?>
					  <div class="form-row">
					    <div class="form-group col-md-6">
					     <label for="">Nama lengkap</label>
					     <input type="hidden" name="pg_id" value="<?php echo $ke->pg_id ?>">
					     <input type="text" class="form-control" name="pg_nama" placeholder="Masukan nama" required value="<?php echo $ke->pg_nama ?>">
					    </div>
					    <div class="form-group col-md-6">
					     <label for="">Nomor KTP</label>
					     <input type="text" class="form-control" name="pg_ktp" placeholder="Masukan nomor" required value="<?php echo $ke->pg_ktp ?>">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="">Jenis Kelamin</label>
					    <input type="hidden" class="una" value="<?php echo $ke->pg_kelamin ?>">
					    <select name="pg_kelamin" id="mo" class="form-control" required>
					      <option value="">Pilih Kelamin</option>
					      <option value="P">Perempuan</option>
					      <option value="L">Laki-Laki</option>
					    </select>
					  </div>
					    <div class="form-row">
					      <div class="form-group col-md-4">
					       <label for="">Jabatan</label>
					       <input type="hidden" class="uni" value="<?php echo $ke->jb_id ?>">
					       <select class="form-control" id="mi" required name="jb_id">
					         <option value="">Pilih Jabatan</option>
					         <?php 
					         $kj = "SELECT * FROM tbl_jb";
					         $qq = $this->db->query($kj)->result();
					         foreach ($qq as $kiwi ) {
					          ?>
					         <option value="<?php echo $kiwi->jb_id ?>"><?php echo $kiwi->jb_name ?></option>
					       <?php } ?>
					       </select>
					      </div>
					      <div class="form-group col-md-8">
					       <label for="">Gaji</label>
					       <input type="text" class="form-control uang" name="pg_gaji" placeholder="Masukan gaji" required value="<?php echo $ke->pg_gaji ?>">
					      </div>
					    </div>
					  
					  <div class="form-group">
					    <label for="inputAlamat">Alamat Lengkap</label>
					    <textarea name="pg_alamat" class="form-control" placeholder="Masukan alamat" required><?php echo $ke->pg_alamat ?></textarea>
					  </div>
					  <?php endforeach ?>
					  <button type="submit" class="btn btn-primary">Update Pegawai</button>
					</form>
					<!-- End Form -->
				</div>
			</div>
		</div>
		<hr class="border-primary">
		<!-- Reacord -->
		<div class="d-flex justify-content-between mb-3">
			<div class="align-self-center">
				<p class="text-capitalize mb-0 text-primary"><i class="fa fa-unlink mr-2"></i>History Penggajian</p>
			</div>
			<div>
				<a href="javascript:void(0)" class="btn btn-white" title=""><i class="fa fa-file-pdf-o mr-2"></i>Download Laporan</a>
			</div>
		</div>
		<!-- table -->
		<table class="table bg-white table-bordered" style="width:100%">
			<thead class="bg-primary text-white">
				<tr>
					<th>Tanggal</th>
					<th>Absen</th>
					<th>Lembur</th>
					<th>Gaji</th>
					<th>Total Gaji</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$rr = "SELECT * FROM tbl_log WHERE pg_id=".$ids;
					$hh = $this->db->query($rr);
					if ($hh->num_rows() > 0) {
						foreach ($hh->result() as $kas) {?>
				<tr>
					<th><?php echo $kas->log_reg ?></th>
					<td>
						<?php 
							if ($kas->log_absen > 0) {
							echo $kas->log_absen . ' Hari';
							}else{
								echo '-';
							}
						?>
					</td>
					<td>
						<?php 
						if ($kas->log_lembur > 0) {
							echo $kas->log_lembur . ' Jam';
							}else{
								echo '-';
							}
						?>
					</td>
					<td>Rp <?php echo $kas->log_gaji; ?></td>
					<th>Rp <?php echo $kas->log_total; ?></th>
				</tr>
			<?php }} ?>
			</tbody>
		</table>
		<!-- End table -->
		<!-- End Reacord -->
	</div>
	<div id="overlay">	</div>

</div>
<!-- Modal -->
<div class="modal fade" id="phk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
        Dengan ini saya menyatakan bahwa pegawai atas nama <span id="nu" class="font-weight-bold text-capitalize"></span> dinonaktifkan kerja tanggal <span class="font-weight-bold"><?php echo date('d-m-Y'); ?></span>
        <div class="mt-4">
        	<form action="<?php echo base_url();?>admin/phk_pegawai" method="POST">
        	<input type="hidden" name="pg_id" class="bds">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-danger">Ya, Saya Setuju</button>
        	</form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body">
        Update pegawai bekerja kembali tertulis <br> mulai tanggal <span class="font-weight-bold"><?php echo date('d-m-Y'); ?></span>
        <div class="mt-4">
        	<form action="<?php echo base_url();?>admin/kembali_pegawai" method="POST">
        	<input type="hidden" name="pg_id" class="bds">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-success">Ya, Saya Setuju</button>
        	</form>
        </div>
      </div>
    </div>
  </div>
</div>