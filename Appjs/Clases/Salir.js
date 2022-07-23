async function salir() {
    let api = await fetch("/ajax/usuarios/salir");
    window.location.href = "/login";
}