<!docktype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="text/css" rel="stylesheet" href="/css/app.css"/>
    <title>Companies</title>
</head>
<body>
<div class="container">
    <div class="row">
        @foreach ($companies as $company)
            <div class="col-md-3 col-xs-12">
                <a href="/company/{{$company['id']}}"><h4>{{ $company['name'] }}</h4></a>
                <div>{{$company['information']}}</div>
            </div>
        @endforeach
    </div>

    <div>
        <button class="btn btn-primary" id="btn-show">Добавить компанию</button>
        <div class="d-none row" id="show-items">
            <form class="col-md-12" id="formCompany">
                <input type="text" class="form-control" placeholder="Название компании" aria-label="Company name"
                       name="name">
                <input type="text" class="form-control" placeholder="ИНН компании" aria-label="Company inn" name="inn">
                <input type="text" class="form-control" placeholder="Информация о компании"
                       aria-label="Company information" name="information">
                <input type="text" class="form-control" placeholder="Генеральный директор"
                       aria-label="Company phone number" name="director_name">
                <input type="text" class="form-control" placeholder="Адрес компании" aria-label="Company address"
                       name="address">
                <input type="text" class="form-control" placeholder="Номер телефона компании"
                       aria-label="Company phone number" name="phone_number">
                <div class="d-none" id="request-result"></div>
                <button type="submit" class="btn btn-primary" id="submit-button">Добавить</button>
            </form>
        </div>
    </div>


</div>
</body>
<script src="/js/app.js"></script>
<script>

</script>
</html>
