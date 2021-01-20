<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta charset="UTF-8">
		
		<link rel='stylesheet' id='reboot-css'          href='{{ url('/') }}/_slicing/css/bootstrap-reboot.min.css'  media='all' />
		<link rel='stylesheet' id='bootstrap-grid-css'  href='{{ url('/') }}/_slicing/css/bootstrap-grid.min.css'    media='all' />
		<link rel='stylesheet' id='bootstrap-css'       href='{{ url('/') }}/_slicing/css/bootstrap.min_16.css'      media='all' />
		<link rel='stylesheet' id='font-awesome-css'    href='{{ url('/') }}/_slicing/css/font-awesome.min.css'      media='all' />
		<link rel='stylesheet' id='main-css'            href='{{ url('/') }}/_slicing/css/main.css'                  media='all' />
		<link rel='stylesheet' id='datepicker-css'      href='{{ url('/') }}/_slicing/css/datepicker.min.css'        media='all' />
		
		<link rel="icon"                                href="{{ url('/') }}/_slicing/img/cropped-logo-1-32x32.png" sizes="32x32" />
		<link rel="icon"                                href="{{ url('/') }}/_slicing/img/cropped-logo-1-192x192.png" sizes="192x192" />
		<link rel="apple-touch-icon-precomposed"        href="{{ url('/') }}/_slicing/img/cropped-logo-1-180x180.png" />
		<meta name="msapplication-TileImage"         content="{{ url('/') }}/_slicing/img/cropped-logo-1-270x270.png" />
		<meta name="csrf-token"                      content="{{ csrf_token() }}">
	</head>
	<body>