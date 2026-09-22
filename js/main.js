document.querySelectorAll('.expert-tab').forEach(function (tab) {
    tab.addEventListener('click', function () {
        document.querySelectorAll('.expert-tab').forEach(function (t) {
            t.classList.remove('active');
        });
        document.querySelectorAll('.expert-panel').forEach(function (p) {
            p.hidden = true;
        });

        tab.classList.add('active');
        document.getElementById(tab.dataset.target).hidden = false;
    });
});