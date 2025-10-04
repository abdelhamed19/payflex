<x-admin.admin-layout-component>
    @section('title', __('admin.profile'))
    @section('content')
        <div class="col-12">
            <h2 class="page-title">{{ __('admin.profile') }}</h2>
            <x-flash-message />
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('update.profile') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 text-center mb-4 position-relative">
                                        <!-- زر إزالة الصورة (X) -->
                                        <button type="button"
                                            class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2"
                                            id="removeImageButton" onclick="removeImage()"
                                            style="border-radius: 50%; width: 30px; height: 30px; display: {{ $user->image ? 'block' : 'none' }};">
                                            ✖
                                        </button>

                                        <!-- عرض الصورة -->
                                        <img id="profileImagePreview"
                                            src="{{ $user->image }}"
                                            class="rounded-circle custom-img" alt="Profile Image"
                                            width="150" height="150">

                                        <!-- زر تحميل صورة جديدة -->
                                        <input type="file" name="image" id="profileImageInput"
                                            class="form-control mt-2" accept="image/*" onchange="previewImage(event)">
                                    </div>

                                    <!-- Arabic Section -->
                                    <div class="col-md-6">
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="arabicName">{{ __('auth.first_name') }}</label>
                                                    <input type="text" class="form-control" name="first_name"
                                                        placeholder="first name" value="{{ $user->first_name }}">
                                                    <x-validation-message field="first_name" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- English Section -->
                                    <div class="col-md-6">
                                        <div class="card shadow mb-4">

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="englishName">{{ __('auth.last_name') }}</label>
                                                    <input type="text" class="form-control" name="last_name"
                                                        placeholder="last name" value="{{ $user->last_name }}">
                                                    <x-validation-message field="last_name" />
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
                                                        <label for="status">{{ __('admin.language') }}</label>
                                                        <select class="form-control" name="lang">
                                                            <option value="" {{ $user->lang == null ? 'selected' : '' }}></option>
                                                            <option value="en"
                                                                {{ $user->lang == 'en' ? 'selected' : '' }}>
                                                                {{ __('admin.english') }}
                                                            </option>
                                                            <option value="ar"
                                                                {{ $user->lang == 'ar' ? 'selected' : '' }}>
                                                                {{ __('admin.arabic') }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="icon">{{ __('auth.email') }}</label>
                                                        <input type="text" class="form-control" name="email"
                                                            placeholder="admin@admin.com" value="{{ $user->email }}">
                                                            <x-validation-message field='email' />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="icon">{{ __('auth.phone') }}</label>
                                                        <input type="text" class="form-control" name="phone"
                                                            placeholder="123456789" value="{{ $user->phone }}">
                                                        <x-validation-message field='phone' />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="icon">{{ __('auth.address') }}</label>
                                                        <input type="text" class="form-control" name="address"
                                                            placeholder="123 Main St, City, Country" value="{{ $user->address }}">
                                                        <x-validation-message field='address' />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="icon">{{ __('auth.password') }}</label>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="********" >
                                                    <x-validation-message field='password' />
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="icon">{{ __('auth.confirm_password') }}</label>
                                                    <input type="password" class="form-control" name="password_confirmation"
                                                        placeholder="********" >
                                                    <x-validation-message field='password_confirmation' />
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- /.row -->

                                <!-- Submit Button -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">{{ __('admin.submit') }}</button>
                                    <a href="/admin/home" class="btn btn-danger ml-3">
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
