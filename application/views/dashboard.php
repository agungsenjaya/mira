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
		<!-- <table id="table" class="table table-bordered bg-white small display">
			<thead class="bg-primary text-white">
				<tr>
					<th>#</th>
					<th>Nama Lengkap</th>
					<th>Nik</th>
					<th>Jenis Kelamin</th>
					<th>Jabatan</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table> -->
		<hr class="border-primary">
		<div class="mb-3 d-flex justify-content-between">
			<div>
				<button type="button" class="btn btn-white border-primary">Total Pegawai : 
					<?php 
						$sql = "SELECT * FROM tbl_pg";
						$aml = $this->db->query($sql);
						echo count($aml->result());
					?>
					</button>
			</div>
			<div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i>Tambah Pegawai</button>
			</div>
		</div>
		
		<table id="table" class="table bg-white table-bordered" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>Nomor Induk</th>
                <th>Jabatan</th>
                <th>Kelamin</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="text-capitalize">
        	<?php 
        	$sql = "SELECT * FROM tbl_pg";
        	$qq = $this->db->query($sql);
        		foreach ($qq->result() as $kuy) {
        	 ?>
        	 <tr class="item<?php echo $kuy->pg_id?>">
        	 	<th><?php echo $kuy->pg_id; ?></th>
        	 	<td><?php echo $kuy->pg_nama; ?></td>
        	 	<th class="bg-light"><?php echo $kuy->pg_ktp; ?></th>
        	 	<td><?php echo $kuy->pg_jabatan; ?></td>
        	 	<td><?php echo $kuy->pg_kelamin; ?></td>
        	 	<td>
        	 		<?php if ($kuy->pg_status == 1): ?>
        	 			<span class="badge badge-primary">Active</span>
        	 			<?php else: ?>
        	 			<span class="badge badge-dark">Deactive</span>
        	 		<?php endif ?>
        	 	</td>
        	 	<td><a href="<?php echo $kuy->pg_id ?>" title="">Actions</a></td>
        	 </tr>
        	<?php }?>
        </tbody>
    </table>

	</div>
</div>
<!-- Modal Tmbah-->
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
        	<form>
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="">Nama lengkap</label>
     <input type="text" class="form-control" name="" placeholder="Masukan nama">
    </div>
    <div class="form-group col-md-6">
     <label for="">Nomor Induk</label>
     <input type="text" class="form-control" name="" placeholder="Masukan nomor">
    </div>
  </div>
  <div class="form-group">
    <label for="">Jenis Kelamin</label>
    <select name="" class="form-control">
      <option value="">Pilih Kelamin</option>
      <option value="P">Perempuan</option>}
      <option value="L">Laki-Laki</option>}
    </select>
  </div>
    <div class="form-row">
      <div class="form-group col-md-4">
       <label for="">Jabatan</label>
       <select class="form-control">
         <option value="">Pilih Jabatan</option>}
         <option value="2">Operator Produksi</option>}
         <option value="1">Staff Coordinator</option>}
       </select>
      </div>
      <div class="form-group col-md-8">
       <label for="">Gaji</label>
       <input type="text" class="form-control" name="" placeholder="Masukan gaji">
      </div>
    </div>
  
  <div class="form-group">
    <label for="inputAlamat">Alamat Lengkap</label>
    <textarea name="" class="form-control" placeholder="Masukan alamat"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Insert Pegawai</button>
</form>
        	<!-- End Form -->

      </div>
    </div>
  </div>
</div>