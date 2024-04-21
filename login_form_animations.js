// Select all input fields of type text or password
const inputFields = document.querySelectorAll('input[type="text"], input[type="password"]');

// Loop through each input field
inputFields.forEach(inputField => {
    // Add event listener for input event
    inputField.addEventListener('input', () => {
        // Get the label associated with the input field
        const label = inputField.nextElementSibling;
        // If input field is not empty, add class to label for animation
        if (inputField.value.trim() !== '') {
            label.classList.add('input-filled');
        } else {
            // If input field is empty, remove class from label
            label.classList.remove('input-filled');
        }
    });
    
    // Add event listener for focus event
    inputField.addEventListener('focus', () => {
        // Get the label associated with the input field
        const label = inputField.nextElementSibling;
        // Add class to label for animation when input field is focused
        label.classList.add('input-focused');
    });
    
    // Add event listener for blur event
    inputField.addEventListener('blur', () => {
        // Get the label associated with the input field
        const label = inputField.nextElementSibling;
        // If input field is empty, remove class from label when focus is lost
        if (inputField.value.trim() === '') {
            label.classList.remove('input-focused');
        }
    });
});
