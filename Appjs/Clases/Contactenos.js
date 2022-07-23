async function enviar() {
  var data= new FormData(document.getElementById('form'))
  let api = await fetch('/enviar', {
    method: "POST",
    body: data,
  });
  let response = await api.json();
  console.log(response);
  prencentarMensaje(response);
}

