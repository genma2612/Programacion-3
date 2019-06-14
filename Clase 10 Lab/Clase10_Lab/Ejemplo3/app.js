$(document).ready(function() {
    $('#idForm').bootstrapValidator({
        message: 'El valor no es vàlido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            usuario: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario està vacio.'
                    },
                    stringLength: {
                        min: 3,
                        message: 'El minimo de caracteres admitido es de 3.'
                    }
                }
            },
            clave: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña està vacia.'
                    },
                    stringLength: {
                        min: 4,
                        max: 8,
                        message: 'Ingrese entre 4 y 8 caracteres.'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        alert('Bienvenido ' + $('#nombreUsuario').val());
    }); 
});
