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
								<h1 class="d-flex text-dark fw-bolder my-1 fs-3">Tambah Artikel</h1>
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
									<!--begin::Item-->
									<li class="breadcrumb-item text-gray-600">Tambah Artikel</li>
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
							<!--begin::Card body-->
							<form class="form" id="kt_artikel_add_form" method="post" action="<?= site_url('Artikel/add') ?>" enctype="multipart/form-data">
								<div class="card-body py-4">
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="required fw-bold fs-6 mb-2">Judul</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" name="judul_artikel" id="judul_artikel" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Judul" autocomplete="off"/>
										<!--end::Input-->
									</div>

									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="required fs-6 fw-bold form-label mb-2">Kategori</label>
										<!--end::Label-->
										<!--begin::Input-->
										<select name="kategori_artikel" id="kategori_artikel" data-control="select2" data-placeholder="Kategori" data-hide-search="true" class="form-select form-select-solid fw-bolder">
											<option></option>
											<option value="1">Stroke</option>
											<option value="2">Diabetes</option>
											<option value="3">Kardiovaskular</option>
											<option value="4">Kebugaran</option>
										</select>
										<!--end::Input-->
									</div>
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-bold form-label mb-2">Jenis</label>
										<!--end::Label-->
										<div class="form-check form-check-custom form-check-solid">
											<div class="col-md-1">
												<input class="form-check-input" type="radio" value="1" id="jenis_text" name="jenis_artikel"/>
												<label class="form-check-label" for="jenis_text">
													Text
												</label>
											</div>
											<div class="col-md-1">
												<input class="form-check-input" type="radio" value="2" id="jenis_video" name="jenis_artikel"/>
												<label class="form-check-label" for="jenis_video">
													Video
												</label>
											</div>
										</div>
									</div>

									<div class="textArtikel">
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="fs-6 fw-bold form-label mb-2">Ilustrasi</label>
											<!--end::Label-->
											<input type="file" name="gambar_artikel" id="gambar_artikel" class="form-control form-control-solid mb-3 mb-lg-0">
										</div>

										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="fs-6 fw-bold form-label mb-2">Isi</label>
											<!--end::Label-->
											<div id="kt_docs_quill_basic"></div>
											<textarea name="text_artikel" id="hidden_textarea" style="display: none;"></textarea>
										</div>
									</div>

									<div class="videoArtikel">
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="fs-6 fw-bold form-label mb-2">Link</label>
											<!--end::Label-->
											<input type="text" name="video_artikel" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Link">
										</div>
									</div>

									<div class="fv-row mb-7">
										<a href="<?= base_url('Artikel'); ?>"class="btn btn-light me-3">Batalkan</a>
										<button type="button" id="submit_artikel" class="btn btn-primary" data-kt-users-modal-action="submit">
											<span class="indicator-label">Simpan</span>
											<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										</button>
									</div>
								
								</div>
							<!--end::Card body-->
							</form>
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
	<script src="<?= base_url('/js/custom/apps/user-management/users/artikel/add.js')?>"></script>
	<!--begin::Page Custom Javascript(used by this page)-->
	<!--end::Page Custom Javascript-->
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
				text: "<?= implode(", ", $_SESSION['error']); ?>",
				icon: "error",
				buttonsStyling: false,
				confirmButtonText: "Baik, mengerti!",
				customClass: {
					confirmButton: "btn btn-primary"
				}
			});
		<?php } ?>

		var quill = new Quill('#kt_docs_quill_basic', {
			modules: {
				toolbar: [
					[{
						header: [1, 2, false]
					}],
					['bold', 'italic', 'underline']
				]
			},
			placeholder: 'Type your text here...',
			theme: 'snow' // or 'bubble'
		});

		$("#submit_artikel").on("click",function() {
			var myEditor = document.querySelector('#kt_docs_quill_basic')
			var html = myEditor.children[0].innerHTML
			$("#hidden_textarea").val(html);
		})

		$(document).ready(function(){
			$("#jenis_text").prop('checked', true);
			$(".textArtikel").show();
			$(".videoArtikel").hide();
			
			$("input[name='jenis_artikel']").click(function(){
				var radioValue = $("input[name='jenis_artikel']:checked").val();
				if(radioValue == '1'){
					$(".textArtikel").show();
					$(".videoArtikel").hide();
				}
				else {
					$(".textArtikel").hide();
					$(".videoArtikel").show();
				}
			});
    	});


		
	</script>
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>