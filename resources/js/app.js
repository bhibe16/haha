
    // Dark/Light mode toggle functionality
    const themeToggle = document.getElementById('theme-toggle');
    const rootElement = document.documentElement;

    function updateIcon() {
        if (rootElement.classList.contains('dark')) {
            themeToggle.innerHTML = '<span class="material-icons">wb_sunny</span>';
        } else {
            themeToggle.innerHTML = '<span class="material-icons">brightness_2</span>';
        }
    }

    themeToggle.addEventListener('click', () => {
        rootElement.classList.toggle('dark');
        const theme = rootElement.classList.contains('dark') ? 'dark' : 'light';
        localStorage.setItem('theme', theme);
        updateIcon();
    });

    updateIcon();

    // Dropdown menu toggle functionality
    document.getElementById('dropdownButton').addEventListener('click', function() {
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('hidden');
    });

    // Filter employees function
    function filterEmployees() {
        const input = document.getElementById("searchInput");
        const filter = input.value.toLowerCase();
        const cards = document.querySelectorAll(".employee-card");

        cards.forEach(card => {
            const name = card.querySelector("h2").textContent.toLowerCase();
            card.style.display = name.includes(filter) ? "" : "none";
        });
    }

    // Add event listener for the search input field
    document.getElementById("searchInput").addEventListener('input', filterEmployees);

    // Modal functionality
    window.openModal = function(id) {
        document.getElementById('employeeModal' + id).classList.remove('hidden');
    }

    window.closeModal = function(id) {
        document.getElementById('employeeModal' + id).classList.add('hidden');
    }

