function deleteResource(element) {
    const id = element.dataset.id;
    const model = element.dataset.model;
    const baseUrl = element.dataset.url;

    // build full URL with query parameters
    const url = `${baseUrl}?id=${id}&model=${model}`;

    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: "لن تتمكن من التراجع عن هذا!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'نعم، احذف!',
        cancelButtonText: 'إلغاء'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        icon: data.success ? 'success' : 'error',
                        title: data.message,
                        confirmButtonText: 'موافق'
                    }).then(() => {
                        if (data.success) location.reload();
                    });
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'حدث خطأ أثناء تنفيذ العملية',
                        confirmButtonText: 'موافق'
                    });
                });
        }
    });
}
