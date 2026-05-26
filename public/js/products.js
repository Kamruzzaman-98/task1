document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchInput');

    if (searchInput) {
        searchInput.addEventListener('keyup', function () {

            let filter = this.value.toLowerCase();

            let rows = document.querySelectorAll('#productTable tbody tr');

            rows.forEach(row => {

                let text = row.innerText.toLowerCase();

                row.style.display = text.includes(filter) ? '' : 'none';

            });

        });
    }


    window.confirmDelete = function () {
        return confirm("Are you sure you want to delete this product?");
    };


    const darkBtn = document.getElementById('darkModeToggle');

    if (darkBtn) {

        if (localStorage.getItem('dark-mode') === 'enabled') {
            document.body.classList.add('dark-mode');
            darkBtn.innerHTML = '☀️ Light Mode';
        } else {
            darkBtn.innerHTML = '🌙 Dark Mode';
        }

        darkBtn.addEventListener('click', () => {

            document.body.classList.toggle('dark-mode');

            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('dark-mode', 'enabled');
                darkBtn.innerHTML = '☀️ Light Mode';
            } else {
                localStorage.setItem('dark-mode', 'disabled');
                darkBtn.innerHTML = '🌙 Dark Mode';
            }

        });
    }

});
