<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <link rel="stylesheet" href="/css/Admin/groupPage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title></title>
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
  @if(Session::has('message'))
    <div class="fade-message" style="color:red">
      <p>{{ Session::get('message') }}</p>
      </div>
      @endif
    <div class="first">
        <div class="add-assignment">
          Add new Class
        </div>
            <form action="/group/list" method="post">
              @csrf
              <input type="submit" class="second" value="Classes List">
            </form>
        </div>
        <br><br>
            <form action="/group/store" class="form" method="post" enctype="multipart/form-data">
            @csrf
              ClassName:
              <br>
              <input class=" top-box" type="text" name="classname" value="" required><br><br>
              Faculty:
              <br>
              <input class="top-box" type="text" name="faculty" value="" required><br><br>
                <input class="submit-button "type="submit" value="Save">
            </form>
            </div>
  @include ('partials.footer')

        