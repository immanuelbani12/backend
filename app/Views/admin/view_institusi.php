<!DOCTYPE html>
<html lang="en">
	
<!--begin::Head-->
<head>
	<title>Apadok - Institusi</title>
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
							<h1 class="d-flex text-dark fw-bolder my-1 fs-3">List Institusi</h1>
							<!--end::Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
								<!--begin::Item-->
								<li class="breadcrumb-item text-gray-600">
									<a href="../../demo11/dist/index.html" class="text-gray-600 text-hover-primary">Home</a>
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="breadcrumb-item text-gray-600">Institusi</li>
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
										<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari Institusi" />
									</div>
									<!--end::Search-->
								</div>
								<!--begin::Card title-->
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<!--begin::Toolbar-->
									<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
										<!--begin::Add user-->
										<button type="button" id="addButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->Tambah Institusi</button>
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
													<h2 class="fw-bolder" >Data Institusi</h2>
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
													<form id="kt_modal_add_user_form" class="form" method="post" action="<?= site_url('Institusi/add') ?>" enctype="multipart/form-data">
														<input type="hidden" name="id_login" id="id_login">
														<input type="hidden" name="id_institusi" id="id_institusi">
														<!--begin::Scroll-->
														<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">Nama Institusi</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="nama" id="nama" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nama Institusi" autocomplete="off"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">Jenis</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select class="form-select form-select-solid" name="id_jenis" id="id_jenis" data-control="select2" data-placeholder="Select an option">
																	<option></option>
																	<?php foreach ($jenis as $row): ?>
																		<option value="<?= $row->id_jenis ?>"><?= $row->nama_jenis ?></option>
																	<?php endforeach; ?>
																</select>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">Email</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email" autocomplete="off"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">Nomor Telepon</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="no_telp" name="no_telp" id="no_telp" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nomor Telepon" autocomplete="off"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">Password</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="password" required name="password" id="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password" autocomplete="off"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">Alamat</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="alamat" id="alamat" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Alamat" autocomplete="off"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fw-bold fs-6 mb-2">Logo</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="file" name="logo" id="logo" class="form-control form-control-solid mb-3 mb-lg-0"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Scroll-->
														<!--begin::Actions-->
														<div class="text-center pt-15">
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
											<th>Kode Group</th>
											<th>Nama Institusi</th>
											<th>Jenis</th>
											<th>Email</th>
											<th>Nomor Telepon</th>
											<th>Alamat</th>
											<th class="text-end min-w-100px">Actions</th>
										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<!--begin::Table row-->
										<?php foreach ($institusi as $row):?>
										<tr>
											<input type="hidden" name="id_institusi" class="idInstitusi" value="<?=  $row->id_institusi; ?>">
											<input type="hidden" name="id_login" class="idLogin" value="<?=  $row->id_login; ?>">
											<input type="hidden" name="id_jenis" class="idJenis" value="<?=  $row->id_jenis; ?>">
											<td>
												<div class="badge badge-light-primary fw-bolder kodeGroup"><?= $row->kode_group; ?></div>
											</td>
											<td class="namaInstitusi"><?= $row->nama_institusi; ?></td>
											<td>
												<div class="badge badge-success fw-bolder jenisInstitusi"><?= $row->nama_jenis; ?></div>
											</td>
											<td>
												<div class="badge badge-light fw-bolder emailInstitusi"><?= $row->email_institusi; ?></div>
											</td>
											<td class="noTelp"><?= $row->no_telp_institusi; ?></td>
											<td class='alamatInstitusi'>
												<?= $row->alamat_institusi; ?>
											</td>
											<!--begin::Action=-->
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
	<script src="<?= base_url('/js/custom/apps/user-management/users/institusi/table.js')?>"></script>
	<script src="<?= base_url('/js/custom/apps/user-management/users/institusi/add.js')?>"></script>
	
	<script>
		<?php
		$session = session(); 
		if (isset($_SESSION['success'])){?>
			// Show popup confirmation 
			Swal.fire({
				text: "<?= $_SESSION['success']; ?>",
				icon: "success",
				buttonsStyling: false,
				confirmButtonText: "Baik, mengerti!",
				customClass: {
					confirmButton: "btn btn-primary"
				}
			});
		<?php }
		else if (isset($_SESSION['error'])) { ?>
			// Show popup confirmation 
			Swal.fire({
				text: "<?= $_SESSION['error']; ?>",
				icon: "error",
				buttonsStyling: false,
				confirmButtonText: "Baik, mengerti!",
				customClass: {
					confirmButton: "btn btn-primary"
				}
			});
		<?php } ?>

		$('.btnEdit').on('click', function() {
			console.log('edit');
            $('.form').attr('action', "<?php echo site_url('/Institusi/update')?>");
            var $item = $(this).closest("tr");
            $("#id_login").val($.trim($item.find(".idLogin").val()));
            $("#id_institusi").val($.trim($item.find(".idInstitusi").val()));
            $("#nama").val($.trim($item.find(".namaInstitusi").text()));
            $("#email").val($.trim($item.find(".emailInstitusi").text()));
			$("#id_jenis").select2("val", $item.find(".idJenis").val());
            $("#no_telp").val($.trim($item.find(".noTelp").text()));
            $("#alamat").val($.trim($item.find(".alamatInstitusi").text()));
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
                const id_institusi = $.trim($item.find(".idInstitusi").val());
                const id_login  = $.trim($item.find(".idLogin").val());
                const nama      = $.trim($item.find(".namaInstitusi").text());

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Apakah anda yakin ingin menghapus data institusi dengan nama " + nama + "?",
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
                            url: "<?= site_url('/Institusi/delete/'); ?>" + id_institusi + "/" + id_login,
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