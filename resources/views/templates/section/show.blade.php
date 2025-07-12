<x-admin.admin-layout-component>
    @section('title',  __('admin.show ' . $modelName))
    @section('content')
        <div class="col-12">
            <h2 class="page-title">{{ __('admin.show ' . $modelName) }}</h2>
            <x-flash-message />
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">{{ __('admin.ar_data') }}</strong>
                        </div>
                        <div class="card-body">
                            <p><strong>{{ __('admin.name') }} (AR):</strong> {{ $model->getTranslation($model->name, 'ar') }}
                            </p>
                            <p><strong>{{ __('admin.description') }} (AR):</strong>
                                {{ $model->getTranslation($model->description, 'ar') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">{{ __('admin.en_data') }}</strong>
                        </div>
                        <div class="card-body">
                            <p><strong>{{ __('admin.name') }} (EN):</strong> {{ $model->getTranslation($model->name, 'en') }}
                            </p>
                            <p><strong>{{ __('admin.description') }} (EN):</strong>
                                {{ $model->getTranslation($model->description, 'en') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">{{ __('admin.other_info') }}</strong>
                        </div>
                        <div class="card-body">
                            <p><strong>{{ __('admin.status') }}:</strong>
                                @if ($model->is_active)
                                    <span class="badge badge-success">{{ __('admin.active') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('admin.inactive') }}</span>
                                @endif
                            </p>
                            <p><strong>{{ __('admin.created_at') }}:</strong>
                                {{ $model->created_at->format('Y-m-d H:i') }}</p>
                            <p><strong>{{ __('admin.updated_at') }}:</strong>
                                {{ $model->updated_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="{{ URL::previous() }}" class="btn btn-secondary">{{ __('admin.back') }}</a>
            </div>
        </div>
    @endsection
</x-admin.admin-layout-component>
