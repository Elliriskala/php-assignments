'use strict';

const modifyButtons = document.querySelectorAll('.modify-button');
const updateModal = document.querySelector('#update-modal');
modifyButtons.forEach(button => {
    button.addEventListener('click', async () => {
        const media_id = button.dataset.media_id;
        const response = await fetch('./inc/update-form.php?media_id=' + media_id);
        const html = await response.text();
        updateModal.innerHTML = '';
        updateModal.insertAdjacentHTML("afterbegin", html);
        updateModal.showModal();
    });
});

