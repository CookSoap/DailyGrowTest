@extends('./layouts/layout')

@section('content')
<h1 class="h3 text-center mt-2">Клиенты</h1>
<a href="{{ route('client.create') }}" class="btn btn-success mb-2">Добавить пользователя</a>
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

          @foreach ($clients as $client)
          <tr>
            <th scope="row">{{ $client->name }}</th>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ \Carbon\Carbon::parse( $client->date_of_birth)->format('j F, Y')	 }}</td>
          </tr>
          @endforeach

        </tbody>
    </table>
</section>
@endsection