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

        const modal = document.getElementById('productModal');
        const openBtn = document.getElementById('openProductModal');
        const closeBtn = document.getElementById('closeModal');

        openBtn.addEventListener('click', function () {
            modal.style.display = 'flex';
        });

        closeBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.style.display = 'none';
        }
    });


    const editModal = document.getElementById('editModal');
    const closeEditModal = document.getElementById('closeEditModal');
    const editForm = document.getElementById('editForm');

    document.querySelectorAll('.openEditModal').forEach(button => {

        button.addEventListener('click', function () {

            const id = this.dataset.id;
            const name = this.dataset.name;
            const price = this.dataset.price;

            document.getElementById('editName').value = name;
            document.getElementById('editPrice').value = price;

            editForm.action = `/products/${id}`;

            editModal.style.display = 'flex';
        });

    });

    closeEditModal.addEventListener('click', () => {
        editModal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {

        if (e.target === editModal) {
            editModal.style.display = 'none';
        }

    });


    // const darkBtn = document.getElementById('darkModeToggle');

    // if (darkBtn) {

    //     if (localStorage.getItem('dark-mode') === 'enabled') {
    //         document.body.classList.add('dark-mode');
    //         darkBtn.innerHTML = '☀️ Light Mode';
    //     } else {
    //         darkBtn.innerHTML = '🌙 Dark Mode';
    //     }

    //     darkBtn.addEventListener('click', () => {

    //         document.body.classList.toggle('dark-mode');

    //         if (document.body.classList.contains('dark-mode')) {
    //             localStorage.setItem('dark-mode', 'enabled');
    //             darkBtn.innerHTML = '☀️ Light Mode';
    //         } else {
    //             localStorage.setItem('dark-mode', 'disabled');
    //             darkBtn.innerHTML = '🌙 Dark Mode';
    //         }

    //     });
    // }

});
