
	
@extends('layout.screen')

		@section('content')
		<div class="site-content" ng-controller="HomeController">
		
		
		
		
		
		
		
		
		
			<div class="site-header">
				<div class="container">
					<a href="index.html" class="branding">
						<img src="{{asset('images/logo.png') }}" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Company name</h1>
							<small class="site-description">tagline goes here</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="index.html">Home</a></li>
							<li class="menu-item"><a href="news.html">News</a></li>
							<li class="menu-item"><a href="live-cameras.html">Live cameras</a></li>
							<li class="menu-item"><a href="photos.html">Photos</a></li>
							<li class="menu-item"><a href="contact.html">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->
			
			
			
		
			
			
			@include('components.locationAutoComplete')
			
			
			
			
			
			@include('components.forecastTable')
			
			
				
				
					
			@include('components.locationDropdown')
				
				
				
				
				

			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
						
						
						
						</div>
						
					</div>

					<p class="colophon">Copyright 2014 Company name. Designed by Themezy. All rights reserved</p>
				</div>
			</footer> <!-- .site-footer -->
		</div>
		
		<script>			
		 var backendStatus = "{!! $status !!}";
		 if(backendStatus != "OK")
			 alert(backendStatus);
		 
		 </script>	
		
		
		<script src="{{asset('js/controller/home.js') }}"></script>
		
		
		<script src="{{asset('js/js/jquery-1.11.1.min.js') }}"></script>
		<script src="{{asset('js/js/plugins.js') }}"></script>
		
		
		
		<!-- <script>require('./bootstrap');</script> -->

@endsection