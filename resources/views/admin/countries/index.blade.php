<x-admin.admin-layout-component>
    @section('title', 'Countries')
    @section('content')
        <div class="row">
            <!-- Striped rows -->
            <div class="col-md-12 my-4">
                <h2 class="h4 mb-1">{{ __('admin.countries') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="toolbar row mb-3">
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
                                            data-model="Country" data-url="{{ route('admin.delete.items') }}">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- table -->
                        <div class="table-wrapper">
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
                                        <th>{{ __('admin.status') }}</th> <!-- إضافة عنوان العمود -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input row-checkbox"
                                                        data-id="{{ $country->id }}" id="checkbox-{{ $country->id }}">

                                                    <label class="custom-control-label"
                                                        for="checkbox-{{ $country->id }}"></label>
                                                </div>
                                            </td>
                                            <td>{{ $country->id }}</td>
                                            <td>{{ $country->getTranslation($country->name) }}</td>
                                            <td>
                                                <x-admin.toggle-switch :id="$country->id" :isActive="$country->is_active"
                                                    model="Country" />
                                            </td>

                                            <td>
                                                <a href="" role="button"
                                                    class="btn mb-2 btn-secondary btn-sm">{{ __('admin.edit') }}</a>
                                                <a href="" role="button"
                                                    class="btn mb-2 btn-danger btn-sm">{{ __('admin.delete') }}</a>
                                                <a href="" role="button"
                                                    class="btn mb-2 btn-warning btn-sm">{{ __('admin.view') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Table Paging" class="mb-0 text-muted">
                            <ul class="pagination justify-content-end mb-0">
                                {{ $countries->links() }}

                            </ul>
                        </nav>
                    </div>
                </div>
            </div> <!-- simple table -->
        </div> <!-- end section -->
    @endsection
</x-admin.admin-layout-component>
