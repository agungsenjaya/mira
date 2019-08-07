$(document).ready(function() {
     		$('#table').DataTable();
     		$( "#drod" ).select2({
			    theme: "bootstrap"
			});
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
     		// Search
        $('#search1').focus(function() {
          document.getElementById("overlay").style.display = "block";
        });
        $('#overlay').on('click', function() {
          document.getElementById("overlay").style.display = "none";
          $('.brp').remove();
        });
     		 $.ajaxSetup({ cache: false });
             $('#search1').keyup(function(){
              $('#result').text('');
              $('#state').val('');
              var searchField = $('#search1').val();
              var expression = new RegExp(searchField, "i");
              $.getJSON( 'http://localhost/mira/admin/pro', function(data) {

               $.each(data, function(key, value){
                if (value.pg_nama.search(expression) != -1 || value.pg_ktp.search(expression) != -1)
                {
                     $('#result').append(`<li class="list-group-item rounded-0 link-class brp"><a href="http://localhost/mira/admin/edit_pegawai/${value.pg_id}" class="text-dark d-flex justify-content-between">
                        <div class="text-capitalize font-weight-bold">
                            <i class="fa fa-user-circle mr-2 text-primary"></i>${value.pg_nama}
                        </div>
                        <div>
                            <span class="font-weight-bold small">${value.pg_ktp}</span>
                        </div>
                        </a></li>`);
                }else{

                }
               });   
               });
              });
           		// End Search
              var url_slack = 'http://localhost/mira/admin/pro';
              $('#drod').on('change', function() {
                var odd = this.value;
              // Insert Penggajian
                $.getJSON(url_slack, function(result) {
                  var pa = result.filter( eme => eme.pg_id == odd);
                  console.log(pa);
                  $.each(pa, function(key, val) {
                    $('#wa').val(val.pg_nama);
                    $('#wu').val(val.pg_gaji);
                    $('#wo').val(val.pg_id);
                  });
                });
              // End Insert Penggajian
              if ($(this).val() == 0) {
                $('#buha').attr('disabled','true');
                $('#wa, #wu, #wo').val('');
              }else{
                $('#buha').removeAttr('disabled');
              }
              });
                  // $( '#wu' ).mask('000.000.000', {reverse: true});
});