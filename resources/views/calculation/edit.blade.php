@extends('layouts.main')
@section('title') Изменить расчёт {{$calculation->fileName}} @endsection

@section('content')
    <h1>Изменить расчёт {{$calculation->fileName}}</h1>
<div>
    <p>В целях безопасности для изменения доступно только поле, которое не влияет на результат расчёта, т.е., "дополнительная информация"</p>
    <form method="POST" action="{{ route('calculation.update',compact('calculation')) }}">
        @csrf
        @method('PATCH')

        <table>
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Данные</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>ID расчёта</th>
                <td>{{$calculation->fileID}}</td>
            </tr>
            <tr>
                <th>Имя файла</th>
                <td>{{$calculation->inputFile}}</td>
            </tr>
            <tr>
                <th>Отправитель</th>
                <td>{{$calculation->sender}}</td>
            </tr>
            <tr>
                <th>Тип расчёта</th>
                <td>
                    <input type="radio" name="typeCalc" value="ORCA" checked disabled> ORCA
                    <input type="radio" name="typeCalc" value="GAUSSIAN" disabled> GAUSSIAN
                    <input type="radio" name="typeCalc" value="CREST" disabled> CREST
                </td>
            </tr>
            <tr>
                <th>Данные командной строки</th>
                <td><input type="text" name="commandLine" value="{{$calculation->commandLine}}" disabled></td>
            </tr>
            <tr>
                <th>Путь к расчёту на компьютере</th>
                <td><input type="text" name="kiaePath" value="{{$calculation->kiaePath}}" disabled></td>
            </tr>
            <tr>
                <th>Статус расчёта</th>
                <td><input type="text" name="kiaeStatus" value="{{$calculation->kiaeStatus}}" disabled></td>
            </tr>
            <tr>
                <th>Номер расчета в системе очередей</th>
                <td><input type="text" name="kiaeSlurmID" value="{{$calculation->kiaeSlurmID}}" disabled></td>
            </tr>
            <tr>
                <th>Результат</th>
                <td><input type="text" name="result" value="{{$calculation->result}}" disabled></td>
            </tr>
            <tr>
                <th>Дополнительная информация</th>
                <td><input type="text" name="extra_info" value="{{$calculation->extra_info}}"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Сохранить</button>
                </td>
            </tr>
            </tbody>
        </table>
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
