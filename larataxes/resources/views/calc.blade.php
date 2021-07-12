@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="get" action="/calculator/show">
            <div class="row">
                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="oklad" class="form-label">Оклад</label>
                        <input name="oklad" type="number" class="form-control" id="oklad" placeholder="Оклад" required>
                    </div>

                    <div class="mb-3">
                        <label for="norma_in_month" class="form-label">Норма в месяц</label>
                        <input name="norma_in_month" type="number" class="form-control" id="norma_in_month" placeholder="Норма в месяц" required>
                    </div>

                    <div class="mb-3">
                        <label for="otrabotano_days" class="form-label">Отработано дней</label>
                        <input name="otrabotano_days" type="number" class="form-control" id="otrabotano_days" placeholder="Отработано дней" required>
                    </div>

                    <div class="mb-3">
                        <label for="nalog_vichet" class="form-label">Налоговый вычет</label>
                        <select name="nalog_vichet" class="form-control">
                            <option value="0">Нет</option>
                            <option value="1">Да</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="calendar_god" class="form-label">Год</label>
                        <select name="calendar_god" class="form-control">
                            <option value="">Year</option>
                            <option value="2012">2022</option>
                            <option value="2011">2021</option>
                            <option value="2010">2020</option>
                            <option value="2009">2019</option>
                            <option value="2008">2018</option>
                            <option value="2007">2017</option>
                            <option value="2006">2016</option>
                            <option value="2005">2015</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="calendar_month" class="form-label">Месяц</label>
                        <select name="calendar_month" class="form-control">
                            <option value="">Month</option>
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">Jun</option>
                            <option value="07">Jul</option>
                            <option value="08">Aug</option>
                            <option value="09">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="is_pensioner" class="form-label">Пенсионер</label>
                        <select name="is_pensioner" class="form-control">
                            <option value="0">Нет</option>
                            <option value="1">Да</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="is_disabled_person" class="form-label">Инвалид</label>
                        <select name="is_disabled_person" class="form-control">
                            <option value="0">Нет</option>
                            <option value="1">1 группа</option>
                            <option value="2">2 группа</option>
                            <option value="3">3 группа</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">Calculate</button>
{{--                        <button class="btn btn-danger">Save</button>--}}
                    </div>
                </div>
            </div>

        </form>
    </div>

@endsection
