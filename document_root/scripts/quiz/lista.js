
/**
 * Inicjuje tabelę z quizami
 * 
 * @returns {undefined}
 */
function initTableQuizes() {
    jQuery('#quizes tbody .rozwiaz').click(function() {
        var idQuizu = jQuery(this).parents('tr').data('id_quizu');
        
        przejdzDoQuizu(idQuizu);
        
        return false;
    });
}

/**
 * Przechodzi do rozwiązywania quizu
 * 
 * @param {Number} idQuizu
 * @returns {undefined}
 */
function przejdzDoQuizu(idQuizu) {
    window.location.href = '/quiz/quiz/id/' + idQuizu;
}

/**
 * Maine
 *  
 */
jQuery(document).ready(function() {
    initTableQuizes();
});
