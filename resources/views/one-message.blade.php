<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="/css/one-message.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>One Message</title>
  <style>
    a {
      text-decoration: none;
      color: black;
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

      <div class="block_one">
        <h3 style="word-break: break-all;">Имя: {{ $data->name}}</h3>
        <h3>Продукт: {{ $data->category}}</h3>
        <p style="width:100%;">Комментарий к заказу: {{ $data->message}}</p>
        <p><small>Дата создания: {{ $data->created_at}}</small></p>
        <div class="buttons">
          <div class="but1">
              <a href="{{ route('order-update', $data->id)}}"><button class="btn btn-primary">Редактировать</button></a>
          </div>
          <div class="but2">
            <a href="{{ route('order-delete', $data->id)}}"><button class="btn btn-danger">Удалить</button></a>
          </div>
        </div>
      </div>

</body>
</html>
