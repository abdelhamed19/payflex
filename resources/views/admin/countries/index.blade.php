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
                            <div class="col-6">
                                <form class="form-inline mb-3" method="GET" action="">
                                    <input type="hidden" name="file_directory" value="admin.countries.index">
                                    <input type="hidden" name="model" value="Country">
                                    <input type="hidden" name="value" value="countries">


                                    <div class="form-row align-items-center w-100">
                                        {{-- البحث بالاسم أو المعرف --}}
                                        <div class="col-auto mb-2">
                                            <input type="text" class="form-control" name="search"
                                                value="{{ request('search') }}" placeholder="ابحث بالاسم أو المعرّف">
                                        </div>

                                        {{-- من تاريخ --}}
                                        <div class="col-auto mb-2">
                                            <input type="date" class="form-control" name="from_date"
                                                value="{{ request('from_date') }}">
                                        </div>

                                        {{-- إلى تاريخ --}}
                                        <div class="col-auto mb-2">
                                            <input type="date" class="form-control" name="to_date"
                                                value="{{ request('to_date') }}">
                                        </div>

                                        {{-- زر البحث --}}
                                        <div class="col-auto mb-2">
                                            <button type="submit" class="btn btn-primary">بحث</button>
                                        </div>

                                    </div>
                                </form>

                            </div>

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
