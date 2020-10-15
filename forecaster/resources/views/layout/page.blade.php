<!DOCTYPE html>
<!-- <html lang="{{ app()->getLocale() }}"  ng-app='main' ng-controller='AppBase'> -->
<html  lang="{{ app()->getLocale() }}">

    
@include('components.import')

<body class="">
	@yield('content')
</body>

@include('components.footer')

</html>