<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Update</title>
  <style>

  body {
    font-family: Montserrat;
  }

  .btn {
    margin: 10px;
  }

    .form-group {
      margin: 10px;
    }

    header {
      height: 70px;
      width: 100%;
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    @media (min-width: 950px) and (max-width: 2000px) {
      form {
        width: 35%;
        margin-left: 10%;
      }
    }
    @media (min-width: 550px) and (max-width: 950px) {
      form {
        width: 50%;
        margin-left: 10%;
      }
    }
    @media (min-width: 360px) and (max-width: 550px) {
      form {
        width: 80%;
        margin-left: 10%;
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

    <form action="{{route('admin.courses.update', $contact->id)}}" method="POST" >
      @csrf

      @method('PUT')

      <div class="form-group">
        <label for="name">Название курса:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$contact->name}}">
      </div>

      <div class="form-group">
        <label for="description">Описание:</label>
        <input type="description" name="description" class="form-control" id="description" value="{{$contact->description}}">
      </div>

      <div class="form-group">
        <label for="contacts">Контакты для связи:</label>
        <input type="text" name="contacts" class="form-control" id="contacts" value="{{$contact->contacts}}">
      </div>

      <div class="form-group">
        <label for="cost">Стоимость курса:</label>
        <input type="text" name="cost" class="form-control" id="cost" value="{{$contact->cost}}">
      </div>

      <div class="form-group">
        <label for="status">Статус заказа: </label>
        <select name="status" id="status" class="form-control" value="{{$contact->status}}">
          @foreach($statuses as $status)
            <option>{{$status->status}}</option>
          @endforeach
        </select>
      </div>

      <img src="{{ url('/').'/storage/'.$contact->image }}" alt="img" width="300px">

      <button type="submit" class="btn btn-success" style="margin-top: 30px;">Обновить</button></a>
      </form>
</body>
</html>
