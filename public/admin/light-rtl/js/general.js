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
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>${translations.name_en}</label>
                                <input type="text" class="form-control" name="child_sections[${childCount}][name][en]" placeholder="Orders" required>
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
