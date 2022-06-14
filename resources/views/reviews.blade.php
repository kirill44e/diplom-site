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
	select.sel {
		filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
		width: 50%;
		height: 45px;
		border-radius: 10px;
		border: 1px silver solid;
		font-family: Montserrat;
		float: right;
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

	@media (min-width: 360px) and (max-width: 767px) {
		select.sel {
			filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
			width: 90%;
			height: 45px;
			border-radius: 10px;
			border: 1px silver solid;
			font-family: Montserrat;
		}
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
	<a name="review"></a>
	@auth('web')
	<div class="container1">
		<h1>Оставить отзыв:</h1>
		<div class="review">
			<form action="{{ route('review_process')}}" method="POST">
			@csrf

				<p>Имя: <input type="text" name="name" value="{{ Auth::user()->name }}"></p>
				<p>Выбранный курс:
					<select name="category" id="category" class="sel">
	          @foreach($category as $cat)
	            <option>{{$cat->category}}</option>
	          @endforeach
					</select>
				</p>
				<p>Сообщение: </p>
				<textarea name="message" class="text"></textarea>
				<input type="submit" name="" value="Отправить" class="sub">
			</form>
		</div>
	</div>
	@endauth

	@guest('web')
		<p class="p1" style="width:60%; margin-left:20%; text-align:center;">Чтобы оставить отзыв, <a href="{{ route('login')}}" style="color: #1E5DA6; font-weight: 500;"> Авторизуйтесь </a></p>
	@endguest

	<div class="reviews">
	<h1 style="color: #2C59FA;">Отзывы счастливчиков, <br>
	купивших наши курсы:</h1>

	@foreach($data as $el)
		<div class="reviews1">
			<p style="word-break: break-all; color: green;">{{ $el->name}}</p>
			<p>{{ $el->category}}</p>
			<a href="{{ route('review-data-one', $el->id)}}#onereview" class="a1">Читать</a>
		</div>
	@endforeach

	</div>

	<footer>
		<div class="foot">
			<a class="pfoot_left" href="{{ route('home')}}#home">Главная</a>
			<a class="pfoot_left" href="{{ route('reviews_user')}}#review">Отзывы</a>
			<a class="pfoot_left" href="{{ route('courses')}}#courses">Курсы</a>
		</div>
		<p class="pfoot_right">+7-945-345-23-23 <br>
		courses@mail.ru</p>
	</footer>
</body>
</html>
