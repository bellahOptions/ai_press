import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function(){
    $('.mobileLinks').hide();
    $('#mobileMenuToggle').click(function(){
        $('.mobileLinks').toggle(500);
        }
    )
})