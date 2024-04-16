<template>
    <div class="container mt-5">

        <div class="row">
            <div class="alert alert-success" role="alert" v-if="alertSuccess">
                <ul>
                    <li v-for="success in messageSuccess">
                        {{ success }}
                    </li>
                </ul>
            </div>

            <div class="col alert alert-danger" role="alert" v-if="alertError">
                <ul>
                    <li v-for="error in messageError">
                        {{ error[0] }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">
                <label for="name" class="form-label">Full name</label>
                <input type="text" class="form-control" id="name" v-model="name" placeholder="Full name">
            </div>

            <label for="country" class="form-label">Country</label>
            <div class="input-group mb-3">
                <label class="input-group-text" for="country">{{ selectCountry.flag }}</label>
                <select class="form-select" aria-label="country" id="country" v-model="selectCountry">
                    <option v-for="country in countries" :value="country">{{ country.name }}</option>
                </select>
            </div>

            <label for="phone" class="form-label">Phone number</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">{{ selectCountry.idd }}</span>
                <the-mask class="form-control" :mask="['## ###-##-##']" v-model="phone" placeholder="Phone number"/>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" v-model="email" placeholder="Email">
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button" @click="save()">Send</button>
            </div>
        </div>
    </div>
</template>

<script>
import countries from "../../countries.json";
import {TheMask} from 'vue-the-mask';
import axios from "axios";

export default {
    name: 'HomeComponent',
    components: {TheMask},
    data() {
        return {
            alertSuccess: false,
            alertError: false,
            messageSuccess: '',
            messageError: '',

            selectCountry: countries[0],
            countries: countries,
            phone: '',
            name: '',
            email: ''
        }
    },
    methods: {
        //create new user
        save() {
            let formData = new FormData();
            formData.append('selectCountry', JSON.stringify(this.selectCountry));
            formData.append('name', this.name);
            formData.append('phone', this.phone);
            formData.append('email', this.email);


            axios.post('/api/v1/user/save',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then((response) => {
                    this.messageSuccess = ['User added successfully'];
                    this.alertSuccess = true;
                    this.alertError = false;
                })
                .catch(error => {
                    this.messageError = error.response.data.errors;
                    this.alertSuccess = false;
                    this.alertError = true;
                });
        },
    }
};
</script>
