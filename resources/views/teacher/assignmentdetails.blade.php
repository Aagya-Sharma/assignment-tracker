<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/teacher/AssignmentDetails.css">
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <link href='https://css.gg/arrow-left.css' rel='stylesheet'>
    <title></title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(function(){

            $('.myfrm').on('submit', function(e){
                
                // alert($("#w3s").attr("href"));

                var actionUrl = $(this).attr('action');
                var request_method = "POST";

                var form_data = $(this).serialize();
                $.ajax({
                    url : actionUrl,
                    type: request_method,
                    data : form_data
                }).done(function(response){ 
                    // $("#server-results").html(response);
                    //alert(response);
                   
                });

                e.preventDefault();

            });


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
    <a href="{{ route('assignmentdashboard',$assignment->group_id)}}">
    
    <i class="gg-arrow-left"></i>
    </a>

        @if(Session::has('message'))
        <div class="fade-message" style="color:red">
            <p>{{ Session::get('message') }}</p>
        </div>
        @endif
        <ul class="assign-main">
            <li class="assign-head">Details</li>
        </ul>
        <ul class="assignment-detail-body">
            <li>Title: {{ $assignment->title}}</li>
            <li>Due date: {{$assignment->date}} at {{$assignment->time}}</li>
            <li>Points: {{$assignment->points}}</li>
            <li>Description: {{ $assignment->description }}</li><br>
            <li>
                <form action="{{ route('assignmentdelete',$assignment->id)}}" method="post">
                    @method('DELETE')
                    @csrf 
                    <input type="submit" value="Delete" class="delete"><br>
                </form><br>
            </li>
            <li> <div class="edit"><a href="{{ route('assignmentedit',$assignment->id)}}">Edit</a></li>

        </ul>
        <br>
        <div style="height:1000px;">
           
        <h2 class="attach">Students List:</h2>
        <table class="table" style="color:black">
            <tr>
                <th>Name</th>
                <th>Work</th>
                <th>Points</th>
                <th>Feedback</th>
                <th></th>
            </tr>
            <tbody>
                @foreach($students as $student)
                <tr>
             
                    <td> 
                    @if(date('y',strtotime($assignment->date))- date('y',strtotime($student->created_at)) > 0)
                    <a href="{{route('progresschart', $student->user_id)}}"  title="Click to view progress report"target="_blank">{{ $student->name }}</a>
                    @elseif(date('y',strtotime($assignment->date))- date('y',strtotime($student->created_at)) < 0)
                    <a href="{{route('progresschart', $student->user_id)}}"  title="Click to view progress report"target="_blank" style="color:red" >{{ $student->name }}</a>
                    @else
                    @if(date('m',strtotime($assignment->date))-date('m',strtotime($student->created_at))==0)
                     @if(date('d',strtotime($assignment->date))-date('d',strtotime($student->created_at)) < 0)
                     <a href="{{route('progresschart', $student->user_id)}}" style="color:red" title="Click to view progress report"target="_blank">{{ $student->name }}</a>
                     @elseif(date('d',strtotime($assignment->date))-date('d',strtotime($student->created_at)) == 0)
                        @if(time('H',($assignment->time))-strtotime('H',($student->created_at)) < 0)
                        <a href="{{route('progresschart', $student->user_id)}}" style="color:red" title="Click to view progress report"target="_blank">{{ $student->name }}</a>
                        @else
                        <a href="{{route('progresschart', $student->user_id)}}"  title="Click to view progress report"target="_blank">{{ $student->name }}</a>
                        @endif
                
                @else
                <a href="{{route('progresschart', $student->user_id)}}"title="Click to view progress report"target="_blank">{{ $student->name }}</a></td>
                @endif
                @elseif(date('m',strtotime($assignment->date))-date('m',strtotime($student->created_at))< 0)
                <a href="{{route('progresschart', $student->user_id)}}" style="color:red" title="Click to view progress report"target="_blank">{{ $student->name }}</a>
                @else
                <a href="{{route('progresschart', $student->user_id)}}"title="Click to view progress report"target="_blank">{{ $student->name }}</a></td> -->
                @endif
                @endif
                    </td>
                    <td> <a href="/documents/{{ $student->work }}" title="Click to view the submitted work" target="_blank">{{ $student->work}}</a></td>
                    
                        <form class="myfrm" action="{{route('assignmentpoints', $student->id)}}" method="post">
                                @csrf
                                    <td>
                                        <input type="number" name="points" id="points" max="{{ $student->assignments_points  }}" min="0" value="{{$student->points}}">
                                    </td>
                                    <td><textarea name="feedback" id="" cols="20" rows="8">{{ $student->feedback }}</textarea></td>
                                    <td><input type="submit" value="Assign"></td>
                                    
                        </form>
                    
                </tr>
                @endforeach
        </table>
        <br>
        <form action="{{ route('assignmentdashboard',$assignment->group_id)}}" method="post">
        @csrf
            
        </form>
        @if(!empty($assignment->resources))
            <iframe class="resource-body" src=" /documents/{{ $assignment->resources }}"  style="width:500px; height:500px; margin-top:10px; margin-left:40%;" frameborder="0">
        @endif
        </div>
        
    </div>
    @include('partials.footer')
  
</body>
</html>