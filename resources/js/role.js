document.addEventListener('DOMContentLoaded', () => {
    const roleItems = document.querySelectorAll('.role-item');
    const continueBtn = document.getElementById('continueBtn');
    let selectedRole = null;

    // Get the header and the main container for the scroll effect
    const header = document.querySelector('.header');
    const container = document.querySelector('.container');


    // 1. Handle Role Selection
    roleItems.forEach(item => {
        item.addEventListener('click', () => {
            // Remove 'selected' class from all items
            roleItems.forEach(i => i.classList.remove('selected'));

            // Add 'selected' class to the clicked item (Handles the visual highlight)
            item.classList.add('selected');

            // Store the selected role
            selectedRole = item.getAttribute('data-role');

            console.log(`Rol geselecteerd: ${selectedRole}`);
        });
    });


    // 2. Handle Continue Button Click
    continueBtn.addEventListener('click', () => {
        if (selectedRole) {
            alert(`U bent de ${selectedRole}! De quest kan beginnen.`);
            // In a real application, you would redirect the user:
            // window.location.href = `/start-quest?role=${selectedRole}`;
        } else {
            alert('Selecteer alstublieft een rol voordat u verder gaat.');
        }
    });


    // 3. Scroll Event Listener (Handles header shrinking effect)

    /**
     * Checks the scroll position of the container and applies/removes the 'scrolled' class.
     */
    const handleScroll = () => {
        // We check if the main container is scrolled down more than 50 pixels
        if (container.scrollTop > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    };

    // Attach the scroll event listener to the main container element
    // NOTE: This assumes you have added 'overflow-y: auto;' to .role-selection-card
    // or .container in your CSS to enable scrolling!
    container.addEventListener('scroll', handleScroll);

    // Initial check in case the page load context is unusual
    handleScroll();
});
