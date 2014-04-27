<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
</head>
<body>
@if (Session::get('flash_message'))
<div class="flash">
{{ Session::get('flash_message') }}
</div>
@endif

<div class="content">
@yield('content')
</div>
</body>
</html>