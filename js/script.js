document.addEventListener("DOMContentLoaded", function() {
    const inputFields = document.querySelectorAll('input[type="text"], input[type="password"], input[type="email"]');
    
    inputFields.forEach(inputField => {
        const label = inputField.nextElementSibling;

        inputField.addEventListener('input', () => {
            const trimmedValue = inputField.value.trim();
            if (trimmedValue !== '') {
                label.classList.add('input-filled');
            } else {
                label.classList.remove('input-filled');
            }
        });

        inputField.addEventListener('focus', () => {
            label.classList.add('input-focused');
        });

        inputField.addEventListener('blur', () => {
            const trimmedValue = inputField.value.trim();
            if (trimmedValue === '') {
                label.classList.remove('input-focused');
            }
        });
    });
});