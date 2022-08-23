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
