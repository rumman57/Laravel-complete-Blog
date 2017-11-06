
<script type="text/javascript" src="{{ URL::asset('js/jquery.mobilemenu.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/html5shiv.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/respond.min.js') }}"></script>
@yield('header_scripts')
<script>
    $(document).ready(function(){
        $('.menu').mobileMenu();
    });
</script>

