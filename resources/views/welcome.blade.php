<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Daily Grow</title>

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-lg-2 navbar-container bg-light left-bar p-3">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="#">Daily Grow</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <!-- Вертикальное меню -->
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#link-1">Клиенты</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#link-2">Расслыки</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#link-3">Статистика</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-10 col-lg-10 content-container content-box">
                    <h1 class="h3 text-center mt-2">Клиенты</h1>
                    <a href="page/new.html" class="btn btn-success mb-2">Добавить пользователя</a>
                    <section class="content">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Email</th>
                                <th scope="col">Дата рождения</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">ФИО</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                              <tr>
                                <th scope="row">ФИО</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                              </tr>
                              <tr>
                                <th scope="row">ФИО</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                              </tr>
                            </tbody>
                          </table>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
