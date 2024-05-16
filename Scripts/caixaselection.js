function toggleCheckbox(checkbox) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}