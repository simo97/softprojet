                
$(function(){
    //Ajout D'un intervenant dans une phase du projet
    $("#intervenant").hide();
    $("#interv").click(function () {
    var addi = $('#intervenant').html();
    $('#new-inter').append(addi);
});
	//Ajout D'un intervenant dans un projet

$("#intervenant1").hide();
$("#interv1").click(function () {
    var addi_1 = $('#intervenant1').html();
    $('#new-inter1').append(addi_1);
});	

$("#New-Project-phase").hide();
$("#new-phase-btn").click(function () {
    var add_phase = $('#New-Project-phase').html();
    $('#Project-phase').append(add_phase);
    $("#intervenant").hide();
});	



});
