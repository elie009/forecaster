<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"  ng-app='main' ng-controller='AppBase'>

    <head>
    	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    	
    	
    	<title>Compass Starter by Ariona, Rian</title>
    	
    
    
        @include('script.angular')
        @include('script.mainscript')
    
    </head>

    <body class="">
    	@yield('content')
    </body>
    
    @include('layout.footer')

</html>