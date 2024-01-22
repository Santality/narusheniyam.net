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
        <h2 class="mt-3">Подача заявления</h2>
        <form action="/application/appcreate" method="POST">
            @csrf
            <div class="mb-3">
                <label for="number" class="form-label">Гос. регистрационный номер автомобиля</label>
                <input type="text" class="form-control" id="number" name="number">
                @error('number')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Описание нарушения</label>
              <input type="text" class="form-control" id="description" name="description">
              @error('description')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Подать заявление</button>
        </form>
        <div class="mt-2"><a class="text-decoration-none" href="/applications">Назад</a></div>
    </div>
</body>
</html>
