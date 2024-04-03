@section('title')
	Dokter
@endsection

@section('custom-javascript')
<script src="assets/js/custom/apps/customers/list/export.js"></script>
<!-- <script src="assets/js/custom/apps/customers/list/add.js"></script> -->
<script src="assets/js/custom/apps/customers/list/list.js"></script>
<script src="assets/js/custom/apps/customers/list/list.js"></script>
<script src="assets/js/custom/apps/customers/add.js"></script>
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>
@endsection

<x-master title="Dokter" class="">
	<x-dashboard>
		<!--begin::Content-->
		<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Card-->
							<div class="card">
								<!--begin::Card header-->
								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
											<input type="text" data-kt-dokter-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Docters" />
										</div>
										<!--end::Search-->
									</div>
									<!--begin::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end" data-kt-dokter-table-toolbar="base">
											<!--begin::Filter-->
											<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<i class="ki-duotone ki-filter fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>Filter</button>
											<!--begin::Menu 1-->
											<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
												<!--begin::Header-->
												<div class="px-7 py-5">
													<div class="fs-4 text-gray-900 fw-bold">Filter Options</div>
												</div>
												<!--end::Header-->
												<!--begin::Separator-->
												<div class="separator border-gray-200"></div>
												<!--end::Separator-->
												<!--begin::Content-->
												<div class="px-7 py-5">
													<!--begin::Input group-->
													<div class="mb-10">
														<!--begin::Label-->
														<label class="form-label fs-5 fw-semibold mb-3">Month:</label>
														<!--end::Label-->
														<!--begin::Input-->
														<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-dokter-table-filter="month" data-dropdown-parent="#kt-toolbar-filter">
															<option></option>
															<option value="aug">August</option>
															<option value="sep">September</option>
															<option value="oct">October</option>
															<option value="nov">November</option>
															<option value="dec">December</option>
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="mb-10">
														<!--begin::Label-->
														<label class="form-label fs-5 fw-semibold mb-3">Payment Type:</label>
														<!--end::Label-->
														<!--begin::Options-->
														<div class="d-flex flex-column flex-wrap fw-semibold" data-kt-dokter-table-filter="payment_type">
															<!--begin::Option-->
															<label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
																<input class="form-check-input" type="radio" name="payment_type" value="all" checked="checked" />
																<span class="form-check-label text-gray-600">All</span>
															</label>
															<!--end::Option-->
															<!--begin::Option-->
															<label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
																<input class="form-check-input" type="radio" name="payment_type" value="visa" />
																<span class="form-check-label text-gray-600">Visa</span>
															</label>
															<!--end::Option-->
															<!--begin::Option-->
															<label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
																<input class="form-check-input" type="radio" name="payment_type" value="mastercard" />
																<span class="form-check-label text-gray-600">Mastercard</span>
															</label>
															<!--end::Option-->
															<!--begin::Option-->
															<label class="form-check form-check-sm form-check-custom form-check-solid">
																<input class="form-check-input" type="radio" name="payment_type" value="american_express" />
																<span class="form-check-label text-gray-600">American Express</span>
															</label>
															<!--end::Option-->
														</div>
														<!--end::Options-->
													</div>
													<!--end::Input group-->
													<!--begin::Actions-->
													<div class="d-flex justify-content-end">
														<button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-dokter-table-filter="reset">Reset</button>
														<button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-dokter-table-filter="filter">Apply</button>
													</div>
													<!--end::Actions-->
												</div>
												<!--end::Content-->
											</div>
											<!--end::Menu 1-->
											<!--end::Filter-->
											<!--begin::Export-->
											<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
											<i class="ki-duotone ki-exit-up fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>Export</button>
											<!--end::Export-->
											<!--begin::Add customer-->
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_dokter">Tambah Data</button>
											<!--end::Add customer-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Group actions-->
										<div class="d-flex justify-content-end align-items-center d-none" data-kt-dokter-table-toolbar="selected">
											<div class="fw-bold me-5">
											<span class="me-2" data-kt-dokter-table-select="selected_count"></span>Selected</div>
											<button type="button" class="btn btn-danger" data-kt-dokter-table-select="delete_selected">Delete Selected</button>
										</div>
										<!--end::Group actions-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_dokter_table">
										<thead>
											<tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
												<th class="w-10px pe-2">
													<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
														<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_dokter_table .form-check-input" value="1" />
													</div>
												</th>
												<th class="min-w-125px">Nama</th>
												<th class="min-w-125px">Telepon</th>
												<!-- <th class="min-w-125px">Email</th> -->
												<th class="min-w-125px">Spesialis</th>
												<th class="min-w-125px">Joined Date</th>
												<th class="text-end min-w-70px">Actions</th>
											</tr>
										</thead>
										<tbody class="fw-semibold text-gray-600">
											@foreach ($dokters as $dokter)
											<tr>
												<td>
													<div class="form-check form-check-sm form-check-custom form-check-solid">
														<input class="form-check-input" type="checkbox" value="1" />
													</div>
												</td>
												<td>
													<a href="{{route('dokters.show',$dokter->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$dokter->nama}}</a>
												</td>
												<td>
													{{$dokter->nomor_hp}}
													<!-- <a href="#" class="text-gray-600 text-hover-primary mb-1">{{$dokter->nomor_hp}}</a> -->
												</td>
												<!-- <td>{{$dokter->email}}</td> -->
												<td>{{$dokter->spesialis}}</td>
												<td>{{date('d-m-Y', strtotime($dokter->tanggal_gabung))}}</td>
												<td class="text-end">
													<a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
													<i class="ki-duotone ki-down fs-5 ms-1"></i></a>
													<!--begin::Menu-->
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="{{route('dokters.show', $dokter->id)}}" class="menu-link px-3">View</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
														{{--<form action="{{ route('dokters.destroy', $dokter->id) }}" method="POST">
															@csrf
															@method('DELETE')
															<button class="menu-link px-3" type="submit">Delete</button>
														</form>--}}
															<a href="{{route('dokters.destroy', $dokter->id)}}" data-m class="menu-link px-3" data-kt-dokter-table-filter="delete_row">Delete</a>
														</div>
														<!--end::Menu item-->
													</div>
													<!--end::Menu-->
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->


							<!--begin::Modals-->
							<!--begin::Modal - Customers - Add-->
							<div class="modal fade" id="kt_modal_add_dokter" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog modal-dialog-centered mw-650px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Form-->
										<form class="form" action="{{route('dokters.store')}}" method="POST" id="kt_modal_add_dokter_form" data-kt-redirect="{{route('dokters.index')}}">
											@csrf
											<!--begin::Modal header-->
											<div class="modal-header" id="kt_modal_add_dokter_header">
												<!--begin::Modal title-->
												<h2 class="fw-bold">Add a Docter</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div id="kt_modal_add_dokter_close" class="btn btn-icon btn-sm btn-active-icon-primary">
													<i class="ki-duotone ki-cross fs-1">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</div>
												<!--end::Close-->
											</div>
											<!--end::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body py-10 px-lg-17">
												<!--begin::Scroll-->
												<div class="scroll-y me-n7 pe-7" id="kt_modal_add_dokter_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_dokter_header" data-kt-scroll-wrappers="#kt_modal_add_dokter_scroll" data-kt-scroll-offset="300px">
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fs-6 fw-semibold mb-2">Nama</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" placeholder="Silahkan isi nama dokter" name="nama" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-semibold mb-2">
															<span class="required">Email</span>
															<span class="ms-1" data-bs-toggle="tooltip" title="Email address must be active">
																<i class="ki-duotone ki-information fs-7">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="email" class="form-control form-control-solid" placeholder="Silahkan isi alamat email" name="email" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-semibold mb-2">Nomor Telepon</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" placeholder="Silahkan isi nomor telepon" name="nomor-hp" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-semibold mb-2">Alamat</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" placeholder="Silahkan isi alamat" name="alamat" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<label class="required fs-6 fw-semibold mb-2">Tanggal Lahir</label>
														<!--begin::Input-->
														<div class="position-relative d-flex align-items-center">
															<!--begin::Icon-->
															<i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
																<span class="path4"></span>
																<span class="path5"></span>
																<span class="path6"></span>
															</i>
															<!--end::Icon-->
															<!--begin::Datepicker-->
															<input class="form-control form-control-solid ps-12" placeholder="Pilih Tanggal" name="tanggal-lahir" />
															<!--end::Datepicker-->
														</div>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<label class="required fs-6 fw-semibold mb-2">Tanggal Gabung</label>
														<!--begin::Input-->
														<div class="position-relative d-flex align-items-center">
															<!--begin::Icon-->
															<i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
																<span class="path4"></span>
																<span class="path5"></span>
																<span class="path6"></span>
															</i>
															<!--end::Icon-->
															<!--begin::Datepicker-->
															<input class="form-control form-control-solid ps-12" placeholder="Pilih Tanggal" name="tanggal-gabung" />
															<!--end::Datepicker-->
														</div>
														<!--end::Input-->
													</div>
													<!--end::Input group-->

													<!--begin::Input group-->
													<div class="d-flex flex-column mb-7 fv-row">
														<!--begin::Label-->
														<label class="fs-6 fw-semibold mb-2">
															<span class="required">Jenis Kelamin</span>
															<span class="ms-1" data-bs-toggle="tooltip" title="Jenis Kelamin">
																<i class="ki-duotone ki-information fs-7">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<select name="jenis-kelamin" aria-label="Pilih jenis kelamin" data-control="select2" data-placeholder="Pilih jenis kelamin..." data-dropdown-parent="#kt_modal_add_dokter" class="form-select form-select-solid fw-bold">
															<option value="">Pilih Jenis Kelamin...</option>
															<option value="L">Laki-laki</option>
															<option value="P">Perempuan</option>
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-7 fv-row">
														<!--begin::Label-->
														<label class="fs-6 fw-semibold mb-2">
															<span class="required">Spesialis</span>
															<span class="ms-1" data-bs-toggle="tooltip" title="Spesialis Dokter">
																<i class="ki-duotone ki-information fs-7">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<select name="spesialis" aria-label="Pilih spesialis" data-control="select2" data-placeholder="Pilih spesialis..." data-dropdown-parent="#kt_modal_add_dokter" class="form-select form-select-solid fw-bold">
															<option value="">Pilih spesialis...</option>
															<option value="ZM">Zambia</option>
															<option value="ZW">Zimbabwe</option>
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Scroll-->
											</div>
											<!--end::Modal body-->
											<!--begin::Modal footer-->
											<div class="modal-footer flex-center">
												<!--begin::Button-->
												<button type="reset" id="kt_modal_add_dokter_cancel" class="btn btn-light me-3">Discard</button>
												<!--end::Button-->
												<!--begin::Button-->
												<button type="submit" id="kt_modal_add_dokter_submit" class="btn btn-primary">
													<span class="indicator-label">Submit</span>
													<span class="indicator-progress">Please wait... 
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
												<!--end::Button-->
											</div>
											<!--end::Modal footer-->
										</form>
										<!--end::Form-->
									</div>
								</div>
							</div>
							<!--end::Modal - Customers - Add-->
							<!--begin::Modal - Adjust Balance-->
							<div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog modal-dialog-centered mw-650px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Modal header-->
										<div class="modal-header">
											<!--begin::Modal title-->
											<h2 class="fw-bold">Export Customers</h2>
											<!--end::Modal title-->
											<!--begin::Close-->
											<div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
												<i class="ki-duotone ki-cross fs-1">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>
											</div>
											<!--end::Close-->
										</div>
										<!--end::Modal header-->
										<!--begin::Modal body-->
										<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
											<!--begin::Form-->
											<form id="kt_customers_export_form" class="form" action="#">
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-semibold form-label mb-5">Select Export Format:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid">
														<option value="excell">Excel</option>
														<option value="pdf">PDF</option>
														<option value="cvs">CVS</option>
														<option value="zip">ZIP</option>
													</select>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-semibold form-label mb-5">Select Date Range:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input class="form-control form-control-solid" placeholder="Pick a date" name="date" />
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Row-->
												<div class="row fv-row mb-15">
													<!--begin::Label-->
													<label class="fs-5 fw-semibold form-label mb-5">Payment Type:</label>
													<!--end::Label-->
													<!--begin::Radio group-->
													<div class="d-flex flex-column">
														<!--begin::Radio button-->
														<label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
															<input class="form-check-input" type="checkbox" value="1" checked="checked" name="payment_type" />
															<span class="form-check-label text-gray-600 fw-semibold">All</span>
														</label>
														<!--end::Radio button-->
														<!--begin::Radio button-->
														<label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
															<input class="form-check-input" type="checkbox" value="2" checked="checked" name="payment_type" />
															<span class="form-check-label text-gray-600 fw-semibold">Visa</span>
														</label>
														<!--end::Radio button-->
														<!--begin::Radio button-->
														<label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
															<input class="form-check-input" type="checkbox" value="3" name="payment_type" />
															<span class="form-check-label text-gray-600 fw-semibold">Mastercard</span>
														</label>
														<!--end::Radio button-->
														<!--begin::Radio button-->
														<label class="form-check form-check-custom form-check-sm form-check-solid">
															<input class="form-check-input" type="checkbox" value="4" name="payment_type" />
															<span class="form-check-label text-gray-600 fw-semibold">American Express</span>
														</label>
														<!--end::Radio button-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Row-->
												<!--begin::Actions-->
												<div class="text-center">
													<button type="reset" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
													<button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
														<span class="indicator-label">Submit</span>
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
							<!--end::Modal - New Card-->
							<!--end::Modals-->


						</div>
						<!--end::Container-->
					</div>
		<!--end::Content-->
	</x-dashboard>
</x-master>	

