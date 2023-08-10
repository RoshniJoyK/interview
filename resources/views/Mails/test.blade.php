<!DOCTYPE html>
<html>
<head>
    <title>TEST</title>
</head>
<body>
@foreach ($candidate as $data)

    <p>Greetings {{$data->name}}</p>

    <p>Your {{$data->round}} round interview for the job position {{$data->title}} is scheduled on {{$data->interview_date}}</p>

    <p>Thank you</p>
    <p>GALTech HR</p>
@endforeach
</body>
</html>


