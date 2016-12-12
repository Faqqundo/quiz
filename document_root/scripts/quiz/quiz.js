
/**
 * Inicjuje system obsługi pytań
 * 
 * @returns {undefined}
 */
function initPytania() {
    jQuery('#pytania').accordion();
    
    //mała rzecz a cieszy - kliknięcie na literkę odpowiedzi zaznacza odpowiedź;p
    jQuery('#pytania li').click(function() {        
        jQuery(this).find('input').prop('checked', true);
        return false;
    });
}

/**
 * Main - punkt startowy
 * 
 */
jQuery(document).ready(function() {
    initPytania();
});
