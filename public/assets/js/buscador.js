document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();
});

function iniciarApp() {
    buscar();
}

function buscar() {
    const buscarBtn = document.querySelector('#buscar');
    buscarBtn.addEventListener('onclick', function (e) {
        const estado = e.document.querySelector('#estado').value ?? '';
        const tipo = e.document.querySelector('#tipo').value ?? '';
        const marca = e.document.querySelector('#marca').value ?? '';
        const modelo = e.document.querySelector('#modelo').value ?? '';
        const precio = e.document.querySelector('#precio').value ?? '';
        const km = e.document.querySelector('#km').value ?? '';
        const caja = e.document.querySelector('#caja').value ?? '';
        const combustible = e.document.querySelector('#combustible').value ?? '';

        console.log(estado);

         window.location = `?estado=${estado}?tipo=${tipo}?marca=${marca}?modelo=${modelo}?precio=${precio}?km=${km}?caja=${caja}?combustible=${combustible}`;
    });
}