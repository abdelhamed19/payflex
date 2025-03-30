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
                            <form action="" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
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
                                                        <label for="route">{{ __('admin.image') }}</label>
                                                        <input type="file" class="form-control" name="image" placeholder="section/create/"
                                                            value="{{ old('route') }}" required>
                                                        <div class="invalid-feedback"> Please enter a valid route. </div>
                                                    </div>
                                                </div>
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

                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                          <div class="card shadow">
                                            <div class="card-body">
                                              <h5 class="card-title">{{__('admin.editor')}}</h5>
                                              <div id="editor" style="min-height:200px;">
                                                <input type="hidden" name="content" id="editorContent">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lobortis convallis efficitur. Cras nisi felis, luctus nec nibh quis, consequat maximus velit. Ut iaculis at lacus sed pellentesque.</p>
                                                <p>Maecenas luctus nisl quis leo porta, quis elementum mi tempus. Morbi blandit metus ut nulla scelerisque, sed ornare purus elementum. Vivamus sed augue in tortor commodo malesuada sed et nulla. Nullam cursus erat eget tellus maximus, ut placerat lorem fringilla.</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>


                                </div> <!-- /.row -->

                                <!-- Submit Button -->
                                <div class="text-center mt-2">
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
