<script src="<?= base_url() ?>assets/js/vendor/jquery-3.5.0.min.js"></script>
<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.odometer.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.accrue.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.appear.js"></script>
<script src="<?= base_url() ?>assets/js/jarallax.min.js"></script>
<script src="<?= base_url() ?>assets/js/slick.min.js"></script>
<script src="<?= base_url() ?>assets/js/ajax-form.js"></script>
<script src="<?= base_url() ?>assets/js/wow.min.js"></script>
<script src="<?= base_url() ?>assets/js/aos.js"></script>
<script src="<?= base_url() ?>assets/js/plugins.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>

<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(200, 0).slideUp(200, function() {
			$(this).remove();
		});
	}, 4000);
</script>
<script>
	$(document).ready(function() {

		$(".inc").click(function() {
			var id = $(this).data('id');
			var x = $("#amt" + id).val();
			$("#amt" + id).val(++x);
		});
		$(".dec").click(function() {
			var id = $(this).data('id');
			var x = $("#amt" + id).val();
			$("#amt" + id).val(--x);
		});

		$("#regbutton").click(function() {
			$("#REGModal").modal('show');
			$('#myModal').modal('hide');

		});

		$("#loginbutton").click(function() {
			$("#REGModal").modal('hide');;
			$('#myModal').modal('show');

		});

		$(document).on('click', '.removeCarthm', function() {
			var pid = $(this).data('id');
			//  console.log(pid);
			$.ajax({
				method: "POST",
				url: "<?= base_url('Index/delete_item') ?>",
				data: {
					pid: pid
				},
				success: function(response) {
					load_product();
					alert('Item removed');
					location.reload();
				}
			});
		});

		$('.savecart').click(function() {
			var pid = [];
			var oid = [];
			var qty = [];
			var ch = 0;
			$(':checkbox:checked').each(function(i) {
				ch++;
			});
			if (ch == 0) {
				alert('Select Product')
			} else {
				$(':checkbox:checked').each(function(i) {
					var rowid = $(this).data('id');
					// pid[i] = $(this).data('id');
					oid = $(this).data('orpahneid');
					qty = $('.qtysidecart' + rowid).val();

					$.ajax({
						method: "POST",
						url: "<?= base_url('Index/addToCart') ?>",
						data: {
							pid: rowid,
							oid: oid,
							qty: qty
						},
						success: function(response) {

							window.location = "<?= base_url('Index/cart') ?>";
						}
					});
				});
			}
		});

		function load_product() {
			$.ajax({
				url: '<?= base_url("Index/cart") ?>',
				method: 'POST',
				success: function(response) {
					$('#cart').html(response);

				}
			});
			$.ajax({
				url: '<?= base_url("Index/cartAjax") ?>',
				method: 'POST',
				success: function(response) {
					//   $('#cart').html(response);
					$('#cart2').html(response);

				}
			});
			$.ajax({
				url: '<?= base_url("Index/cartAjax2") ?>',
				method: 'POST',
				success: function(response) {
					$('#cart3').html(response);

				}
			});

			$.ajax({
				url: '<?= base_url("Index/fetch_totalitems") ?>',
				method: 'POST',
				success: function(response) {
					console.log(response);
					$('#totalitem').text(response);
					$('#totalitems').text(response);
				}
			});
			$.ajax({
				url: '<?= base_url("Index/fetch_totalamount") ?>',
				method: 'POST',
				success: function(response) {
					$('#totalamount').val(response);
					$('#totalpricehm').text('Rs. ' + response);
				}
			});
			load_checkoutbar();
			promo();
		}


		
		<?php
		if ($this->session->has_userdata('regmsg')) {
		?> $('#myModal').modal('show');
		<?php
			$this->session->unset_userdata('regmsg');
		} elseif ($this->session->has_userdata('loginmsg')) {
		?> $('#myModal').modal('show');
		<?php
			$this->session->unset_userdata('loginmsg');
		} else {
		}
		if ($this->session->has_userdata('checkout')) {
		?> $('#myModal').modal('show');
		<?php
			$this->session->unset_userdata('checkout');
		}
		?>


		var err = [];
		$('#company_contact').keyup(function() {

			var contact = $('#company_contact').val();

			if (!$('#company_contact').val()) {
				err.push('true');
				$('#mainphone').text('Company Contact is required');
			} else if (IsMobile(contact) == false) {
				err.push('true');
				$('#mainphone').text('Your Number is Invalid. Should contain 10 digit contact no.');
				// $('#cmp_main').text(contact);

			} else {
				err = [];
				$('#mainphone').text('');

			}
		});

		function IsMobile(contact) {

			contact = contact.replace(/\D/g, '');
			$('#company_contact').val(contact);

			var regex = /^(\+\d{1,3}[- ]?)?\d{10}$/;
			if (!regex.test(contact)) {
				return false;
			} else {
				return true;
			}
		}


		var frm = $('#login_form');
		frm.submit(function(e) {
			e.preventDefault(e);

			var formData = new FormData(this);

			$.ajax({
				async: true,
				type: frm.attr('method'),
				url: frm.attr('action'),
				data: formData,
				cache: false,
				processData: false,
				contentType: false,

				success: function(data) {
					console.log(data);
					if(data == 1){
						alert("Login Successfull");
						location.reload();
					}else{
						alert(data);
					}
					
					
				},
				error: function(request, status, error) {
					console.log("error")
				}
			});
		});


	});
</script>