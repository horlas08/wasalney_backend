




@php($lang=getLang())
@php($setting=\App\Models\Setting::where('lang_abbr',$lang)->first())
@php($title=isset($title) && $setting!=null?$setting->name.' | '.$title:(isset($title)?$title:($setting!=null?$setting->name:'')))
@php($description=isset($description)?$description: ($setting!=null?$setting->description:''))
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
<meta content="IE=Edge" http-equiv="X-UA-Compatible">
<meta name="description" content="{{$description}}">
<title>{{$title}}</title>
<meta property="og:locale" content="{{$lang}}"/>

@if($setting!=null)
<link rel="manifest" href="{{'/setting/'.$lang.'/manifest.json'}}">
<!-- iOS meta tags & icons -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="{{$setting->theme_color}}">
<meta name="apple-mobile-web-app-title" content="{{$setting->name}}">


<link rel="apple-touch-icon" sizes="57x57" href="{{'/setting/'.$lang.'/57/'.$setting->favicon}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{'/setting/'.$lang.'/60/'.$setting->favicon}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{'/setting/'.$lang.'/72/'.$setting->favicon}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{'/setting/'.$lang.'/76/'.$setting->favicon}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{'/setting/'.$lang.'/114/'.$setting->favicon}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{'/setting/'.$lang.'/120/'.$setting->favicon}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{'/setting/'.$lang.'/144/'.$setting->favicon}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{'/setting/'.$lang.'/152/'.$setting->favicon}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{'/setting/'.$lang.'/180/'.$setting->favicon}}">

<meta name="msapplication-TileColor" content="{{$setting->background_color}}">
<meta name="msapplication-TileImage" content="{{'/setting/'.$lang.'/144/'.$setting->favicon}}">
<meta name="theme-color" content="{{$setting->theme_color}}">

<link rel="icon" type="image/png" sizes="192x192" href="{{'/setting/'.$lang.'/192/'.$setting->favicon}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{'/setting/'.$lang.'/96/'.$setting->favicon}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{'/setting/'.$lang.'/32/'.$setting->favicon}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{'/setting/'.$lang.'/16/'.$setting->favicon}}">

@endif
