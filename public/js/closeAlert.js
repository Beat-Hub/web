
const closeButton = document.querySelector('#close-message');
const successMessage = document.querySelector('#success-message');

closeButton.addEventListener('click', () => {
successMessage.style.display = 'none';
});
