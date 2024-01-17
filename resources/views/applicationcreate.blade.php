<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Подача заявления</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <x-header></x-header>
    <div class="container">
        <a href="/applications">Назад</a>
        <h2>Подача заявления</h2>
        <form action="/application/appcreate" method="POST">
            @csrf
            <div class="mb-3">
                <label for="number" class="form-label">Гос. регистрационный номер автомобиля</label>
                <input type="text" class="form-control" id="number" name="number">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Описание нарушения</label>
              <input type="text" class="form-control" id="description" name="description">
            </div>
            <button type="submit" class="btn btn-primary">Подать заявление</button>
        </form>
    </div>
</body>
</html>