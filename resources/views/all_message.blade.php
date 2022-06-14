<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="/css/all_message.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Мои курсы</title>
  <style>
    a {
      text-decoration: none;
      color: black;
    }

    div.block {
      width: 35%;
      margin-left: 10%;
      float:left;
      border: 2px lightblue solid;
      border-radius: 5px;
      padding: 20px;
      margin-top: 30px;
      position: relative;
      background: #DBD3FA;
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
      margin-bottom: 20px;
    }

    p.p1 {
  		font-style: normal;
  		font-weight: 500;
  		font-size: 22px;
  		color: #514F4F;
  		margin-bottom: 50px;
  		text-align: center;
      clear: both;
  	}
  </style>
</head>
<body>
  <header>
    <a href="{{ route('home')}}"><img src="/img/home.svg" style="width:30px; height:30px; position:absolute; top:20px; left:10px;" alt=""></a>
    <ul class="navv">
      <li><a href="{{ route('logout')}}"><button type="button" class="btn_logout">Выйти</button></a></li>
      <li><a href="{{route('order-data')}}" style="color: lightblue;">Мои курсы</a></li>
      <li><a href="{{route('user')}}">Оформить курс</a></li>
      <li><a href="{{route('create-cours')}}">Создать курс</a></li>
    </ul>
  </header>

    @include('inc/messages')

    <div class="container">
      @foreach($data as $el)
        <div class="block">
          <h3 style="text-align:center; word-break: break-all;">Имя: <br>{{ $el->name}}</h3>
          <p><font style="color:green;">Статус:</font> {{ $el->status}}</p>
          <p>E-mail: {{ $el->email}}</p>
          <p><small>Дата создания: {{ $el->created_at}}</small></p>
          <a href="{{ route('order-data-one', $el->id)}}"><button class="btn btn-warning">Детальнее</button></a>
        </div>
      @endforeach
    </div>

    <p class="p1">Курсы от пользователей:</p>

    <div class="container">
      @foreach($cours as $el)
        <div class="block">
          <h3 style="text-align:center; word-break: break-all;">Название курса: <br>{{ $el->name}}</h3>
          <p><font style="color:green;">Статус:</font> {{ $el->status}}</p>
          <p>Описание: {{ $el->description}}</p>
          <p>Контакты автора: {{ $el->contacts}}</p>
          <p>Стоимость: {{ $el->cost}} р.</p>
          <p><small>Дата создания: {{ $el->created_at}}</small></p>
        </div>
      @endforeach
    </div>

</body>
</html>
