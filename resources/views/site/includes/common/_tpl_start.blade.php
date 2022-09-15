<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ getSetting('site_name') }}</title>
    @if(getSetting('site_favicon') != null)
        <link rel="shortcut icon" href="{{ URL::asset('uploads/setting_images/'.getSetting('site_favicon')) }}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{ URL::asset('uploads/setting_images/no_favicon_found.png') }}" type="image/x-icon">
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/core_rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/style_rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/responsive.css') }}">
</head>
<body class="home">
    
