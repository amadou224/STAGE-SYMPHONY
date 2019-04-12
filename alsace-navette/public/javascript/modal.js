function RemoveChild() {
    var element = document.getElementById("editmodal");
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
}