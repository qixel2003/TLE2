document.addEventListener('DOMContentLoaded', () => {
    // 1. Get elements
    const cards = document.querySelectorAll('.tutorial-card');
    const nextButton = document.getElementById('next-step-btn');
    const previousButton = document.getElementById('prev-step-btn');
    const homeButton = document.getElementById('home-btn');

    // New elements for mascot
    const mascotText = document.getElementById('mascot-text');
    const speechBubble = document.querySelector('.speech-bubble');

    let currentStep = 0;

    function updateMascotText(text) {
        // 1. Hide bubble briefly to reset animation effect
        speechBubble.classList.remove('show');

        // 2. Wait a tiny bit, change text, then show bubble
        setTimeout(() => {
            mascotText.textContent = text;
            speechBubble.classList.add('show');
        }, 200); // 200ms delay for smooth transition
    }

    function showCurrentCard() {
        // Reset Active Cards
        cards.forEach((card) => {
            card.classList.remove('active');
        });

        // Activate Current Card
        if (cards[currentStep]) {
            const activeCard = cards[currentStep];
            activeCard.classList.add('active');

            // --- NEW: Update Mascot Text ---
            // Get the text from the data-explanation attribute
            const explanation = activeCard.getAttribute('data-explanation');
            updateMascotText(explanation);
        }

        // Button Logic (Keep existing logic)
        if (currentStep >= cards.length - 1) {
            nextButton.style.display = 'none'; // Better to hide than disable text
            homeButton.style.display = 'inline-block';
        } else {
            nextButton.style.display = 'inline-block';
            nextButton.textContent = 'Volgende stap';
            nextButton.disabled = false;
            homeButton.style.display = 'none';
        }

        if (currentStep <= 0) {
            previousButton.disabled = true;
            previousButton.style.opacity = '0.5';
        } else {
            previousButton.disabled = false;
            previousButton.style.opacity = '1';
            previousButton.style.display = 'inline-block';
        }
    }

    // Navigation Functions
    function goToPrevStep() {
        if (currentStep > 0) {
            currentStep--;
            showCurrentCard();
        }
    }

    function goToNextStep() {
        if (currentStep < cards.length - 1) {
            currentStep++;
            showCurrentCard();
        }
    }

    function goToHomePage() {
        window.location.href = 'routes';
    }

    // Event Listeners
    previousButton.addEventListener('click', goToPrevStep);
    nextButton.addEventListener('click', goToNextStep);
    homeButton.addEventListener('click', goToHomePage);

    // Initial Load
    showCurrentCard();
});
