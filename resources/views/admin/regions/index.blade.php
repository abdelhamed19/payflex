<x-admin.admin-layout-component>
    @section('title', 'Regions')
    @section('content')
        <div class="row">
            <!-- Striped rows -->
            <div class="col-md-12 my-4">
                <h2 class="h4 mb-1">{{ __('admin.regions')}}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="toolbar row mb-3">
                            <div class="col">
                                <form class="form-inline">
                                    <div class="form-row">
                                        <div class="form-group col-auto">
                                            <label for="search" class="sr-only">Search</label>
                                            <input type="text" class="form-control" id="search" value=""
                                                placeholder="Search">
                                        </div>
                                        <div class="form-group col-auto ml-3">
                                            <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref">Status</label>
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Choose...</option>
                                                <option value="1">Processing</option>
                                                <option value="2">Success</option>
                                                <option value="3">Pending</option>
                                                <option value="3">Hold</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                    <button class="btn btn-primary float-right ml-3" type="button">Add more +</button>
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                                    <div class="dropdown-menu" aria-labelledby="actionMenuButton">
                                        <a class="dropdown-item" href="#">Export</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <th>{{ __('admin.country') }}</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regions as $region)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="4574">
                                                <label class="custom-control-label" for="4574"></label>
                                            </div>
                                        </td>
                                        <td>{{ $region->id }}</td>
                                        <td>{{ $region->getTranslation($region->name) }}</td>
                                        <td>{{ $region->country->getTranslation($region->country->name) }}</td>
                                        <td></td>
                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Remove</a>
                                                <a class="dropdown-item" href="#">Assign</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Table Paging" class="mb-0 text-muted">
                            <ul class="pagination justify-content-end mb-0">
                                {{ $regions->links() }}

                            </ul>
                        </nav>
                    </div>
                </div>
            </div> <!-- simple table -->
        </div> <!-- end section -->
    @endsection
</x-admin.admin-layout-component>
