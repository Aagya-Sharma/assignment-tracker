<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/student/Assignment.css">
    <link rel="stylesheet" href="/css/student/AssignmentDetails.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link href='https://css.gg/arrow-left.css' rel='stylesheet'>

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
    <a href="{{route('Stdashboard')}}">
    <i class="gg-arrow-left"></i>
    </a>
        @if(Session::has('message'))
        <div class="fade-message" style="color:red">
            <p>{{ Session::get('message') }}</p>
        </div>
        @endif
        <div style="height:1000px;">
            <ul class="assign-main">
                <li class="assign-head">Details</li>
            </ul>
            <ul class="assignment-detail-body">
                <li>Title: {{ $assignment->title}}</li>
                <li>Discription: {{ $assignment->description}}</li>
                <li>Due date: {{ $assignment->date}}</li>
                <li> Total Points: {{ $assignment->points}}</li>
                @if(!empty($student->points))
                <li>Points assigned:: {{ $student->points }}</li>
                <li> Feedback:: {{ $student->feedback }}</li>
                @endif
            </ul>

            <!-- <iframe class="iframesec" src=" /documents/{{ $assignment->resources }}" frameborder="0"> -->
        
            <h2 class="attach">Attach your work:</h2>
                @if(empty($student->work))
                    <form action="{{ route('Ststore',$assignment->id) }}" usermethod="post">
                        @csrf
                        <input type="file"  value="" name="work" id="" ><br>
                        <input class="assign-submit" type="submit" value="Submit" >
                    </form>
                @else
                    <form action=" {{ route('Stedit',$assignment->id) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <input type="file"  value="" name="work" id=""><br>
                        <input class="assign-submit" type="submit" value="Edit">
                    </form>
                @endif

                @if(!empty($student->work))
                    <h2 class="attachs"> Your work:</h2>

                    <a  href="/documents/{{ $student->work}}" class="works" title="Click to view your work" target="_blank">{{$student->work}}</a><br>
                @endif
            

                <iframe class="resource-body" src=" /documents/{{ $assignment->resources }}" frameborder="0">
        </div>
    </div>
    @include('partials.footer')
</body>
</html>