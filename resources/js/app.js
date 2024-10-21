
<<<<<<< HEAD
const toggleButton = document.getElementById('toggleSidebar');
const sidebar = document.getElementById('sidebar');
const hamburgerIcon = document.getElementById('hamburgerIcon');
const closeIcon = document.getElementById('closeIcon');

// Load the saved sidebar state from localStorage
const savedSidebarState = localStorage.getItem('sidebarState');
if (savedSidebarState === 'open') {
    sidebar.classList.remove('hidden', '-translate-x-full');
    hamburgerIcon.classList.add('hidden');
    closeIcon.classList.remove('hidden');
} else {
    sidebar.classList.add('hidden', '-translate-x-full');
    closeIcon.classList.add('hidden');
    hamburgerIcon.classList.remove('hidden');
}

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('hidden');
    sidebar.classList.toggle('-translate-x-full');

    // Save the sidebar state to localStorage
    if (sidebar.classList.contains('hidden')) {
        closeIcon.classList.add('hidden');
        hamburgerIcon.classList.remove('hidden');
        localStorage.setItem('sidebarState', 'closed');
    } else {
        hamburgerIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
        localStorage.setItem('sidebarState', 'open');
    }
});

    // Function to update time inside the icon
            function updateTime() {
                const timeElement = document.getElementById('time');
                const currentTime = new Date().toLocaleTimeString();
                timeElement.textContent = currentTime;
            }
    
            // Update the time every second
            setInterval(updateTime, 1000);
            updateTime(); // Call it initially to avoid delay
    
    
            
            document.getElementById('adminText').addEventListener('click', function () {
            const dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        });
    
// Dark/Light mode toggle functionality
const themeToggle = document.getElementById('theme-toggle');
const rootElement = document.documentElement;

// Load the saved theme from localStorage
const savedTheme = localStorage.getItem('theme');
if (savedTheme) {
    rootElement.classList.add(savedTheme);
}

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
    

=======
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
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0

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

