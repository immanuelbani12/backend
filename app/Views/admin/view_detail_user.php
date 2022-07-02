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
							<h1 class="d-flex text-dark fw-bolder my-1 fs-3">Detail Pasien</h1>
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
								<!--begin::Item-->
								<li class="breadcrumb-item text-gray-600">Detail Pasien</li>
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

						<div class="card mb-5 mb-xl-10">
							<!--begin::Card header-->
							<div class="card-header cursor-pointer">
								<!--begin::Card title-->
								<div class="card-title m-0">
									<h1 class="fw-bolder m-0">Informasi Pasien</h1>
								</div>
								<!--end::Card title-->
							</div>
							<!--begin::Card header-->
							<!--begin::Card body-->
							<div class="card-body p-9">
								<!--begin::Row-->
								<div class="row mb-7">
									<!--begin::Label-->
									<label class="col-lg-4 fw-bold text-muted">Nama Lengkap</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8">
										<span class="fw-bolder fs-6 text-gray-800"><?= $user[0]->nama_user ?></span>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
								<!--begin::Input group-->
								<div class="row mb-7">
									<!--begin::Label-->
									<label class="col-lg-4 fw-bold text-muted">Nomor Telepon</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8 fv-row">
										<span class="fw-bold text-gray-800 fs-6"><?= $user[0]->no_telp ?></span>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="row mb-7">
									<!--begin::Label-->
									<label class="col-lg-4 fw-bold text-muted">Tanggal Lahir</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8 fv-row">
										<span class="fw-bold text-gray-800 fs-6"><?= $user[0]->tgl_lahir == "0000-00-00" ? "-" : $user[0]->tgl_lahir ?></span>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="row mb-7">
									<!--begin::Label-->
									<label class="col-lg-4 fw-bold text-muted">Jenis Kelamin</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8 fv-row">
										<?php 
											$jenis_kelamin = $user[0]->jenis_kelamin=="L" ? "Laki-Laki" : "Perempuan";
											$jenis_kelamin = $user[0]->jenis_kelamin=="" ? "-" : $jenis_kelamin;
										?>
										<span class="fw-bold text-gray-800 fs-6"><?= $jenis_kelamin ?></span>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="row mb-7">
									<!--begin::Label-->
									<label class="col-lg-4 fw-bold text-muted">Tinggi Badan</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8 fv-row">
										<span class="fw-bold text-gray-800 fs-6"><?= $user[0]->tinggi_badan == 0 ? "-" : $user[0]->tinggi_badan." cm" ?></span>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="row mb-7">
									<!--begin::Label-->
									<label class="col-lg-4 fw-bold text-muted">Berat Badan</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8 fv-row">
										<span class="fw-bold text-gray-800 fs-6"><?= $user[0]->berat_badan == 0 ? "-" : $user[0]->berat_badan." kg" ?></span>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
							</div>
							<!--end::Card body-->
						</div>

						<!--begin::Notice-->
						<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 mb-5 mb-xl-10">
							<!--begin::Icon-->
							<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
							<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
									<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
									<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
								</svg>
							</span>
							<!--end::Svg Icon-->
							<!--end::Icon-->
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack flex-grow-1">
								<!--begin::Content-->
								<div class="fw-bold">
									<h4 class="text-gray-900 fw-bolder">Riwayat Pemeriksaan</h4>
									<div class="fs-6 text-gray-700">Berikut merupakan riwayat pemeriksaan yang sudah pernah dilakukan</div>
								</div>
								<!--end::Content-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Notice-->

						<!--begin::Card-->
						<div class="card mb-5 mb-xl-10">
							<!--begin::Card header-->
							<div class="card-header border-0 pt-6">
								<h3>Pemeriksaan Risiko</h3>
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
										<input type="text" data-kt-risiko-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari Riwayat" />
									</div>
									<!--end::Search-->
								</div>
								<!--begin::Card title-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body py-4">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_risiko">
									<!--begin::Table head-->
									<thead>
										<!--begin::Table row-->
										<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
											<th class="min-w-125px">Hasil Diabetes</th>
											<th class="min-w-125px">Hasil Stroke</th>
											<th class="min-w-125px">Hasil Kardiovaskular</th>
											<th class="min-w-125px">Waktu Pemeriksaan</th>
										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<!--begin::Table row-->
										<?php foreach ($risiko as $row):?>
										<tr>
											<td>
											<?php if(strpos($row->hasil_diabetes, 'Tinggi')){?>
												<div class="badge badge-light-primary fw-bolder"><?= $row->hasil_diabetes ?></div>
											<?php } else { echo $row->hasil_diabetes; } ?>
											</td>

											<td>
											<?php if(strpos($row->hasil_stroke, 'Tinggi')){?>
												<div class="badge badge-light-primary fw-bolder"><?= $row->hasil_stroke ?></div>
											<?php } else { echo $row->hasil_stroke; } ?>
											</td>

											<td>
											<?php if(strpos($row->hasil_kardiovaskular, 'Tinggi')){?>
												<div class="badge badge-light-primary fw-bolder"><?= $row->hasil_kardiovaskular ?></div>
											<?php } else { echo $row->hasil_kardiovaskular; } ?>
											</td>

											<td><?= $row->created_at; ?></td>
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

						<!--begin::Card-->
						<div class="card mb-5 mb-xl-10">
							<!--begin::Card header-->
							<div class="card-header border-0 pt-6">
								<h3>Pemeriksaan Kebugaran</h1>
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
										<input type="text" data-kt-kebugaran-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari Riwayat" />
									</div>
									<!--end::Search-->
								</div>
								<!--begin::Card title-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body py-4">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_kebugaran">
									<!--begin::Table head-->
									<thead>
										<!--begin::Table row-->
										<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
											<th class="min-w-125px">Hasil Kebugaran</th>
											<th class="min-w-125px">Waktu Pemeriksaan</th>
										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<!--begin::Table row-->
										<?php foreach ($kebugaran as $row):?>
										<tr>
											<td><?= $row->hasil_kebugaran; ?></td>
											<td><?= $row->created_at; ?></td>
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
	<script src="<?= base_url('/js/custom/apps/user-management/users/peserta/table_detail_user.js')?>"></script>
	
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>