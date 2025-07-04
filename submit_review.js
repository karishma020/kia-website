document.getElementById('reviewForm').addEventListener('submit', function(event) {
    let valid = true;
    let errorMessage = '';

    const name = document.getElementById('name').value.trim();
    const model = document.getElementById('model').value.trim();
    const rating = document.getElementById('rating').value.trim();
    const service = document.getElementById('service').value.trim();
    const location = document.getElementById('location').value.trim();
    const review = document.getElementById('review').value.trim();

    if (!name) {
        valid = false;
        errorMessage += 'Name is required. ';
    }

    if (!model) {
        valid = false;
        errorMessage += 'Car model is required. ';
    }

    if (!rating) {
        valid = false;
        errorMessage += 'Rating is required. ';
    }

    if (!service) {
        valid = false;
        errorMessage += 'Service type is required. ';
    }

    if (!location) {
        valid = false;
        errorMessage += 'Dealership location is required. ';
    }

    if (!review) {
        valid = false;
        errorMessage += 'Review is required. ';
    }

    if (!valid) {
        event.preventDefault();
        document.getElementById('errorMessage').textContent = errorMessage;
    }
});
