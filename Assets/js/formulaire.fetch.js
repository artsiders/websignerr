function checkLogin() {
    let logForm = document.getElementById("logForm");

    logForm.addEventListener("submit", e => {
        e.preventDefault()
        let data = new FormData(logForm)

        fetch(`${location.origin}/websignerr/controlers/loginUser.php`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'xmlhttprequest'
            },
            body: data
        }).then(responce => responce.json()).then(data => {
            if (data.msg != "") {
                alert(data.msg)
            } else {
                if (data.isOk) {
                    location.assign(`${location.href}home`)
                } else {
                    alert("erreur")
                }
            }
        })
    })
}
checkLogin();

let registerForm = document.getElementById("registerForm");

registerForm.addEventListener("submit", e => {
    e.preventDefault()
    let data = new FormData(registerForm)

    fetch(`${location.origin}/websignerr/controlers/registerUser.php`, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'xmlhttprequest'
        },
        body: data
    }).then(responce => responce.json()).then(data => {
        console.log(data);
        if (data.msg != "") {
            alert(data.msg)
        } else {
            if (data.isOk) {
                location.assign(`${location.href}home`)
            } else {
                alert("erreur")
            }
        }
    })
})