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
		<div class="mb-3 d-flex justify-content-between">
			<div>
				<button type="button" class="btn btn-white border-primary">Total Pegawai : 
					<?php 
						$sql = "SELECT * FROM tbl_pg";
						$aml = $this->db->query($sql);
            $nia = count($aml->result());
            function ress($nia){
              $data = strlen($nia);
              switch ($data) {
                case 1:
                  echo '0'.$nia;
                  break;
                case $nia:
                  echo $nia;
                  break;
                default:
                  # code...
                  break;
              }
            }
            ress($nia);
						// echo count($aml->result());
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
                <th>Nomor KTP</th>
                <th>Jabatan</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="text-capitalize">
        	<?php 
          // Jabtan
        	$sql = "SELECT * FROM tbl_pg";
        	$qq = $this->db->query($sql);
        		foreach ($qq->result() as $kuy) {
        	 ?>
        	 <tr class="item<?php echo $kuy->pg_id?>">
        	 	<th><?php echo $kuy->pg_id; ?></th>
        	 	<td><?php echo $kuy->pg_nama; ?></td>
        	 	<th class="bg-light"><?php echo $kuy->pg_ktp; ?></th>
        	 	<!-- <td><?php echo $kuy->jb_id; ?></td> -->
            <td>
              <?php 
                  $ml = "SELECT * FROM tbl_jb WHERE jb_id=".$kuy->jb_id;
                  $mu = $this->db->query($ml);
                  foreach ($mu->result() as $nos) {
                    echo $nos->jb_name;
                  }
              ?>
            </td>
            <td><?php echo $kuy->pg_kelamin; ?></td>
        	 	<td>
        	 		<?php if ($kuy->pg_status == 1): ?>
        	 			<span class="badge badge-primary">Active</span>
        	 			<?php else: ?>
        	 			<span class="badge badge-dark">Deactive</span>
        	 		<?php endif ?>
        	 	</td>
        	 	<td><a href="<?php echo base_url();?>admin/edit_pegawai/<?php echo $kuy->pg_id ?>" title="">Actions</a></td>
        	 </tr>
        	<?php }?>
        </tbody>
    </table>

	</div>
  <div id="overlay"></div>
</div>
<!-- Modal Tmbah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<!-- Form -->
        	<form action="<?php echo base_url(); ?>admin/tambah_pegawai" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
     <label for="">Nama lengkap</label>
     <input type="text" class="form-control" name="pg_nama" placeholder="Masukan nama" required>
    </div>
    <div class="form-group col-md-6">
     <label for="">Nomor KTP</label>
     <input type="text" class="form-control" name="pg_ktp" placeholder="Masukan nomor" required>
    </div>
  </div>
  <div class="form-group">
    <label for="">Jenis Kelamin</label>
    <select name="pg_kelamin" class="form-control" required>
      <option value="">Pilih Kelamin</option>
      <option value="P">Perempuan</option>
      <option value="L">Laki-Laki</option>
    </select>
  </div>
    <div class="form-row">
      <div class="form-group col-md-4">
       <label for="">Jabatan</label>
       <select class="form-control" required name="jb_id">
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
       <input type="text" class="form-control uang" name="pg_gaji" placeholder="Masukan gaji" required>
      </div>
    </div>
  
  <div class="form-group">
    <label for="inputAlamat">Alamat Lengkap</label>
    <textarea name="pg_alamat" class="form-control" placeholder="Masukan alamat" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Insert Pegawai</button>
</form>
        	<!-- End Form -->

      </div>
    </div>
  </div>
</div>