window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0 && window.innerWidth > 991 && window.innerHeight > 600){
           
            navbarCollapsible.classList.remove('navbar-shrink')
            navbarCollapsible.style.backgroundColor = '';

        } else {
            navbarCollapsible.classList.add('navbar-shrink')
            navbarCollapsible.style.backgroundColor = 'rgb(99, 59, 137)';
            
        }

    };

    // Shrink the navbar    
    navbarShrink();

      // Shrink the navbar when page is scrolled
      document.addEventListener('scroll', navbarShrink);

      // Shrink the navbar when window is resized
      window.addEventListener('resize', navbarShrink);

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});