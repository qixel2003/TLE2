document.addEventListener('DOMContentLoaded', () => {
    const roleItems = document.querySelectorAll('.role-item');
    const continueBtn = document.getElementById('continueBtn');
    let selectedRole = null;

    // Get the header and the main container for the scroll effect
    const header = document.querySelector('.header');
    const container = document.querySelector('.container');

    /**
     * Selecteert een rol (klik + toetsenbord)
     */
    const selectRole = (item) => {
        roleItems.forEach(i => {
            i.classList.remove('selected');
            i.setAttribute('aria-pressed', 'false');
        });

        item.classList.add('selected');
        item.setAttribute('aria-pressed', 'true');

        selectedRole = item.getAttribute('data-role');
        console.log(`Rol geselecteerd: ${selectedRole}`);
    };

    // 1. Handle Role Selection (Mouse + Keyboard)
    roleItems.forEach(item => {

        // Muis / touch
        item.addEventListener('click', () => {
            selectRole(item);
        });

        // Toetsenbord (Enter / Spatie)
        item.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault(); // voorkomt scroll bij spatie
                selectRole(item);
            }
        });
    });

    // 2. Handle Continue Button Click
    continueBtn.addEventListener('click', (e) => {
        if (!selectedRole) {
            e.preventDefault(); // Prevent form submission
            alert('Selecteer alstublieft een rol voordat u verder gaat.');
            return;
        }

        const form = continueBtn.closest('form');
        let roleInput = form.querySelector('input[name="role"]');

        if (!roleInput) {
            roleInput = document.createElement('input');
            roleInput.type = 'hidden';
            roleInput.name = 'role';
            form.appendChild(roleInput);
        }

        const roleMap = {
            fotograaf: 1,
            historicus: 2,
            tekenaar: 3,
            scout: 4
        };

        roleInput.value = roleMap[selectedRole];
    });

    // 3. Scroll Event Listener (Header shrinking effect)
    const handleScroll = () => {
        if (container && header) {
            if (container.scrollTop > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }
    };

    if (container) {
        container.addEventListener('scroll', handleScroll);
        handleScroll();
    }
});
