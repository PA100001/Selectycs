@extends('Customer.Layouts.current_it.common')

@section('title', 'It Portfolio')

@section('headerScripts')
    <link rel="stylesheet" href="{{ URL::asset('assets/b2b/css/new-layout.css') }}">
@stop

@section('content')

@if(Auth::user()->role == 'customer')

@else
    <div class="container-wrap d-flex flex-column flex-grow-1">
        <div class="container-wrap-topbar d-flex align-items-center justify-content-between">
            <div class="title-left d-flex align-items-center gap-2">
                <div class="total-title-bar">
                    <div class="cap d-flex align-items-center gap-1">
                        <p class="text-capitalize mb-0">Applications </p>
                        <span>({{$implementationCount}})</span>
                    </div>
                </div>
                <a type="button" class="btn initiative_btn_style icon-btn" data-bs-toggle="modal" data-bs-target="#add_application_modal">
                    <i class="fas fa-plus"></i>
                </a>
                <a href="#" class="ms-2" id="current-it-slider-toggle-icon">
                    <span class="grey-text-link">Org View</span>
                </a>
            </div>
            <div class="title-right d-flex align-items-center gap-1">
                <ul class="btn-bar d-flex align-items-center gap-1">
                    <li>
                        <ul class="d-flex align-items-center gap-1">
                            <li>
                                <button class="btn btn-success" type="button" data-toggle="tooltip" id="exportApplication" style="background: #548235; " title="" data-bs-original-title="Export">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </button>
                            </li>
                            <li>
                                <button class="btn btn-primary" type="button" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#importApplicationModal" style="background: #4775D5;" title="" data-bs-original-title="Import">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="d-flex align-items-center gap-1">
                            <img src="https://laravel.thedevelopment.in/business_portal/assets/business_assets/img/customize.png" alt="">
                            <span>Customize</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="d-flex align-items-center gap-1" onclick="openSideBar($('.app-filter-content'))">
                            <div class="icon-bar">
                                <img src="https://laravel.thedevelopment.in/business_portal/assets/business_assets/img/filter.png" alt="" width="20px">
                            </div>
                            <span>Filters</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-wrap-result flex-grow-1 overflow-auto">
            <div class="application-listing-bar table-listing-bar">
                <div class="table-responsive h-100">
                    @include('BusinessNeeds.Manage.It_portfolio.list_html')
                </div>
            </div>
        </div>
    </div>
