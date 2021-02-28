<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/student/AssignmentDashboard.css">
    <link rel="stylesheet" href="/css/student/Assignment.css">
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <title></title>
</head>
<body>
    @include('partials.nav')
    @include('partials.sidebar')
    <div id="col-2">
      <div style="height:1000px;">
        <nav>
          <ul class="assign-main">
            <li class="assign-head">Assigned</li>
          </ul>
        </nav>
        <ul class="assign-body">
        @foreach($assignments as $assignment)
        <?php
            $n = date('m',strtotime($assignment->date))-date('m');
            $m = date('y',strtotime($assignment->date))-date('y');
            $a = date('d') /( $m*365+$n*30+ date('d',strtotime($assignment->date)))*100;
            $x1 = 0;
            $x2 =  100;
            //echo $x1;
            $y1 = 0;
            $y2 = 1;
            $x = $a;
            //echo $x;
            $y=((($y2-$y1)/($x2-$x1))*($x-$x1))+$y1;
            //echo $y;
        ?>
          <div class="small-box" style="background:rgba(255, 0, 0, <?php echo $y ?>);" >
            <li><a href=" {{ route('Stdetails', $assignment->id) }}">{{ $assignment->title }}</a><br></li>
            <li> 
              @if(date('d',strtotime($assignment->date))-date('d')==0 && date('m',strtotime($assignment->date))-date('m')==0 && date('y',strtotime($assignment->date))-date('y')==0)
            Due today at {{$assignment->time}}
            @elseif(date('d',strtotime($assignment->date))-date('d')==1 && date('m',strtotime($assignment->date))-date('m')==0  && date('y',strtotime($assignment->date))-date('y')==0)
            Due tomorrow at {{$assignment->time}}
            @elseif(date('d',strtotime($assignment->date))-date('d')< 0 && date('m',strtotime($assignment->date))-date('m')==0  && date('y',strtotime($assignment->date))-date('y')==0)
            Due date missed
            @elseif(date('m',strtotime($assignment->date))-date('m')< 0  && date('y',strtotime($assignment->date))-date('y')==0)
             Due date missed
            @elseif(date('y',strtotime($assignment->date))-date('y')< 0)
            Due date missed
            @else
             Due: {{ $assignment->date }} at {{$assignment->time}}
            @endif
              @foreach($students as $student)
              @if($student->assignment_id == $assignment->id)
              <input class="checkbox" type="checkbox" name="" value="" checked="checked">
            </li>
              @endif
              @endforeach
          </div>
        @endforeach
        <br>
        </ul>
      </div>
    </div>
    @include('partials.footer')
</body>


  
    


  