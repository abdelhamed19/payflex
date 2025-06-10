document.addEventListener("DOMContentLoaded", function () {
    let childCount = 0;

    window.addChildSection = function () {
        childCount++;
        let childSection = `
            <div class="card shadow mb-4 child-section">
                <div class="card-header d-flex justify-content-between">
                    <strong class="card-title">${translations.child_section} #${childCount}</strong>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeChildSection(this)">X</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>${translations.name_ar}</label>
                                <input type="text" class="form-control" name="child_sections[${childCount}][name][ar]" placeholder="الاوردرات" required>
                                 <x-validation-message field="child_sections.*.name.ar" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>${translations.name_en}</label>
                                <input type="text" class="form-control" name="child_sections[${childCount}][name][en]" placeholder="Orders" required>
                            <x-validation-message field="child_sections.*.name.en" />
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>${translations.route}</label>
                                <input type="text" class="form-control" name="child_sections[${childCount}][route]" placeholder="child-section/create/" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>${translations.route_name}</label>
                                <input type="text" class="form-control" name="child_sections[${childCount}][route_name]" placeholder="child-section.create" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>${translations.status}</label>
                                <select class="form-control" name="child_sections[${childCount}][is_active]">
                                    <option value="1">${translations.active}</option>
                                    <option value="0">${translations.inactive}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>${translations.icon}</label>
                                <input type="text" class="form-control" name="child_sections[${childCount}][icon]" placeholder="nav-item nav-notif" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        document.getElementById("child-sections-container").insertAdjacentHTML("beforeend", childSection);
    };

    window.removeChildSection = function (element) {
        element.closest(".child-section").remove();
    };
});
document.addEventListener('DOMContentLoaded', function() {
    const langSwitch = document.querySelector('select[name="lang"]');
    if (langSwitch) {
        langSwitch.addEventListener('change', function() {
            const img = document.getElementById('profileImagePreview');
            img.style.width = '150px';
            img.style.height = '150px';
        });
    }
});

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('profileImagePreview');
        output.src = reader.result;
        document.getElementById('removeImageButton').style.display = "block"; // إظهار زر X عند تحديد صورة
    };
    reader.readAsDataURL(event.target.files[0]);
}

function removeImage() {
    document.getElementById('profileImagePreview').src = "{{ asset('admin/light/assets/avatars/face-1.jpg') }}";
    document.getElementById('profileImageInput').value = "";
    document.getElementById('removeImageButton').style.display = "none"; // إخفاء زر X عند إزالة الصورة
}
