
<x-admin.admin-layout-component>
    @section('title', 'section')
    @section('content')
        <div class="row">
            <div class="col-md-12 my-4">
                <h2 class="h4 mb-1">{{ __('admin.section') }}</h2>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th>{{ __('admin.id') }}</th>
                                    <th>{{ __('admin.name') }}</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>101</td>
                                    <td>Sample Name</td>
                                    <td>
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin.admin-layout-component>
