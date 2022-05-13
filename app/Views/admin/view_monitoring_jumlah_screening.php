<!DOCTYPE html>
<html lang="en">
	
<!--begin::Head-->
<head>
	<title>Apadok - Jumlah Screening</title>
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
							<h1 class="d-flex text-dark fw-bolder my-1 fs-3">Monitoring Jumlah Screening</h1>
							<!--end::Title-->
							<!--begin::Breadcrumb-->
							<ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
								<!--begin::Item-->
								<li class="breadcrumb-item text-gray-600">
									<a href="../../demo11/dist/index.html" class="text-gray-600 text-hover-primary">Home</a>
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="breadcrumb-item text-gray-600">Monitoring</li>
								<!--end::Item-->
								<!--begin::Item-->
								<li class="breadcrumb-item text-gray-600">Jumlah Screening</li>
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
						<div class="row" style="--bs-gutter-x: 0;">
							<div class="col-md-6">
								<div class="card overflow-hidden mb-5 mb-xl-10">
									<!--begin::Card body-->
									<div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
										<!--begin::Statistics-->
										<div class="mb-4 px-9">
											<!--begin::Info-->
											<div class="d-flex align-items-center mb-2">
												<!--begin::Value-->
												<span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2"><?= $sudah_screening[0]->jumlah ?></span>
												<!--end::Value-->
												<!--begin::Label-->
												<span class="d-flex align-items-end text-gray-400 fs-6 fw-bold">Orang</span>
												<!--end::Label-->
											</div>
											<!--end::Info-->
											<!--begin::Description-->
											<span class="fs-6 fw-bold text-gray-400">Sudah Melakukan Screening</span>
											<!--end::Description-->
										</div>
										<!--end::Statistics-->
									</div>
									<!--end::Card body-->
								</div>
							</div>

							<div class="col-md-6">
								<div class="card overflow-hidden mb-5 mb-xl-10">
									<!--begin::Card body-->
									<div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
										<!--begin::Statistics-->
										<div class="mb-4 px-9">
											<!--begin::Info-->
											<div class="d-flex align-items-center mb-2">
												<!--begin::Value-->
												<span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2"><?= $belum_screening[0]->jumlah ?></span>
												<!--end::Value-->
												<!--begin::Label-->
												<span class="d-flex align-items-end text-gray-400 fs-6 fw-bold">Orang</span>
												<!--end::Label-->
											</div>
											<!--end::Info-->
											<!--begin::Description-->
											<span class="fs-6 fw-bold text-gray-400">Belum Melakukan Screening</span>
											<!--end::Description-->
										</div>
										<!--end::Statistics-->
									</div>
									<!--end::Card body-->
								</div>
							</div>
						</div>
						

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
											<th class="min-w-125px">Status</th>
											<th class="text-center min-w-100px">Actions</th>
										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<?php foreach ($list as $row): ?>
											<tr>
												<td><?= $row->nama_user ?></td>
												<td><?= $row->no_telp ?></td>
												<td>
													<div class="badge badge-<?=  $row->sudah_screening? "primary" : "light" ?> fw-bolder">
														<?= $row->sudah_screening? "Sudah Screening" : "Belum Screening" ?>
													</div>
												</td>
												<td class="text-center">
													<a href="<?= site_url('/User/DetailUser/'.$row->id_user) ?>" class="btn btn-sm btn-light-primary">Detail</a>
												</td>
											</tr>
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
	<script src="<?= base_url('/js/custom/apps/user-management/users/pasien/table-jumlah-screening.js')?>"></script>

	<style>
		table.dataTable tbody tr.selected {
			color: white;
			background-color: #A1A5B7;
		}
	</style>
	
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>