<template>
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="field has-addons">
                    <div class="control">
                        <input class="input" type="text" placeholder="Buscar por ID" v-model="inputFindUserById">
                    </div>
                    <div class="control">
                        <button class="button is-info" v-on:click="findUser">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <table class="table is-bordered is-hoverable is-fullwidth">
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
            </div>
        </div>
        <!-- Modal -->
        <div class="modal" v-bind:class="{ 'is-active': modalActive }">
            <div class="modal-background" v-on:click="hideModal()"></div>
            <div class="modal-card">
                <section class="modal-card-body">
                    <article class="media">
                        <div class="media-left"><img :src="this.user.avatar" alt="image"></div>
                        <div class="media-content">
                            <p>Nombre: {{this.user.first_name}}</p>
                            <p>Apellido: {{this.user.last_name}}</p>
                            <p>Email: {{this.user.email}}</p>
                        </div>
                    </article>
                </section>
                <footer class="modal-card-foot">
                    <button class="button" v-on:click="registerUser">Registrar</button>
                    <button class="button" v-on:click="hideModal">Cancelar</button>
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
                first_name: null,
                last_name: null,
                avatar: null
            },
            inputFindUserById: null,
            modalActive: false
        }
    },
    mounted() {
        axios.all([
            axios.get("https://reqres.in/api/users?page=1"),
            axios.get("https://reqres.in/api/users?page=2")
        ]).then(axios.spread((response1, response2) => {
            this.users = [...response1.data.data, ...response2.data.data]
        }))
    },
    methods: {
        showModal(user) {
            this.user = user
            this.modalActive = true
        },
        hideModal(){
            this.modalActive = false
        },
        registerUser() {
            axios.post('/api/profesores/store', {
                first_name: this.user.first_name,
                last_name: this.user.last_name,
                email: this.user.email
                })
                .then(response => {
                    this.modalActive = false
                })
                .catch(response => {
                    alert("Lo sentimos, intente más tarde");
                });
        },
        findUser() {
            if(this.inputFindUserById != null && this.inputFindUserById > 0 && this.inputFindUserById < 15)
            {
                const id = this.inputFindUserById
                const result = this.users.filter(function(user){return user.id == id});
                if(result[0]){
                    this.showModal(result[0])
                }
                else {
                    alert("Usuario no encontrado")
                }
            }
            else
            {
                alert("ID Invalido")
            }
        }
    }
}
</script>
