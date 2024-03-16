<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TNT-Email</title>
    <style>
        .title-all {
            font-weight: 700;
            font-size: 23px
        }
        .content{
            width: 600px;
            padding: 20px;
            background: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1 class="title-all">TNT-BLOG xin gửi lời chào bạn</h1>
        <h3 class="">Người dùng : {{ $data['name'] }}</h3>
        <h3 class="">Email : {{ $data['email'] }}</h3>
        <h3 class="">Subject : {{ $data['subject'] }}</h3>
        <h2 class="">{{ $data['message'] }}</h2>
    </div>
</body>

</html>