@endif




    <div class="history-block goal_history_sidebar">
        <div class="filter-header">
        <div class="filter-header-item d-flex justify-content-between align-items-center">
            <p class="filter-title mb-0">History</p>
            <div class="close-right-history cursor-pointer">
                <i class="far fa-times-circle"></i>
            </div>
        </div>
        </div>
        <div class="filter-body p-3">
        <div class="history-body-caption history-table-caption d-flex flex-column gap-2">
            <div class="table-bar " id="project-history-body">
                <table class="table border-0" id="history_tbl">
                    <thead>
                        <tr>
                            <th >Date</th>
                            <th >Name</th>
                            <th >Updated By</th>
                            <th>Field</th>
                            <th >Changes</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
        </div>
    </div>

    <div class="filter-block app-filter-content">
        <div class="filter-header">
            <div class="filter-header-item d-flex justify-content-between align-items-center">
                <p class="filter-title mb-0">Filter</p>
                <div class="close-right-filter cursor-pointer">
                    <i class="far fa-times-circle"></i>
                </div>
            </div>
        </div>
        <div class="filter-body p-3" id="version-filter-body">
            <div class="filter-body-caption d-flex flex-column gap-2">
                <div class="select-block-caption d-flex flex-column gap-2">
                    <div class="select-block">
                        <select class="scope-select select2" name="area_id" id="filter_area_id">
                            <option value="">Select Area</option>
                            <option value="948">Customer Service (3)</option>
                            <option value="918">Digital Commerce (1)</option>
                            <option value="487">Financials (2)</option>
                            <option value="84">HCM (2)</option>
                            <option value="43">Maintenance (2)</option>
                            <option value="998">Marketing (0)</option>
                            <option value="952">Procurement (1)</option>
                            <option value="979">Product Development (1)</option>
                            <option value="961">Production (1)</option>
                            <option value="949">Sales (3)</option>
                        </select>
                    </div>
                    <div class="select-block">
                        <select class="select2" name="criticality" id="filter_criticality">
                            <option value="">Select Criticality</option>
                            <option value="Operational">Operational (8)</option>
                            <option value="Mission Critical">Mission Critical (1)</option>
                            <option value="Business Critical">Business Critical (0)</option>
                        </select>
                    </div>
                    <div class="select-box">
                        <ul class="multi-select-btn status-filter-block">
                            <li class="mb-1">
                                <input class="filter_status-filter all" type="radio" name="status_filter" id="all" value="all" checked>
                                <label class="mb-0" for="all">All</label>
                            </li>
                            <li class="mb-1">
                                <input class="filter_status-filter review" type="radio" name="status_filter" id="review" value="review">
                                <label class="mb-0" for="review">Review (<span class="review-count"></span>) </label>
                            </li>
                            <li class="mb-1">
                                <input class="filter_status-filter retire" type="radio" name="status_filter" id="retire" value="retire">
                                <label class="mb-0" for="retire">Retire (<span class="retire-count"></span>) </label>
                            </li>
                            <li class="mb-1">
                                <input class="filter_status-filter retain" type="radio" name="status_filter" id="retain" value="retain">
                                <label class="mb-0" for="retain">Retain (<span class="retain-count"></span>) </label>
                            </li>
                            <li class="mb-1">
                                <input class="filter_status-filter repair" type="radio" name="status_filter" id="repair" value="repair">
                                <label class="mb-0" for="repair">Repair (<span class="repair-count"></span>) </label>
                            </li>
                            <li class="d-none">
                                <div class="dropdown">
                                    <button class="btn btn-danger rounded-0" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="tooltip" title="Download Report" style="background: #c00000;">
                                        <i class="fa fa-file-pdf" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="https://laravel.thedevelopment.in/business_portal/customer/xqyn63YyOQRz/implementation/area-wise/pdf/download">Business Area-wise OpEx</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="https://laravel.thedevelopment.in/business_portal/customer/xqyn63YyOQRz/implementation/capital-investment/pdf/download">Capital Investments</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" target="_blank" href="https://laravel.thedevelopment.in/business_portal/customer/xqyn63YyOQRz/implementation/application-cost/pdf/download">Application Costs</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="https://laravel.thedevelopment.in/business_portal/customer/xqyn63YyOQRz/implementation/integration-cost/pdf/download">Integration Costs</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="https://laravel.thedevelopment.in/business_portal/customer/xqyn63YyOQRz/implementation/initiative/pdf/download">Initiatives</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="filter-block detailed-filter-content">
        <div class="filter-header">
            <div class="filter-header-item d-flex justify-content-between align-items-center mb-2 gap-2">
                <div class="col">
                    <div class="w-100 d-flex align-items-center gap-2">
                        <img src="https://laravel.thedevelopment.in/business_portal/assets/business_assets/img/sgoals.png" alt="" width="20px">
                        <div class="name_label">
                            <p class="filter-title mb-0 edit-name ft-12 fw-bold" id="goal-title"></p>
                        </div>
                        <div class="name_input" style="display: none">
                            <input type="text" name="name" id="goal-name" value="" class="form-control ft-12" placeholder="Enter Goal Name" required>
                        </div>
                        <div class="progress_status header-progress-status col-auto" data-bs-toggle="modal" data-bs-target="#updateGoalStatus">
                            <span class="fw-bold ft-12">0%</span>
                            <label class="progress-count ft-12" style="padding: 5px;">-</label>
                        </div>

                        <div>
                            <select name="goal_privacy" id="goal_privacy" class="select2">
                                <option value="1"> Private </option>
                                <option value="0"> Public </option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row align-items-center col-auto">
                    <div class="col-auto close-right-filter cursor-pointer">
                        <i class="far fa-times-circle"></i>
                    </div>
                </div>
            </div>
            <div class="tab-bar d-flex justify-content-between align-items-center">
                <ul class="nav nav-pills border-0 gap-2 w-100 nav-fill" id="detail-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#goal-overview-tab" id="overview-tab" href="javascript:;" >Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#goal-initiatives-tab" id="initiatives-tab" href="javascript:;" >Initiatives </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#goal-status-history-tab" id="status-history-tab" href="javascript:;" >Status History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#goal-comments-tab" id="comments-tab" href="javascript:;" >Comments <span id="commentCount">(*)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#goal-files-tab" id="files-tab" href="javascript:;" >Files</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="filter-body p-3" id="detail-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="goal-overview-tab"></div>
                <div class="tab-pane fade" id="goal-status-history-tab"></div>
                <div class="tab-pane fade" id="goal-initiatives-tab"></div>
                <div class="tab-pane fade" id="goal-comments-tab"></div>
                <div class="tab-pane fade" id="goal-files-tab"></div>
            </div>
        </div>
    </div>

    <!-- <---------- add application modal start -------->
    <div class="modal fade  add-engagements-modal-block add-application-modal-block" id="add_application_modal" aria-labelledby="add_application_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form action="" method="" class="modal-content modal-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_application_modalLabel">Add Application </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="input-box d-flex flex-column">
                                <label for="" class="mb-0 p-0">Appplication</label>
                                <select class="select2" name="" id="" data-live-search="true" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="Absorb LMS">Absorb LMS</option>
                                    <option value="Acumatica">Acumatica</option>
                                    <option value="Adexa">Adexa</option>
                                    <option value="Adobe">Adobe</option>
                                    <option value="ADP">ADP</option>
                                    <option value="AM/PM POS">AM/PM POS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-box d-flex flex-column">
                                <label for="" class="mb-0 p-0">Area</label>
                                <div class="selcet-block d-flex align-items-center double-box gap-3 w-100">
                                    <select name="" class="form-control multicheck_select" multiple>
                                        <option value="524">maintenance</option>
                                        <option value="488">hcm</option>
                                        <option value="493" >financials</option>
                                        <option value="500" >digital commerce</option>
                                        <option value="8" >customer service</option>
                                        <option value="7" >sales</option>
                                        <option value="6" >procurement</option>
                                    </select>
                                    <select name="" class="form-control multicheck_select" multiple>
                                        <option value="524">maintenance</option>
                                        <option value="488">hcm</option>
                                        <option value="493" >financials</option>
                                        <option value="500" >digital commerce</option>
                                        <option value="8" >customer service</option>
                                        <option value="7" >sales</option>
                                        <option value="6" >procurement</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="input-box d-flex flex-column">
                                <label for="" class="mb-0 p-0">Assessment</label>
                                <select class="select2" name="" id="" data-live-search="true" required>
                                    <option value="" selected>Operational</option>
                                    <option value="Isabel F">Mission Critical</option>
                                    <option value="Lydia T">Business Critical</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="input-box d-flex flex-column">
                                <label for="" class="mb-0 p-0">Owner</label>
                                <select class="select2" name="" id="" data-live-search="true" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="Isabel F">Isabel F</option>
                                    <option value="Lydia T">Lydia T</option>
                                    <option value="James McGregor">James McGregor</option>
                                    <option value="Kamesh Vyas">Kamesh Vyas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="input-box d-flex flex-column">
                                <label for="" class="mb-0 p-0">Hosted At</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="input-box d-flex flex-column">
                                <label for="" class="mb-0 p-0">Category</label>
                                <select class="select2" name="" id="" data-live-search="true" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="Category 1">Category 1</option>
                                    <option value="Category 2">Category 2</option>
                                    <option value="Category 3">Category 3</option>
                                    <option value="Category 4">Category 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-box d-flex flex-column">
                                <label for="" class="mb-0 p-0">Environment</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-box d-flex flex-column">
                                <label for="" class="mb-0 p-0">Status</label>
                                <select class="select2" name="" data-live-search="true" id="">
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="Review">Review</option>
                                    <option value="Retire">Retire</option>
                                    <option value="Retain">Retain</option>
                                    <option value="Repair">Repair</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <---------- add application modal end -------->

    <div class="modal fade" id="marketingModal" tabindex="-1" aria-labelledby="marketingModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="marketingModalLabel" style="text-transform: none;">
						Business Development</h5>
					<button type="button" class="fa fa-edit ms-2" style="font-size: 14px;" onclick="showInputField(this, 'marketing')"></button>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="https://laravel.thedevelopment.in/business_portal/customer/xqyn63YyOQRz/save/current_it/marketing" method="POST">
					<div class="modal-body sidebar_modal_min_height">
						<input type="hidden" name="_token" value="k8D52BAFqO8Ea5Mz3UbU8HNbGvmui76NFxovRX4q">						<div class="row g-3 form-box">
							<div class="col-md-6 col-12">
								<label for="">Area</label>
								<select name="marketing_scope[]" id="marketing_scope" class="current_it_scope" multiple data-size="5">
									<option value="43" >Maintenance</option>
                                    <option value="84" >HCM</option>
                                    <option value="487" >Financials</option>
                                    <option value="918" >Digital Commerce</option>
                                    <option value="948" >Customer Service</option>
                                    <option value="949" selected>Sales</option><option value="952" >
												Procurement</option>
																																<option value="961" >
												Production</option>
																																<option value="979" >
												Product Development</option>
																																<option value="998" selected>
												Marketing</option>
																																<option value="1268" >
												Test</option>
																											</select>
							</div>
							<div class="col-md-6 col-12">
								<label for="">Capability</label>
								<select name="marketing_capability[]" id="marketing_capability" class="current_it_capability" multiple data-size="5">
																														<optgroup label="Customer Service">
																																						<option value="996" >
														Customer Service</option>
																																						<option value="1027" >
														Digital Service</option>
																																						<option value="1001" >
														Field Service</option>
																																						<option value="1029" >
														Knowledge Management</option>
																																						<option value="1028" >
														Returns</option>
																																						<option value="1026" >
														Service Center</option>
																							</optgroup>
																					<optgroup label="Digital Commerce">
																																						<option value="1152" >
														bbs DC</option>
																																						<option value="926" >
														eCommerce</option>
																							</optgroup>
																					<optgroup label="Financials">
																																						<option value="524" >
														Accounting &amp; Financial Close</option>
																																						<option value="488" >
														Accounts Payable</option>
																																						<option value="493" >
														Accounts Receivable</option>
																																						<option value="500" >
														Budgeting &amp; Forecasting</option>
																																						<option value="8" >
														Contract Management</option>
																																						<option value="7" >
														Expense Management</option>
																																						<option value="6" >
														Fixed Assets</option>
																																						<option value="515" >
														Pricing</option>
																							</optgroup>
																					<optgroup label="HCM">
																																						<option value="379" >
														Benefits</option>
																																						<option value="211" >
														Career Development</option>
																																						<option value="15" >
														Compensation</option>
																																						<option value="17" >
														Learning</option>
																																						<option value="14" >
														Onboarding</option>
																																						<option value="227" >
														Org Management</option>
																																						<option value="400" >
														Payroll</option>
																																						<option value="16" >
														Performance Management</option>
																																						<option value="236" >
														Recruitment</option>
																																						<option value="19" >
														Time &amp; Attendance</option>
																							</optgroup>
																					<optgroup label="Maintenance">
																																						<option value="975" >
														Asset Management</option>
																																						<option value="973" >
														Execution</option>
																																						<option value="977" >
														Parts Inventory Management</option>
																																						<option value="971" >
														Planning</option>
																							</optgroup>
																					<optgroup label="Marketing">
																																						<option value="1008" >
														AI Insights</option>
																																						<option value="1006" selected>
														Campaign Configuration</option>
																																						<option value="1010" >
														Collaboration</option>
																																						<option value="1043" selected>
														Customer Segmentation</option>
																							</optgroup>
																					<optgroup label="Procurement">
																																						<option value="953" >
														Procurement Planning</option>
																																						<option value="957" >
														Purchase Orders</option>
																																						<option value="959" >
														Reporting</option>
																																						<option value="955" >
														Supplier Management</option>
																							</optgroup>
																					<optgroup label="Product Development">
																																						<option value="982" >
														Engineering</option>
																																						<option value="984" >
														Product Data Management</option>
																																						<option value="986" >
														Quality Management</option>
																																						<option value="980" >
														R&D</option>
																							</optgroup>
																					<optgroup label="Production">
																																						<option value="968" >
														Contract Manufacturing</option>
																																						<option value="964" >
														Manufacturing Execution</option>
																																						<option value="962" >
														Planning & Scheduling</option>
																																						<option value="966" >
														Quality Assurance</option>
																							</optgroup>
																					<optgroup label="Sales">
																																						<option value="1020" >
														Account Planning</option>
																																						<option value="1021" >
														Customer Data Management</option>
																																						<option value="1025" >
														Incentive Compensation</option>
																																						<option value="1023" selected>
														Lead & Opportunity Management</option>
																																						<option value="1019" >
														Quota Planning & Compensation</option>
																																						<option value="1022" >
														Quoting</option>
																							</optgroup>
																					<optgroup label="Test">
																																						<option value="1269" >
														Test</option>
																							</optgroup>
																											</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="border-btn" data-bs-dismiss="modal">Close</button>
						<button type="submit" data-bs-dismiss="modal">save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- onlineModal -->
	<div class="modal fade" id="onlineModal" tabindex="-1" aria-labelledby="onlineModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="onlineModalLabel" style="text-transform: none;">
						eCommerce</h5>
					<button type="button" class="fa fa-edit ms-2" style="font-size: 14px;" onclick="showInputField(this, 'client_portals')"></button>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="https://laravel.thedevelopment.in/business_portal/customer/xqyn63YyOQRz/save/current_it/online" method="POST">
					<input type="hidden" name="_token" value="k8D52BAFqO8Ea5Mz3UbU8HNbGvmui76NFxovRX4q">					<div class="modal-body sidebar_modal_min_height">
						<div class="row g-3 form-box">
							<div class="col-md-6 col-12">
								<label for="">Area</label>
								<select name="online_scope[]" id="online_scope" class="current_it_scope" multiple data-size="5">
																																									<option value="43" >
												Maintenance</option>
																																<option value="84" >
												HCM</option>
																																<option value="487" >
												Financials</option>
																																<option value="918" >
												Digital Commerce</option>
																																<option value="948" >
												Customer Service</option>
																																<option value="949" >
												Sales</option>
																																<option value="952" >
												Procurement</option>
																																<option value="961" >
												Production</option>
																																<option value="979" >
												Product Development</option>
																																<option value="998" >
												Marketing</option>
																																<option value="1268" >
												Test</option>
																											</select>
							</div>
							<div class="col-md-6 col-12">
								<label for="">Capability</label>
								<select name="online_capability[]" id="online_capability" class="current_it_capability" multiple data-size="5">
																														<optgroup label="Customer Service">
																																						<option value="996" >
														Customer Service</option>
																																						<option value="1027" >
														Digital Service</option>
																																						<option value="1001" >
														Field Service</option>
																																						<option value="1029" >
														Knowledge Management</option>
																																						<option value="1028" >
														Returns</option>
																																						<option value="1026" >
														Service Center</option>
																							</optgroup>
																					<optgroup label="Digital Commerce">
																																						<option value="1152" >
														bbs DC</option>
																																						<option value="926" selected>
														eCommerce</option>
																							</optgroup>
																					<optgroup label="Financials">
																																						<option value="524" >
														Accounting &amp; Financial Close</option>
																																						<option value="488" >
														Accounts Payable</option>
																																						<option value="493" >
														Accounts Receivable</option>
																																						<option value="500" >
														Budgeting &amp; Forecasting</option>
																																						<option value="8" >
														Contract Management</option>
																																						<option value="7" >
														Expense Management</option>
																																						<option value="6" >
														Fixed Assets</option>
																																						<option value="515" >
														Pricing</option>
																							</optgroup>
																					<optgroup label="HCM">
																																						<option value="379" >
														Benefits</option>
																																						<option value="211" >
														Career Development</option>
																																						<option value="15" >
														Compensation</option>
																																						<option value="17" >
														Learning</option>
																																						<option value="14" >
														Onboarding</option>
																																						<option value="227" >
														Org Management</option>
																																						<option value="400" >
														Payroll</option>
																																						<option value="16" >
														Performance Management</option>
																																						<option value="236" >
														Recruitment</option>
																																						<option value="19" >
														Time &amp; Attendance</option>
																							</optgroup>
																					<optgroup label="Maintenance">
																																						<option value="975" >
														Asset Management</option>
																																						<option value="973" >
														Execution</option>
																																						<option value="977" >
														Parts Inventory Management</option>
																																						<option value="971" >
														Planning</option>
																							</optgroup>
																					<optgroup label="Marketing">
																																						<option value="1008" >
														AI Insights</option>
																																						<option value="1006" >
														Campaign Configuration</option>
																																						<option value="1010" >
														Collaboration</option>
																																						<option value="1043" >
														Customer Segmentation</option>
																							</optgroup>
																					<optgroup label="Procurement">
																																						<option value="953" >
														Procurement Planning</option>
																																						<option value="957" >
														Purchase Orders</option>
																																						<option value="959" >
														Reporting</option>
																																						<option value="955" >
														Supplier Management</option>
																							</optgroup>
																					<optgroup label="Product Development">
																																						<option value="982" >
														Engineering</option>
																																						<option value="984" >
														Product Data Management</option>
																																						<option value="986" >
														Quality Management</option>
																																						<option value="980" >
														R&D</option>
																							</optgroup>
																					<optgroup label="Production">
																																						<option value="968" >
														Contract Manufacturing</option>
																																						<option value="964" >
														Manufacturing Execution</option>
																																						<option value="962" >
														Planning & Scheduling</option>
																																						<option value="966" >
														Quality Assurance</option>
																							</optgroup>
																					<optgroup label="Sales">
																																						<option value="1020" >
														Account Planning</option>
																																						<option value="1021" >
														Customer Data Management</option>
																																						<option value="1025" >
														Incentive Compensation</option>
																																						<option value="1023" >
														Lead & Opportunity Management</option>
																																						<option value="1019" >
														Quota Planning & Compensation</option>
																																						<option value="1022" >
														Quoting</option>
																							</optgroup>
																					<optgroup label="Test">
																																						<option value="1269" >
														Test</option>
																							</optgroup>
																											</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-bs-dismiss="modal">Close</button>
						<button type="submit" data-bs-dismiss="modal">save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- in-person -->
	<div class="modal fade" id="personModal" tabindex="-1" aria-labelledby="personModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="personModalLabel" style="text-transform: none;">
						In-person</h5>
					<button type="button" class="fa fa-edit ms-2" style="font-size: 14px;" onclick="showInputField(this, 'inperson')"></button>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="https://laravel.thedevelopment.in/business_portal/customer/xqyn63YyOQRz/save/current_it/person" method="POST">
					<input type="hidden" name="_token" value="k8D52BAFqO8Ea5Mz3UbU8HNbGvmui76NFxovRX4q">					<div class="modal-body sidebar_modal_min_height">
						<div class="row g-3 form-box">
							<div class="col-md-6 col-12">
								<label for="">Area</label>
								<select name="person_scope[]" id="person_scope" class="current_it_scope" multiple data-size="5">
																																									<option value="43" >
												Maintenance</option>
																																<option value="84" >
												HCM</option>
																																<option value="487" >
												Financials</option>
																																<option value="918" >
												Digital Commerce</option>
																																<option value="948" >
												Customer Service</option>
																																<option value="949" selected>
												Sales</option>
																																<option value="952" >
												Procurement</option>
																																<option value="961" >
												Production</option>
																																<option value="979" >
												Product Development</option>
																																<option value="998" >
												Marketing</option>
																																<option value="1268" >
												Test</option>
																											</select>
							</div>
							<div class="col-md-6 col-12">
								<label for="">Capability</label>
								<select name="person_capability[]" id="person_capability" class="current_it_capability" multiple data-size="5">
																														<optgroup label="Customer Service">
																																						<option value="996" selected>
														Customer Service</option>
																																						<option value="1027" >
														Digital Service</option>
																																						<option value="1001" selected>
														Field Service</option>
																																						<option value="1029" >
														Knowledge Management</option>
																																						<option value="1028" >
														Returns</option>
																																						<option value="1026" >
														Service Center</option>
																							</optgroup>
																					<optgroup label="Digital Commerce">
																																						<option value="1152" >
														bbs DC</option>
																																						<option value="926" >
														eCommerce</option>
																							</optgroup>
																					<optgroup label="Financials">
																																						<option value="524" >
														Accounting &amp; Financial Close</option>
																																						<option value="488" >
														Accounts Payable</option>
																																						<option value="493" >
														Accounts Receivable</option>
																																						<option value="500" >
														Budgeting &amp; Forecasting</option>
																																						<option value="8" >
														Contract Management</option>
																																						<option value="7" >
														Expense Management</option>
																																						<option value="6" >
														Fixed Assets</option>
																																						<option value="515" >
														Pricing</option>
																							</optgroup>
																					<optgroup label="HCM">
																																						<option value="379" >
														Benefits</option>
																																						<option value="211" >
														Career Development</option>
																																						<option value="15" >
														Compensation</option>
																																						<option value="17" >
														Learning</option>
																																						<option value="14" >
														Onboarding</option>
																																						<option value="227" >
														Org Management</option>
																																						<option value="400" >
														Payroll</option>
																																						<option value="16" >
														Performance Management</option>
																																						<option value="236" >
														Recruitment</option>
																																						<option value="19" >
														Time &amp; Attendance</option>
																							</optgroup>
																					<optgroup label="Maintenance">
																																						<option value="975" >
														Asset Management</option>
																																						<option value="973" >
														Execution</option>
																																						<option value="977" >
														Parts Inventory Management</option>
																																						<option value="971" >
														Planning</option>
																							</optgroup>
																					<optgroup label="Marketing">
																																						<option value="1008" >
														AI Insights</option>
																																						<option value="1006" >
														Campaign Configuration</option>
																																						<option value="1010" >
														Collaboration</option>
																																						<option value="1043" >
														Customer Segmentation</option>
																							</optgroup>
																					<optgroup label="Procurement">
																																						<option value="953" >
														Procurement Planning</option>
																																						<option value="957" >
														Purchase Orders</option>
																																						<option value="959" >
														Reporting</option>
																																						<option value="955" >
														Supplier Management</option>
																							</optgroup>
																					<optgroup label="Product Development">
																																						<option value="982" >
														Engineering</option>
																																						<option value="984" >
														Product Data Management</option>
																																						<option value="986" >
														Quality Management</option>
																																						<option value="980" >
														R&D</option>
																							</optgroup>
																					<optgroup label="Production">
																																						<option value="968" >
														Contract Manufacturing</option>
																																						<option value="964" >
														Manufacturing Execution</option>
																																						<option value="962" >
														Planning & Scheduling</option>
																																						<option value="966" >
														Quality Assurance</option>
																							</optgroup>
																					<optgroup label="Sales">
																																						<option value="1020" >
														Account Planning</option>
																																						<option value="1021" >
														Customer Data Management</option>
																																						<option value="1025" >
														Incentive Compensation</option>
																																						<option value="1023" >
														Lead & Opportunity Management</option>
																																						<option value="1019" >
														Quota Planning & Compensation</option>
																																						<option value="1022" >
														Quoting</option>
																							</optgroup>
																					<optgroup label="Test">
																																						<option value="1269" >
														Test</option>
																							</optgroup>
																											</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-bs-dismiss="modal">Close</button>
						<button type="submit" data-bs-dismiss="modal">save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- operations  -->
	<div class="modal fade" id="operationModal" tabindex="-1" aria-labelledby="operationModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="operationModalLabel" style="text-transform: none;">
						Operations</h5>
					<button type="button" class="fa fa-edit ms-2" style="font-size: 14px;" onclick="showInputField(this, 'operations')"></button>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="https://laravel.thedevelopment.in/business_portal/customer/xqyn63YyOQRz/save/current_it/operations" method="POST">
					<input type="hidden" name="_token" value="k8D52BAFqO8Ea5Mz3UbU8HNbGvmui76NFxovRX4q">					<div class="modal-body sidebar_modal_min_height">
						<div class="row g-3 form-box">
							<div class="col-md-6 col-12">
								<label for="">Area</label>
								<select name="operation_scope[]" id="operation_scope" class="current_it_scope" multiple data-size="5">
																																									<option value="43" >
												Maintenance</option>
																																<option value="84" selected>
												HCM</option>
																																<option value="487" selected>
												Financials</option>
																																<option value="918" >
												Digital Commerce</option>
																																<option value="948" >
												Customer Service</option>
																																<option value="949" >
												Sales</option>
																																<option value="952" selected>
												Procurement</option>
																																<option value="961" selected>
												Production</option>
																																<option value="979" selected>
												Product Development</option>
																																<option value="998" >
												Marketing</option>
																																<option value="1268" >
												Test</option>
																											</select>
							</div>
							<div class="col-md-6 col-12">
								<label for="">Capability</label>
								<select name="operation_capability[]" id="operation_capability" class="current_it_capability" multiple data-size="5">
																														<optgroup label="Customer Service">
																																						<option value="996" >
														Customer Service</option>
																																						<option value="1027" >
														Digital Service</option>
																																						<option value="1001" >
														Field Service</option>
																																						<option value="1029" >
														Knowledge Management</option>
																																						<option value="1028" >
														Returns</option>
																																						<option value="1026" >
														Service Center</option>
																							</optgroup>
																					<optgroup label="Digital Commerce">
																																						<option value="1152" >
														bbs DC</option>
																																						<option value="926" >
														eCommerce</option>
																							</optgroup>
																					<optgroup label="Financials">
																																						<option value="524" >
														Accounting &amp; Financial Close</option>
																																						<option value="488" >
														Accounts Payable</option>
																																						<option value="493" >
														Accounts Receivable</option>
																																						<option value="500" >
														Budgeting &amp; Forecasting</option>
																																						<option value="8" >
														Contract Management</option>
																																						<option value="7" >
														Expense Management</option>
																																						<option value="6" >
														Fixed Assets</option>
																																						<option value="515" >
														Pricing</option>
																							</optgroup>
																					<optgroup label="HCM">
																																						<option value="379" >
														Benefits</option>
																																						<option value="211" >
														Career Development</option>
																																						<option value="15" >
														Compensation</option>
																																						<option value="17" >
														Learning</option>
																																						<option value="14" >
														Onboarding</option>
																																						<option value="227" >
														Org Management</option>
																																						<option value="400" >
														Payroll</option>
																																						<option value="16" >
														Performance Management</option>
																																						<option value="236" >
														Recruitment</option>
																																						<option value="19" >
														Time &amp; Attendance</option>
																							</optgroup>
																					<optgroup label="Maintenance">
																																						<option value="975" >
														Asset Management</option>
																																						<option value="973" >
														Execution</option>
																																						<option value="977" >
														Parts Inventory Management</option>
																																						<option value="971" >
														Planning</option>
																							</optgroup>
																					<optgroup label="Marketing">
																																						<option value="1008" >
														AI Insights</option>
																																						<option value="1006" >
														Campaign Configuration</option>
																																						<option value="1010" >
														Collaboration</option>
																																						<option value="1043" >
														Customer Segmentation</option>
																							</optgroup>
																					<optgroup label="Procurement">
																																						<option value="953" >
														Procurement Planning</option>
																																						<option value="957" >
														Purchase Orders</option>
																																						<option value="959" >
														Reporting</option>
																																						<option value="955" >
														Supplier Management</option>
																							</optgroup>
																					<optgroup label="Product Development">
																																						<option value="982" >
														Engineering</option>
																																						<option value="984" >
														Product Data Management</option>
																																						<option value="986" >
														Quality Management</option>
																																						<option value="980" >
														R&D</option>
																							</optgroup>
																					<optgroup label="Production">
																																						<option value="968" >
														Contract Manufacturing</option>
																																						<option value="964" >
														Manufacturing Execution</option>
																																						<option value="962" >
														Planning & Scheduling</option>
																																						<option value="966" >
														Quality Assurance</option>
																							</optgroup>
																					<optgroup label="Sales">
																																						<option value="1020" >
														Account Planning</option>
																																						<option value="1021" >
														Customer Data Management</option>
																																						<option value="1025" >
														Incentive Compensation</option>
																																						<option value="1023" >
														Lead & Opportunity Management</option>
																																						<option value="1019" >
														Quota Planning & Compensation</option>
																																						<option value="1022" >
														Quoting</option>
																							</optgroup>
																					<optgroup label="Test">
																																						<option value="1269" >
														Test</option>
																							</optgroup>
																											</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-bs-dismiss="modal">Close</button>
						<button type="submit" data-bs-dismiss="modal">save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- enablers  -->
	<div class="modal fade" id="enablersModal" tabindex="-1" aria-labelledby="enablersModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="enablersModalLabel" style="text-transform: none;">
						Enablers</h5>
					<button type="button" class="fa fa-edit ms-2" style="font-size: 14px;" onclick="showInputField(this, 'enablers')"></button>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="https://laravel.thedevelopment.in/business_portal/customer/xqyn63YyOQRz/save/current_it/enablers" method="POST">
					<input type="hidden" name="_token" value="k8D52BAFqO8Ea5Mz3UbU8HNbGvmui76NFxovRX4q">					<div class="modal-body sidebar_modal_min_height">
						<div class="row g-3 form-box">
							<div class="col-md-6 col-12">
								<label for="">Area</label>
								<select name="enablers_scope[]" id="enablers_scope" class="current_it_scope" multiple data-size="5">
																																									<option value="43" >
												Maintenance</option>
																																<option value="84" >
												HCM</option>
																																<option value="487" >
												Financials</option>
																																<option value="918" >
												Digital Commerce</option>
																																<option value="948" >
												Customer Service</option>
																																<option value="949" >
												Sales</option>
																																<option value="952" >
												Procurement</option>
																																<option value="961" >
												Production</option>
																																<option value="979" >
												Product Development</option>
																																<option value="998" >
												Marketing</option>
																																<option value="1268" >
												Test</option>
																											</select>
							</div>
							<div class="col-md-6 col-12">
								<label for="">Capability</label>
								<select name="enablers_capability[]" id="enablers_capability" class="current_it_capability" multiple data-size="5">
																														<optgroup label="Customer Service">
																																						<option value="996" >
														Customer Service</option>
																																						<option value="1027" >
														Digital Service</option>
																																						<option value="1001" >
														Field Service</option>
																																						<option value="1029" >
														Knowledge Management</option>
																																						<option value="1028" >
														Returns</option>
																																						<option value="1026" >
														Service Center</option>
																							</optgroup>
																					<optgroup label="Digital Commerce">
																																						<option value="1152" >
														bbs DC</option>
																																						<option value="926" >
														eCommerce</option>
																							</optgroup>
																					<optgroup label="Financials">
																																						<option value="524" >
														Accounting &amp; Financial Close</option>
																																						<option value="488" >
														Accounts Payable</option>
																																						<option value="493" >
														Accounts Receivable</option>
																																						<option value="500" >
														Budgeting &amp; Forecasting</option>
																																						<option value="8" >
														Contract Management</option>
																																						<option value="7" >
														Expense Management</option>
																																						<option value="6" >
														Fixed Assets</option>
																																						<option value="515" >
														Pricing</option>
																							</optgroup>
																					<optgroup label="HCM">
																																						<option value="379" >
														Benefits</option>
																																						<option value="211" >
														Career Development</option>
																																						<option value="15" >
														Compensation</option>
																																						<option value="17" >
														Learning</option>
																																						<option value="14" >
														Onboarding</option>
																																						<option value="227" >
														Org Management</option>
																																						<option value="400" >
														Payroll</option>
																																						<option value="16" >
														Performance Management</option>
																																						<option value="236" >
														Recruitment</option>
																																						<option value="19" >
														Time &amp; Attendance</option>
																							</optgroup>
																					<optgroup label="Maintenance">
																																						<option value="975" >
														Asset Management</option>
																																						<option value="973" >
														Execution</option>
																																						<option value="977" >
														Parts Inventory Management</option>
																																						<option value="971" >
														Planning</option>
																							</optgroup>
																					<optgroup label="Marketing">
																																						<option value="1008" >
														AI Insights</option>
																																						<option value="1006" >
														Campaign Configuration</option>
																																						<option value="1010" >
														Collaboration</option>
																																						<option value="1043" >
														Customer Segmentation</option>
																							</optgroup>
																					<optgroup label="Procurement">
																																						<option value="953" >
														Procurement Planning</option>
																																						<option value="957" >
														Purchase Orders</option>
																																						<option value="959" >
														Reporting</option>
																																						<option value="955" >
														Supplier Management</option>
																							</optgroup>
																					<optgroup label="Product Development">
																																						<option value="982" >
														Engineering</option>
																																						<option value="984" >
														Product Data Management</option>
																																						<option value="986" >
														Quality Management</option>
																																						<option value="980" >
														R&D</option>
																							</optgroup>
																					<optgroup label="Production">
																																						<option value="968" >
														Contract Manufacturing</option>
																																						<option value="964" >
														Manufacturing Execution</option>
																																						<option value="962" >
														Planning & Scheduling</option>
																																						<option value="966" >
														Quality Assurance</option>
																							</optgroup>
																					<optgroup label="Sales">
																																						<option value="1020" >
														Account Planning</option>
																																						<option value="1021" >
														Customer Data Management</option>
																																						<option value="1025" >
														Incentive Compensation</option>
																																						<option value="1023" >
														Lead & Opportunity Management</option>
																																						<option value="1019" >
														Quota Planning & Compensation</option>
																																						<option value="1022" >
														Quoting</option>
																							</optgroup>
																					<optgroup label="Test">
																																						<option value="1269" >
														Test</option>
																							</optgroup>
																											</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-bs-dismiss="modal">Close</button>
						<button type="submit" data-bs-dismiss="modal">save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <div class="current-it-slider-block  ">
		<div class="main-slider-block">
			<div class="d-flex justify-content-start gap-3 slider-type-radio">
				<div class="form-check form-switch">
					<input class="form-check-input slider-type" type="checkbox" id="slider_type" >
					<label class="form-check-label slider-type-label"
						for="slider_type">Capability</label>
				</div>
			</div>
			<div class="d-flex justify-content-end gap-3 slider-close-btn" id="arc-slider-close">
				<div> <i class="fas fa-arrow-right"></i> </div>
			</div>

			<div class="slide-block">

				<!-- marketing  -->
				<div class="slider_wrap sld_up_1">
					<div class="slider_title text-center">
						<a href="javascript:void(0);" class="" data-bs-toggle="modal" data-bs-target="#marketingModal">
							<span class="mb-0">Marketing</span>
							<i class="fas fa-plus"></i>
						</a>
					</div>
					<div class="slider-caption section first-section up-section">
						<div class="owl-carousel owl-theme icon-slider scope_marketing_slider scope-slider ">
						    <a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/949" class="item-box">
                                <span><i class="fas fa-file-alt dark-red-icon"></i></span>
                                <h5>Sales</h5>
                            </a>
                        </div>
                        <div class="item text-center">
                            <a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/998" class="item-box">
                                <span><i class="fas fa-file-alt dark-red-icon"></i></span>
                                <h5>Marketing</h5>
                            </a>
                        </div>
                    </div>

                    <div class="owl-carousel owl-theme icon-slider app_marketing_slider application-slider hide-slider">
                        <div class="item text-center">
                            <a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTIw" class="item-box">
                                <span>
                                    <img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
                                </span>
                                <h5>HubSpot</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

				<!-- online  -->
				<div class="slider_wrap sld_up sld_up_2">
					<div class="slider_title text-center">
						<a href="javascript:void(0);" class="" data-bs-toggle="modal" data-bs-target="#onlineModal">
							<span class="mb-0">eCommerce</span>
							<i class="fas fa-plus"></i>
						</a>
					</div>
					<div class="slider-caption section second-section ">
						<div class="owl-carousel owl-theme icon-slider scope_online_slider scope-slider ">
																																	<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/926"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>eCommerce</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/937"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>Mobile Application</h5>
										</a>
									</div>
																					</div>

						<div class="owl-carousel owl-theme icon-slider app_online_slider application-slider hide-slider">
													</div>
					</div>
				</div>

				<!-- in-person  -->
				<div class="slider_wrap sld_up sld_up_3">
					<div class="slider_title text-center">
						<a href="javascript:void(0);" class="" data-bs-toggle="modal" data-bs-target="#personModal">
							<span class="mb-0">Retail Stores</span>
							<i class="fas fa-plus"></i>
						</a>
					</div>
					<div class="slider-caption section third-section ">
						<div class="owl-carousel owl-theme icon-slider scope_in_person_slider scope-slider ">
																																	<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/862"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>Core POS</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/874"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>Customer Experience</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/877"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt green-icon"></i></span>
											<h5>Loyalty</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/879"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>Sales / Returns</h5>
										</a>
									</div>
																					</div>

						<div class="owl-carousel owl-theme icon-slider app_in_person_slider application-slider hide-slider">
																								<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTI0" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>Howell Data Systems</h5>
										</a>
									</div>
																					</div>
					</div>
				</div>

				<!-- operations  -->
				<div class="slider_wrap sld_up sld_up_4">
					<div class="slider_title text-center">
						<a href="javascript:void(0);" class="" data-bs-toggle="modal" data-bs-target="#operationModal">
							<span class="mb-0">Operations</span>
							<i class="fas fa-plus"></i>
						</a>
					</div>
					<div class="slider-caption section fourth-section ">
						<div class="owl-carousel owl-theme icon-slider scope_opration_slider scope-slider ">
																																	<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/84"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>HCM</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/487"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>Financials</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/912"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>SCM</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/919"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>Back-office</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/952"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>Procurement</h5>
										</a>
									</div>
																					</div>

						<div class="owl-carousel owl-theme icon-slider app_opration_slider application-slider hide-slider">
																								<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTE2" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>Payworks</h5>
										</a>
									</div>
																	<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTE3" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>Sage 300</h5>
										</a>
									</div>
																	<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTIz" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>BambooHR</h5>
										</a>
									</div>
																	<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTI0" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>Howell Data Systems</h5>
										</a>
									</div>
																	<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTI1" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>DEAR</h5>
										</a>
									</div>
																	<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTM3" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>Absorb LMS</h5>
										</a>
									</div>
																	<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTQw" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>Adobe</h5>
										</a>
									</div>
																					</div>
					</div>
				</div>

				<!-- Enablers  -->
				<div class="slider_wrap sld_up sld_up_5">
					<div class="slider_title text-center">
						<a href="javascript:void(0);" class="" data-bs-toggle="modal" data-bs-target="#enablersModal">
							<span class="mb-0">Enablers</span>
							<i class="fas fa-plus"></i>
						</a>
					</div>
					<div class="slider-caption section fifth-section ">
						<div class="owl-carousel owl-theme icon-slider scope_enabler_slider scope-slider ">
																																	<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/1093"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>Integrations</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/1095"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>Telecom</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/1097"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="fas fa-file-alt dark-red-icon"></i></span>
											<h5>Security</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/1135"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="far fa-file-alt dark-red-icon"></i></span>
											<h5>Knowledge Management</h5>
										</a>
									</div>
																										<div class="item">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/business_capability/overview/1136"
											class="item-box item-odd d-flex flex-column gap-1 align-items-center">
											<span><i class="far fa-file-alt dark-red-icon"></i></span>
											<h5>Project Management</h5>
										</a>
									</div>
																					</div>

						<div class="owl-carousel owl-theme icon-slider app_enabler_slider application-slider hide-slider">
																								<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTIx" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>Zendesk</h5>
										</a>
									</div>
																	<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTIy" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>Zoom</h5>
										</a>
									</div>
																	<div class="item text-center">
										<a href="https://laravel.thedevelopment.in/business_portal/customer/Ml9KOa5DOV0j/application/overview/MTI2" class="item-box">
											<span>
												<img id="application-logo" src="https://laravel.thedevelopment.in/business_portal/uploads/users/slider-application.png" alt="">
											</span>
											<h5>Wordpress</h5>
										</a>
									</div>
																					</div>
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection

@section('footerScripts')

    {{-- <script src="https://laravel.thedevelopment.in/business_portal/assets/business_assets/js/jquery.js"></script>
    <script src="https://laravel.thedevelopment.in/business_portal/assets/business_assets/js/bootstrap.bundle.min.js"></script>

    <script src="https://laravel.thedevelopment.in/business_portal/assets/business_assets/js/plugins.bundle.js"></script>
    <script src="https://laravel.thedevelopment.in/business_portal/assets/business_assets/js/jquery-ui.min.js"></script>
    <script src="https://laravel.thedevelopment.in/business_portal/assets/business_assets/js/scripts.bundle.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}

@stop
