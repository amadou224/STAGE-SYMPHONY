function AllerRetour() {
    // Get the checkbox
    var checkBox = document.getElementById("CheckAllerRetour");
    // Get the output text
    var FormAllerRetour = document.getElementById("FormAllerRetour");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
        FormAllerRetour.style.display = "block";
        document.getElementById("FormAllerSimple").style.display = "none";

    } else {
        FormAllerRetour.style.display = "none";
    }
}


function AllerSimple() {
    // Get the checkbox
    var checkBox = document.getElementById("CheckAllerSimple");
    // Get the output text
    var FormAllerRetour = document.getElementById("FormAllerSimple");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
        FormAllerRetour.style.display = "block";
        document.getElementById("FormAllerRetour").style.display = "none";
    } else {
        FormAllerRetour.style.display = "none";
    }
}

function Domicile() {
    var domicile = document.getElementById('domicile')

    let strUser = $("#pdp :selected").val();

    if (strUser === "Domicile") {
        domicile.style.display = "block";
    } else {
        domicile.style.display = "none";

    }
}

function DomicileAllerRetour() {
    var domicile = document.getElementById('domicile2')

    let strUser = $("#pdp2 :selected").val();

    if (strUser === "Domicile") {
        domicile.style.display = "block";
    } else {
        domicile.style.display = "none";
    }
}

function PointdePrise() {
    let depart = $('select[name=depart_aller]').val()

    let destination = $('select[name=destination_aller]').val()

    let pointDePrise = document.getElementById('pointDePrise')

    let btnsumbit = document.getElementById('btnsubmit')

    if (depart === "Strasbourg" && destination === "Strasbourg") {
        btnsumbit.disabled = true;
    }

    if(depart === "Strasbourg" && destination != "Strasbourg") {
        btnsumbit.disabled = false;
    }

    if (depart === "Strasbourg") {
        pointDePrise.style.display = "block"
    } else {
        pointDePrise.style.display = "none"
        $('select[name=destination_aller]').val("Strasbourg").change()
        btnsumbit.disabled = false;

    }
}

function PointdePrise2() {
    let depart = $('select[name=depart]').val()

    let dest = $('select[name=destination]').val()

    let pointDePrise = document.getElementById('pointDePrise2')

    console.log(dest)

    var btnsumbit = document.getElementById('btnsubmit2')

    if (depart === "Strasbourg" && dest === "Strasbourg") {
        btnsumbit.disabled = true;
    }
    if(depart === "Strasbourg" && dest != "Strasbourg") {
        btnsumbit.disabled = false;
    }

    if (depart === "Strasbourg") {
        pointDePrise.style.display = "block"
    } else {
        pointDePrise.style.display = "none"
        $('select[name=destination]').val("Strasbourg").change()
        btnsumbit.disabled = false;

    }
}

function HeureAller() {
    var heure_aller = document.getElementById('heure_aller')

    console.log(heure_aller)

    
}

