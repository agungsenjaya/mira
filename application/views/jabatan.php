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
		<!-- table -->
		<div class="mb-3 text-right">
			<a href="javascript:void" class="btn btn-primary" title="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i>Tambah Jabatan</a>
		</div>
		<table class="table bg-white table-bordered" style="width:100%">
			<thead class="bg-primary text-white">
				<tr>
					<th>#</th>
					<th>Nama Jabatan</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$opl = "SELECT * FROM tbl_jb";
				$kl = $this->db->query($opl);
				if ($kl->num_rows() > 0) {
					foreach ($kl->result() as $kos) {?>
				<tr>
					<th><?php echo $kos->jb_id ?></th>
					<td class="bg-light text-capitalize"><?php echo $kos->jb_name ?></td>
					<td><a href="javascript:void" title="">Actions</a></td>
				</tr>
			<?php }} ?>
			</tbody>
		</table>
		<!-- End table -->
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
        	<form action="<?php echo base_url(); ?>admin/tambah_jabatan" method="POST">
        		<div class="form-group">
        			<label for="">Nama Jabatan</label>
        			<input type="text" name="jb_name" required class="form-control" placeholder="Masukan jabatan">
        		</div>
			  <button type="submit" class="btn btn-primary">Insert Jabatan</button>
			</form>
        	<!-- End Form -->

      </div>
    </div>
  </div>
</div>