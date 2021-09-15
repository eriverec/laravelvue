<template>
    <div>
        <h3 class="text-center">Create cita</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCita">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="cita.nota">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="cita.fecha">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                cita: {}
            }
        },
        methods: {
            addCita() {
                this.axios
                    .post('http://localhost:8000/api/citas', this.cita)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>