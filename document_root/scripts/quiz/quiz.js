
/**
 * Inicjuje system obsługi pytań
 * 
 * @returns {undefined}
 */
function initPytania() {
    jQuery('#pytania').accordion();
    
    //mała rzecz a cieszy - kliknięcie na literkę odpowiedzi zaznacza odpowiedź;p
    jQuery('#pytania li').click(function() {        
        jQuery(this).find(':radio').prop('checked', true).change();
//        return false;
    });
    
    //przejście do następnego pytania po zmianie odpowiedzi
    jQuery('#pytania :radio').change(function() {
        var index = jQuery(this).parents('div').prevAll('h3').length;
        
        jQuery('#pytania').accordion('option', 'active', index);
    });
    
    jQuery('#quiz-form').submit(function() {
        var ileJest = jQuery('#pytania ol').length;
        var ileWypelnione = jQuery('#pytania :radio:checked').length;
        
        if (ileWypelnione < ileJest) {
            alert('Należy udzielić odpowiedzi na wszystkie pytania!');
            return false;
        }            
    });
}

/**
 * Main - punkt startowy
 * 
 */
jQuery(document).ready(function() {
    initPytania();
});
