function submitForm() {
    // You can add form validation here if needed

    // Dummy AJAX request simulation
    setTimeout(() => {
        document.getElementById('response').innerText = 'Form submitted successfully!';
        resetForm();
    }, 1000);
}

function resetForm() {
    document.getElementById('contactForm').reset();
    setTimeout(() => {
        document.getElementById('response').innerText = '';
    }, 3000);
}