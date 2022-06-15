<!DOCTYPE html>
<html lang="en">
	
<!--begin::Head-->
<head>
	<title>Apadok - Chat</title>
	<?php echo view('partials/_css');?>
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
												<input type="text" class="form-control form-control-solid px-15" name="search" value="" placeholder="Search by username or email..." />
												<!--end::Input-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-5" id="kt_chat_contacts_body">
											<!--begin::List-->
											<div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px">
												<!--begin::User-->
												<div class="d-flex flex-stack py-4">
													<!--begin::Details-->
													<div class="d-flex align-items-center">
														<!--begin::Avatar-->
														<div class="symbol symbol-45px symbol-circle">
															<span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">M</span>
															<div class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2"></div>
														</div>
														<!--end::Avatar-->
														<!--begin::Details-->
														<div class="ms-5">
															<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody Macy</a>
															<div class="fw-bold text-muted">melody@altbox.com</div>
														</div>
														<!--end::Details-->
													</div>
													<!--end::Details-->
													<!--begin::Lat seen-->
													<div class="d-flex flex-column align-items-end ms-2">
														<span class="text-muted fs-7 mb-1">1 day</span>
														<span class="badge badge-sm badge-circle badge-light-success">6</span>
													</div>
													<!--end::Lat seen-->
												</div>
												<!--end::User-->
												<!--begin::Separator-->
												<div class="separator separator-dashed d-none"></div>
												<!--end::Separator-->
												<!--begin::User-->
												<div class="d-flex flex-stack py-4">
													<!--begin::Details-->
													<div class="d-flex align-items-center">
														<!--begin::Avatar-->
														<div class="symbol symbol-45px symbol-circle">
															<span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">M</span>
															<div class="symbol-badge bg-success start-100 top-100 border-4 h-15px w-15px ms-n2 mt-n2"></div>
														</div>
														<!--end::Avatar-->
														<!--begin::Details-->
														<div class="ms-5">
															<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody Macy</a>
															<div class="fw-bold text-muted">melody@altbox.com</div>
														</div>
														<!--end::Details-->
													</div>
													<!--end::Details-->
													<!--begin::Lat seen-->
													<div class="d-flex flex-column align-items-end ms-2">
														<span class="text-muted fs-7 mb-1">1 day</span>
													</div>
													<!--end::Lat seen-->
												</div>
												<!--end::User-->
											</div>
											<!--end::List-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Contacts-->
								</div>
								<!--end::Sidebar-->
								<!--begin::Content-->
								<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
									<!--begin::Messenger-->
									<div class="card" id="kt_chat_messenger">
										<!--begin::Card header-->
										<div class="card-header" id="kt_chat_messenger_header">
											<!--begin::Title-->
											<div class="card-title">
												<!--begin::User-->
												<div class="d-flex justify-content-center flex-column me-3">
													<a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian Cox</a>
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
											<div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px">
												<!--begin::Message(in)-->
												<div class="d-flex justify-content-start mb-10">
													<!--begin::Wrapper-->
													<div class="d-flex flex-column align-items-start">
														<!--begin::User-->
														<div class="d-flex align-items-center mb-2">
															<!--begin::Avatar-->
															<div class="symbol symbol-45px symbol-circle">
																<span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">M</span>
															</div>
															<!--end::Avatar-->
															<!--begin::Details-->
															<div class="ms-3">
																<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
																<span class="text-muted fs-7 mb-1">2 mins</span>
															</div>
															<!--end::Details-->
														</div>
														<!--end::User-->
														<!--begin::Text-->
														<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">How likely are you to recommend our company to your friends and family ?</div>
														<!--end::Text-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Message(in)-->
												<!--begin::Message(out)-->
												<div class="d-flex justify-content-end mb-10">
													<!--begin::Wrapper-->
													<div class="d-flex flex-column align-items-end">
														<!--begin::User-->
														<div class="d-flex align-items-center mb-2">
															<!--begin::Details-->
															<div class="me-3">
																<span class="text-muted fs-7 mb-1">5 mins</span>
																<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
															</div>
															<!--end::Details-->
															<!--begin::Avatar-->
															<div class="symbol symbol-45px symbol-circle">
																<span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">Y</span>
															</div>
															<!--end::Avatar-->
														</div>
														<!--end::User-->
														<!--begin::Text-->
														<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">Hey there, we’re just writing to let you know that you’ve been subscribed to a repository on GitHub.</div>
														<!--end::Text-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Message(out)-->
											</div>
											<!--end::Messages-->
										</div>
										<!--end::Card body-->
										<!--begin::Card footer-->
										<div class="card-footer pt-4" id="kt_chat_messenger_footer">
											<!--begin::Input-->
											
											<!--end::Input-->
											<!--begin:Toolbar-->
											<div class="d-flex flex-stack">
												<!--begin::Send-->
												<textarea class="form-control form-control-solid form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
												<button class="btn btn-primary" type="button" data-kt-element="send">Kirim</button>
												<!--end::Send-->
											</div>
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
	<!--begin::Page Custom Javascript(used by this page)-->
	
	<script>
	</script>
	
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>