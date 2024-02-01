import './bootstrap';

import "~resources/scss/app.scss";

import * as bootstrap from 'bootstrap';
import { read } from '@popperjs/core';

import.meta.glob([
    '../img/**'
]);

const buttons = document.querySelectorAll('.btn-delete');

buttons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();

        const deleteModalElem = document.getElementById('delete-modal');
        const deleteModal = new bootstrap.Modal(deleteModalElem);

        const title = button.getAttribute('data-title');
        document.getElementById('title-to-delete').innerHTML = title;

        document 
            .getElementById('delete-btn')
            .addEventListener('click', () => {
                button.parentElement.submit();
            })

        deleteModal.show();
    });
})

const previewImgElem = document.getElementById('preview-img');

document.getElementById('cover_image').addEventListener
('change', function() {
    const selectedFile = this.files[0];
    if (selectedFile) {
       const reader = new FileReader();
       reader.addEventListener("load", function() {
        previewImgElem.src = reader.result;
       })
       reader.readAsDataURL(selectedFile);
    }
})