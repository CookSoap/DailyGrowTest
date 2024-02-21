@extends('./layouts/layout')

@section('content')
<h1 class="h3 text-center mt-2">Создать рассылку</h1>
<section class="content">
  <form method="POST" action=" {{ route('sending.save') }} " class="w-25 m-0 m-auto">
    @csrf
  
    <div class="form-group mb-2">
      <label for="title">Название</label>
      <input name="title" class="form-control" id="title" placeholder="Название">
    </div>
    
    @error('title')
    <div class="error">{{ $message }}</div>
    @enderror

    <div class="form-group mb-2"">
      <label for="text">Текст</label>
      <textarea class="form-control" name="text" id="text" rows="3" placeholder="Текст"></textarea>
    </div>
    
    @error('text')
    <div class="error">{{ $message }}</div>
    @enderror

    <div class="form-group mb-2"">
      <label for="Login">Логин smsc.ru</label>
      <input type="login" class="form-control" name="login" id="Login" placeholder="Логин">
    </div>

    @error('login')
    <div class="error">{{ $message }}</div>
    @enderror

    <div class="form-group mb-2"">
      <label for="Password">Пароль smsc.ru</label>
      <input type="password" class="form-control" name="password" id="Password" placeholder="Пароль">
    </div>

    @error('password')
    <div class="error">{{ $message }}</div>
    @enderror

    <p class="mt-3 mb-1">Выберите получателей:</p>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioClients" value="allClients" id="allClients" checked>
      <label class="form-check-label" for="allClients">
        Все клиенты
      </label>
    </div>

    <p class="mt-3 mb-1">Запустите рассылку:</p>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" value="rightNowRadio" id="rightNowRadio">
      <label class="form-check-label" for="rightNowRadio">
        Отправить сейчас
      </label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" value="thenRadio" id="thenRadio" checked>
      <label class="form-check-label" for="thenRadio">
        Регулярно в 10:30 за 7 дней до дня рождения
      </label>
    </div>

    @error('text')
    <div class="error">{{ $message }}</div>
    @enderror

    @error('sendingCreateError')
    <div class="error">{{ $message }}</div>
    @enderror
  
    <button type="submit" class="btn btn-primary my-3">Создать</button>
  </form>
</section>
@endsection