<!doctype html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" rel="stylesheet" href="/css/app.css"/>
    <title>Company</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="row col-12 justify-content-between" >
            <ul class="nav navbar-nav"><li class="active"><a href="/" class="navbar-brand">Home</a></li></ul>
            @auth
                <ul class="nav navbar-nav" style="flex-direction:row">
                    <li class="active"><a href="" class="navbar-brand">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a></li>
                    <li class="active"><a href="" id="logout" class="navbar-brand">Logout</a></li>

                    <form id="logout-form" action="http://localhost/logout" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="_token" value="gAAPVzT7fj6yY9mT2Lf8owG32oLiByaavUAQKRSq">
                    </form>
                </ul>
            @else
                <ul class="nav navbar-nav" style="flex-direction:row">
                    <li class="active"><a href="/login" class="navbar-brand">Log in</a></li>
                    <li class="active"><a href="/register" class="navbar-brand">Registration</a></li>
                </ul>
            @endauth
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <h4 class="col-md-8">{{ $company->name }}</h4>
            <div class="row col-md-4">
                <button class="button" id="btn-circle">+</button>
                <h3 class="text-right">Комментарий</h3>
            </div>
        </div>
        <div class = "col-md-12 d-none" id="show-items">
            <form class="col-md-12" id="formComment">
                @csrf
                <select class="form-control form-control-md" form="formComment" name="column_name">
                    <option>Название</option>
                    <option>ИНН</option>
                    <option>Общая информация</option>
                    <option>Генеральный директор</option>
                    <option>Адрес</option>
                    <option>Телефон</option>
                    <option>Компания целиком</option>
                </select>
                <input type="text" class="form-control" placeholder="Комментарий" aria-label="Comments Text" name="text">
                <div class="d-none" id="request-result"></div>
                <button type="submit" class="btn btn-primary" id="submit-button">Добавить</button>
            </form>
        </div>
            <div class = "col-md-12">
                <h3>Комментарии</h3>
                @foreach ($comments as $comment)
                    <div class="row border">
                        <p class="col-md-6">{{$comment->user_name}}</p>
                        <p class="col-md-6 text-right">{{$comment->date}}</p>
                        <p class="col-md-12 text-left">Комментарий к {{$comment->column_name}}</p>
                        <p class="col-md-12">{{$comment->comment}}</p>
                    </div>
                @endforeach
            </div>
    </div>
</div>
</body>
<script src="/js/appCompany.js"></script>
<script src="/js/app.js"></script>
<script>
    window.userId = {{ \Illuminate\Support\Facades\Auth::id() ?? 0 }}
</script>
</html>
