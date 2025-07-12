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
                                                <option value="1"
                                                    {{ request('is_active') === '1' ? 'selected' : '' }}>
                                                    {{ __('admin.active') }}</option>
                                                <option value="0"
                                                    {{ request('is_active') === '0' ? 'selected' : '' }}>
                                                    {{ __('admin.inactive') }}</option>
                                            </select>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="form-group col-md-3">
                                            <label>&nbsp;</label>
                                            <div class="d-flex">
                                                <button type="submit"
                                                    class="btn btn-primary mr-2">{{ __('admin.filter') }}</button>
                                                <a href="{{ url()->current() }}" class="btn btn-secondary">إعادة
                                                    تعيين</a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
