<x-admin.admin-layout-component>
    @section('title', __('admin.dashboard'))
    @section('content')
        <div class="col-12">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h1 class="h3 mb-0 text-gray-800">لوحة التحكم</h1>
                        <p class="mb-0 text-muted">نظرة عامة على الإحصائيات والبيانات</p>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">إجمالي
                                            المبيعات</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">عدد
                                            المستخدمين</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">1,234</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">الطلبات الجديدة
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">156</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">معدل التحويل
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">18%</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-percentage fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row 1 -->
                <div class="row mb-4">
                    <!-- Line Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">مبيعات الشهر الحالي</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow">
                                        <div class="dropdown-header">خيارات:</div>
                                        <a class="dropdown-item" href="#">تصدير البيانات</a>
                                        <a class="dropdown-item" href="#">طباعة التقرير</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="salesChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">توزيع المنتجات</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="productChart" width="400" height="400"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> الإلكترونيات
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> الملابس
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> الكتب
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row 2 -->
                <div class="row mb-4">
                    <!-- Bar Chart -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">المبيعات الشهرية</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-bar">
                                    <canvas id="monthlyChart" width="400" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Doughnut Chart -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">مصادر الزيارات</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-doughnut">
                                    <canvas id="trafficChart" width="400" height="300"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-warning"></i> البحث المباشر
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> وسائل التواصل
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> الإعلانات
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> المراجع
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row 3 -->
                <div class="row mb-4">
                    <!-- Radar Chart -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">تقييم الأداء</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-radar">
                                    <canvas id="performanceChart" width="400" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Polar Area Chart -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">توزيع الأقسام</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-polar">
                                    <canvas id="departmentChart" width="400" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">النشاطات الأخيرة</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>التاريخ</th>
                                                <th>النشاط</th>
                                                <th>المستخدم</th>
                                                <th>الحالة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2024-01-15</td>
                                                <td>طلب جديد #1234</td>
                                                <td>أحمد محمد</td>
                                                <td><span class="badge badge-success">مكتمل</span></td>
                                            </tr>
                                            <tr>
                                                <td>2024-01-14</td>
                                                <td>تحديث المنتج #567</td>
                                                <td>فاطمة علي</td>
                                                <td><span class="badge badge-warning">قيد المراجعة</span></td>
                                            </tr>
                                            <tr>
                                                <td>2024-01-13</td>
                                                <td>مستخدم جديد</td>
                                                <td>محمد أحمد</td>
                                                <td><span class="badge badge-info">نشط</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // تكوين الألوان والإعدادات العامة
            const chartColors = {
                primary: '#4e73df',
                success: '#1cc88a',
                info: '#36b9cc',
                warning: '#f6c23e',
                danger: '#e74a3b',
                secondary: '#858796',
                light: '#f8f9fc',
                dark: '#5a5c69'
            };

            // 1. Line Chart - مخطط خطي للمبيعات
            const salesCtx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر',
                        'نوفمبر', 'ديسمبر'
                    ],
                    datasets: [{
                        label: 'المبيعات (بالآلاف)',
                        data: [12, 19, 15, 25, 22, 30, 28, 35, 32, 40, 38, 45],
                        borderColor: chartColors.primary,
                        backgroundColor: 'rgba(78, 115, 223, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: chartColors.primary,
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    }
                }
            });

            // 2. Pie Chart - مخطط دائري للمنتجات
            const productCtx = document.getElementById('productChart').getContext('2d');
            const productChart = new Chart(productCtx, {
                type: 'pie',
                data: {
                    labels: ['الإلكترونيات', 'الملابس', 'الكتب', 'المنزل والحديقة', 'الرياضة'],
                    datasets: [{
                        data: [35, 25, 20, 12, 8],
                        backgroundColor: [
                            chartColors.primary,
                            chartColors.success,
                            chartColors.info,
                            chartColors.warning,
                            chartColors.danger
                        ],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.parsed + '%';
                                }
                            }
                        }
                    }
                }
            });

            // 3. Bar Chart - مخطط أعمدة للمبيعات الشهرية
            const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
            const monthlyChart = new Chart(monthlyCtx, {
                type: 'bar',
                data: {
                    labels: ['الربع الأول', 'الربع الثاني', 'الربع الثالث', 'الربع الرابع'],
                    datasets: [{
                        label: 'المبيعات',
                        data: [65, 78, 90, 81],
                        backgroundColor: [
                            chartColors.primary,
                            chartColors.success,
                            chartColors.info,
                            chartColors.warning
                        ],
                        borderColor: [
                            chartColors.primary,
                            chartColors.success,
                            chartColors.info,
                            chartColors.warning
                        ],
                        borderWidth: 1,
                        borderRadius: 5,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // 4. Doughnut Chart - مخطط دائري مفرغ لمصادر الزيارات
            const trafficCtx = document.getElementById('trafficChart').getContext('2d');
            const trafficChart = new Chart(trafficCtx, {
                type: 'doughnut',
                data: {
                    labels: ['البحث المباشر', 'وسائل التواصل', 'الإعلانات', 'المراجع'],
                    datasets: [{
                        data: [40, 30, 20, 10],
                        backgroundColor: [
                            chartColors.warning,
                            chartColors.success,
                            chartColors.primary,
                            chartColors.info
                        ],
                        borderWidth: 3,
                        borderColor: '#fff',
                        cutout: '70%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.parsed + '%';
                                }
                            }
                        }
                    }
                }
            });

            // 5. Radar Chart - مخطط رادار لتقييم الأداء
            const performanceCtx = document.getElementById('performanceChart').getContext('2d');
            const performanceChart = new Chart(performanceCtx, {
                type: 'radar',
                data: {
                    labels: ['الجودة', 'السرعة', 'الكفاءة', 'الابتكار', 'خدمة العملاء', 'التكلفة'],
                    datasets: [{
                        label: 'الأداء الحالي',
                        data: [85, 90, 78, 82, 88, 75],
                        borderColor: chartColors.primary,
                        backgroundColor: 'rgba(78, 115, 223, 0.2)',
                        borderWidth: 2,
                        pointBackgroundColor: chartColors.primary,
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2
                    }, {
                        label: 'الهدف المطلوب',
                        data: [90, 95, 85, 90, 92, 80],
                        borderColor: chartColors.success,
                        backgroundColor: 'rgba(28, 200, 138, 0.2)',
                        borderWidth: 2,
                        pointBackgroundColor: chartColors.success,
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        r: {
                            beginAtZero: true,
                            max: 100,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            },
                            angleLines: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    }
                }
            });

            // 6. Polar Area Chart - مخطط قطبي لتوزيع الأقسام
            const departmentCtx = document.getElementById('departmentChart').getContext('2d');
            const departmentChart = new Chart(departmentCtx, {
                type: 'polarArea',
                data: {
                    labels: ['المبيعات', 'التسويق', 'التطوير', 'الدعم الفني', 'الموارد البشرية'],
                    datasets: [{
                        data: [25, 20, 30, 15, 10],
                        backgroundColor: [
                            'rgba(78, 115, 223, 0.8)',
                            'rgba(28, 200, 138, 0.8)',
                            'rgba(54, 185, 204, 0.8)',
                            'rgba(246, 194, 62, 0.8)',
                            'rgba(231, 74, 59, 0.8)'
                        ],
                        borderColor: [
                            chartColors.primary,
                            chartColors.success,
                            chartColors.info,
                            chartColors.warning,
                            chartColors.danger
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    },
                    scales: {
                        r: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    }
                }
            });

            // تحديث البيانات كل 30 ثانية (اختياري)
            setInterval(function() {
                // يمكنك إضافة كود لتحديث البيانات من الخادم هنا
                console.log('تحديث البيانات...');
            }, 30000);

            // إضافة تأثيرات تفاعلية
            document.addEventListener('DOMContentLoaded', function() {
                // تأثير hover على البطاقات
                const cards = document.querySelectorAll('.card');
                cards.forEach(card => {
                    card.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-2px)';
                        this.style.transition = 'transform 0.3s ease';
                    });

                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                    });
                });
            });
        </script>

        <!-- Custom CSS for RTL and styling -->
        <style>
            .border-left-primary {
                border-left: 0.25rem solid #4e73df !important;
            }

            .border-left-success {
                border-left: 0.25rem solid #1cc88a !important;
            }

            .border-left-info {
                border-left: 0.25rem solid #36b9cc !important;
            }

            .border-left-warning {
                border-left: 0.25rem solid #f6c23e !important;
            }

            .text-primary {
                color: #4e73df !important;
            }

            .text-success {
                color: #1cc88a !important;
            }

            .text-info {
                color: #36b9cc !important;
            }

            .text-warning {
                color: #f6c23e !important;
            }

            .text-gray-800 {
                color: #5a5c69 !important;
            }

            .text-gray-300 {
                color: #dddfeb !important;
            }

            .shadow {
                box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
            }

            .card {
                transition: all 0.3s ease;
            }

            .chart-area,
            .chart-pie,
            .chart-bar,
            .chart-doughnut,
            .chart-radar,
            .chart-polar {
                position: relative;
                height: 300px;
            }

            .chart-pie {
                height: 250px;
            }

            .badge {
                padding: 0.375rem 0.75rem;
                font-size: 0.75rem;
                border-radius: 0.35rem;
            }

            .badge-success {
                background-color: #1cc88a;
                color: white;
            }

            .badge-warning {
                background-color: #f6c23e;
                color: white;
            }

            .badge-info {
                background-color: #36b9cc;
                color: white;
            }

            /* RTL Support */
            [dir="rtl"] .mr-2 {
                margin-right: 0 !important;
                margin-left: 0.5rem !important;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {

                .chart-area,
                .chart-pie,
                .chart-bar,
                .chart-doughnut,
                .chart-radar,
                .chart-polar {
                    height: 250px;
                }

                .h5 {
                    font-size: 1rem;
                }
            }
        </style>

    @endsection
</x-admin.admin-layout-component>
