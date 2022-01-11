let btnTheme = document.getElementById('btn_theme');
let btnThemeSpan = document.querySelector('#btn_theme span');

btnTheme.addEventListener("click", e => {
    if (localStorage.getItem("theme") == "light") {
        darkTheme()
        localStorage.setItem("theme", "dark")
    } else {
        ligthTheme()
        localStorage.setItem("theme", "light")
    }
})


if (localStorage.getItem("theme") == "light") {
    ligthTheme()
} else if (localStorage.getItem("theme") == "dark") {
    darkTheme()
} else {
    localStorage.setItem("theme", "light")
}

function darkTheme() {
    document.documentElement.style.setProperty('--font', '#2b2b2b')
    document.documentElement.style.setProperty('--fontwhite', '#3b3b3b')
    document.documentElement.style.setProperty('--primary', '#3b3b3b')
    document.documentElement.style.setProperty('--ecriture', '#ffffff')

    btnTheme.innerHTML = `
        <i class="fas fa-toggle-on"></i>
        <span>theme claire</span>`;
}
function ligthTheme() {
    document.documentElement.style.setProperty('--font', '#edf2f9')
    document.documentElement.style.setProperty('--fontwhite', '#ffffff')
    document.documentElement.style.setProperty('--primary', '#28A2E7')
    document.documentElement.style.setProperty('--ecriture', '#3b3b3b')

    btnTheme.innerHTML = `
        <i class="fas fa-toggle-off"></i>
        <span>theme sombre</span>`;
}