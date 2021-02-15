<template>
    <div class="container">
        <div class="row">
            <select class="form-control col-md-3" name="" id="">
                <option value="all" selected>Todas</option>
                <option value="" v-for="operator in operators" :key="operator.id">
                    {{operator.name}}
                </option>
            </select>
            <select class="form-control col-md-3" name="" id="">
                <option value="all" selected>Todos</option>
                <option value="ativo">Ativos</option>
                <option value="ativo">Inativos</option>
            </select>
        </div>
        <div class="row">
            <button @click="addNewRow()" class="btn btn-primary">+ NOVO</button>
        </div>
        <div class="row">

        <table class="table table-bordered" id="table">
            <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="operator in operators" :key="operator.id">
                <td>
                    <button class="btn btn-danger" @click="deleteOperator(operator.id)">Deletar</button>
                    <button class="btn btn-warning" @click="editOperator(operator.id)">Editar</button>
                </td>
                <td>{{ operator.name }}</td>
                <td>{{ operator.description }}</td>
            </tr>
            </tbody>
        </table>
        </div>

    </div>
</template>

<script>
        export default {
        data() {
            return {
                operators: []
            }

        },
        created() {
            this.axios
                .get('http://localhost:8000/api/operators')
                .then(response => {
                    this.operators = response.data;
                });
        },
        methods: {
            deleteOperator(id) {
                this.axios
                    .delete(`http://localhost:8000/api/operator/delete/${id}`)
                    .then(response => {
                        let i = this.operators.map(item => item.id).indexOf(id); // find index of your object
                        this.operators.splice(i, 1)
                    });
            },editOperator(id) {
                this.axios
                    .delete(`http://localhost:8000/api/operator/update/${id}`,{"name":this.name,"description":this.desc,"status":this.status})
                    .then(response => location.reload());
            }, updateOperator(id) {
                this.axios
                    .delete(`http://localhost:8000/api/operator/update/${id}`,{"name":this.name,"description":this.desc,"status":this.status})
                    .then(response => location.reload());
            },
            addNewRow(){
                var newRow = $("<tr>");
                var cols = "";

                cols += '<td><button id="btn" class="btn btn-primary"  @click="addOperator">Add</button></td>';
                cols += '<td><input class="form-control" @v-model="name" type="text" id="name" placeholder="Digite o nome"></input></td>';
                cols += '<td><input class="form-control" @v-model="desc" type="text" id="desc" placeholder="Digite o descrição"></input></td>';

                newRow.prepend(cols);
                $("#table").prepend(newRow);
                    $(document).on('click', '#btn', function () {
                        axios
                        .post(`http://localhost:8000/api/operator/add`,{"name":$('#name').val(),"description":$('#desc').val()})
                        .then(response => location.reload())

                    });
                return false;

            },
            addOperator(){
                console.log(this.name);
                console.log(this.desc);
                console.log('oxi');
                return ;
            }
        }
            }


</script>
