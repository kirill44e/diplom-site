<!DOCTYPE html>
<html>
<head>
	<title>Отзывы</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/reviews.css') }}">
	<style>
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
</style>
</head>
<body>
	<div class="header">
		@include('inc.messages')
		<ul class="ul1">
			@auth('web')
				<li><a href="{{ route('user')}}">Личный кабинет</a></li>
			@endauth
			<li><a href="{{ route('home')}}#home">Главная</a></li>
			<li><a href="{{ route('reviews_user')}}#review">Отзывы</a></li>
			<li><a href="{{ route('courses')}}#courses">Курсы</a></li>
			@guest('web')
				<li class="auth"><a href="{{ route('login')}}">Войти</a></li>
			@endguest
		</ul>
		<p class="header">Выберите подходящий онлайн-курс на нашей платформе и станьте еще умнее</p>
	</div>

	@guest('web')
		<p class="p1" style="width:60%; margin-left:20%; text-align:center;">Чтобы оставить отзыв, <a href="{{ route('login')}}" style="color: #1E5DA6; font-weight: 500;"> Авторизуйтесь </a></p>
	@endguest

	<a name="onereview"></a>
  <div class="reviews_one">
    <p style="word-break: break-all;">Имя: <font style="color:black;">{{ $data->name}}</font></p>
    <p>Выбранный курс: <font style="color:black;">{{ $data->category}}</font></p>
    <p style="width: 95%; margin-left: 2.5%; color: #4d5d53; font-size: 25px;">{{ $data->message}}</p>
		<a href="{{ route('reviews_user')}}#review" style="font-size: 18px; color: green; margin: 0px; text-decoration: none;">Назад</a>
  </div>

	<footer>
		<div class="foot">
			<a class="pfoot_left" href="index.html">Главная</a>
			<a class="pfoot_left" href="Reviews.html">Отзывы</a>
			<a class="pfoot_left" href="Courses.html">Курсы</a>
		</div>
		<p class="pfoot_right">+7-945-345-23-23 <br>
		courses@mail.ru</p>
	</footer>
</body>
</html>
