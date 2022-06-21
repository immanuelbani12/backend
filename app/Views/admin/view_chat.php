<!DOCTYPE html>
<html lang="en">
	
<!--begin::Head-->
<head>
	<title>Apadok - Chat</title>
	<?php echo view('partials/_css');?>
	<link href="<?= base_url('/css/parsley.css')?>" rel="stylesheet" type="text/css" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled">

	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

				<!--begin::Header-->
				<?php echo view('partials/_header');?>
				<!--end::Header-->

				<!--begin::Toolbar-->
				<div class="toolbar py-5 py-lg-5" id="kt_toolbar">
					<!--begin::Container-->
					<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
						
							<div class="col-md-3">
								<!--begin::Page title-->
								<div class="page-title d-flex flex-column me-3">
									<!--begin::Title-->
									<h1 class="d-flex text-dark fw-bolder my-1 fs-3">Chat User</h1>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-gray-600">
											<a href="../../demo11/dist/index.html" class="text-gray-600 text-hover-primary">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-gray-600">Chat</li>
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
							</div>
							
							<div class="col-md-9">
								<center><h1><?= $nama_institusi ?></h1></center>
							</div>
					</div>
					<!--end::Container-->
				</div>
				<!--end::Toolbar-->

				<!--begin::Container-->
				<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
											
					<!--begin::Aside-->
					<?php echo view('partials/_sidebar');?>
					<!--end::Aside-->
						
					<!--begin::Post-->
					<div class="content flex-row-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Layout-->
							<div class="d-flex flex-column flex-lg-row">
								<!--begin::Sidebar-->
								<div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
									<!--begin::Contacts-->
									<div class="card card-flush">
										<!--begin::Card header-->
										<div class="card-header pt-7" id="kt_chat_contacts_header">
											<!--begin::Form-->
											<form class="w-100 position-relative" autocomplete="off">
												<!--begin::Icon-->
												<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->
												<!--end::Icon-->
												<!--begin::Input-->
												<input type="text" class="form-control form-control-solid px-15" id="search_user" onkeyup="searchUser()" name="search" value="" placeholder="Cari nama atau nomor telepon" />
												<!--end::Input-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-5" id="kt_chat_contacts_body">
											<!--begin::List-->
											<div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" id="list_users" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px">
												<?php foreach ($list_users as $row){ ?>

												<!--begin::User-->
												<div class="d-flex flex-stack py-4 select_user" style="cursor: pointer">
													<!--begin::Details-->
													<div class="d-flex align-items-center">
														<!--begin::Avatar-->
														<div class="symbol symbol-45px symbol-circle">
															<span class="symbol-label bg-light-primary text-primary fs-6 fw-bolder"><?= substr($row->nama, 0, 1) ?></span>
															
															<?php if ($row->login_status == '1'){ ?>
															<div class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2"></div>
															<?php }?>
														</div>
														<!--end::Avatar-->
														<!--begin::Details-->
														<div class="ms-5 detailUser">
															<input type="hidden" class="idLogin" value="<?= $row->id_login ?>">
															<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2 namaUser"><?= $row->nama ?></a>
															<div class="fw-bold text-muted usernameUser"><?= $row->username ?></div>
														</div>
														<!--end::Details-->
													</div>
													<!--end::Details-->
													<!--begin::Lat seen-->
													<input type="hidden" class="countStatus-<?= $row->id_login ?>" value="<?= $row->count_status; ?>" >
													<div class="d-flex flex-column align-items-end ms-2 notifChat-<?= $row->id_login ?>">
														<!-- <span class="text-muted fs-7 mb-1">1 day</span> -->
														<?php if ($row->count_status != '0'){ ?>
															<span class="badge badge-sm badge-circle badge-light-success"><?= $row->count_status ?></span>
														<?php }?>
													</div>
													<!--end::Lat seen-->
												</div>
												<!--end::User-->
												<!--begin::Separator-->
												<div class="separator separator-dashed d-none"></div>
												<!--end::Separator-->
												<?php }; ?>
											</div>
											<!--end::List-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Contacts-->
								</div>
								<!--end::Sidebar-->
								<!--begin::Content-->
								<div id="message_area" class="flex-lg-row-fluid ms-lg-7 ms-xl-10" style="display: none">
									<!--begin::Messenger-->
									<div class="card" id="kt_chat_messenger">
										<!--begin::Card header-->
										<div class="card-header" id="kt_chat_messenger_header">
											<!--begin::Title-->
											<div class="card-title">
												<!--begin::User-->
												<div class="d-flex justify-content-center flex-column me-3">
													<a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1" id="message_name" >Brian Cox</a>
													<!--begin::Info-->
													<div class="mb-0 lh-1">
														<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
														<span class="fs-7 fw-bold text-muted">Active</span>
													</div>
													<!--end::Info-->
												</div>
												<!--end::User-->
											</div>
											<!--end::Title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body" id="kt_chat_messenger_body">
											<!--begin::Messages-->
											<div id="message_body" class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px">
												
											</div>
											<!--end::Messages-->
										</div>
										<!--end::Card body-->
										<!--begin::Card footer-->
										<div class="card-footer pt-4" id="kt_chat_messenger_footer">
											<!--begin:Toolbar-->
											<form method="post" id="chat_form" data-parsley-validate>
												<textarea class="form-control form-control-solid mb-3" rows="3"
													id="chat_message" name="chat_message" placeholder="Type a message"
													data-parsley-pattern="/^[a-zA-Z0-9 ]+$/" 
													data-parsley-maxlenght="250" required></textarea>
												<button class="btn btn-primary col-md-12" type="submit" id="send">Kirim</button>
											</form>
											<!--end::Toolbar-->
										</div>
										<!--end::Card footer-->
									</div>
									<!--end::Messenger-->
								</div>
								<!--end::Content-->
							</div>
							<!--end::Layout-->
						</div>
						<!--end::Container-->

					</div>
					<!--end::Post-->
				</div>
				<!--end::Container-->

				<!--begin::Footer-->
				<?php echo view('partials/_footer');?>
				<!--end::Footer-->

			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->
	<!--end::Main-->

	<!--begin::Scrolltop-->
	<?php echo view('partials/_scrolltop');?>
	<!--end::Scrolltop-->

	<!--begin::Javascript-->
	<?php echo view('partials/_javascripts');?>
	<script src="<?= base_url('/js/parsley.min.js')?>"></script>
	<!--begin::Page Custom Javascript(used by this page)-->
	
	<script>
		function searchUser(){
			var input = $('#search_user');
			var filter = input.val().toUpperCase();
			var list = document.getElementById('list_users');
			var users = document.getElementsByClassName('select_user');

			// console.log(users);

			for(i=0; i<users.length; i++){
				var namaUser = users[i].getElementsByClassName('namaUser')[0].innerHTML.toUpperCase();
				var usernameUser = users[i].getElementsByClassName('usernameUser')[0].innerHTML.toUpperCase();

				if(namaUser.indexOf(filter) > - 1 || usernameUser.indexOf(filter) > - 1){
					users[i].style.setProperty('display', '', '');
					console.log(users[i]);
				}
				else {
					users[i].style.setProperty('display', 'none', 'important');
				}
			}
		}

		function timeDifference(timestamp) {
			var msPerMinute = 60 * 1000;
			var msPerHour = msPerMinute * 60;
			var msPerDay = msPerHour * 24;
			var msPerMonth = msPerDay * 30;
			var msPerYear = msPerDay * 365;

			var elapsed = Math.round(new Date().getTime() - new Date(timestamp).getTime());

			if (elapsed < msPerMinute) {
				return Math.round(elapsed/1000) + ' detik yang lalu';   
			}

			else if (elapsed < msPerHour) {
				return Math.round(elapsed/msPerMinute) + ' menit yang lalu';   
			}

			else if (elapsed < msPerDay ) {
				return Math.round(elapsed/msPerHour ) + ' jam yang lalu';   
			}

			else if (elapsed < msPerMonth) {
				return Math.round(elapsed/msPerDay) + ' hari yang lalu';   
			}

			else if (elapsed < msPerYear) {
				return Math.round(elapsed/msPerMonth) + ' bulan yang lalu';   
			}

			else {
				return Math.round(elapsed/msPerYear ) + ' tahun yang lalu';   
			}
		}

		var receiver_login_id = '';
		var conn = new WebSocket("ws://178.128.25.139:31686/?id_login=<?= $id_login ?>");
		
		conn.onopen = function(e) {
			console.log("Connection established!");
		};

		conn.onmessage = function(e) {
			var data = JSON.parse(e.data);

			if(data.from == 'Saya'){
				align = 'end';

				chat_html = `
				<!--begin::Details-->
				<div class="me-3">
					<span class="text-muted fs-7 mb-1">`+ data.datetime +`</span>
					<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">Saya</a>
				</div>
				<!--end::Details-->
				<!--begin::Avatar-->
				<div class="symbol symbol-45px symbol-circle">
					<span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">S</span>
				</div>
				<!--end::Avatar-->
				`;					
			}
			else {
				align = 'start';

				chat_html = `
				<!--begin::Avatar-->
				<div class="symbol symbol-45px symbol-circle">
					<span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">M</span>
				</div>
				<!--end::Avatar-->
				<!--begin::Details-->
				<div class="ms-3">
					<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">`+  data.from +`</a>
					<span class="text-muted fs-7 mb-1">`+ data.datetime +`</span>
				</div>
				<!--end::Details-->
				`;
			}

			// jika usernya membuka room chat
			if(receiver_login_id == data.from_login_id || data.from == 'Saya') {
				var body_html = `
					<div class="d-flex justify-content-`+ align +` mb-10">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column align-items-`+ align +`">
							<!--begin::User-->
							<div class="d-flex align-items-center mb-2">
								`+ chat_html +`
							</div>
							<!--end::User-->
							<!--begin::Text-->
							<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-`+ align +`" data-kt-element="message-text" >`+ data.message +`</div>
							<!--end::Text-->
						</div>
						<!--end::Wrapper-->
					</div>
				`;

				$('#message_body').append(body_html);
				$('#message_body').scrollTop($('#message_body')[0].scrollHeight);
				$('#chat_message').val('');
			}
			else {
				var count_chat = $('.countStatus-'+data.from_login_id).val();

				count_chat = parseInt(count_chat) + 1;

				$('.countStatus-'+data.from_login_id).val(count_chat);
				$('.notifChat-'+data.from_login_id).html('<span class="badge badge-sm badge-circle badge-light-success">'+ count_chat +'</span>');
			}
			
		};

		conn.onclose = function() {
			console.log("Connection close");
		};

		$('.select_user').on('click', function() {
            var $item = $(this).closest("div");

			receiver_login_id = $item.find(".idLogin").val()
			var receiver_name = $item.find(".namaUser").text()
			var from_login_id = <?= $id_login ?>

			$.ajax({
				url: '<?= site_url('/Chat/getChat')?>',
				method: 'POST',
				data: {
					to_login_id: receiver_login_id, 
					from_login_id: from_login_id
				},
				dataType: 'json',
				success: function (data) {
					var body_html = '';

					if(data.length > 0) {
						for(var count = 0; count < data.length; count++) {
							var align = '';
							var chat_html = '';

							if(data[count].from_login_id == from_login_id){
								align = 'end';

								chat_html = `
								<!--begin::Details-->
								<div class="me-3">
									<span class="text-muted fs-7 mb-1">`+ data[count].created_at +`</span>
									<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">Saya</a>
								</div>
								<!--end::Details-->
								<!--begin::Avatar-->
								<div class="symbol symbol-45px symbol-circle">
									<span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">S</span>
								</div>
								<!--end::Avatar-->
								`;					
							}
							else {
								align = 'start';

								chat_html = `
								<!--begin::Avatar-->
								<div class="symbol symbol-45px symbol-circle">
									<span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">M</span>
								</div>
								<!--end::Avatar-->
								<!--begin::Details-->
								<div class="ms-3">
									<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">`+  data[count].from_user_name +`</a>
									<span class="text-muted fs-7 mb-1">`+ data[count].created_at +`</span>
								</div>
								<!--end::Details-->
								`;
							}

							body_html += `
								<div class="d-flex justify-content-`+ align +` mb-10">
									<!--begin::Wrapper-->
									<div class="d-flex flex-column align-items-`+ align +`">
										<!--begin::User-->
										<div class="d-flex align-items-center mb-2">
											`+ chat_html +`
										</div>
										<!--end::User-->
										<!--begin::Text-->
										<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-`+ align +`" data-kt-element="message-text" >`+ data[count].message +`</div>
										<!--end::Text-->
									</div>
									<!--end::Wrapper-->
								</div>
							`;
						}
					}
					// remove notif
					$('.countStatus-'+receiver_login_id).val(0);
					$('.notifChat-'+receiver_login_id).html('');

					// load message
					$('#message_name').text(receiver_name);
					$('#message_area').show();
					// $('#message_area').scrollTop(100);
					$('#message_body').html(body_html);
					$('#message_body').scrollTop($('#message_body')[0].scrollHeight);
				}
			});
        });
		
		$('#chat_form').on('submit', function (e) {
			e.preventDefault();

			var id_login = '<?= $id_login ?>'
			var message = $('#chat_message').val();

			var data = {
				from_login_id: id_login,
				message: message,
				to_login_id: receiver_login_id
			}

			// console.log(data);

			conn.send(JSON.stringify(data));

		});
	</script>
	
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>