@extends('layouts.main')
@section('title')
    Calculations
@endsection
@section('content')
    <div>
        <button type="button" class="btn"><a href={{route('calculation.create')}}>Создать новый расчёт!</a> </button>
        <H1>Список всех расчётов</H1>
        @if(sizeof($calculations)>=1)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Имя файла</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Тип расчёта</th>
                        <th scope="col">Статус расчёта</th>
                        <th scope="col">Дополнительная информация</th>
                        <th scope="col">Дата постановки</th>
                    </tr>
                </thead>
        @foreach($calculations as $calculation)
                    <tbody>
                <tr>
                        <td><a href={{route('calculation.show',$calculation->id)}}}}>
                            {{$calculation->fileName}}</a></td>

                        <td>{{$calculation->sender}}</td>
                        <td>{{$calculation->typeCalc}}</td>
                        <td>{{$calculation->kiaeStatus}}</td>
                        <td>{{$calculation->extra_info}}</td>
                        <td>{{$calculation->created_at}}</td>
                    </tr>
                    </tbody>
        @endforeach
            </table>
        @else
            <p>К сожалению, расчётов нет </p>
        @endif
    </div>
@endsection
