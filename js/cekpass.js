$(document).ready(function()
	  {

	     $("#cekpass").validate({

	 	

	        rules:{

	                password:{required: true, minlength: 5},
	                corfirmpassword:{required: true, equalTo: "#pass"}

	              },

	 

	        messages:{

	                   password:{required: 'Password harus diisi', minlength: 'Password minimal 5 karakter'},
	                   corfirmpassword:{required: 'Tidak boleh kosong', equalTo: 'Isi harus sama dengan Password'}

	              },
	         
	          });

	    

	  });

