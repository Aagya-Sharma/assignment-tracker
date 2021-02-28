<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/teacher/editform.css">
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
      $(function(){
          setTimeout(function() {
              $('.fade-message').fadeOut();
          }, 3000);
      });
    </script>
    <title></title>
</head>
<body>


    @include('partials.nav')
    @include('partials.sidebar')
    
    <div id="col-2">
      <div style="height:1000px">
    @if(Session::has('message'))
    <div class="fade-message" style="color:red">
      <p>{{ Session::get('message') }}</p>
    </div>
    @endif
<div class="add-assignment">
  Edit Assignment
</div>
<form action="{{route('assignmentupdate',$assignment->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  Title:
  <br>
  <input class=" top-box" type="text" name="title" value="{{$assignment->title}}" required><br>
   Description:
   <br>
   <textarea class=" top-box" name="description"required >{{ $assignment->description}}</textarea>
   <br>
    Resources:
    <br>
    <input type="file" name="resources" value=""><br>
    <div class="first">
      Class:
      <br>
      <input class="box" value="{{ $assignment->class}}"  type="text" name="class" value="" >
      </div>
    <div class="second">
      Points: 
      <br>
      <input class=" box"  type="integer" name="points" value="{{ $assignment->points }}" required>
    </div>
    
    <div class="first">
      Due date:
      <br>
      <input class="box"   type="date" name="date" value="{{ $assignment->date}}" required>
      </div>
    <div class="second">
      Due time:
      <br>
      <input class="box"  type="time" name="time" value="{{ $assignment->time}}" required>
  </div>
    <br>

    <input class="submit-button "type="submit" value="Edit">
</form>
</div>
    </div>

    </div>
    @include ('partials.footer')

        