<x-admin.admin-layout-component>
    @section('title', $modelName)
    @section('content')
        <div class="row">
            <!-- Striped rows -->
            <div class="col-md-12 my-4">
                <h2 class="h4 mb-1">{{ __('admin.create') }} {{ $modelName }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="toolbar row mb-3">
                            <!-- Search and Filter Form -->
                            <x-admin.search-form-component />
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <a href="" role="button"
                                        class="btn btn-primary float-right ml-3">{{ __('admin.create') }}</a>

                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="actionMenuButton">
                                        <a class="dropdown-item export-selected" href="javascript:void(0)">Export</a>
                                        <a class="dropdown-item delete-selected" href="javascript:void(0)"
                                            data-model="{{ $modelName }}"
                                            data-url="{{ route('admin.delete.items') }}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table -->
                        <x-admin.table-component :model="$model" modelName="{{ $modelName }}" />

                    </div>
                </div>
            </div> <!-- simple table -->
        </div> <!-- end section -->
    @endsection
</x-admin.admin-layout-component>
