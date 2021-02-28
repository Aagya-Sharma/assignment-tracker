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
</style>
</head>
 <body>

    @include('partials.nav')
    @include('partials.sidebar')
    <div id="col-2">
      <h1>Welcome {{Auth::user()->name}}!!!!</h1>
      <h2> You're logged in. </h2>
   
      </div>
     
    </div>
    <div>
    @include('partials.footer')  
    </div> 
</body>
