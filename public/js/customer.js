window.setTimeout(function() {
    $(".errorMessage")
        .fadeTo(100, 0)
        .slideUp(100, function() {
            $(this).remove();
        });
}, 3000);
window.setTimeout(function() {
    $(".successMessage")
        .fadeTo(100, 0)
        .slideUp(100, function() {
            $(this).remove();
        });
}, 3000);

// $("#tbCustomer tr:contains('Baja')").hide();

function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("inputSearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("tbCustomer");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function myFunctionI() {

    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("inputSearchI");
    filter = input.value.toUpperCase();
    table = document.getElementById("tbCustomer");
    tr = table.getElementsByTagName("tr");
    console.log('das')
        // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

/**
 * HACER SOCIO A  UN CLIENTE
 */
$("#btnMember").click(function(e) {
    e.preventDefault();
    var baseUrl = document.location.origin;
    console.log(baseUrl);
    //var url = baseUrl + '/good_gym/cliente/hacer_socio';

    //creo arreglo vacio
    var ids = [];

    if ($('#tbCustomer tbody input[type="checkbox"]').is(":checked")) {
        //mensage box para confirmar si desea elimnar
        bootbox.confirm({
            title: "Hacer socio",
            message: "Esta seguro que desea hacer socio a los clientes selecionados?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancelar',
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Aceptar',
                },
            },
            callback: function(result) {
                if (result) {
                    //si es verdadero
                    //recorre todos los input seleccionados
                    $("input[type=checkbox]:checked").each(function() {
                        //guarda el valor de cada elemento seleccionado
                        ids.push($(this).val());
                    });
                    $.ajax({
                        type: "get",
                        dataType: "json",
                        url: "customers/member",
                        // url: "{{ route('customers.member') }}",
                        data: { valor: ids },
                        beforeSend: function() {
                            $("#div_spinner").show();
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                // console.log(data.data);
                                // console.log(data.req);

                                $("input[type=checkbox]").prop("checked", false);

                                window.location.reload();

                                //   var url_cliente = baseUrl + '/good_gym/cliente/';
                                //  $(location).attr('href', url_cliente);
                            } else {}
                        },
                        complete: function() {
                            $("#div_spinner").hide();
                        },
                    });
                }
            },
        });
    } else {
        //sino tiene ningun elemnto seleccionado
        bootbox.alert({
            //                size: "small",
            title: "Error",
            message: '<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true "></i>&nbsp;&nbsp;Debe seleccionar al menos un elemento',
        });
    }
});

/**
 * DAR DE BAJA A UN CLIENTE
 */
$("#btnRemove").click(function(e) {
    e.preventDefault();
    var baseUrl = document.location.origin;
    console.log(baseUrl);
    //var url = baseUrl + '/good_gym/cliente/hacer_socio';

    //creo arreglo vacio
    var ids = [];

    if ($('#tbCustomer tbody input[type="checkbox"]').is(":checked")) {
        //mensage box para confirmar si desea elimnar
        bootbox.confirm({
            title: "Dar de baja",
            message: "Esta seguro que desea dar de baja a los clientes selecionados?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancelar',
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Aceptar',
                },
            },
            callback: function(result) {
                if (result) {
                    //si es verdadero
                    //recorre todos los input seleccionados
                    $("input[type=checkbox]:checked").each(function() {
                        //guarda el valor de cada elemento seleccionado
                        ids.push($(this).val());
                    });
                    $.ajax({
                        type: "get",
                        dataType: "json",
                        url: "customers/unsubscribe",
                        // url: "{{ route('customers.member') }}",
                        data: { valor: ids },
                        beforeSend: function() {
                            $("#div_spinner").show();
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                // console.log(data.data);
                                // console.log(data.req);

                                $("input[type=checkbox]").prop("checked", false);

                                window.location.reload();

                                //   var url_cliente = baseUrl + '/good_gym/cliente/';
                                //  $(location).attr('href', url_cliente);
                            } else {}
                        },
                        complete: function() {
                            $("#div_spinner").hide();
                        },
                    });
                }
            },
        });
    } else {
        //sino tiene ningun elemnto seleccionado
        bootbox.alert({
            //                size: "small",
            title: "Error",
            message: '<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true "></i>&nbsp;&nbsp;Debe seleccionar al menos un elemento',
        });
    }
});
/**
 * REGISTAR PAGO DE UN CLIENTE
 */
