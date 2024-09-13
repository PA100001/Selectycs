@extends('Customer.Layouts.current_it.common')

@section('title', 'It Portfolio')

@section('headerScripts')
    <link rel="stylesheet" href="{{ URL::asset('assets/b2b/css/new-layout.css') }}">
@stop

@section('content')
    <div class="container-wrap d-flex flex-column flex-grow-1">

        @include('BusinessNeeds.Manage.It_portfolio.Include.detail_page_tabs')

        <div class="container-wrap-result flex-grow-1 overflow-auto">
            <div class="overview-content full-width">
                <div class="content-caption d-flex flex-column">
                    <div class="grid-wapper">
                        <div class="grid-item d-flex flex-column gap-3 expenses-grid-box">
                            <div class="title-bar">
                                <p class="box-title mb-0 flex-grow-1">Expenses (Annual)</p>
                            </div>
                            <ul class="listing-caption-bar d-flex flex-column gap-3">
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/license.svg') }}" alt="" width="14px" style="margin-right: 4px">
                                    License</p>
                                    <span class="text-black">${{$license}}</span>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/maintenance_icon_1.svg') }}" alt="" width="14px" style="margin-right: 4px">
                                    <!-- <img src="{{ asset('assets/media/svg/icons/General/maintenance_icon_2.svg') }}" alt="" width="14px" style="margin-right: 4px"> -->
                                    Maintenance</p>
                                    <span class="text-black">${{$maintenance}}</span>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/upgrade_icon_2.svg') }}" alt="" width="14px" style="margin-right: 4px">
                                    Upgrade</p>
                                    <span class="text-black">${{$upgrade}}</span>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/menu-circle.svg') }}" alt="" width="15px" style="margin-right: 3px">
                                    Other</p>
                                    <span class="text-black">${{$other}}</span>
                                </li>
                                <li class="d-flex align-items-center gap-3 border-top pt-1">
                                    <p class="title mb-0 flex-grow-1 fw-bold">Total</p>
                                    <span class="text-black fw-bold">${{$total}}</span>
                                </li>
                            </ul>
                            <div class="bot-bar mt-auto">
                                <span class="inst-desc">Consumes <span style=" font-size: 12px; font-weight: 600px; margin-inline: 1px">{{ $cost_data->total_pr ?? 0 }}%</></span> of annual application budget</span>
                            </div>
                        </div>
                        <div class="grid-item d-flex flex-column gap-3 projects-grid-box">
                            <div class="title-bar">
                                <p class="box-title mb-0 flex-grow-1">Projects <span>({{count($initiativeData)}})</span></p>
                            </div>
                            <ul class="listing-caption-bar d-flex flex-column gap-3">
                                @if(isset($initiativeData) && !empty($initiativeData))
						            @foreach($initiativeData as $ikey => $digitalbets)
                                        <li class="d-flex align-items-center gap-3">
                                            <p class="title mb-0 flex-grow-1">{!! $digitalbets->initiative_name !!}</p>
                                            <!-- ADD OTHER CASES AS WELL -->
                                            @php
                                                $status = $digitalbets->status;
                                                $backgroundColor = 'gray'; // default color
                                                $textColor = 'white'; // default text color

                                                switch($status) {
                                                    case 'On Track':
                                                        $backgroundColor = 'var(--bs-success)';
                                                        $textColor = 'white';
                                                        break;
                                                    case 'Not Started':
                                                        $backgroundColor = 'var(--bs-blue)';
                                                        $textColor = 'white';
                                                        break;
                                                    case 'delayed':
                                                        $backgroundColor = 'var(--bs-danger)';
                                                        $textColor = 'white';
                                                        break;
                                                    // Add more cases as needed
                                                }
                                            @endphp

                                            <span style="width: 90px; border-radius: 4px; background-color: {{ $backgroundColor }}; color: {{ $textColor }};" class="px-2 text-center">
                                                {{ $status }}
                                            </span>
                                             <!-- <span class="px-2">{{$digitalbets->status}}</span> -->
                                        </li>
                                    @endforeach

                                @endif
                            </ul>
                            <div class="bot-bar mt-auto text-center">
                                <a href="#" class="inst-desc">+Create a new project</a>
                            </div>
                        </div>
                        <div class="grid-item d-flex flex-column gap-3 info-grid-box" id="overview-info-tab">
                            <div class="title-bar">
                                <p class="box-title mb-0 flex-grow-1">Info</p>
                            </div>
                            <ul class="listing-caption-bar d-flex flex-column gap-3">
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/status_icon.svg') }}" alt="" width="14px" style="margin-right: 4px; margin-bottom: 4px;">       
                                    Status</p>

                                    {{-- Icons not setting in the drop down. Only text is showing in both the options. --}}
                                    
                                    <select class="select2" name="status" id="status" data-live-search="true" required>
                                        <option value="1" data-icon="{{ asset('assets/media/svg/icons/General/active-status.svg') }}" {{($details->application_status == 1) ? 'selected' : ''}}>
                                        Active</option>
                                        <option value="2" 
                                        data-icon="{{ asset('assets/media/svg/icons/General/retired-status.svg') }}"
                                        {{($details->application_status == 2) ? 'selected' : ''}}>
                                        Retired</option>
                                    </select>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/version-history.svg') }}" alt="" width="16px" style="margin-right: 2px; margin-bottom: 4px;">    
                                    Version</p>
                                    <input type="text" placeholder="Enter Version" class="form-control">
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/stack.svg') }}" alt="" width="16px" style="margin-right: 2px; margin-bottom: 4px;">    
                                    Type</p>
                                    <select class="select2" name="" id="" data-live-search="true" required>
                                        <option value="" selected>Custom</option>
                                        <option value="" >SaaS</option>
                                        <option value="" >COTS</option>
                                    </select>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/category-variety-random-shuffle.svg') }}" alt="" width="16px" style="margin-right: 2px; margin-bottom: 4px;">    
                                    Category</p>
                                    <select class="select2" name="" id="" data-live-search="true" required>
                                        <option value="" selected>Category 1</option>
                                        <option value="" >Category 2</option>
                                        <option value="" >Category 3</option>
                                    </select>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/location-pin.svg') }}" alt="" width="16px" style="margin-right: 2px; margin-bottom: 4px;">    
                                    Location</p>
                                    <select name="initiative_capability" id=""  class="form-control multicheck_select" multiple>
                                        <option value="Location1">Location 1</option>
                                        <option value="Location2">Location 2</option>
                                        <option value="Location3" >Location 3</option>
                                    </select>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/server.svg') }}" alt="" width="16px" style="margin-right: 2px; margin-bottom: 4px;">    
                                    Environment</p>
                                    <span class="text-black"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="grid-item d-flex flex-column gap-3 usage-grid-box">
                            <div class="title-bar d-flex align-items-center gap-3 ">
                                <p class="box-title mb-0 flex-grow-1">Usage<span>+</span></p>
                                <span>Total 25-35 Users</span>
                            </div>
                            <div class="table-listing-bar h-100">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Finance</td>
                                                <td> 3 sub-areas</td>
                                                <td class="text-center">10-15 Users</td>
                                                <td>
                                                    <ul class="action-box d-flex align-items-center justify-content-center gap-1">
                                                        <li>
                                                            <a href="javascript:;" class="d-flex delete-btn align-items-center justify-content-center" style="border:none;">
                                                                <div class="icon-bar">
                                                                    <svg width="36" height="43" viewBox="0 0 36 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12 15.4983H15V33.4983H12V15.4983Z" fill="black"/>
                                                                        <path d="M21 15.4983H24V33.4983H21V15.4983Z" fill="black"/>
                                                                        <path d="M0 6.49829V9.49829H3V39.4983C3 40.2939 3.31607 41.057 3.87868 41.6196C4.44129 42.1822 5.20435 42.4983 6 42.4983H30C30.7956 42.4983 31.5587 42.1822 32.1213 41.6196C32.6839 41.057 33 40.2939 33 39.4983V9.49829H36V6.49829H0ZM6 39.4983V9.49829H30V39.4983H6Z" fill="black"/>
                                                                        <path d="M12 0.498291H24V3.49829H12V0.498291Z" fill="black"/>
                                                                    </svg>
                                                                    {{-- <img src="img/delete.svg" style="width:calc(16px + 0.2vw); max-width: 20px;"/> --}}
                                                                </div>
                                                           </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Manufacturing</td>
                                                <td> 5 sub-areas</td>
                                                <td class="text-center">15-20 Users</td>
                                                <td>
                                                    <ul class="action-box d-flex align-items-center justify-content-center gap-1">
                                                        <li>
                                                            <a href="javascript:;" class="d-flex delete-btn align-items-center justify-content-center" style="border:none;">
                                                                <div class="icon-bar">
                                                                    <svg width="36" height="43" viewBox="0 0 36 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12 15.4983H15V33.4983H12V15.4983Z" fill="black"/>
                                                                        <path d="M21 15.4983H24V33.4983H21V15.4983Z" fill="black"/>
                                                                        <path d="M0 6.49829V9.49829H3V39.4983C3 40.2939 3.31607 41.057 3.87868 41.6196C4.44129 42.1822 5.20435 42.4983 6 42.4983H30C30.7956 42.4983 31.5587 42.1822 32.1213 41.6196C32.6839 41.057 33 40.2939 33 39.4983V9.49829H36V6.49829H0ZM6 39.4983V9.49829H30V39.4983H6Z" fill="black"/>
                                                                        <path d="M12 0.498291H24V3.49829H12V0.498291Z" fill="black"/>
                                                                    </svg>
                                                                </div>
                                                           </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="grid-item d-flex flex-column gap-3 note-grid-box">
                            <div class="title-bar">

                            </div>
                        </div> --}}
                        <textarea class="grid-item d-flex flex-column gap-3 note-grid-box" id="notes">{{$details->notes}}</textarea>
                        <div class="grid-item d-flex flex-column gap-3 hosted-grid-box">
                            <ul class="listing-caption-bar d-flex flex-column gap-3">
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/location-pin.svg') }}" alt="" width="16px" style="margin-right: 2px; margin-bottom: 4px;">    
                                    Hosted At</p>
                                    <select name="hosting_location" id="hosting_location" class="select2" >
                                        <option value="">Hosting Location</option>
                                        @if(isset($stateCities) && !empty($stateCities))
                                            @foreach($stateCities as $skey => $value)
                                                @php
                                                $selected = "";
                                                if (isset($applicationRightData->hosting_location_city) && !empty($applicationRightData->hosting_location_city)) {
                                                    if ($applicationRightData->hosting_location_city == $value->cityId) {
                                                        $selected = "selected";
                                                    }
                                                }
                                                @endphp
                                                <option value="{{ $value->cityId }}" {!! $selected !!}>{{ $value->statesName }} / {{ $value->cityName }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/critical-icon.svg') }}" alt="" width="14px" style="margin-right: 4px; margin-bottom: 4px;">    
                                    Criticality</p>
                                    <select name="assessment" id="assessment"  class="select2" data-live-search="true" required>
                                        <option value="Review" {{ ($details['assessment'] == 'Review') ? 'selected' : ''}}>Review</option>
                                        <option value="Retire" {{ ($details['assessment'] == 'Retire') ? 'selected' : ''}}>Retire</option>
                                        <option value="Retain" {{ ($details['assessment'] == 'Retain') ? 'selected' : ''}}>Retain</option>
                                        <option value="Repair" {{ ($details['assessment'] == 'Repair') ? 'selected' : ''}}>Repair</option>
                                    </select>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/calendar-time.svg') }}" alt="" width="14px" style="margin-right: 4px; margin-bottom: 4px;">    
                                    License Renewal</p>
                                    <span>20-08-2023</span>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/calendar-plus.svg') }}" alt="" width="16px" style="margin-right: 2px; margin-bottom: 4px;">    
                                    Onboarded</p>
                                    <span>{!! isset($applicationRightData->plan_date) && $applicationRightData->plan_date != NULL ? date('d-m-Y', strtotime($applicationRightData->plan_date)) : 'N/A' !!}</span>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/calendar-xmark.svg') }}" alt="" width="16px" style="margin-right: 2px; margin-bottom: 4px;">    
                                    End of Life</p>
                                    <span>{!! isset($applicationRightData->retire_date) && $applicationRightData->retire_date != NULL ? date('d-m-Y', strtotime($applicationRightData->retire_date)) : 'N/A' !!}</span>
                                </li>
                                <li class="d-flex align-items-center gap-3">
                                    <p class="title mb-0 flex-grow-1">
                                    <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/network-server.svg') }}" alt="" width="16px" style="margin-right: 2px; margin-bottom: 4px;">    
                                    Vendor</p>
                                    <span>
                                        @if(isset($vendorsBySelectedScope) && !empty($vendorsBySelectedScope))
                                        <?php $vName = ""; ?>
                                            @foreach($vendorsBySelectedScope as $key => $vendors)
                                                <?php
                                                    if(isset($applicationRightData->lifecycle_vendor) && $applicationRightData->lifecycle_vendor != 'null') {
                                                        $lifecycle_vendor_ar = json_decode($applicationRightData->lifecycle_vendor);
                                                        if(in_array($vendors->slug_name, $lifecycle_vendor_ar)) {
                                                            $vName = $vendors->name.',';
                                                        }
                                                    }
                                                ?>
                                            @endforeach
                                            {!! $vName ? $vName : 'N/A' !!}
                                        @endif
                                </span>
                                </li>
                                <li class="d-flex flex-column gap-1">
                                    <div class="d-flex align-items-center gap-3">
                                        <p class="title mb-0 flex-grow-1">
                                        <img class="it-portfolio-icon" src="{{ asset('assets/media/svg/icons/General/attachment.svg') }}" alt="" width="16px" style="margin-right: 2px; margin-bottom: 4px;">    
                                        Attachment</p>
                                        <span>{{$attachmentCount}} Documents</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('footerScripts')

    @include('BusinessNeeds.Manage.It_portfolio.Js.index_js')
@stop
