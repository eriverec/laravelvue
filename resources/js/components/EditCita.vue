<template>
    <div>
        <h3 class="text-center">Edit cita</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCita">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="cita.nota">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="cita.fecha">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/citas/${this.$route.params.id}`)
                .then((res) => {
                    this.cita = res.data;
                });
        },
        methods: {
            updateCita() {
                this.axios
                    .patch(`http://localhost:8000/api/citas/${this.$route.params.id}`, this.product)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>