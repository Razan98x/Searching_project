const wrap = document.querySelector('.wrap');
const loglink = document.querySelector('.login-link');
const btnPopup = document.querySelector ('.btnlogin-popup')
const iconClose = document.querySelector ('.icon-close');

loglink.addEventListener('click',()=>{
    wrap.classList.add('active');

});
btnPopup.addEventListener('click',()=>{
    wrap.classList.add('active-popup');

});

iconClose.addEventListener('click',()=>{
    wrap.classList.remove('active-popup');

});