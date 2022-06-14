<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Все сообщения</title>
  <style>

  body {
    font-family: Montserrat;
  }

  .form-group {
    margin: 10px;
    margin-left: 0px;
  }

  .btn {
    margin: 10px;
  }

  nav.nav12 {
  		width: 70%;
  		height: 70px;
  		margin-top: 200px;
  		position:fixed;
  		bottom:0;
  		display: block;
  		margin-left: 15%;
  		text-align: center;
  }

  div.warning {
    text-align: center;
    position: absolute;
    top: 30px;
    left: 20%;
    width: 60%;
    background: #7FFF00;
    opacity: 0.9;
    border-radius: 10px;
  }

  ul.warning {
    list-style-type: none;
    padding-left: 0px;
  }
  ul.warning li {
    font-family: 'Montserrat';
    font-size: 20px;
    color: gray;
    padding: 15px;
  }

   header {
     height: 70px;
     width: 100%;
     box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
   }

  ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
  }

  ul.pagination li {
    display: inline;
  }

  ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    }

  form {
    width: 30%;
    margin: auto;
  }

  .btn-warning {
    width: 50%;
    float: right;
    margin-right: 25%;
  }

  @media (min-width: 950px) and (max-width: 2000px) {
      div.block {
        width: 35%;
        margin-left: 10%;
        float:left;
        border: 2px lightblue solid;
        border-radius: 5px;
        padding: 20px;
        margin-top: 30px;
        position: relative;
      }

      form {
        width: 45%;
        margin: auto;
      }
    }
    @media (min-width: 550px) and (max-width: 950px) {
      div.block {
        width: 47%;
        margin-left:2%;
        float:left;
        border: 2px lightblue solid;
        border-radius: 5px;
        padding: 20px;
        margin-top: 30px;
        position: relative;
      }

      form {
        width: 60%;
        margin: auto;
      }
    }
    @media (min-width: 360px) and (max-width: 550px) {
      div.block {
        width: 47%;
        margin-left:2%;
        float:left;
        border: 2px lightblue solid;
        border-radius: 5px;
        padding: 20px;
        margin-top: 30px;
        position: relative;
      }

      div.block h3 {
        font-size: 17px;
      }

      div.block p {
        font-size: 15px;
      }

      .btn-warning {
        width: 90%;
        margin-right: 5%;
      }

      .btn-danger, .btn-primary {
        margin: 0px;
        margin-top: 10px;
      }

      form {
        width: 80%;
        margin: auto;
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

    <form method="GET" action="{{ route('admin.index')}}">
      <div class="form-group">
        <label for="status">Статус заказа: </label>
        <select name="status" id="status" class="form-control" value="{{ request()->status}}">
          @foreach($statuses as $status)
            <option>{{$status->status}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="category">Выбранный курс: </label>
        <select name="category" id="category" class="form-control" value="{{ request()->category}}">
          @foreach($category as $cat)
            <option>{{$cat->category}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="date_from">От:</label>
        <input type="date" name="date_from" id="date_from" class="form-control" value="{{ request()->date_from}}">
      </div>

      <div class="form-group">
        <label for="date_to">До:</label>
        <input type="date" name="date_to" id="date_to" class="form-control" value="{{ request()->date_to}}">
      </div>

      <button type="submit" class="btn btn-primary">Фильтр</button>
      <a href="{{ route('admin.index')}}" class="btn btn-danger">Сбросить</a>
    </form>

    @foreach($contacts as $contact)
      <div class="block">
        <h3 style="word-break: break-all;">Имя: {{ $contact->name}}</h3>
        <p><font style="color:green;">Статус:</font> {{ $contact->status}}</p>
        <p>E-mail: {{ $contact->email}}</p>
        <p><small>Дата создания: {{ $contact->created_at}}</small></p>
        <a href="{{ route('admin.contacts.show', $contact->id)}}"><button class="btn btn-warning">Детальнее</button></a>
      </div>
    @endforeach

      {{$contacts->withQueryString()->links()}}
</body>
</html>
