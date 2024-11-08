const btn_agregar = document.getElementById('agregar');
btn_agregar.addEventListener("click", function( ){
    //crear el div que contiene los 2 sub-divs
    const div_principal = D.create('div');
    //crear el div para el span e input de la cantidad
    const div_cantidad = D.create('div');
    //crear el div para el span e input de la unidad
    const div_unidad = D.create('div');
    //crear el div para el span e input del producto
    const div_producto = D.create('div');
    //crear los span de todos los campos
    const span_cantidad = D.create('span');
    span_cantidad.innerHTML = 'Cantidad';

    const span_unidad = D.create('span');
    span_unidad.innerHTML = 'Unidad';

    const span_producto = D.create('span');
    span_producto.innerHTML = 'Producto';

    //crear inputs y selects de los elementos
    const input_cantidad = D.create('input', { type: 'text', name: 'cantidad', 
    autocomplete: 'off'} );

    const select_unidad = D.create('select', { name: 'unidad'} );

    const option_unidad = D.create('option'); 
    const select_producto = D.create('select', { name: 'producto'} );
    

    //agregar cada etiqueta a su nodo padre
    D.append(span_cantidad, div_cantidad);
    D.append(input_cantidad, div_cantidad);
    D.append(div_cantidad, div_principal); //como no tiene padre, debería ser en el document.body

    D.append([span_unidad, select_unidad], div_unidad);
    D.append(div_unidad, div_principal);

    D.append(div_principal, D.id('container2') );

});