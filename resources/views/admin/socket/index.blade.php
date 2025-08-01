<x-admin.admin-layout-component>
    @section('title', 'Roles')
    @section('content')
        <div class="row">
            <!-- Striped rows -->
            <div class="col-md-12 my-4">
                <h2 class="h4 mb-1">{{ __('admin.socket') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <!-- table -->
                        <table class="table table-bordered">
                            <thead>
                                <tr role="row">
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="all">
                                            <label class="custom-control-label" for="all"></label>
                                        </div>
                                    </th>
                                    <th>{{ __('admin.id') }}</th>
                                    <th>{{ __('admin.name') }}</th>
                                    <th>{{ __('admin.status') }}</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="messages">
                                <tr>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- simple table -->
        </div> <!-- end section -->
    @endsection
</x-admin.admin-layout-component>

<script>
    const socket = io('http://localhost:3000');

    socket.on('connect', () => {
        console.log('Connected to socket server');
    });

    socket.on('new-message', (data) => {
        console.log('New message received:', data);

        const tbody = document.getElementById('messages');

        const tr = document.createElement('tr');

        tr.innerHTML = `
            <td>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <label class="custom-control-label"></label>
                </div>
            </td>
            <td>1</td>
            <td>${data.title}</td>
            <td>${data.description}</td>
            <td><button class="btn btn-sm btn-danger">Delete</button></td>
        `;

        tbody.appendChild(tr);
    });
</script>
