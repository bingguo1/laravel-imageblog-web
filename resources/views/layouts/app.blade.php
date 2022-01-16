@include('partials.headcontent')
<body>
    @include('partials.navbar')
    @include('partials.flash')
<div class="container" style="margin-top:10px;">
    @yield('content')
</div>

@include('partials.footercontent')
