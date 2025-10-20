document.addEventListener('DOMContentLoaded', function() {
            // Check if admin is logged in, otherwise redirect to login page
            if (sessionStorage.getItem('isAdminLoggedIn') !== 'true') {
               // window.location.href = 'adminLogin.html';
                return; // Stop further execution
            }

            const navLinks = document.querySelectorAll('.nav-link');
            const contentSections = document.querySelectorAll('.content-section');
            const logoutButton = document.getElementById('logoutButton');

            // Function to show a specific section and highlight its nav link
            function showSection(sectionId) {
                contentSections.forEach(section => {
                    section.classList.remove('active');
                });
                document.getElementById(sectionId).classList.add('active');

                navLinks.forEach(link => {
                    link.classList.remove('active-link', 'bg-blue-700');
                    link.classList.add('text-blue-100');
                });
                const activeNavLink = document.querySelector(`.nav-link[data-section="${sectionId}"]`);
                if (activeNavLink) {
                    activeNavLink.classList.add('active-link', 'bg-blue-700');
                    activeNavLink.classList.remove('text-blue-100');
                }
            }

            // Add click listeners to navigation links
            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const sectionId = this.getAttribute('data-section');
                    showSection(sectionId);
                });
            });

            // Handle logout
            logoutButton.addEventListener('click', function() {
                sessionStorage.removeItem('isAdminLoggedIn'); // Clear login flag
                window.location.href = 'adminLogin.html'; // Redirect to login
            });

            // Show the default dashboard home section on load
            showSection('dashboard-home');
        });
