<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>One Message</title>
  <style>

  body {
    font-family: Montserrat;
  }

  header {
    height: 70px;
    width: 100%;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  }

  div.buttons {
    margin-top: 20px;
    width: 100%;
    height: 70px;
  }

  div.buttons > .but1, div.buttons > .but2 {
    float: left;
    margin-left: 20px;
    height: 100%;
  }

  .btn {
    margin: 10px;
  }

  img.img1 {
    width: 80%;
    margin-left: 10%;
  }

    @media (min-width: 950px) and (max-width: 2000px) {
      div.block_one {
        width: 35%;
        margin-left: 10%;
        margin-top: 50px;
        border: 2px lightblue solid;
        border-radius: 5px;
        padding: 20px;
      }
    }
    @media (min-width: 550px) and (max-width: 950px) {
      div.block_one {
        width: 50%;
        margin-left: 10%;
        margin-top: 50px;
        border: 2px lightblue solid;
        border-radius: 5px;
        padding: 20px;
      }
      div.buttons > .but1, div.buttons > .but2 {
        float: left;
        margin-left: 5px;
        height: 100%;
      }
    }
    @media (min-width: 360px) and (max-width: 550px) {
      div.block_one {
        width: 80%;
        margin-left: 10%;
        margin-top: 50px;
        border: 2px lightblue solid;
        border-radius: 5px;
        padding: 20px;
      }

      div.buttons > .but1, div.buttons > .but2 {
        float: left;
        margin-left: 5px;
        height: 100%;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="col-md-3 text-end" style="float:right; margin-right:10%; padding:15px; width:100%;">
      <a href="{{ route('admin.index')}}"><button type="button" class="btn btn-primary">Заказы</button></a>
      <a href="{{ route('admin.index-cours')}}"><button type="button" class="btn btn-primary">Курсы</button></a>
      <a href="{{ route('admin.logout')}}"><button type="button" class="btn btn-danger">Выйти</button></a>
    </div>
  </header>

      @include('inc/messages')

      <div class="block_one">
        <h3 style="text-align:center; word-break: break-all;">Название курса: <br>{{ $contact->name}}</h3>
        <p><font style="color:green;">Статус:</font> {{ $contact->status}}</p>
        <p>Описание: {{ $contact->description}}</p>
        <p>Контакты автора: {{ $contact->contacts}}</p>
        <p>Стоимость: {{ $contact->cost}}</p>
        <p><small>Дата создания: {{ $contact->created_at}}</small></p>
        <img src="{{ url('/').'/storage/'.$contact->image }}" alt="img" class="img1">
        <div class="buttons">
          <div class="but1">
              <a href="{{ route('admin.courses.edit', $contact->id)}}"><button class="btn btn-primary">Редактировать</button></a>
          </div>
          <div class="but2">
            <form action="{{ route('admin.courses.destroy', $contact->id)}}" method="POST">
              @csrf

              @method('DELETE')

              <button class="btn btn-danger" type="submit">Удалить</button>
            </form>
          </div>
        </div>
      </div>

</body>
</html>
