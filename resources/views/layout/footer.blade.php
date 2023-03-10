    {{-- {{$content}} --}}
    <!--end::Content-->
    <!--begin::Footer-->
    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
        <!--begin::Container-->
        <div
            class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2">© <?= date('Y'); ?></span>
                <a href="#" class="text-dark-75 text-hover-primary">{{ config('app.name') }}</a>
            </div>
            <!--end::Copyright-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
<span class="svg-icon">
<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24" />
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
        <path
            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
            fill="#000000" fill-rule="nonzero" />
    </g>
</svg>
<!--end::Svg Icon-->
</span>
</div>
<!--end::Scrolltop-->
<script>
var KTAppSettings = {
"breakpoints": {
    "sm": 576,
    "md": 768,
    "lg": 992,
    "xl": 1200,
    "xxl": 1400
},
"colors": {
    "theme": {
        "base": {
            "white": "#ffffff",
            "primary": "#3699FF",
            "secondary": "#E5EAEE",
            "success": "#1BC5BD",
            "info": "#8950FC",
            "warning": "#FFA800",
            "danger": "#F64E60",
            "light": "#E4E6EF",
            "dark": "#181C32"
        },
        "light": {
            "white": "#ffffff",
            "primary": "#E1F0FF",
            "secondary": "#EBEDF3",
            "success": "#C9F7F5",
            "info": "#EEE5FF",
            "warning": "#FFF4DE",
            "danger": "#FFE2E5",
            "light": "#F3F6F9",
            "dark": "#D6D6E0"
        },
        "inverse": {
            "white": "#ffffff",
            "primary": "#ffffff",
            "secondary": "#3F4254",
            "success": "#ffffff",
            "info": "#ffffff",
            "warning": "#ffffff",
            "danger": "#ffffff",
            "light": "#464E5F",
            "dark": "#ffffff"
        }
    },
    "gray": {
        "gray-100": "#F3F6F9",
        "gray-200": "#EBEDF3",
        "gray-300": "#E4E6EF",
        "gray-400": "#D1D3E0",
        "gray-500": "#B5B5C3",
        "gray-600": "#7E8299",
        "gray-700": "#5E6278",
        "gray-800": "#3F4254",
        "gray-900": "#181C32"
    }
},
"font-family": "Poppins"
};

</script>
{{-- <script src="{{asset('metch')}}/plugins/custom/datatables/datatables.bundlef552.js?v=7.1.8"></script> --}}
<script src="{{asset('metch')}}/plugins/global/plugins.bundlef552.js?v=7.1.8"></script>
{{-- <script src="{{asset('metch')}}/plugins/custom/prismjs/prismjs.bundlef552.js?v=7.1.8"></script> --}}
<script src="{{asset('metch')}}/js/scripts.bundlef552.js?v=7.1.8"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('metch')}}/plugins/custom/fullcalendar/fullcalendar.bundlef552.js?v=7.1.8"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('metch')}}/js/pages/widgetsf552.js?v=7.1.8"></script>
{{-- cdn datatable --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-html5-1.6.5/datatables.min.js"></script>
@stack('scripts')
<!--end::Page Scripts-->
</body>
<!--end::Body-->


</html>