$("#btnPayment").click(function(e) {
    e.preventDefault();
    var baseUrl = document.location.origin;
    console.log(baseUrl);
    //var url = baseUrl + '/good_gym/cliente/hacer_socio';

    //creo arreglo vacio
    var ids = [];

    if ($('#tbCustomer tbody input[type="checkbox"]').is(":checked")) {
        //mensage box para confirmar si desea elimnar
        bootbox.confirm({
            title: "Hacer socio",
            message: "Esta seguro que desea dar de baja a los clientes selecionados?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancelar',
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Aceptar',
                },
            },
            callback: function(result) {
                if (result) {
                    //si es verdadero
                    //recorre todos los input seleccionados
                    $("input[type=checkbox]:checked").each(function() {
                        //guarda el valor de cada elemento seleccionado
                        ids.push($(this).val());
                    });
                    $.ajax({
                        type: "get",
                        dataType: "json",
                        url: "customers/payment",
                        // url: "{{ route('customers.member') }}",
                        data: { valor: ids },
                        beforeSend: function() {
                            $("#div_spinner").show();
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                // console.log(data.data);
                                // console.log(data.req);

                                $("input[type=checkbox]").prop("checked", false);

                                window.location.reload();

                                //   var url_cliente = baseUrl + '/good_gym/cliente/';
                                //  $(location).attr('href', url_cliente);
                            } else {}
                        },
                        complete: function() {
                            $("#div_spinner").hide();
                        },
                    });
                }
            },
        });
    } else {
        //sino tiene ningun elemnto seleccionado
        bootbox.alert({
            //                size: "small",
            title: "Error",
            message: '<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true "></i>&nbsp;&nbsp;Debe seleccionar al menos un elemento',
        });
    }
});


/**
 * DAR DE ALTA  A UN CLIENTE QUE YA ESTA EN ELS ISTEMA
 */
$("#btnBacktoList").click(function(e) {
    e.preventDefault();
    var baseUrl = document.location.origin;
    console.log(baseUrl);
    //var url = baseUrl + '/good_gym/cliente/hacer_socio';

    //creo arreglo vacio
    var ids = [];

    if ($('#tbCustomer tbody input[type="checkbox"]').is(":checked")) {
        //mensage box para confirmar si desea elimnar
        bootbox.confirm({
            title: "Dar de alta",
            message: "Esta seguro que desea dar de alta a los clientes selecionados?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancelar',
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Aceptar',
                },
            },
            callback: function(result) {
                if (result) {
                    //si es verdadero
                    //recorre todos los input seleccionados
                    $("input[type=checkbox]:checked").each(function() {
                        //guarda el valor de cada elemento seleccionado
                        ids.push($(this).val());
                    });
                    $.ajax({
                        type: "get",
                        dataType: "json",
                        url: "subscribe",
                        // url: "{{ route('customers.member') }}",
                        data: { valor: ids },
                        beforeSend: function() {
                            $("#div_spinner").show();
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                // console.log(data.data);
                                // console.log(data.req);

                                $("input[type=checkbox]").prop("checked", false);

                                window.location.reload();

                                //   var url_cliente = baseUrl + '/good_gym/cliente/';
                                //  $(location).attr('href', url_cliente);
                            } else {}
                        },
                        complete: function() {
                            $("#div_spinner").hide();
                        },
                    });
                }
            },
        });
    } else {
        //sino tiene ningun elemnto seleccionado
        bootbox.alert({
            //                size: "small",
            title: "Error",
            message: '<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true "></i>&nbsp;&nbsp;Debe seleccionar al menos un elemento',
        });
    }
});