document.addEventListener('DOMContentLoaded', () => {
    // 1. Get all the card elements and the button
    const cards = document.querySelectorAll('.tutorial-card');
    const nextButton = document.getElementById('next-step-btn');
    const previousButton = document.getElementById('prev-step-btn');
    const homeButton = document.getElementById('home-btn');

    // 2. Initialize the current step index
    let currentStep = 0;

    // 3. Function to update which card is visible
    function showCurrentCard() {
        // First, remove the 'active' class from all cards
        cards.forEach((card, index) => {
            card.classList.remove('active');
        });

        // Then, add the 'active' class to the current card
        if (cards[currentStep]) {
            cards[currentStep].classList.add('active');
        }

        // Update button text or disable it when finished
        if (currentStep >= cards.length - 1) {
            nextButton.textContent = null;
            nextButton.disabled = true;

            homeButton.style.display = 'inline-block';


        } else {
            nextButton.textContent = 'Volgende stap';
            nextButton.disabled = false;
            homeButton.style.display = 'none';
        }
        if (currentStep <= 0) {
            previousButton.disabled = true;

        } else {
            previousButton.disabled = false;
            previousButton.style.display = 'inline-block';
            previousButton.textContent = 'vorige stap';
        }


    }

    // 4. Function to handle the button click

    function goToPrevStep() {
        if (currentStep > 0) {
            currentStep--; // Move to the next step
            showCurrentCard(); // Show the new card
        }
    }

    previousButton.addEventListener('click', goToPrevStep);

    function goToNextStep() {
        if (currentStep < cards.length - 1) {
            currentStep++; // Move to the next step
            showCurrentCard(); // Show the new card
        }
    }

    function goToHomePage() {
        window.location.href = 'routes';
    }

    // 5. Add event listener to the button
    nextButton.addEventListener('click', goToNextStep);

    homeButton.addEventListener('click', goToHomePage);

    // 6. Show the very first card when the page loads
    showCurrentCard(currentStep);


});
