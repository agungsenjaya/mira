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
			<h3 class="text-primary font-weight-bold">Ketentuan Karyawan</h3>
		</div>
		<table class="table bg-white table-bordered" style="width:100%">
			<thead class="bg-primary text-white">
				<tr>
					<th>#</th>
					<th>kt_nama</th>
					<th>kt_price</th>
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
					<td class="bg-light text-capitalize"><?php echo $kos->kt_nama ?></td>
					<td><?php echo $kos->kt_price ?></td>
					<td><a href="javascript:void" title="">Actions</a></td>
				</tr>
			<?php }} ?>
			</tbody>
		</table>
	</div>
</div>