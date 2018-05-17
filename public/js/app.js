$(document).ready(function() {
		$('#create-form').on('submit', function(e) {
			
			e.preventDefault();
			var error = false;
			var matricule = $('#matricule').val();
			var password  = $('#password').val();
			var random    = $("#random").val();
			var secret    = $('#secret').val();
			var form      = $('#create-form');

			if (matricule.length == 0) {
				error = true;
				$('#matricule_error').show().fadeOut(9000);
			}
			
			if (password.length == 0) { console.log('ff');
				error = true;
				$('#password_error').show().fadeOut(9000);
			}
			
			if (random !== secret || secret.length == 0) {
				error = true;
				$('#secret_error').show().fadeOut(9000);
			}

			
			if (error == false) {
		        $.ajax({
		        	header: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
		            type: "POST",
					url: form.attr('action'),
					contentType: false,
					cache: false,
					processData: false,
					cache: false,
		            data: new FormData(form[0]),
		            success: function(data) {
		              // perform redirect
		              window.location.href = comptables_index;

		            },
		            error: function(data){
		            	alert('No ok');
	        		}
		        });
	      	}
	        return false;
		});

		$('#edit-form').on('submit', 'button', function(e) {
			
			e.preventDefault();
			var error = false;
			var matricule = $('#matricule').val();
			var id = $('#id').val();

			if (matricule.length == 0) {
				error = true;
				$('#matricule_error').show().fadeOut(9000);
			}
			
			console.log('id');
			if (error == false) {
		        $.ajax({
		        	header: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
		            type: "PUT",
					url: form.attr('action'),
					contentType: false,
					cache: false,
					processData: false,
					cache: false,
		            data: new FormData(form[0]),
		            success: function(data) {
		            	console.log(data);
		            	$('#comptable'+data['id']+' #matricule').text(data['matricule']);
		            },
		            error: function(data){
		            	alert('No ok');
	        		}
		        });
	      	}
	        return false;
		});

});