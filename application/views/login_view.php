<div class="col-md-6 offset-md-3 d-flex justify-content-center align-items-center min-vh-100 ">
	<div>
		<div class="media mb-3">
			<!-- <img class="mr-2" src="//via.placeholder.com/70" alt=""> -->
			<i class="fa fa-twitch mr-2 fa-4x text-primary"></i>
			<div class="media-body ">
				<h4 class="font-weight-bold mb-0 text-primary text-uppercase">pt. anugrah mitra mulia</h4>
				<p class="mb-0">Selamat datang dihalaman login mira group.</p>
			</div>
		</div>
		<div class="flash-container">
			<?php if ($this->session->flashdata('us-1')): ?>
				<div class="flash-message us-1 flash-success">
					Username dan password salah silahkan periksa kembali, Terima kasih.
				</div>
			<?php endif ?>
		</div>
		<hr>
		<form action="<?php echo base_url();?>login/login_act" method="post">
	  <div class="form-group">
	    <label for="inputUsername">Username</label>
	    <input type="text" class="form-control" id="inputUsername" aria-describedby="inputUsername" placeholder="Masukan username" name="user_name" required>
	    <small id="inputUsername" class="form-text text-muted">Harap masukan Username dan Password yang benar</small>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword">Password</label>
	    <input type="password" class="form-control" id="inputPassword" placeholder="Masukeun Password" name="user_password" required>
	  </div>
	  <div class="text-center">
		  <button type="submit" class="btn btn-primary text-uppercase">Login Now</button>
	  </div>
	</form>

		<div class="mt-5 text-center">
			<span class="font-copy">Copyright All Reserved By <a href="#" title="">Mira Trisakti <?php echo date('Y') ?></a></span>
		</div>

	</div>
</div>