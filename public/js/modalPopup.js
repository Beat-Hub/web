const modalToggleBtn = document.querySelector('[data-modal-toggle="popup-modal"]');
const modal = document.querySelector('#popup-modal');
const modalHideBtns = modal.querySelectorAll('[data-modal-hide="popup-modal"]');
const confirmBtn = modal.querySelector('[data-confirm-btn]');

modalToggleBtn.addEventListener('click', function() {
    modal.classList.toggle('hidden');
});

modalHideBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
        modal.classList.add('hidden');
    });
});

confirmBtn.addEventListener('click', function() {
    // Aquí puedes enviar la solicitud de eliminación del producto
    document.querySelector('#delete-form').submit();
});
