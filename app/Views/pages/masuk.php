<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
	<title>Apadok - Masuk</title>
	<?php echo view('partials/_css');?>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body">
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(<?= base_url('/media/illustrations/sketchy-1/14.png')?>)">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<a href="../../demo11/dist/index.html" class="mb-12">
					<img alt="Logo" src="<?= base_url('/media/logos/apadok.png')?>" class="h-80px" />
				</a>
				<!--end::Logo-->
				<!--begin::Wrapper-->
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<!--begin::Form-->
					<form class="form w-100" id="kt_sign_in_form" action="<?php echo site_url('/Auth/login/')?>" method="post">
						<!--begin::Heading-->
						<div class="text-center mb-10">
							<!--begin::Title-->
							<h1 class="text-dark mb-3">Masuk</h1>
							<!--end::Title-->
						</div>
						<!--begin::Heading-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="form-label fs-6 fw-bolder text-dark">Username</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack mb-2">
								<!--begin::Label-->
								<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
								<!--end::Label-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Input-->
							<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Actions-->
						<div class="text-center">
							<!--begin::Submit button-->
							<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
								<span class="indicator-label">Lanjutkan</span>
								<span class="indicator-progress">Harap tunggu...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<!--end::Submit button-->
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
			<!--begin::Footer-->
			<div class="d-flex flex-center flex-column-auto p-10">
			</div>
			<!--end::Footer-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
	<!--end::Root-->
	<?php echo view('partials/_javascripts');?>
	
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="<?= base_url('/js/custom/authentication/sign-in/general.js')?>"></script>
	<!--end::Page Custom Javascript-->
</body>
<!--end::Body-->
</html>