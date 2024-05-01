<!DOCTYPE html>
<html>
<head>
    <title>PostIt!</title>
</head>
<body>
    <h3>Your Post Is Now Active!</h3>
    <hr>
    <h5>By <em>{{ $participant['username'] }}</em></h5>
    <hr>
    <div>
      {!! $blogPost->content !!}
    </div>
    <hr>
    <p>Thank you</p>
</body>
</html>
