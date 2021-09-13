document.addEventListener("DOMContentLoaded", function() {

    if (document.querySelector('#formulario-lente') != null) {
        rb1 = document.querySelector('#mantener');
        rb2 = document.querySelector('#cambiar');
        fieldMantener = document.querySelector('#field-mantener')
        fieldCambio = document.querySelector('#field-cambios')

        if (rb1.checked) {
            fieldMantener.hidden = false;
            fieldCambio.disabled = true;
            fieldCambio.hidden = true;

        } else {
            if (rb2.checked) {
                fieldMantener.hidden = true;
                fieldCambio.disabled = false;
                fieldCambio.hidden = false;
            }
        }
        rb1.addEventListener('click', () => {
            // console.log('Me presionaste D:');
            fieldMantener.hidden = false;
            fieldCambio.disabled = true;
            fieldCambio.hidden = true;
        })
        rb2.addEventListener('click', () => {
            // console.log('Me presionaste :D');
            fieldMantener.hidden = true;
            fieldCambio.disabled = false;
            fieldCambio.hidden = false;
        })
    }

    if (document.querySelector('#formulario-cita') != null) {

        datePicker = document.querySelector('#fecha_cita');
        formulario = document.querySelector('#formulario-cita');
        btnSubmit = document.querySelector('#submit-id');
        divError = document.querySelector('#div-error');
        fechaVenta = document.querySelector('#fecha-venta');


        fechaActual = new Date(fechaVenta.value);
        fechaActual.setDate(fechaActual.getDate() + 14);
        // console.log(fechaActual);

        valido = false;



        datePicker.addEventListener("change", function() {
            fechaCita = new Date(this.value);

            // console.log(fechaActual );
            if (fechaActual > fechaCita) {
                valido = false;
                divError.innerHTML = `
                    <p class=\"alert alert-danger d-flex justify-content-center\">
                        Debe elegir una fecha valida
                    </p>`;
                btnSubmit.disabled = true;
            } else {
                valido = true;
                divError.innerHTML = `
                    <p class=\"alert alert-success d-flex justify-content-center\">
                        Fecha valida
                    </p>`;
                btnSubmit.disabled = false;
            }

        });


        formulario.addEventListener("submit", function(e) {
            if (valido) {
                e.submit();
            } else {
                e.preventDefault();
            }

        })
    }

});