<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <link rel="stylesheet" href="/css/teacher/AssignmentDashboard.css">
    
    <title></title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(function(){
            setTimeout(function() {
                $('.fade-message').fadeOut();
            }, 3000);
        });
    </script>
</head>
<body>
    @include('partials.nav')
    @include('partials.sidebar')
    <div id="col-2">
        <div style="height:1000px;">
            @if(Session::has('message'))
            <div class="fade-message" style="color:red">
                <p>{{ Session::get('message') }}</p>
            </div>
            @endif
            <nav>
                <ul class="assign-main">
                    <li class="assign-head">Assigned</li>
                    <li class="AddNew"><a href=" {{ route('assignmentform', $group->id) }}" >Add New</a></li>
                </ul>
            </nav>
            @foreach($assignments as $assignment)
            <ul class="assign-body">
                <li><a href=" {{ route('assignmentdetails', $assignment->id) }}">{{ $assignment->title }}</a></li>
                <li>{{ $assignment->date}}</li>
                <hr>
            </ul>
            @endforeach
        </div>
    </div>
    @include('partials.footer')
</body>
</html>
   

    


  
  

    

    
