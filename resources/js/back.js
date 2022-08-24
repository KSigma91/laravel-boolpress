const { default: Axios } = require('axios');

require('./bootstrap');

const actionDelete = document.querySelector('.overlay');
if (actionDelete) {
    const deleteButtons = document.querySelectorAll('.js-delete');
    const formPopup = document.querySelector('.popup');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            actionDelete.classList.remove('d-none');

            const id = this.closest('[data-id]').dataset.id
            const pattern = formPopup.dataset.action;
            const newAction = pattern.replace('*****', id);
            formPopup.action = newAction;
        })
    });

    document.querySelector('.js-no').addEventListener('click', function() {
        actionDelete.classList.add('d-none');
    })
}

const inputTitle = document.getElementById('title');
if (inputTitle) {
    inputSlug = document.getElementById('slug');

    inputTitle.addEventListener('focusout', function() {
        if (!inputSlug.value) {
            axios('/admin/getslug?title=' + inputTitle.value)
                .then(result => inputSlug.value = result.data.response)
        }
    })
}
