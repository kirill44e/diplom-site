<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="/css/create.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Личный кабинет</title>
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
        <li><a href="{{route('order-data')}}">Мои курсы</a></li>
        <li><a href="{{route('user')}}">Оформить курс</a></li>
        <li><a href="{{route('create-cours')}}" style="color: lightblue;">Создать курс</a></li>
      </ul>
    </header>

    @include('inc/messages')

    <div class="container">
      <form action="create_cours_submit" method="POST" enctype="multipart/form-data" class="submit">
        @csrf

        <div class="form-group">
          <label for="name">Название курса:</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
          <label for="description">Описание:</label>
          <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <div class="form-group">
          <label for="contacts">Контакты для связи:</label>
          <input type="text" name="contacts" class="form-control" id="contacts">
        </div>

        <div class="form-group">
          <label for="cost">Стоимость курса:</label>
          <input type="text" name="cost" class="form-control" id="cost">
        </div>

        <div class="form-group">
          <label for="image">Картинка:</label>
          <input type="file" name="image" class="form-control" id="image">
        </div>

        <button type="text" class="btn btn-success" style="margin-top:20px;">Отправить</button>
      </form>

      <img src="img/contact.png" alt="contact" class="kart">
    </div>

    <div class="container_two">
      @foreach($cours as $el)
        <div class="block">
          <h3 style="text-align:center; word-break: break-all;">Название курса: <br>{{ $el->name}}</h3>
          <p><font style="color:green;">Статус:</font> {{ $el->status}}</p>
          <div class="descr">
            <p>Описание: {{ $el->description}}</p>
          </div>
          <p>Контакты автора: {{ $el->contacts}}</p>
          <p>Стоимость: {{ $el->cost}} р.</p>
          <p><small>Дата создания: {{ $el->created_at}}</small></p>
          <img src="{{ url('/').'/storage/'.$el->image }}" alt="img" width="80%">
        </div>
      @endforeach
    </div>

</body>
</html>
