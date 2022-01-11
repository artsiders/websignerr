function ready() {
    var contentLoad = document.querySelector('.content_loader');
    setTimeout(() => {
        contentLoad.classList.add("load_hide");
    }, 500);
    setTimeout(() => {
        contentLoad.style.display = "none";
    }, 1000);

}
function link(href) {
    location.assign(`./${href}`)
}

function magnetic(element) {
    const elements = document.querySelectorAll(`${element}`);
    elements.forEach((element) => {
        element.addEventListener("mousemove", e => {
            const position = element.getBoundingClientRect();
            const x = e.pageX - position.left - position.width / 2;
            const y = e.pageY - position.top - position.height / 2;

            element.children[0].style.transform = "translate(" + x * 0.3 + "px, " + y * 0.5 + "px)";
        });
    });

    elements.forEach((element) => {
        element.addEventListener("mouseout", e => {
            element.children[0].style.transform = "translate(0px, 0px)";
        });
    });
}
magnetic(".box_etiquete")

function previewImage() {
    // selectionne les input file
    let principalItem = document.getElementById("principal_item").files;
    let file2 = document.getElementById("item1").files;
    let file3 = document.getElementById("item2").files;
    let file4 = document.getElementById("item3").files;

    if (principalItem.length > 0) {
        // extensiation de l'objet FileReader
        var fileReader = new FileReader();
        // on charge limage dans son tag
        fileReader.onload = function (e) {
            document.getElementById("previewPrincipal").src = e.target.result;
        }
        // l'image qui est a l'index 0 du tableau
        fileReader.readAsDataURL(principalItem[0]);
    }

    if (file2.length > 0) {
        // extensiation de l'objet FileReader
        var fileReader = new FileReader();
        // on charge limage dans son tag
        fileReader.onload = function (e) {
            document.getElementById("preview2").src = e.target.result;
        }
        // l'image qui est a l'index 0 du tableau
        fileReader.readAsDataURL(file2[0]);
    }
    if (file3.length > 0) {
        // extensiation de l'objet FileReader
        var fileReader = new FileReader();
        // on charge limage dans son tag
        fileReader.onload = function (e) {
            document.getElementById("preview3").src = e.target.result;
        }
        // l'image qui est a l'index 0 du tableau
        fileReader.readAsDataURL(file3[0]);
    }
    if (file4.length > 0) {
        // extensiation de l'objet FileReader
        var fileReader = new FileReader();
        // on charge limage dans son tag
        fileReader.onload = function (e) {
            document.getElementById("preview4").src = e.target.result;
        }
        // l'image qui est a l'index 0 du tableau
        fileReader.readAsDataURL(file4[0]);
    }
    // on relance la fonction aprés une seconder pour charger l'image
    setTimeout(previewImage, 1000);
}
function previewImageProfil() {
    // selectionne les input file
    let inputPicture = document.getElementById("inputPicture").files;
    let inputCover = document.getElementById("inputCover").files;

    if (inputCover.length > 0) {
        // extensiation de l'objet FileReader
        var fileReader = new FileReader();
        // on charge limage dans son tag
        fileReader.onload = function (e) {
            document.getElementById("previewCover").src = e.target.result;
        }
        // l'image qui est a l'index 0 du tableau
        fileReader.readAsDataURL(inputCover[0]);
    }
    if (inputPicture.length > 0) {
        // extensiation de l'objet FileReader
        var fileReader = new FileReader();
        // on charge limage dans son tag
        fileReader.onload = function (e) {
            document.getElementById("previewProfil").src = e.target.result;
        }
        // l'image qui est a l'index 0 du tableau
        fileReader.readAsDataURL(inputPicture[0]);
    }

    // on relance la fonction aprés une seconder pour charger l'image
    setTimeout(previewImageProfil, 1000);
}