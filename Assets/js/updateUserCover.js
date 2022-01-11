function updateUserCover() {
    let formUpdateCover = document.getElementById("formUpdateCover");
    formUpdateCover.style.display = "none"

    formUpdateCover.addEventListener("submit", e => {
        e.preventDefault()

        let data = new FormData(formUpdateCover)

        fetch(`${location.origin}/websignerr/controlers/user.php?action=updateCover`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'xmlhttprequest'
            },
            body: data
        }).then(responce => responce.json()).then(data => {
            console.log(data);

            if (data.isOk) {
                location.assign("./profil");
            } else {
                alert(data.msg)
            }
        })
    })

    let postClose = document.querySelector("#formUpdateCover .close");

    postClose.addEventListener("click", e => {
        formUpdateCover.style.display = "none";
    })
    formUpdateCover.addEventListener("click", e => {
        if (e.target.dataset.post == "post") {
            formUpdateCover.style.display = "none";
        }
    })
}
updateUserCover()