<label class="switch">
    <input type="checkbox" data-id="{{ $id }}" data-model="{{ $model }}"
        data-route="{{ route('admin.toggle-status', ['model' => $model, 'id' => $id, 'action' => 'default']) }}"
        onchange="toggleBoolean(this)" {{ $isActive ? 'checked' : '' }} />
    <span class="slider round"></span>
</label>

<script>
    function toggleBoolean(element) {
    let id = element.dataset.id;
    let model = element.dataset.model;
    let action = element.checked ? "open" : "close";
    let route = element.dataset.route.replace("default", action);
    let originalState = element.checked;

    fetch(route, {
            method: "GET",
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showToast('success', 'تم التحديث بنجاح!');
            } else {
                element.checked = !originalState;
                showToast('error', data.message || 'حدث خطأ أثناء التحديث!');
            }
        })
        .catch(error => {
            element.checked = !originalState;
            showToast('error', 'حدث خطأ أثناء الاتصال بالخادم!');
            console.error('Error:', error);
        });
}

function showToast(icon, title) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon,
        title: title,
        showConfirmButton: false,
        timer: 1500,
        width: '250px',
        padding: '0.5rem',
        timerProgressBar: true,
    });
}
</script>

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 18px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 10px;
        width: 10px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background-color: rgb(100, 189, 99);
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }
</style>
