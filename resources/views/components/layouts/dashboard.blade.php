@section('title')
    @yield('title')
@endsection

@section('vendor css')
    @yield('vendor-css')
@endsection


 <!--begin::Main-->		
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">

            <!--begin::Aside-->
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
            <!--begin::Logo-->
            @include('partials.sidebar._logo')
            <!--end::Logo-->
            <!--begin::Nav-->
            @include('partials.sidebar._nav')
            <!--end::Nav-->
            <!--begin::Footer-->
            @include('partials.sidebar._footer')
            
            <!--end::Footer-->
            </div>
            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header tablet and mobile-->
                @include('partials._header_tablet_mobile')
                <!--end::Header tablet and mobile-->
                
                <!--begin::Header-->
                @include('partials.header')
                <!--end::Header-->

                <!--begin::Content-->
                {{$slot}}
                <!--end::Content-->
                
                <!--begin::Footer-->
                @include('partials.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Drawers-->
    @include('partials.drawers.drawer')
	<!--begin::Activities drawer-->
    <!--end::Activities drawer-->
	<!--begin::Chat drawer-->
    <!--end::Chat drawer-->
	<!--begin::Chat drawer-->
    <!--end::Chat drawer-->
    <!--end::Drawers-->
    <!--end::Main-->

    <!--begin::Scrolltop-->
    @include('partials._scrolltop')
    <!--end::Scrolltop-->

    <!--begin::Modals-->
    @include('partials.modals.modal')
    <!--begin::Modal - Upgrade plan-->
    <!--end::Modal - Upgrade plan-->
    <!--begin::Modal - Create App-->
    <!--end::Modal - Create App-->
    <!--begin::Modal - Users Search-->
    <!--end::Modal - Users Search-->
    <!--begin::Modal - Invite Friends-->
    <!--end::Modal - Invite Friend-->
    <!--end::Modals-->


@section('vendor javascript')
    @yield('vendor-javascript')
@endsection

@section('custom javascript')
    @yield('custom-javascript')
    @stack('scripts')
@endsection


