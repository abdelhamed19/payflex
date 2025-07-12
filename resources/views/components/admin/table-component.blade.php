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
