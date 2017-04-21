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
        case 'selector':
            create_selector(contenu);
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
    return false;
}
function create_input(context) {
    context.append($('<div class="type-input">' +
        '<input class="txt-input" placeholder="Indice du champ">' +
        '<a onclick="del_el(this)" class="el-del">supprimer</a></div>'));
}
function create_selector(context) {
    context.append(
        $('<div class="selector">' +
            '<input type="number" class="number-picker" min="1" value="1">' +
            '<p> Indiquer le nombre de champ voulu</p>' +
            '<a onclick="add_selector(this)">Ajouter</a>' +
            '<a onclick="del_el(this)" class="el-del">supprimer</a>'+
            '<div/>')
    );
    // context.append($('<div class="type-selector">' +
    //     '<input class="txt-input" placeholder="Texte après le radio">' +
    //     '<input class=radio"boo-input" type="checkbox">Séléctioné' +
    //     '<a onclick="del_el(this)" class="el-del">supprimer</a></div>'));
}
function create_check(context) {
    context.append($('<div class="type-check">' +
        '<input disabled type="checkbox">' +
        '<input class="txt-input" placeholder="Texte après le checkbox">' +
        '<input class="boo-input" type="checkbox">Séléctioné' +
        '<a onclick="del_el(this)" class="el-del">supprimer</a></div>'));
}
function create_text(context) {
    context.append($('<div class="type-input-titre">' +
        '<input class="txt-input"placeholder="Votre texte">' +
        '<a onclick="del_el(this)" class="el-del">supprimer</a></div>'));
}
function create_number(context) {
    context.append($('<div class="type-number">' +
        '<input class="number-picker" disabled type="number" value="0" min="0">' +
        '<input class="txt-input" placeholder="Texte après le Number">' +
        '<a onclick="del_el(this)" class="el-del">supprimer</a></div>'));
}
function create_space(context) {
    context.append($('<p class="space">--<a onclick="del_el(this)" class="el-del">supprimer</a></p>'));
}

function get_input(context, nb){
    $('#previs').append($('<input type="input" name="input_'+nb+'" placeholder="'+$(context).find(".txt-input").val()+'" /><br/>'));
}
function get_selector(context, nb) {
    context = $(context);
    let div = $('<div class="complet-selector"></div>');
    div.append(context.find("select").clone());
    div.find("select").attr("name","selector_"+nb);
    div.append($('<p>'+context.find('.txt-input').val()+'</p>'));
    $('#previs').append(div);
}
function get_check(context, nb) {
    context = $(context);
    let input;
    if(context.find(".boo-input").is(":checked")){
        input = $('<input name="check_'+nb+'" checked type="checkbox"> '+context.find(".txt-input").val()+'<br/>');
    }else {
        input = $('<input name="check_'+nb+'" type="checkbox"> '+context.find(".txt-input").val()+'<br/>');
    }
    $('#previs').append(input);
}
function get_text(context) {
    context = $(context);
    $('#previs').append($('<p class="question-titre">'+context.find(".txt-input").val()+'</p>'));
}
function get_number(context, nb) {
    context = $(context);
    $('#previs').append($('<input name="number_'+nb+'" class="question-number" type="number" value="0" min="0"> '+context.find(".txt-input").val()+'<br/>'));
}
function get_space() {
    $('#previs').append($('<br/>'))
}
function generate() {
    $('#previs').empty();
    let nombre = 0;
    let contenu = $('#formulaire').find(".question");
    contenu.each(function (ind, el) {
        $(el).find(".content").children().each(function (index, element) {
            switch (element.className){
                case "type-input":
                    get_input(element, nombre);
                    break;
                case "selector":
                    get_selector(element, nombre);
                    break;
                case "type-check":
                    get_check(element, nombre);
                    break;
                case "type-number":
                    get_number(element, nombre);
                    break;
                case "space":
                    get_space(element);
                    break;
                case "type-input-titre":
                    get_text(element);
                    break;
            }
            nombre = parseInt(nombre)+1;
        })
    });
    $('#hidden').empty();
    $('#hidden').attr("value", $("#previs").clone().html());
}
function del_el(el) {
    $(el).parent().remove();
}
function add_selector(el) {
    el = $(el).parent();
    let nb = el.find(".number-picker").val();
    el.empty();
    for (let i=0;i<parseInt(nb);i++){
        el.append($('<input class="input-texte" type="text"><p>Champ '+parseInt(i+1)+'</p>'));
    }
    el.append($('<a onclick="create_selector_input(this)"> Ajouter<a/>'));

}
function create_selector_input(el) {
    el = $(el).parent();
    let enr = [];
    el.find('.input-texte').each(function (index,item) {
        enr[index] = item.value;
    });
    el.empty();
    let div = "<select class='type-selector'>";
    for (let i=0; i<enr.length; i++){
        div=div+"<option value=\""+enr[i]+"\">"+enr[i]+"</option>";
    }
    div=div+"</select><input class=\"txt-input\" placeholder=\"Texte après la dropbox\"><a onclick=\"del_el(this)\" class=\"el-del\">supprimer</a>";
    el.append($(div));

}
function send() {
    generate();
    let div = $('<form method="post" action=""></form>');
    div.append($('#previs').children().clone());

}