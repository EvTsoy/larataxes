<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="oklad">Оклад</label>
                        <div class="col-sm-6">
                            <input
                                id="oklad"
                                class="form-control"
                                placeholder="Оклад"
                                required
                                type="number"
                                v-model="form.oklad"
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="norma_in_month">Норма в месяц</label>
                        <div class="col-sm-6">
                            <input
                                id="norma_in_month"
                                class="form-control"
                                placeholder="Норма в месяц"
                                required
                                type="number"
                                v-model="form.norma_in_month"

                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="otrabotano_days">Отработано дней</label>
                        <div class="col-sm-6">

                            <input
                                id="otrabotano_days"
                                class="form-control"
                                placeholder="Отработано дней"
                                required
                                type="number"
                                v-model="form.otrabotano_days"

                            >
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Налоговый вычет</label>
                        <div class="col-sm-6">

                            <select
                                class="form-control"
                                v-model="form.nalog_vichet"
                            >
                                <option value="0">Нет</option>
                                <option value="1">Да</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Год</label>
                        <div class="col-sm-6">
                            <select
                                class="form-control"
                                v-model="form.calendar_god"
                                required
                            >
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

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Месяц</label>
                        <div class="col-sm-6">

                            <select
                                class="form-control"
                                v-model="form.calendar_month"
                                required
                            >
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

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Пенсионер</label>
                        <div class="col-sm-6">

                            <select
                                class="form-control"
                                v-model="form.is_pensioner"

                            >
                                <option value="0">Нет</option>
                                <option value="1">Да</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Инвалид</label>
                        <div class="col-sm-6">

                            <select
                                class="form-control"
                                name="is_disabled_person"
                                v-model="form.is_disabled_person"

                            >
                                <option value="0">Нет</option>
                                <option value="1">1 группа</option>
                                <option value="2">2 группа</option>
                                <option value="3">3 группа</option>
                            </select>
                        </div>
                    </div>


                    <div class="d-flex justify-content-center mt-4">
                            <button
                                class="btn btn-primary mr-3"
                                @click.prevent="sendFormGet"
                            >Calculate
                            </button>
                            <button
                                class="btn btn-danger"
                                @click.prevent="sendFormPost"
                            >Save</button>
                    </div>
                    <p class="text-danger">{{ error }}</p>

                </form>
            </div>
            <div class="col-md-6" v-if="taxes">
                <div class="card">
                    <div class="card-header">
                        Your taxes are
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Обязательный пенсионный взнос: {{ taxes.opv}}</li>
                        <li class="list-group-item"> Корректировка ИПН: {{ taxes.corrections}}</li>
                        <li class="list-group-item">Индивидуальный подоходный налог: {{ taxes.ipn}}</li>
                        <li class="list-group-item">Взнос на ОСМС работником: {{ taxes.vosms}}</li>
                        <li class="list-group-item">Заработная плата ("на руки"): {{ taxes.onHands}}</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    created() {
        console.log('here')
    },

    data() {
        return {
            form: {
                oklad: '',
                norma_in_month: '',
                otrabotano_days: '',
                nalog_vichet: '0',
                calendar_god: '',
                calendar_month: '',
                is_pensioner: '0',
                is_disabled_person: '0',
            },

            taxes: null,
            error: ''
        }
    },

    methods: {
        validateForm() {
            for (let key in this.form) {
                if(this.form[key] === '') {
                    this.error = 'Fill all fields'
                    return false
                }
            }
            return true;
        },

        sendFormGet() {
            if(!this.validateForm()) return;
            this.error = ''

            axios.get('calculator/show', {
                params: this.form
            }).then(res => {
                this.taxes = res.data
            })
        },

        sendFormPost() {
            if(!this.validateForm()) return;
            this.error = ''

            axios.post('calculator/show', this.form)
                .then(res => {
                    window.location.replace('/salaries')
            })
        }
    }
}
</script>
