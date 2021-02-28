<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/partials//NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <link rel="stylesheet" href="/css/student/Assignment.css">
    <title></title>
</head>
<body>
    @include('partials.nav')
    @include('partials.sidebar')
    <div id="col-2">
        <h2>Select your class</h2>
        <select style="width:350px;"onchange="location = this.value">
            <option value="">--select class--</option>
            @foreach ($groups as $group)
            <option value = "{{route('Stdashboard', $group->id)}}">  {{$group->classname}} </option>
            @endforeach
        </select>
    </div>
    @include('partials.footer')
</body>
</html>