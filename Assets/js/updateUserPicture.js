function updateUserPicture() {
    let formUpdatePicture = document.getElementById("formUpdatePicture");
    formUpdatePicture.style.display = "none"

    formUpdatePicture.addEventListener("submit", e => {
        e.preventDefault()

        let data = new FormData(formUpdatePicture)

        fetch(`${location.origin}/websignerr/controlers/user.php?action=updatePic`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'xmlhttprequest'
            },
            body: data
        }).then(responce => responce.json()).then(data => {
            if (data.isOk) {
                link('profil')
            } else {
                alert(data.msg)
            }
        })
    })

    let postClose = document.querySelector("#formUpdatePicture .close");

    postClose.addEventListener("click", e => {
        formUpdatePicture.style.display = "none";
    })
    formUpdatePicture.addEventListener("click", e => {
        if (e.target.dataset.post == "post") {
            formUpdatePicture.style.display = "none";
        }
    })
}
updateUserPicture()