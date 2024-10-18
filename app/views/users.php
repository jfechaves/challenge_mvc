<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.10/sorting/datetime-moment.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Usuários</h2>

            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#userModal" id="addUserBtn">
                <i class="fas fa-plus-circle"></i> Adicionar Usuário
            </button>
        </div>

        <div class="table-responsive-md scrollbar fs-11">
            <table class="table table-hover overflow-hidden" id="userTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Admissão</th>
                        <th>Situação</th>
                        <th>Criado</th>
                        <th>Editado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="userModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h1 class="modal-title fs-5" id="userModalLabel">Adicionar Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="userForm" class="needs-validation" novalidate>
                        <input type="hidden" name="id" id="userId">
                        <div class="form-grou mb-3">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Situação:</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="active">Ativo</option>
                                <option value="deactive">Inativo</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="admitted_at">Admissão:</label>
                            <input type="date" class="form-control" name="admitted_at" id="admitted_at" required>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            //Table
            $.fn.dataTable.moment('DD/MM/YYYY');
            let table = $('#userTable').DataTable({
                order: [
                    [0, 'desc']
                ],
                lengthMenu: [
                    [10, 20, 40, 100, -1],
                    [10, 20, 40, 100, 'Todos'],
                ],
                autoWidth: false,
                responsive: true,
                language: {
                    lengthMenu: '_MENU_',
                    zeroRecords: 'Nenhum resultado',
                    info: 'Página _PAGE_ de _PAGES_',
                    infoEmpty: 'Nenhum resultado',
                    infoFiltered: '(Filtrado de _MAX_)',
                    search: '',
                    searchPlaceholder: 'Filtrar',
                    paginate: {
                        next: '<i class="fas fa-angle-right"></i>',
                        previous: '<i class="fas fa-angle-left"></i>',
                        first: '<i class="fas fa-angle-double-left"></i>',
                        last: '<i class="fas fa-angle-double-right"></i>'
                    }
                }
            });

            // Load Users
            loadUsers();

            // Add User
            $('#addUserBtn').click(function() {
                $('#userForm')[0].reset();
                $('#userId').val('');
                $('#userModal .modal-title').text('Adicionar Usuário');
                $('#userModal').modal('show');
            });

            // Save/Update User
            $('#userForm').submit(function(e) {
                e.preventDefault();
                const form = document.getElementById('userForm');

                if (form.checkValidity()) {
                    const formData = $(this).serialize();
                    const userId = $('#userId').val();
                    const url = userId ? `/api/update-user/${userId}` : '/api/create-user';

                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            const result = JSON.parse(response);
                            if (result.request === 'success') {
                                Swal.fire('Sucesso!', result.message, 'success');
                                $('#userModal').modal('hide');
                                loadUsers();
                            } else if(result.request === 'error'){
                                Swal.fire('Erro!', result.message, 'error');
                            }
                        },
                    });
                } else {
                    form.classList.add('was-validated');
                }
            });

            // Load/Update Users
            function loadUsers() {
                $.ajax({
                    url: '/api/list-users',
                    method: 'GET',
                    success: function(data) {
                        const users = JSON.parse(data);
                        table.clear();
                        users.forEach(function(user) {
                            table.row.add([
                                `<span class="text-nowrap">${user.id}</span>`,
                                `<span class="text-nowrap">${user.name}</span>`,
                                `<span class="text-nowrap">${user.email}</span>`,
                                `<span class="text-nowrap">${formatDate(user.admitted_at,'date')}</span>`,
                                `<span class="text-nowrap">${user.status === 'active' ? 'Ativo' : 'Inativo'}</span>`,
                                `<span class="text-nowrap">${formatDate(user.created_at,'datetime')}</span>`,
                                `<span class="text-nowrap">${formatDate(user.updated_at,'datetime')}</span>`,
                                `<span class="text-nowrap">
                                    <button class="btn btn-info" onclick="editUser(${user.id})"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger" onclick="deleteUser(${user.id})"><i class="fas fa-trash"></i></button>
                                </span>`
                            ]).draw(false);
                        });
                    }
                });
            }

            // Edit User
            window.editUser = function(id) {
                $.ajax({
                    url: `/api/edit-user/${id}`,
                    method: 'GET',
                    success: function(response) {
                        const user = JSON.parse(response);
                        $('#userId').val(user.id);
                        $('#name').val(user.name);
                        $('#email').val(user.email);
                        $('#status').val(user.status);
                        $('#admitted_at').val(user.admitted_at);
                        $('#userModal .modal-title').text('Editar Usuário');
                        $('#userModal').modal('show');
                    }
                });
            };

            // Delete User
            window.deleteUser = function(id) {
                Swal.fire({
                    title: 'Você tem certeza?',
                    text: "Essa ação não pode ser desfeita!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Não'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/api/delete-user/${id}`,
                            method: 'DELETE',
                            success: function(resp) {
                                const response = JSON.parse(resp);
                                Swal.fire(response.request === 'success' ? 'Sucesso!' : 'Erro!', response.message, response.request);
                                loadUsers();
                            }
                        });
                    }
                });
            };
        });

        //Format Date
        function formatDate(dateString, type) {
            const date = new Date(dateString);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            const hour = String(date.getHours()).padStart(2, '0');
            const minute = String(date.getMinutes()).padStart(2, '0');
            return (type == 'date')? `${day}/${month}/${year}` : `${day}/${month}/${year} ${hour}:${minute}`;
        }
    </script>
</body>

</html>
