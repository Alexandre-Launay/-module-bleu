import './bootstrap';
import 'bootstrap';

const currentButton = document.querySelectorAll('#btn-update');
currentButton.forEach(button => button.addEventListener('click', updateComment));

export function updateComment () {
    // console.log(this);
    var publishContent = document.querySelector('div #publish-content');
    publishContent.classList.add('d-none');
    var updatedContent = document.querySelector('#comment-content-update');
    document.querySelector('#update-comment-content').classList.remove('d-none');
    document.querySelector('#comment-cta').classList.add('d-none');
    updatedContent.classList.remove('d-none');
    updatedContent.innerHTML = publishContent.innerHTML;
    updatedContent.innerHTML = updatedContent.innerHTML.replace(/^(&nbsp;|\s)*/, '');
    this.parentNode.parentNode.querySelector('#btn-validate').classList.remove('d-none');
    this.classList.add('d-none');
}