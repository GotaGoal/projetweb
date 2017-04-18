/**
 * Created by tristan on 18/04/17.
 */
$(window).ready(function () {
   $('#contenu').css("marginTop",$('#header').height()+"px");
});
$(window).resize(function () {
    $('#contenu').css("marginTop",$('#header').height()+"px");
});