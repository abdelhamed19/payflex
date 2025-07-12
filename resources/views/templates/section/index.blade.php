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
                            <div class="col-md-12 mb-3">
                                <form action="" method="GET">
                                    <div class="form-row align-items-end">

                                        <!-- Search -->
                                        <div class="form-group col-md-3">
                                            <label for="search">{{ __('admin.search') }}</label>
                                            <input type="text" name="search" class="form-control" id="search"
                                                placeholder="Search" value="{{ request('search') }}">
                                        </div>

                                        <!-- From Date -->
                                        <div class="form-group col-md-2">
                                            <label for="from">من تاريخ</label>
                                            <input type="date" name="from" class="form-control" id="from"
                                                value="{{ request('from') }}">
                                        </div>

                                        <!-- To Date -->
                                        <div class="form-group col-md-2">
                                            <label for="to">إلى تاريخ</label>
                                            <input type="date" name="to" class="form-control" id="to"
                                                value="{{ request('to') }}">
                                        </div>

                                        <!-- Status Filter -->
                                        <div class="form-group col-md-2">
                                            <label for="is_active">الحالة</label>
                                            <select name="is_active" class="form-control" id="is_active">
                                                <option value="">الكل</option>
                                                <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>
                                                    {{ __('admin.active') }}</option>
                                                <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>
                                                    {{ __('admin.inactive') }}</option>
                                            </select>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="form-group col-md-3">
                                            <label>&nbsp;</label>
                                            <div class="d-flex">
                                                <button type="submit"
                                                    class="btn btn-primary mr-2">{{ __('admin.filter') }}</button>
                                                <a href="{{ url()->current() }}" class="btn btn-secondary">إعادة تعيين</a>
                                            </div>
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
                                            data-model="{{ $modelName }}"
                                            data-url="{{ route('admin.delete.items') }}">Delete</a>
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
                                    @forelse ($model as $data)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input row-checkbox"
                                                        data-id="{{ $data->id }}" id="checkbox-{{ $data->id }}">
                                                    <label class="custom-control-label"
                                                        for="checkbox-{{ $data->id }}"></label>
                                                </div>

                                            </td>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->getTranslation($data->name) }}</td>
                                            <td>
                                                <x-admin.toggle-switch :id="$data->id" :isActive="$data->is_active"
                                                    :model="$modelName" />
                                            </td>
                                            <td>
                                                <a href="" role="button"
                                                    class="btn mb-2 btn-secondary btn-sm">{{ __('admin.edit') }}</a>

                                                <a href="javascript:void(0);" data-id="{{ $data->id }}"
                                                    data-model="{{ $modelName }}" data-url=""
                                                    onclick="deleteResource(this)" class="btn mb-2 btn-danger btn-sm">
                                                    {{ __('admin.delete') }}
                                                </a>

                                                <a href="" role="button"
                                                    class="btn mb-2 btn-primary btn-sm">{{ __('admin.show') }}</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">لا توجد بيانات متاحة</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Table Paging" class="mb-0 text-muted">
                            <ul class="pagination justify-content-end mb-0">
                                {{ $model->links() }}

                            </ul>
                        </nav>
                    </div>
                </div>
            </div> <!-- simple table -->
        </div> <!-- end section -->
    @endsection
</x-admin.admin-layout-component>
