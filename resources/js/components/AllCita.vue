<template>
    <div>
        <h2 class="text-center">Citas List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="cita in citas" :key="cita.id">
                <td>{{ cita.id }}</td>
                <td>{{ cita.nota }}</td>
                <td>{{ cita.fecha }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: cita.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteCita(cita.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                citas: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/citas/')
                .then(response => {
                    this.citas = response.data;
                });
        },
        methods: {
            deleteCita(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/citas/${id}`)
                    .then(response => {
                        let i = this.citas.map(data => data.id).indexOf(id);
                        this.citas.splice(i, 1)
                    });
            }
        }
    }
</script>