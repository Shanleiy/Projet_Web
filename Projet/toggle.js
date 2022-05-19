const toggleBtn = document.querySelector('button');
const text = document.querySelector('.toggle-bloc');

let isVisible = false;

toggleBtn.addEventListener('click',()=> {
    isVisible = !isVisible;
    isVisible ? text.classList.add('is-visible') : text.classList.remove('is-visible');
    isVisible ? toggleBtn.classList.add('active') : toggleBtn.classList.remove('active');


});