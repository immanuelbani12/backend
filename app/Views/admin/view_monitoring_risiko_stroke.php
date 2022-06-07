<!DOCTYPE html>
<html lang="en">
	
<!--begin::Head-->
<head>
	<title>Apadok - Risiko Stroke</title>
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
								<h1 class="d-flex text-dark fw-bolder my-1 fs-3">Monitoring Risiko Stroke</h1>
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
									<li class="breadcrumb-item text-gray-600">Risiko Stroke</li>
									<!--end::Item-->
								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page title-->
						</div>

						<div class="col-md-9">
							<center><h1><?= $institusi[0]->nama_institusi ?></h1></center>
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
						<div class="row" style="--bs-gutter-x: 0;">
							<div class="card card-bordered" style="margin-bottom: 30px">
								<div class="card-header">
									<h3 class="card-title">Grafik Risiko Stroke</h3>
								</div>
								<!--begin::Card header-->
								<!-- <div class="card-header border-0 pt-6"> -->
									<!--begin::Card title-->
									<!-- <div class="card-title">
										<div class="fv-row mb-7"> -->
											<!--begin::Input-->
											<!-- <select name="jenis_kelamin" id="jenis_kelamin" data-control="select2" data-placeholder="Grafik Berdasarkan" data-hide-search="true" class="form-select form-select-solid fw-bolder">
												<option></option>
												<option value="jenis_kelamin">Jenis Kelamin</option>
												<option value="aktivitas_fisik">Aktivitas Fisik</option>
												<option value="merokok">Merokok</option>
												<option value="tekanan_darah">Tekanan Darah</option>
												<option value="kadar_kolesterol">Kadar Kolesterol</option>
												<option value="riwayat_stroke">Riwayat Stroke</option>
												<option value="irama_jantung">Irama Jantung</option>
												<option value="kadar_gula">Kadar Gula</option>
											</select> -->
											<!--end::Input-->
										<!-- </div> -->
										<!-- <div class="d-flex align-items-center position-relative my-1"> -->
											<!-- <input type="text" class="form-control form-control-solid w-250px ps-14" placeholder="Cari Pasien" /> -->
										<!-- </div> -->
									<!-- </div> -->
									<!--begin::Card title-->
								<!-- </div> -->
								<!--end::Card header-->
								<div class="card-body">
									<div id="kt_amcharts_3" style="height: 500px;"></div>
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
												<span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2"><?= $stroke[0]->jumlah ?></span>
												<!--end::Value-->
												<!--begin::Label-->
												<span class="d-flex align-items-end text-gray-400 fs-6 fw-bold">Orang</span>
												<!--end::Label-->
											</div>
											<!--end::Info-->
											<!--begin::Description-->
											<span class="fs-6 fw-bold text-gray-400">Memiliki Risiko Tinggi Stroke</span>
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
												<span class="fs-2hx fw-bolder text-gray-800 me-2 lh-1 ls-n2"><?= $tidak_stroke[0]->jumlah ?></span>
												<!--end::Value-->
												<!--begin::Label-->
												<span class="d-flex align-items-end text-gray-400 fs-6 fw-bold">Orang</span>
												<!--end::Label-->
											</div>
											<!--end::Info-->
											<!--begin::Description-->
											<span class="fs-6 fw-bold text-gray-400">Tidak Risiko Tinggi Stroke</span>
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
													<div class="badge badge-<?=  $row->risiko_stroke? "primary" : "light" ?> fw-bolder">
														<?= $row->risiko_stroke? "Risiko Tinggi Stroke" : "Tidak Beresiko Tinggi" ?>
													</div>
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
	<script src="<?= base_url('/js/custom/apps/user-management/users/peserta/table.js')?>"></script>
	<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

	<script>
		am5.ready(function () {
			// Create root element
			// https://www.amcharts.com/docs/v5/getting-started/#Root_element
			var root = am5.Root.new("kt_amcharts_3");

			// Set themes
			// https://www.amcharts.com/docs/v5/concepts/themes/
			root.setThemes([
				am5themes_Animated.new(root)
			]);

			// Create chart
			// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
			var chart = root.container.children.push(am5percent.PieChart.new(root, {
				layout: root.verticalLayout
			}));

			// Create series
			// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
			var series = chart.series.push(am5percent.PieSeries.new(root, {
				alignLabels: true,
				calculateAggregates: true,
				valueField: "value",
				categoryField: "category"
			}));

			series.slices.template.setAll({
				strokeWidth: 3,
				stroke: am5.color(0xffffff)
			});

			series.labelsContainer.set("paddingTop", 30)

			// Set up adapters for variable slice radius
			// https://www.amcharts.com/docs/v5/concepts/settings/adapters/
			series.slices.template.adapters.add("radius", function (radius, target) {
				var dataItem = target.dataItem;
				var high = series.getPrivate("valueHigh");

				if (dataItem) {
					var value = target.dataItem.get("valueWorking", 0);
					return radius * value / high
				}
				return radius;
			});

			// Set data
			// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
			series.data.setAll([{
				value: <?= $stroke[0]->jumlah ?>,
				category: "Risiko Tinggi Stroke"
			}, {
				value: <?= $tidak_stroke[0]->jumlah ?>,
				category: "Tidak Risiko Tinggi Stroke"
			}]);

			// Create legend
			// https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
			var legend = chart.children.push(am5.Legend.new(root, {
				centerX: am5.p50,
				x: am5.p50,
				marginTop: 15,
				marginBottom: 15
			}));

			legend.data.setAll(series.dataItems);

			// Play initial series animation
			// https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
			series.appear(1000, 100);

		}); // end am5.ready()
	</script>
	
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>