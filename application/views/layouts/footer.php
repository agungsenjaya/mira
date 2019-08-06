</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
     <script>
     	$(document).ready(function() {
     		$('#table').DataTable();
     		$('.js-custom-select').select2();
     		// Selected
     		var ab = $('.una').val();
		    if (ab == 'L') {
		    	$('#mo').val('L');
		    }else if(ab == 'P') {
		    	$('#mo').val('P');
		    }
		    var ae = $('.uni').val();
		    if (ae == ae) {
		    	$('#mi').val(ae);
		    }else {
		    	$('#mi').val();
		    }
     		// End Selected
		});
     </script>
</body>
</html>