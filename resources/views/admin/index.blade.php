 
@include('admin.layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.layouts.navbar')

        @include('admin.layouts.sidebar')
        <div class="content-wrapper">
            <div class="container">
                <div class="p-3" style="text-align:center">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

@include('admin.layouts.footer')