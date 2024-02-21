@extends('./layouts/layout')

@section('content')
<h1 class="h3 text-center mt-2">Статистика</h1>
<section class="content">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Название</th>
            <th scope="col">Отправлено</th>
            <th scope="col">Доставлено</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($statistics as $stat)
          <tr>
            <th scope="row">{{ $stat->sending->title}}</th>
            <td>{{ $stat->sent }}</td>
            <td>{{ $stat->delivered }}</td>
          </tr>
          @endforeach

        </tbody>
    </table>
</section>
@endsection