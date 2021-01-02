const btnBorrar = document.getElementById('btnBorrar');
const primerCheckbox = document.querySelector('input[type=checkbox]');
const divError = document.getElementById('divError');

btnBorrar.addEventListener('click', function (event) {
  const marcados = document.querySelectorAll('input[type=checkbox]:checked');
  console.log(marcados.length);
  console.log(divError);

  if (marcados.length === 0) {
    divError.style.display = 'block';
    event.preventDefault();
  }
});
