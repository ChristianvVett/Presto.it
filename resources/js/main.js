let stick1 = document.querySelector('.stick-1');
let stick2 = document.querySelector('.stick-2');
let stick3 = document.querySelector('.stick-3');
let navBarCollapse = document.querySelector('.navbar-toggler');
let isNavCollapsed = true;

navBarCollapse.addEventListener('click', () => {
    if(isNavCollapsed){
        stick1.style.backgroundColor = 'var(--c-cancel)';
        stick2.style.backgroundColor = 'var(--c-cancel)';
        stick3.style.backgroundColor = 'var(--c-cancel)';
        stick2.style.opacity = '0';
        stick3.style.marginTop = '0';
        stick1.style.transform = 'rotate(180deg)';
        stick3.style.transform = 'rotate(-90deg) translate(9px)';
        navBarCollapse.style.transform = 'rotate(45deg)';
        isNavCollapsed = false;
    }else{
        stick1.style.backgroundColor = 'var(--c-success)';
        stick2.style.backgroundColor = 'var(--c-success)';
        stick3.style.backgroundColor = 'var(--c-success)';
        stick2.style.opacity = '1'
        stick3.style.marginTop = '.3rem'
        stick1.style.transform = 'rotate(0)'
        stick3.style.transform = 'rotate(0) translate(0)'
        navBarCollapse.style.transform = 'rotate(0)'
        isNavCollapsed = true;
    }
})