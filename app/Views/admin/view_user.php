<!DOCTYPE html>
<html lang="en">
	
<!--begin::Head-->
<head>
	<title>Apadok - Pasien</title>
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
						<!--begin::Page title-->
						<div class="page-title d-flex flex-column me-3">
							<!--begin::Title-->
							<h1 class="d-flex text-dark fw-bolder my-1 fs-3">List Pasien</h1>
							<!--end::Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
								<!--begin::Item-->
								<li class="breadcrumb-item text-gray-600">
									<a href="../../demo11/dist/index.html" class="text-gray-600 text-hover-primary">Home</a>
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="breadcrumb-item text-gray-600">Pasien</li>
								<!--end::Item-->
							</ul>
							<!--end::Breadcrumb-->
						</div>
						<!--end::Page title-->
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

						<!--begin::Card-->
						<div class="card">
							<!--begin::Card header-->
							<div class="card-header border-0 pt-6">
								<!--begin::Card title-->
								<div class="card-title">
									<!--begin::Search-->
									<div class="d-flex align-items-center position-relative my-1">
										<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
										<span class="svg-icon svg-icon-1 position-absolute ms-6">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
												<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari Pasien" />
									</div>
									<!--end::Search-->
								</div>
								<!--begin::Card title-->
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<!--begin::Toolbar-->
									<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
										<!--begin::Export-->
										<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upload">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
													<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
													<path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
												</svg>
											</span>
											<!--end::Svg Icon-->Unggah Data</button>
											<!--end::Export-->
										<!--begin::Add user-->
										<button type="button" id="addButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->Tambah Pasien</button>
										<!--end::Add user-->
									</div>
									<!--end::Toolbar-->
									<!--begin::Modal - Add task-->
									<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-650px">
											<!--begin::Modal content-->
											<div class="modal-content">
												<!--begin::Modal header-->
												<div class="modal-header" id="kt_modal_add_user_header">
													<!--begin::Modal title-->
													<h2 class="fw-bolder" >Data Pasien</h2>
													<!--end::Modal title-->
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
																<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</div>
													<!--end::Close-->
												</div>
												<!--end::Modal header-->
												<!--begin::Modal body-->
												<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
													<!--begin::Form-->
													<form id="kt_modal_add_user_form" class="form" method="post" action="<?= site_url('User/add') ?>">
														<!--begin::Scroll-->
														<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">Nama Pasien</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="nama" id="nama" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nama Pasien" autocomplete="off"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">Nomor Telepon</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="no_telp" id="no_telp" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nomor Telepon" autocomplete="off"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<!-- <div class="fv-row mb-7"> -->
																<!--begin::Label-->
																<!-- <label class="required fw-bold fs-6 mb-2">Password</label> -->
																<!--end::Label-->
																<!--begin::Input-->
																<!-- <input type="password" required name="password" id="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password" autocomplete="off"/> -->
																<!--end::Input-->
															<!-- </div> -->
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fw-bold fs-6 mb-2">Tanggal Lahir</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tanggal Lahir" autocomplete="off"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mb-2">Jenis Kelamin</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select name="jenis_kelamin" id="jenis_kelamin" data-control="select2" data-placeholder="Jenis Kelamin" data-hide-search="true" class="form-select form-select-solid fw-bolder">
																	<option></option>
																	<option value="L">Laki-Laki</option>
																	<option value="P">Perempuan</option>
																</select>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fw-bold fs-6 mb-2">Tinggi Badan</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="number" name="tinggi_badan" id="tinggi_badan" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tinggi Badan" autocomplete="off"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fw-bold fs-6 mb-2">Berat Badan</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="number" name="berat_badan" id="berat_badan" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Berat Badan" autocomplete="off"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Scroll-->
														<!--begin::Actions-->
														<div class="text-center pt-15">
															<input type="hidden" name="id_login" id="id_login">
															<input type="hidden" name="id_user" id="id_user">

															<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Batalkan</button>
															<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
																<span class="indicator-label">Simpan</span>
																<span class="indicator-progress">Please wait...
																<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
															</button>
														</div>
														<!--end::Actions-->
													</form>
													<!--end::Form-->
												</div>
												<!--end::Modal body-->
											</div>
											<!--end::Modal content-->
										</div>
										<!--end::Modal dialog-->
									</div>
									<!--end::Modal - Add task-->
									<!--begin::Modal - Upload-->
									<div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-650px">
											<!--begin::Modal content-->
											<div class="modal-content">
												<!--begin::Modal header-->
												<div class="modal-header" id="kt_modal_upload_header">
													<!--begin::Modal title-->
													<h2 class="fw-bolder" >Unggah Data</h2>
													<!--end::Modal title-->
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-upload-modal-action="close">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
																<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</div>
													<!--end::Close-->
												</div>
												<!--end::Modal header-->
												<!--begin::Modal body-->
												<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
														<!--begin::Actions-->
													<form id="kt_modal_upload_form" class="form" method="post" action="<?= site_url('User/UserUpload') ?>" enctype="multipart/form-data">
														<!--begin::Input group-->
														<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fw-bold fs-6 mb-2">Unduh Template</label>
																<!--end::Label-->
																<a href="<?= site_url('User/UserTemplate') ?>"><button type="button" class="btn btn-light-primary me-3 form-control" >
																<span class="svg-icon svg-icon-muted svg-icon-2hx">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(0 -1 -1 0 12.75 19.75)" fill="black"/>
																		<path d="M12.0573 17.8813L13.5203 16.1256C13.9121 15.6554 14.6232 15.6232 15.056 16.056C15.4457 16.4457 15.4641 17.0716 15.0979 17.4836L12.4974 20.4092C12.0996 20.8567 11.4004 20.8567 11.0026 20.4092L8.40206 17.4836C8.0359 17.0716 8.0543 16.4457 8.44401 16.056C8.87683 15.6232 9.58785 15.6554 9.9797 16.1256L11.4427 17.8813C11.6026 18.0732 11.8974 18.0732 12.0573 17.8813Z" fill="black"/>
																		<path d="M18.75 15.75H17.75C17.1977 15.75 16.75 15.3023 16.75 14.75C16.75 14.1977 17.1977 13.75 17.75 13.75C18.3023 13.75 18.75 13.3023 18.75 12.75V5.75C18.75 5.19771 18.3023 4.75 17.75 4.75L5.75 4.75C5.19772 4.75 4.75 5.19771 4.75 5.75V12.75C4.75 13.3023 5.19771 13.75 5.75 13.75C6.30229 13.75 6.75 14.1977 6.75 14.75C6.75 15.3023 6.30229 15.75 5.75 15.75H4.75C3.64543 15.75 2.75 14.8546 2.75 13.75V4.75C2.75 3.64543 3.64543 2.75 4.75 2.75L18.75 2.75C19.8546 2.75 20.75 3.64543 20.75 4.75V13.75C20.75 14.8546 19.8546 15.75 18.75 15.75Z" fill="#C4C4C4"/>
																	</svg>
																</span>
																<!--end::Svg Icon-->
																Unduh</button></a>
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fw-bold fs-6 mb-2">Unggah Data</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="file" name="data_pasien" id="data_pasien" class="form-control form-control-solid mb-3 mb-lg-0"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<div class="text-center pt-15">
																<input type="hidden" name="id_login" id="id_login">
																<input type="hidden" name="id_user" id="id_user">

																<button type="reset" class="btn btn-light me-3" data-kt-upload-modal-action="cancel">Batalkan</button>
																<button type="submit" class="btn btn-primary" data-kt-upload-modal-action="submit">
																	<span class="indicator-label">Simpan</span>
																	<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																</button>
															</div>
														<!--end::Actions-->
													</form>
													<!--end::Form-->
												</div>
												<!--end::Modal body-->
											</div>
											<!--end::Modal content-->
										</div>
										<!--end::Modal dialog-->
									</div>
									<!--end::Modal - Upload-->
								</div>
								<!--end::Card toolbar-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body py-4">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
									<!--begin::Table head-->
									<thead>
										<!--begin::Table row-->
										<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
											<th class="min-w-125px">Nama Pasien</th>
											<th class="min-w-125px">Nomor Telepon</th>
											<!-- <th class="min-w-125px">Tanggal Lahir</th>
											<th class="min-w-125px">Jenis Kelamin</th>
											<th class="min-w-125px">Tinggi Badan</th>
											<th class="min-w-125px">Berat Badan</th> -->
											<th class="text-end min-w-100px">Actions</th>
										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<!--begin::Table row-->
										<?php foreach ($pasien as $row):?>
										<tr>
											<input type="hidden" class="idPasien" value="<?=  $row->id_user; ?>">
											<input type="hidden" class="idLogin" value="<?=  $row->id_login; ?>">
											<td class="namaPasien"><?= $row->nama_user; ?></td>
											<td>
												<div class="badge badge-light fw-bolder telpPasien"><?= $row->no_telp; ?></div>
											</td>
											<td class="text-end">
												<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
												<span class="svg-icon svg-icon-5 m-0">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon--></a>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="<?= site_url('User/DetailUser/'.$row->id_user) ?>" class="menu-link px-3">Lihat</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user" class="menu-link px-3 btnEdit">Edit</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Hapus</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
											</td>
											<!--end::Action=-->
										</tr>
										<!--end::Table row-->
										<?php endforeach; ?>
									</tbody>
									<!--end::Table body-->
								</table>
								<!--end::Table-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Card-->

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
	<script src="<?= base_url('/js/custom/apps/user-management/users/pasien/table.js')?>"></script>
	<script src="<?= base_url('/js/custom/apps/user-management/users/pasien/add.js')?>"></script>
	<script src="<?= base_url('/js/custom/apps/user-management/users/pasien/upload.js')?>"></script>
	
	<script>
		<?php
		$session = session(); 
		if (isset($_SESSION['msg'])){?>
			// Show popup confirmation 
			Swal.fire({
				text: "<?= $_SESSION['msg']; ?>",
				icon: "success",
				buttonsStyling: false,
				confirmButtonText: "Baik, mengerti!",
				customClass: {
					confirmButton: "btn btn-primary"
				}
			});
		<?php }?>

		$('.btnEdit').on('click', function() {
            $('.form').attr('action', "<?php echo site_url('/User/update')?>");
            var $item = $(this).closest("tr");
            $("#id_login").val($.trim($item.find(".idLogin").val()));
            $("#id_user").val($.trim($item.find(".idPasien").val()));
            $("#nama").val($.trim($item.find(".namaPasien").text()));
            $("#no_telp").val($.trim($item.find(".telpPasien").text()));
            $("#tgl_lahir").val($.trim($item.find(".tanggalLahirPasien").text()));
			var jenis_kelamin = $.trim($item.find(".jenisKelaminPasien").text())

			if (jenis_kelamin != "") {
            	$("#jenis_kelamin").val(jenis_kelamin=="Laki-Laki"? "L" : "P").trigger('change');
			}
			
			$("#tinggi_badan").val($.trim($item.find(".tinggiBadanPasien").text()));
			$("#berat_badan").val($.trim($item.find(".beratBadanPasien").text()));
        });

		// Select all delete buttons
		var table = document.getElementById('kt_table_users');
        const deleteButtons = table.querySelectorAll('[data-kt-users-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                var $item = $(this).closest("tr");

                // Get user name
                const id_user = $.trim($item.find(".idPasien").val());
                const id_login  = $.trim($item.find(".idLogin").val());
                const nama      = $.trim($item.find(".namaPasien").text());

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Apakah anda yakin ingin menghapus data pasien dengan nama " + nama + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batal",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: "<?= site_url('/User/delete/'); ?>" + id_user + "/" + id_login,
                            success: function (result) {
                                window.location.href = result;
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: nama + " batal menghapus.",
                            icon: "error",
                        });
                    }
                });
            })
        });
	</script>
	
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>