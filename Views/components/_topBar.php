<div id="top_bar">
    <div class="logo_websignerr" onclick="link('home')">
        <img src=" <?= ASSETS . "images/logo-websignerr.svg" ?> " alt="W">
    </div>
    <form action="<?= CONTROLER ?>search.php" id="searchForm">
        <input type="search" name="search" placeholder="rechercher...">
        <button type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <div id="resul_search">
        <!-- le resultat de la recherche sera charger ici par le javascript -->
    </div>
    <div class="menu">
        <div class="profil" onclick="link('profil')">
            <div>
                <img src=" <?= ASSETS . "images/profil/" . $_SESSION["user"]["picture"] ?> " alt="profil">
            </div>
            <span><?= $_SESSION["user"]["user_login"] ?></span>
        </div>
        <div id="btn_menu">
            <i class="fas fa-bars"></i>
        </div>
        <div class="more_option">
            <div class="options hide">
                <div class="content hide">
                </div>
                <div class="profil" onclick="link('profil')">
                    <div>
                        <img src=" <?= ASSETS . "images/profil/" . $_SESSION["user"]["picture"] ?> " alt="profil">
                    </div>
                    <span><?= $_SESSION["user"]["username"] ?></span>
                </div>
                <div class="btn_about btn_hide" onclick="link('about')">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>a propos</span>
                </div>
                <div class="btn_theme btn_hide" id="btn_theme">
                    <i class="fas fa-toggle-off"></i>
                    <span>theme sombre</span>
                </div>
                <div class="btn_logout btn_hide" onclick="deconnect()">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>se deconnecter</span>
                </div>
                <?php if ($_SESSION["user"]["statut"] == "Admin") : ?>
                    <div class="btn_dashboard btn_hide" onclick="link('dashboard')">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>tableau de bord</span>
                    </div>
                <?php endif; ?>
                <span class="version"> version 1.0.3 </span>
            </div>
        </div>
    </div>
</div>

<script>
    function fetchSearch() {
        let btn_menu = document.getElementById("btn_menu");
        let options = document.querySelector(".options");
        let contend = document.querySelector(".more_option .content");

        btn_menu.addEventListener("click", (e) => {
            options.classList.toggle("hide")
            contend.classList.toggle("hide")
            document.querySelector(".btn_about").classList.toggle("btn_hide")
            document.querySelector(".btn_theme").classList.toggle("btn_hide")
            document.querySelector(".btn_logout").classList.toggle("btn_hide")
            document.querySelector(".btn_dashboard").classList.toggle("btn_hide")
        })
        contend.addEventListener("click", (e) => {
            options.classList.add("hide")
            contend.classList.add("hide")
            document.querySelector(".btn_about").classList.add("btn_hide")
            document.querySelector(".btn_theme").classList.add("btn_hide")
            document.querySelector(".btn_logout").classList.add("btn_hide")
            document.querySelector(".btn_dashboard").classList.add("btn_hide")
        })
        window.addEventListener("scroll", (e) => {
            options.classList.add("hide")
            contend.classList.add("hide")
        })

        let resulSearch = document.getElementById("resul_search");
        let searchForm = document.getElementById("searchForm");
        let inputSearch = document.querySelector("#searchForm input");
        let btnSearch = document.querySelector("#searchForm button");

        inputSearch.addEventListener("focus", e => {
            resulSearch.style.display = "flex";
        })
        inputSearch.addEventListener("blur", e => {
            setTimeout(() => {
                resulSearch.style.display = "none";
                inputSearch.value = "";
                resulSearch.innerHTML = ""
            }, 500);
            btnSearch.innerHTML = "<i class='fas fa-search'></i>";
        })
        inputSearch.addEventListener("input", e => {
            let search = inputSearch.value;
            resulSearch.innerHTML = "";
            btnSearch.innerHTML = "x";

            btnSearch.addEventListener('click', e => {
                resulSearch.innerHTML = "";
            })

            fetch(`${location.origin}/websignerr/controlers/posts.php?action=search&search=${search}`)
                .then(responce => responce.json())
                .then(data => {
                    if (data.length != 0) {
                        data.forEach(element => {
                            resulSearch.innerHTML += `
                                <div class="result test" onclick="showPost('${element.id_post}')">
                                    <img src="${location.origin}/websignerr/assets/images/profil/${element.picture}" alt="">
                                    <div class="description">
                                        ${element.post_description}
                                    </div>
                                </div>
                            `;
                        });
                    } else {
                        resulSearch.innerHTML += `
                            <div class="search_not_found">
                                <img src="${location.origin}/websignerr/assets/images/researching-pana-6305.png" alt="">
                                <p>pas de resultat pour l'expression "<em>${search}</em>" <p>
                            </div>
                        `;
                    }
                })
        })
    }
    fetchSearch()
</script>