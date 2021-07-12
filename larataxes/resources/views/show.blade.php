@extends('layouts.app')

@section('content')
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Оклад</th>
            <th scope="col">Норма в месяц</th>
            <th scope="col">Отработано дней</th>
            <th scope="col">Налоговый вычет</th>
            <th scope="col">Год</th>
            <th scope="col">Месяц</th>
            <th scope="col">Пенсионер</th>
            <th scope="col">Инвалид</th>
            <th scope="col">opv</th>
            <th scope="col">ipn</th>
            <th scope="col">vosms</th>
            <th scope="col">Korrekciya</th>
            <th scope="col">So</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $salary->oklad }}</td>
                <td>{{ $salary->norma_in_month }}</td>
                <td>{{ $salary->otrabotano_days }}</td>
                <td>{{ $salary->nalog_vichet }}</td>
                <td>{{ $salary->calendar_god }}</td>
                <td>{{ $salary->month }}</td>
                <td>{{ $salary->pensioner }}</td>
                <td>{{ $salary->disabled }}</td>
                <td>{{ round($salary->opv, 2) }}</td>
                <td>{{ round($salary->ipn, 2) }}</td>
                <td>{{ round($salary->vosms, 2) }}</td>
                <td>{{ round($salary->corrections, 2) }}</td>
                <td>{{ round($salary->so, 2) }}</td>
            </tr>
        </tbody>
    </table>
@endsection
