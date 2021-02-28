<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link rel="stylesheet" href="css/HomePage.css">
    <link rel="stylesheet" href="css/partials/NavBar.css">
    <link rel="stylesheet" href="css/partials/SideBar.css">
    <link rel="stylesheet" href="css/partials/Footer.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<style>
  h1{
    margin-top:300px;
    text-align:center;
    color: #1A1A2E;
    text-transform:capitalize ;
 
    }
    h2{
      text-align:center;
    color: #1A1A2E;
    text-transform:capitalize ;
    }
    .noti-body{
    list-style: none;
    margin-left: 50px;
    font-size: 20px;
    margin-top: 30px;
    
}
</style>
</head>
 <body>

    @include('partials.nav')
    @include('partials.sidebar')
    <div id="col-2">
    @foreach(Auth::user()->notifications as $notification)

@if(Auth::user()->roles =='admin')
<ul class="noti-body" >
               
<li>{{trim(json_encode($notification->data['createdUser']['name']), ' " ' ) }} has just registered !!</li>

                <hr>
            </ul>
<!-- <li>{{trim(json_encode($notification->data['createdUser']['name']), ' " ' ) }} has just registered !!</li> -->
@elseif(Auth::user()->roles =='student')
@if(Auth::user()->class_id == trim(json_encode($notification->data['createdAssignment']['group_id']), ' " '  ))
<ul class="noti-body" >
              
<li>Assignment titled {{trim(json_encode($notification->data['createdAssignment']['title']), ' " ' )}} has been asssigned !! </li>

                <hr>
            </ul>
<!-- <li>Assignment titled {{trim(json_encode($notification->data['createdAssignment']['title']), ' " ' )}} has been asssigned !! </li> -->
@endif
@endif

@endforeach
     
    </div>
    <div>
    @include('partials.footer')  
    </div> 
</body>
