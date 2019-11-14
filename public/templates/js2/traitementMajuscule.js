
var toutMajuscule=function () {
    this.value=this.value.toUpperCase();
};

var premiereLettreMajuscule=function () {
    this.value=this.value.charAt(0).toUpperCase() + this.value.substr(1);

};

var apprenant_nom=document.getElementById('apprenant_nom');
var enseignant_nom=document.getElementById('enseignant_nom');
var apprenant_prenom=document.getElementById('apprenant_prenom');
var enseignant_prenom=document.getElementById('enseignant_prenom');
// var libelleParoisse=document.getElementById('mef_configbundle_paroisse_libelle');
// var libelleProfession=document.getElementById('mef_configbundle_profession_libelle');
// var libelleEvenement=document.getElementById('mef_configbundle_evenement_libelle');
// var libelleFonction=document.getElementById('mef_configbundle_fonction_libelle');

if (!(apprenant_nom !== null && apprenant_prenom !== null)) {
} else {

    apprenant_nom.addEventListener('keyup', toutMajuscule);
    apprenant_prenom.addEventListener('keyup', premiereLettreMajuscule);

}

if (enseignant_nom === null) {
} else {
    enseignant_nom.addEventListener('keyup', toutMajuscule);
    enseignant_prenom.addEventListener('keyup', premiereLettreMajuscule);
}
//
//
// if (libelleParoisse === null) {
// } else {
//     libelleParoisse.addEventListener('keyup', toutMajuscule);
// }
//
// if (libelleProfession === null) {
// } else {
//     libelleProfession.addEventListener('keyup', premiereLettreMajuscule);
// }
//
// if (libelleEvenement === null) {
// } else {
//     libelleEvenement.addEventListener('keyup', premiereLettreMajuscule);
// }
//
// if (libelleFonction === null) {
// } else {
//     libelleFonction.addEventListener('keyup', premiereLettreMajuscule);
// }

