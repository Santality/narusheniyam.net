<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заявления</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <x-header></x-header>
    <div class="container">
        <a class="mt-3 btn btn-primary text-decoration-none" href="/application/create">Подать заявление</a>
        <h2>Заявления:</h2>
        <form action="/applications/sort" method="get">
            @csrf
            <label for="sort_by">Сортировать по:</label>
            <select name="sort_by" id="sort_by">
                <option value="1">Дата создания (Новые)</option>
                <option value="2">Дата создания (Старые)</option>
                <option value="3">Статус</option>
            </select>
            <div class="mt-2"><button class="btn btn-primary" type="submit">Применить сортировку</button></div>
        </form>
        <div class="table-responsive">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Гос. номер</th>
                <th scope="col">Нарушение</th>
                <th scope="col">Статус</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($apps as $app)
                <tr>
                    <td>{{$app->number}}</td>
                    <td>{{$app->decription}}</td>
                    <td>{{$app->status->title_status}}</td>
                </tr>
                @empty
                <tr>
                    <td>В данный момент у вас нет заявлений</td>
                    <td></td>
                    <td></td>
                </tr>
                @endforelse
            </tbody>
          </table>
          </div>
          {{ $apps->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</body>
</html>
