<!DOCTYPE html>
<html lang="id">
	<!--begin::Head-->
	<head>
		<base href=""/>
		<title>{{ config('app.name', 'Laravel') }}</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta charset="utf-7" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="id_ID" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="" />
		<link rel="canonical" href="" />

		<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->

		<!--begin::Vendor Stylesheets(used for this page only)-->
		@yield('vendor css')
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		@livewireStyles
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self)
		//  { window.top.location.replace(window.self.location.href); }
		 </script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->

		@yield('content')
       
        <!--begin::Javascript-->
		// <script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		@yield('vendors javascript')
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		@yield('custom javascript')
		<!--end::Custom Javascript-->
		<!--end::Javascript-->

		<script>
			document.addEventListener('livewire:init', () => {
				Livewire.on('success', (message) => {
					toastr.success(message);
				});
				Livewire.on('error', (message) => {
					toastr.error(message);
				});

				Livewire.on('swal', (message, icon, confirmButtonText) => {
					if (typeof icon === 'undefined') {
						icon = 'success';
					}
					if (typeof confirmButtonText === 'undefined') {
						confirmButtonText = 'Ok, got it!';
					}
					Swal.fire({
						text: message,
						icon: icon,
						buttonsStyling: false,
						confirmButtonText: confirmButtonText,
						customClass: {
							confirmButton: 'btn btn-primary'
						}
					});
				});
			});
		</script>

		@livewireScripts
	</body>
	<!--end::Body-->
</html>