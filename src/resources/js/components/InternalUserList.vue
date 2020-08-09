<template>
    <div class="container">
        <div class="columns">
            <div class="column">
                <table class="table is-bordered is-hoverable is-fullwidth" v-if="users.length > 0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                         <tr v-for="(user, key, index) in users">
                            <td>{{ user.id }}</td>
                            <td>{{ user.first_name }}</td>
                            <td>{{ user.last_name }}</td>
                            <td>{{ user.email }}</td>
                            <td><button class="button" v-on:click="showModal(user)">Revisar</button></td>
                        </tr>
                    </tbody>
                </table>
                <p v-else>No existen usuarios registrados</p>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal" v-bind:class="{ 'is-active': modalActive }">
            <div class="modal-background" v-on:click="hideModal()"></div>
            <div class="modal-card">
                <section class="modal-card-body">
                    <article class="media">
                        <div class="media-content">
                            <p>Nombre: {{this.user.first_name}}</p>
                            <p>Apellido: {{this.user.last_name}}</p>
                            <p>Email: {{this.user.email}}</p>
                        </div>
                    </article>
                </section>
                <footer class="modal-card-foot">
                    <button class="button" v-on:click="deleteUser(user.id)">Eliminar</button>
                    <button class="button" v-on:click="hideModal()">Cancelar</button>
                </footer>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            users:[],
            user: {
                id: null,
                first_name: null,
                last_name: null,
                avatar: null
            },
            modalActive: false
        }
    },
    mounted() {
        this.getData()
    },

    methods: {
        showModal(user) {
            this.user = user
            this.modalActive = true
        },

        hideModal(){
            this.modalActive = false
        },

        getData() {
            axios.get("/api/profesores")
            .then(result => {
                this.users = result.data
            })
            .catch(() => {
                alert("Lo sentimos, intente más tarde");
            })
        },

        deleteUser(id) {
            axios.delete("/api/profesores/destroy/"+id)
            .then(response => {
                this.getData()
                this.modalActive = false
            })
            .catch(response => {
                alert("Lo sentimos, intente más tarde");
            })
        }
    }
}
</script>
