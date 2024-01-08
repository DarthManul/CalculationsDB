@extends('layouts.main')
@section('title') Расчёт {{$calculation->fileName}} @endsection

@section('content')
    <h1>Детали расчёта {{$calculation->fileName}}</h1>
<div>
<table>
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Данные</th>
    </tr>
    </thead>
        <tbody>
        <tr><th>ID расчёта</th><td>{{$calculation->fileID}}</td></tr>
        <tr><th>Имя файла</th><td>{{$calculation->fileName}}</td></tr>
        <tr><th>Отправитель</th><td>{{$calculation->sender}}</td></tr>
        <tr><th>Тип расчёта</th><td>{{$calculation->typeCalc}}</td></tr>
        <tr><th>Данные командной строки</th><td>{{$calculation->commandLine}}</td></tr>
        <tr><th>Путь к расчёту на компьютере</th><td>{{$calculation->kiaePath}}</td></tr>
        <tr><th>Статус расчёта</th><td>{{$calculation->kiaeStatus}}</td></tr>
        <tr><th>Номер расчета в системе очередей</th><td>{{$calculation->kiaeSlurmID}}</td></tr>
        <tr><th>Результат</th><td>{{$calculation->result}}</td></tr>
        <tr><th>Дополнительная информация</th><td>{{$calculation->extra_info}}</td></tr>
        </tbody>

</table>
    <form action="{{route('calculation.edit', compact('calculation'))}}" method="get">
        <button type="submit" class="btn">>Отредактировать </button>
    </form>
    <form action="{{route('calculation.destroy', compact('calculation'))}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn">>Удалить </button>
    </form>

</div>
@endsection
