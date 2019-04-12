function showHorairesHiver(id) {

    let footerButton = document.getElementById(id).childNodes[1].childNodes[1].childNodes[5].childNodes[5]

    let hr = document.getElementById(id).childNodes[1].childNodes[1].childNodes[3].childNodes[1].childNodes[3]

    let horaireEte = document.getElementById(id).childNodes[1].childNodes[1].childNodes[3].childNodes[1].childNodes[7]

    let horaireHiver = document.getElementById(id).childNodes[1].childNodes[1].childNodes[3].childNodes[1].childNodes[9]

    console.log(footerButton)

    if (horaireHiver.style.display === "none") {
        horaireHiver.style.display = "flex"
        horaireEte.style.display = "none"
        hr.style.cssText = " border-top: 1px solid rgb(33, 104, 217);"
        footerButton.className = "btn btn-primary"

    }
}

function showHorairesEte(id) {

    let footerButton = document.getElementById(id).childNodes[1].childNodes[1].childNodes[5].childNodes[5]


    let hr = document.getElementById(id).childNodes[1].childNodes[1].childNodes[3].childNodes[1].childNodes[3]

    let horaireEte = document.getElementById(id).childNodes[1].childNodes[1].childNodes[3].childNodes[1].childNodes[7]

    let horaireHiver = document.getElementById(id).childNodes[1].childNodes[1].childNodes[3].childNodes[1].childNodes[9]

    if (horaireEte.style.display === "none") {
        horaireEte.style.display = "flex"
        horaireHiver.style.display = "none"
        hr.style.cssText = " border-top: 1px solid rgb(251, 192, 45);"
        footerButton.className = "btn btn-yellow"
    }
}