<template>
    <div>
	    <h5>Report</h5>
	    <hr>
        <form @submit.prevent="getReport">
            <div class="create-location-form input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Price</span>
                </div>
                <input v-model="price" type="text" class="form-control" placeholder="Price ( Greater or Equal) to Match" />
                <div class="input-group-append">
                    <button class="btn btn-primary">Run</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>Location</th>
                <th>Parent Category</th>
                <th>Category</th>
                <th>Count</th>
                <th></th>
            </thead>
            <tbody>
                <tr v-for="row in report" :key="row.id">
                    <td>{{ row.loc_name }}</td>
                    <td>{{ row.parent_name }}</td>
                    <td>{{ row.cat_name }}</td>
                    <td>{{ row.count }}</td>
                    <td align="center"><button class="btn btn-danger btn-sm" @click.prevent="deleteLocation(row.id)"><i class="fa fa-times" /> Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            report: [],
	        price:0,
        };
    },
    mounted() {
        this.getReport();
    },
    methods: {
	    getReport() {
            return axios.get('/api/report', { params: { price: this.price}})
                .then(response => {
                    this.report = response.data;
                }).catch(console.error);
        },
    }
}
</script>

<style>
.create-location-form {
    margin-bottom: 10px;
}
</style>