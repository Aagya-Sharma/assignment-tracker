<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/teacher/NewAssignment.css">
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
        Add new Assignment
      </div>
      <form action="{{route('assignmentstore', $group->id)}}" method="post" enctype="multipart/form-data">
      @csrf
          Title:
          <br>
          <input class=" top-box" type="text" name="title" value="" required><br>
        
          Description:
          <br>
          <textarea class=" top-box" name="description" required></textarea>
          <br>
          Resources:
          <br>
          <input type="file" name="resources" value=""><br>

          <div class="first" >Class:
            <br>
            <input class="box" value="{{ $group->classname }}" type="text" name="class" value="">
          </div>

          <div class="second" >Points:
            <br>
            <input class="box"  type="integer" name="points" value="" required>
          </div>
          <br>
          <div class="first">Due date:
            <br>
            <input class="box"   type="date" name="date" value="" required>
          </div>
          <br>
          <div class="second">
            Due time:
            <br>
            <input class="box"  type="time" name="time" value="" required>
          </div>
          <br>
          <input class="submit-button "type="submit" value="Assign">
      </form>
    </div>
    <div style="height:1000px">

  @include ('partials.footer')

        