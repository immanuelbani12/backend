<!DOCTYPE html>
<html lang="en">
	
<!--begin::Head-->
<head>
	<title>Apadok - Artikel</title>
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
									<h1 class="d-flex text-dark fw-bolder my-1 fs-3">List Artikel</h1>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-gray-600">
											<a href="../../demo11/dist/index.html" class="text-gray-600 text-hover-primary">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-gray-600">Artikel</li>
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
							</div>
							
							<div class="col-md-9">
								<center><h1><?php //echo $institusi[0]->nama_institusi ?></h1></center>
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
										<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari Artikel" />
									</div>
									<!--end::Search-->
								</div>
								<!--begin::Card title-->
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<!--begin::Toolbar-->
									<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
										<!--begin::Add user-->
										<a type="button" class="btn btn-primary" href="<?= site_url('Artikel/tambahArtikel') ?>">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->Tambah Artikel</a>
										<!--end::Add artikel-->
									</div>
									<!--end::Toolbar-->
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
											<th class="min-w-125px">Judul</th>	
											<th class="min-w-125px">Kategori</th>
											<th class="min-w-125px">Jenis</th>
											<th class="text-end min-w-100px">Actions</th>
										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<!--begin::Table row-->
										<?php foreach ($artikel as $row):

										switch($row->kategori_artikel) {
											case '1': $kategori = 'Stroke'; 
											break;
											case '2': $kategori = 'Diabetes';
											break;
											case '3': $kategori = 'Kardiovaskular';
											break;
											default: $kategori = 'Kebugaran';
										}

										$jenis = $row->jenis_artikel == '1' ? 'Text' : 'Video';
										?>
										<tr>
											<input type="hidden" class="idArtikel" value="<?=  $row->id_artikel; ?>">
											<td class="judulArtikel"><?= $row->judul_artikel; ?></td>
											<td class="kategoriArtikel"><?= $kategori; ?></td>
											<td>
												<div class="badge badge-light fw-bolder jenisArtikel"><?= $jenis; ?></div>
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
														<a href="<?= site_url('Artikel/editArtikel/'.$row->id_artikel) ?>" class="menu-link px-3">Edit</a>
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
	<script src="<?= base_url('/js/custom/apps/user-management/users/artikel/table.js')?>"></script>
	
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
                const id_artikel= $.trim($item.find(".idArtikel").val());
                const judul		= $.trim($item.find(".judulArtikel").text());

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Apakah anda yakin ingin menghapus artikel dengan judul " + judul + "?",
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
                            url: "<?= site_url('/Artikel/delete/'); ?>" + id_artikel,
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