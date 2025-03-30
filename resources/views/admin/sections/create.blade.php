<x-admin.admin-layout-component>
    @section('title', 'Sections')
    @section('content')
        <div class="col-12">
            <h2 class="page-title">{{ __('admin.create_section') }}</h2>
            <div class="page-subtitle">
                <p>{{ __('admin.parent_section') }}</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('store.section') }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <!-- Arabic Section -->
                                    <div class="col-md-6">
                                        <div class="card shadow mb-4">
                                            <div class="card-header">
                                                <strong class="card-title">{{ __('admin.ar_data') }}</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="arabicName">Name (AR)</label>
                                                    <input type="text" class="form-control" name="name[ar]" placeholder="الاوردرات"
                                                        value="{{ old('name.ar') }}" required>
                                                    <div class="invalid-feedback"> Please enter a valid name. </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- English Section -->
                                    <div class="col-md-6">
                                        <div class="card shadow mb-4">
                                            <div class="card-header">
                                                <strong class="card-title">{{ __('admin.en_data') }}</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="englishName">Name (EN)</label>
                                                    <input type="text" class="form-control" name="name[en]" placeholder="Orders"
                                                        value="{{ old('name.en') }}" required>
                                                    <div class="valid-feedback"> Looks good! </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Route & Route Name -->
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="route">{{ __('admin.route') }}</label>
                                                        <input type="text" class="form-control" name="route" placeholder="section/create/"
                                                            value="{{ old('route') }}" required>
                                                        <div class="invalid-feedback"> Please enter a valid route. </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="route_name">{{ __('admin.route_name') }}</label>
                                                        <input type="text" class="form-control" name="route_name" placeholder="section.create"
                                                            value="{{ old('route_name') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status & Icon -->
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="status">{{ __('admin.status') }}</label>
                                                        <select class="form-control" name="is_active">
                                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                                                {{ __('admin.active') }}
                                                            </option>
                                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                                                                {{ __('admin.inactive') }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="icon">{{ __('admin.icon') }}</label>
                                                        <input type="text" class="form-control" name="icon" placeholder="nav-item nav-notif"
                                                            value="{{ old('icon') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Child Sections -->
                                    <div class="col-md-12">
                                        <h4 class="text-center">{{ __('admin.child_sections') }}</h4>
                                        <div id="child-sections-container"></div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-success" onclick="addChildSection()">
                                                + {{ __('admin.add_child_section') }}
                                            </button>
                                        </div>
                                    </div>

                                </div> <!-- /.row -->

                                <!-- Submit Button -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">{{ __('admin.submit') }}</button>
                                    <a href="/" class="btn btn-danger ml-3">
                                        {{ __('admin.cancel') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
</x-admin.admin-layout-component>
<script>
    var translations = {!! json_encode([
        'active' => __('admin.active'),
        'inactive' => __('admin.inactive'),
        'name_ar' => __('admin.name_ar'),
        'name_en' => __('admin.name_en'),
        'route' => __('admin.route'),
        'route_name' => __('admin.route_name'),
        'status' => __('admin.status'),
        'icon' => __('admin.icon'),
        'child_section' => __('admin.child_section'),
    ]) !!};
</script>

<script src="{{ asset("admin/light-rtl/js/general.js") }}"></script>
