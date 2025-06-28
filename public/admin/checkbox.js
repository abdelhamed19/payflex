document.addEventListener('DOMContentLoaded', function () {

    // تحديد الكل
    const selectAllCheckbox = document.getElementById('all');
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function () {
            const wrapper = this.closest('.table-wrapper');
            if (!wrapper) return;
            wrapper.querySelectorAll('.row-checkbox').forEach(cb => {
                cb.checked = this.checked;
            });
        });
    }

    // تجميع الـ IDs المحددة
    function getSelectedIds() {
        return [...document.querySelectorAll('.row-checkbox:checked')]
            .map(cb => cb.dataset.id);
    }

    // دالة إرسال AJAX
    function sendBulkAction(actionUrl, model, ids) {
        fetch(actionUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                ids: ids,
                model: model
            })
        })
            .then(res => res.json())
            .then(data => {
                Swal.fire({
                    icon: data.success ? 'success' : 'error',
                    title: data.message,
                    confirmButtonText: 'موافق'
                }).then(() => {
                    if (data.success) location.reload();
                });
            })
            .catch(err => {
                console.error(err);
                Swal.fire({
                    icon: 'error',
                    title: 'حدث خطأ أثناء تنفيذ العملية',
                    confirmButtonText: 'موافق'
                });
            });
    }

    // Event: Delete Selected
    document.querySelector('.delete-selected').addEventListener('click', function () {
        const ids = getSelectedIds();
        const model = this.dataset.model;
        const actionUrl = this.dataset.url;

        if (ids.length === 0) {
            return Swal.fire({
                icon: 'warning',
                title: 'الرجاء تحديد عناصر أولاً!',
                confirmButtonText: 'موافق'
            });
        }

        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "سيتم حذف العناصر المحددة!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'نعم، احذفهم!',
            cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.isConfirmed) {
                sendBulkAction(actionUrl, model, ids);
            }
        });
    });

    // Event: Export Selected
    document.querySelector('.export-selected').addEventListener('click', function () {
        const ids = getSelectedIds();
        if (ids.length === 0) {
            return Swal.fire({
                icon: 'warning',
                title: 'الرجاء تحديد عناصر أولاً!',
                confirmButtonText: 'موافق'
            });
        }

        Swal.fire({
            icon: 'info',
            title: 'تصدير البيانات',
            text: `تم تحديد ${ids.length} عنصر للتصدير.`,
            confirmButtonText: 'موافق'
        });

        // هنا ممكن تبعتهم على backend في المستقبل لو عايز تعمل Export Excel
        console.log('Export IDs:', ids);
    });
});
