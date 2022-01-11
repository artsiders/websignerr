// cette fonction permet d'ecouter les evenemnt du DOM pour controller fetchPost
function showPost(idPost) {
    let contentPost = document.querySelector(".content_post");
    let postClose = document.querySelector(".content_post .close");
    fetchPost(idPost)

    postClose.addEventListener("click", e => {
        contentPost.classList.add('hide');
    })
    contentPost.addEventListener("click", e => {
        if (e.target.dataset.post == "post") {
            contentPost.classList.add('hide');
        }
    })
}
// cette fonction permet de recupere les publication et les injecte dans le DOM
function fetchPost(idPost) {
    let contentPost = document.querySelector(".content_post");
    contentPost.classList.remove('hide');
    // let idPost = e.target.dataset.idpost;
    idPost = parseInt(idPost);

    fetch(`${location.origin}/websignerr/controlers/posts.php?action=read&id_post=${idPost}`)
        .then(responce => responce.json())
        .then(data => {
            let img = data.principal_item;
            let description = data.post_description;
            let date = data.add_date;
            let item1 = data.item1;
            let item2 = data.item2;
            let item3 = data.item3;
            let idpost = data.id_post;

            if (data = !null) {
                document.querySelector(".content_post .principal_item").innerHTML = `
                    <img src="${location.origin}/websignerr/assets/images/uploads/${img}" data-idpost="${idpost}" alt="principal_item">
                `;
                document.querySelector(".content_post .description").innerHTML = `<p>poster le : ${date}</p> ${description}`;
                if (item1 != "default.png") {
                    document.querySelector(".content_post .items").innerHTML += `
                    <div class="item">
                        <img src="${location.origin}/websignerr/assets/images/uploads/${item1}" alt="item1">
                    </div>
                    `;
                }
                if (item2 != "default.png") {
                    document.querySelector(".content_post .items").innerHTML += `
                    <div class="item">
                        <img src="${location.origin}/websignerr/assets/images/uploads/${item2}" alt="item2">
                    </div>
                    `;
                }
                if (item3 != "default.png") {
                    document.querySelector(".content_post .items").innerHTML += `
                    <div class="item">
                        <img src="${location.origin}/websignerr/assets/images/uploads/${item3}" alt="item3">
                    </div>
                    `;
                }
            } else {
                alert("il ya un petit soucis :(");
            }
        })
    fetchComent(idPost)
}
// cette fonction permet de recupere les commentaires et les injecte dans le popup de publication
function fetchComent(idPost) {
    let contentComments = document.getElementById("contentComments")
    let formComment = document.getElementById("formComment")
    formComment.setAttribute('data-idpost', idPost)

    fetch(`${location.origin}/websignerr/controlers/comments.php?action=read&id_post=${idPost}`)
        .then(responce => responce.json())
        .then(data => {
            contentComments.innerHTML = ""
            if (data == "empty") {
                contentComments.innerHTML = "<span>Aucun commentaires disponibles</span>"
            } else {
                let idUserCurent = localStorage.getItem("id_user");

                data.forEach(element => {
                    if (idUserCurent == element.id_user) {
                        contentComments.innerHTML += `
                        <div class="my_comments">
                            <img onclick="link('./profils&id_user=${element.id_user}')" src="${location.origin}/websignerr/Assets/images/profil/${element.picture}" alt="photo de">
                            <div class="comment">
                                ${element.comment}
                            </div>
                            <i class="fas fa-trash-alt btn_delete_comment" data-idcomment="${element.id_comment}"></i>
                        </div>
                        `;
                    } else {
                        contentComments.innerHTML += `
                        <div class="auther_comments">
                            <div class="comment">
                                ${element.comment}
                            </div>
                            <img onclick="link('./profils&id_user=${element.id_user}')" src="${location.origin}/websignerr/Assets/images/profil/${element.picture}" alt="">
                        </div>
                        `;
                    }
                });
            }
        })
    setTimeout(() => {
        deleteComment()
    }, 1000);
}
// cette fonction permet d'ajouter un commentaire dans la BD et l'afficher directement
function createComment() {
    let formComment = document.getElementById("formComment");
    let contentComments = document.getElementById("contentComments")

    formComment.addEventListener("submit", e => {
        e.preventDefault()
        let data = new FormData(formComment)
        idPost = formComment.getAttribute('data-idpost')
        // ajouter un commentaire dans la bose de donnée
        fetch(`${location.origin}/websignerr/controlers/comments.php?action=create&id_post=${idPost}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'xmlhttprequest'
            },
            body: data
        }).then(responce => responce.json()).then(data => {
            idUserConnect = localStorage.getItem("id_user")
            if (data.insertIsOk) {
                contentComments.innerHTML += `
                <div class="my_comments new_comment">
                    <img src="${location.origin}/websignerr/Assets/images/profil/${localStorage.getItem("picture")}" alt="photo de">
                    <div class="comment">
                        ${data.comment}
                    </div>
                    <i class="fas fa-trash-alt btn_delete_comment new"></i>
                </div>`;
                document.querySelector("#formComment .comment").value = "";

                document.querySelector('.btn_delete_comment.new').addEventListener("click", e => {
                    // permet de supprimer un commentaire qui a ete charger par cette fontion
                    fetch(`${location.origin}/websignerr/controlers/comments.php?action=delete&id_comment=${data.id_comment}`)
                        .then(responce => responce.json())
                        .then(data => {
                            document.querySelector('.btn_delete_comment.new').parentElement.style.display = "none";
                        })
                })

            }
        })
    })
}
createComment()
// permet de supprimer une publication
function deletePost() {
    let deletes = document.querySelectorAll(".action .delete");

    deletes.forEach(element => {
        element.addEventListener("click", e => {
            let idpost = e.target.dataset.idpost;

            fetch(`${location.origin}/websignerr/controlers/posts.php?action=delete&id_post=${idpost}`)
                .then(responce => responce.json())
                .then(data => {
                    // console.log(data);
                    element.parentElement.parentElement.style.display = "none";
                })

        })
    });
}
deletePost()
// permet de supprimer un commentaire
function deleteComment() {
    let trash = document.querySelectorAll(".btn_delete_comment");

    trash.forEach(element => {
        element.addEventListener("click", e => {
            let idComment = e.target.dataset.idcomment;

            fetch(`${location.origin}/websignerr/controlers/comments.php?action=delete&id_comment=${idComment}`)
                .then(responce => responce.json())
                .then(data => {
                    element.parentElement.style.display = "none";
                })

        })
    });
}
// permet d'ajouter une nouvelle publication
function createPost() {
    let addPost = document.getElementById("addPost");
    let contentAddpost = document.querySelector(".content_addpost");
    let inputDescription = document.querySelector(".content_addpost textarea");
    let labelFile = document.querySelector("#addPost > label");
    let addPostClose = document.querySelector("#addPost .close");
    contentAddpost.classList.remove('hide');

    addPost.addEventListener("submit", e => {
        e.preventDefault()
        let data = new FormData(addPost)

        fetch(`${location.origin}/websignerr/controlers/posts.php?action=create`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'xmlhttprequest'
            },
            body: data
        }).then(responce => responce.json()).then(data => {
            // console.log(data);
            if (!data.insertIsOk) {
                if (!data.principal_item) {
                    document.querySelector("#addPost > label").style.border = `1px dashed red`;
                } else {
                    document.querySelector("#addPost > label").style.border = `1px dashed green`;
                }

                if (!data.inputDescription) {
                    document.querySelector("#addPost textarea").style.border = `1px solid red`;
                } else {
                    document.querySelector("#addPost textarea").style.border = `1px solid green`;
                }
            } else {
                contentAddpost.classList.add('hide');
            }
        })
    })

    // labelFile.style.border = `2px dashed grey`;

    addPostClose.addEventListener("click", e => {
        contentAddpost.classList.add('hide');
    })
    contentAddpost.addEventListener("click", e => {
        if (e.target.dataset.post == "post") {
            contentAddpost.classList.add('hide');
        }
    })
}
// permet de controler la modification d'une publication
function updatePost(idPost) {
    let contentEditpost = document.querySelector(".content_editpost");
    let inputDescription = document.querySelector(".content_editpost textarea");
    let editPostClose = document.querySelector("#editPost .close");

    let editPost = document.getElementById("editPost");
    contentEditpost.classList.remove('hide');
    editPost.style.display = 'flex'
    editPost.style.flexDirection = 'column'

    fetch(`${location.origin}/websignerr/controlers/posts.php?action=read&id_post=${idPost}`)
        .then(responce => responce.json())
        .then(data => {
            let description = data.post_description;
            inputDescription.innerHTML = description;
        })
    localStorage.setItem("idpostUpdate", idPost)

    inputDescription.style.border = `2px dashed grey`;


    editPostClose.addEventListener("click", e => {
        contentEditpost.classList.add('hide');
    })
    contentEditpost.addEventListener("click", e => {
        if (e.target.dataset.post == "post") {
            contentEditpost.classList.add('hide');
        }
    })
}
// permet de modifier une publication
function fetchUpdatePost() {
    let editPost = document.getElementById("editPost");
    editPost.addEventListener("submit", e => {
        e.preventDefault()
        let contentEditpost = document.querySelector(".content_editpost");
        let idPost = localStorage.getItem("idpostUpdate")
        let editPost = document.getElementById("editPost");
        let inputDescription = document.querySelector(".content_editpost textarea");
        // let labelFile = document.querySelector("#editPost > label");

        let data = new FormData(editPost)

        fetch(`${location.origin}/websignerr/controlers/posts.php?action=update&id_post=${idPost}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'xmlhttprequest'
            },
            body: data
        }).then(responce => responce.json()).then(data => {
            if (!data.insertIsOk) {
                if (!data.inputDescription) {
                    inputDescription.style.border = `2px solid red`;
                } else {
                    inputDescription.style.border = `2px solid green`;
                }
            } else {
                alert("tout est OK 😉")
                contentEditpost.classList.add('hide');
            }
        })
    })
}
fetchUpdatePost()
// permet de modifier le information d'un utilisateur
function updateUserInfo() {
    let btnUpdateProfil = document.getElementById("btnUpdateProfil")
    let formProfilView = document.getElementById("formProfilView")
    let formProfilUpdate = document.getElementById("formProfilUpdate")

    btnUpdateProfil.addEventListener("click", e => {
        formProfilView.style.display = "none"
        formProfilUpdate.style.display = "flex"
    })

    formProfilUpdate.addEventListener("submit", e => {
        e.preventDefault()
        let data = new FormData(formProfilUpdate)

        fetch(`${location.origin}/websignerr/controlers/user.php?action=user_info`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'xmlhttprequest'
            },
            body: data
        }).then(responce => responce.json()).then(data => {
            if (data.insertIsOk) {
                alert(data.msg)
                formProfilView.style.display = "flex"
                formProfilUpdate.style.display = "none"
            } else {
                alert(data.msg)
            }

        })
    })
}
updateUserInfo()
// permet de deconnecter un utilisateur
function deconnect() {
    fetch(`${location.origin}/websignerr/controlers/deconnexion.php`)
        .then(Response => Response.json)
        .then(data => {
            alert("vous ete deconnecter");
            location.assign("./")
        })
}
