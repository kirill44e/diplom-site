<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="/css/user.css" id="theme">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Личный кабинет</title>
</head>
<body>
  <div class="sdf">
  <header>
      <a href="{{ route('home')}}"><img src="/img/home.svg" style="width:30px; height:30px; position:absolute; top:20px; left:10px;" alt=""></a>
      <ul class="navv">
        <li><a href="{{ route('logout')}}"><button type="button" class="btn_logout">Выйти</button></a></li>
        <li><a href="{{route('order-data')}}">Мои курсы</a></li>
        <li><a href="{{route('user')}}" style="color: lightblue;">Оформить курс</a></li>
        <li><a href="{{route('create-cours')}}">Создать курс</a></li>
      </ul>
    </header>

    <button type="button" id="switchMode" class="theme">Cменить тему</button>

    <script type="text/javascript">
      let switchMode = document.getElementById('switchMode');
      switchMode.onclick = function () {
        let theme = document.getElementById('theme');

        if(theme.getAttribute('href') == '/css/user.css') {
          theme.href = '/css/user-dark.css';
        } else {
          theme.href = '/css/user.css';
        }
      }
    </script>

    @include('inc/messages')


    <form action="{{route('order-form')}}" method="POST" class="submit">
      @csrf

      <div class="form-group">
        <label for="name">Ваше имя:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" disabled>
      </div>

      <div class="form-group">
        <label for="email">Ваш email:</label>
        <input type="text" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}" disabled>
      </div>

      <div class="form-group">
        <label for="category">Выбрать курс:</label>
        <select name="category" id="category" class="sel">
          @foreach($category as $cat)
            <option>{{$cat->category}}</option>
          @endforeach
				</select>
      </div>

      <div class="form-group">
        <label for="message">Комментарий к заказу:</label>
        <textarea name="message" rows="8" cols="80" id="message" class="form-control"></textarea>
      </div>

      <button type="submit" class="btn btn-success" style="margin-top:20px;">Отправить</button>
    </form>

    <img src="img/contact.png" alt="contact" class="kart">
  </div>
</body>
</html>
