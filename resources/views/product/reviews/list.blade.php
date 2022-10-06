<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
</head>
<body>

<div class="header">
  <h2>Laravel 8 Review Rating System | 8bityard.com.</h2>
</div>

<div class="row">
  <div class="leftcolumn">

   @foreach($posts as $post)
    <div class="card">
      <h2 style="color:#0071a1;">{{ $post->title }}</h2>
      <h5 style="color:#e91e63;">Published at : {{$post->created_at->format('jS \\of F Y') }}</h5>


      <p>{{ $post->description }}</p>
      <p><b><a href="{{route('post.view',$post->id)}}">Read Article</a></b></p>

    </div>

   @endforeach
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <im
