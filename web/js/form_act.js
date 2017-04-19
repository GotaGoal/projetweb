/**
 * Created by tristan on 19/04/17.
 */
function add_content(context, type){
    context = context.parentNode.parentNode;
    let contenu = $(context).children(".content");
    switch(type){
        case 'input':
            create_input(contenu);
            break;
        case 'radio':
            create_radio(contenu);
            break;
        case 'check':
            create_check(contenu);
            break;
        case 'text':
            create_text(contenu);
            break;
        case 'number':
            create_number(contenu);
            break;
        case 'space':
            create_space(contenu);
            break;
    }
}
function create_input(context) {
    context.append($('<div class="type-input"><input class="txt-input" placeholder="Insérer un texte de prévisualisation"></div>'));
}
function create_radio(context) {
    context.append($('<div class="type-radio">' +
        '<input type="radio">' +
        '<input class="txt-input" placeholder="Texte après le radio">' +
        '<input class="boo-input" type="checkbox">Séléctioné</div>'));
}
function create_check(context) {
    context.append($('<div class="type-check">' +
        '<input type="checkbox">' +
        '<input class="txt-input" placeholder="Texte après le checkbox">' +
        '<input class="boo-input" type="checkbox">Séléctioné</div>'));
}
function create_text(context) {
    context.append($('<div class="type-input"><input class="txt-input"placeholder="Votre texte"></div>'));
}
function create_number(context) {
    context.append($('<div class="type-number"><input type="number" value="0" min="0"><input class="txt-input" placeholder="Texte après le Number"></div>'));
}
function create_space(context) {
    context.append($('<br/>'));
}
function get_input(context){
    console.log(context.children().val());
}
function get_radio(context) {

}
function get_check(context) {

}
function get_text(context) {

}
function get_number() {

}
function get_space() {

}
function add_question(){
    $('#formulaire').append($('#question-template').children().clone());

}

function generate() {
    let contenu = $('#formulaire').find(".question");
    console.log(contenu);
    contenu.each(function (ind, el) {
        console.log(el.id + el.className);
    });
}