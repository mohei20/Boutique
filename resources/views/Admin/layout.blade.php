@include('Admin.includes.header')

@include('Admin.includes.nav')
<div class="container-fluid">
    @include('Admin.includes.sidebar')
    <main id="main" class="main">

        @yield('content')

        @include('Admin.includes.footer')
