@extends('./layouts/layout')

@section('content')
<h1 class="h3 text-center mt-2 mb-2">Добавить клиента</h1>

<section class="content">
    <form method="POST" action=" {{ route('client.save') }} " class="w-25 m-0 m-auto">
        @csrf
      
        <div class="form-group mb-2">
          <label for="name">Название</label>
          <input name="name" class="form-control" id="name" placeholder="Название">
        </div>
        
        @error('name')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group mb-2">
            <label for="phone">Телефон</label>
            <input name="phone" class="form-control" id="phone" placeholder="Телефон">
          </div>
          
          @error('phone')
          <div class="error">{{ $message }}</div>
          @enderror
      
          <div class="form-group mb-2">
            <label for="email">email</label>
            <input name="email" class="form-control" id="email" placeholder="email">
          </div>
          
          @error('email')
          <div class="error">{{ $message }}</div>
          @enderror

          <div class="form-group">
            <label for="inputDate">Введите дату:</label>
            <input type="date" name="inputDate" id="inputDate" class="form-control">
          </div>
        
        @error('inputDate')
        <div class="error">{{ $message }}</div>
        @enderror
        
        @error('clientCreateError')
        <div class="error">{{ $message }}</div>
        @enderror
      
        <button type="submit" class="btn btn-primary my-3">Создать</button>
      </form>
</section>
@endsection