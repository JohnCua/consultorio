//VALIDACIÓNES HACIANDO USO DE CLASES -Clases personalizadas- -Reglas personalizadas-

//Campo requerido
$.validator.addMethod("sbxRequired", $.validator.methods.required,"Debe llenar este campo");
$.validator.addClassRules("required", {sbxRequired: true});

//Opción requerida
$.validator.addMethod("sbxOpRequired", $.validator.methods.required,"Debe seleccionar una opción");
$.validator.addClassRules("required_option", {sbxOpRequired: true})

//minlength
$.validator.addMethod("sbxMinlength", $.validator.methods.minlength,"debe ingresar uno o más numeros");
$.validator.addMethod("sbxNumber", $.validator.methods.number,"Debe ingresar números");
$.validator.addClassRules("cnumber", {sbxNumber:true,sbxMinlength: 1 });

//email
$.validator.addMethod("sbxEmail", $.validator.methods.email,"Ingrese un correo electronico valido");
$.validator.addClassRules("email", {sbxEmail:true});

//Phone
$.validator.addMethod("sbxMinDigitos", $.validator.methods.minlength,"Ingrese al menos 8 dígitos");
$.validator.addMethod("sbxMaxDigitos", $.validator.methods.maxlength,"No puede ingresar más de 15 dígitos");
$.validator.addMethod("sbxNumber", $.validator.methods.number,"Debe ingresar números");
$.validator.addClassRules("phone", {sbxNumber:true,sbxMinDigitos: 8,sbxMaxDigitos:15 });


$("#formValidate").validate({
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
