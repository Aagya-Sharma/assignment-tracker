<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <link rel="stylesheet" href="/css/Admin/groupList.css">
</head>
<body>
    @include('partials.nav')
    @include('partials.sidebar')
    <div id="col-2">
        <ul class="assign-main">
                <li class="assign-head">Class List</li>
        </ul>
        
        
        <ul class="assignment-detail-body">
        @foreach($groups as $group)
                <li> >> {{ $group->classname}}</li>
        @endforeach
        </ul>
      

       
    </div>
    @include('partials.footer')
</body>
</html>