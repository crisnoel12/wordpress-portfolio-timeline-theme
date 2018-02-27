import styles from './sass/main.scss';

jQuery(($) => {
    
    function doSidebarFiller() {
        let windowWidth = document.body.scrollWidth,
            sidebarHeight = $('#sidebar-about').height(),
            // doc height - sidebar height
            remainingHeight = parseInt(document.body.scrollHeight - sidebarHeight);
            
        if (windowWidth >= 768) {
            $('.sidebar-filler').height(remainingHeight);
        } else {
            $('.sidebar-filler').height(0);      
        }
    }

    doSidebarFiller();

    window.addEventListener('resize', () => { 
        doSidebarFiller();
    });

    $(".comment").addClass("list-group-item");
});