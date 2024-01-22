@extends('layouts.main')
@section('title')Create new calculation @endsection

@section('content')
    <h1>Создать новый расчёт</h1>
<div><form action="{{route('calculation.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label for="authorName" class="form-label">Ваше имя</label>
        <input type="text" class="form-control" id="authorName" name="sender">
    </div>
    <div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="typeCalc" id="inlineRadio1" value="ORCA" checked>
            <label class="form-check-label" for="inlineRadio1">ORCA</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="typeCalc" id="inlineRadio2" value="Gaussian16" disabled>
            <label class="form-check-label" for="inlineRadio2">GAUSSIAN 16</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="typeCalc" id="inlineRadio3" value="CREST" disabled>
            <label class="form-check-label" for="inlineRadio3">CREST</label>
        </div>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Добавьте файл</label>
        <input class="form-control" type="file" id="formFile" name="inputFile">
    </div>
    <div class="mb-3">
        <label for="extra_info" class="form-label">Дополнительная информация</label>
        <input type="text" class="form-control" id="extra_info" name="extra_info">
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
