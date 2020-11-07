<script>

function agregarServicioCliente(){
	
	
	var numero = $('.item_servicio_cliente').length-1;
	
	var plantilla_base = $('#plantilla_servicio_cliente');
	
	var plantilla = plantilla_base.clone();
	    plantilla.removeAttr('id');
		plantilla.addClass('item_servicio_cliente');
		
	var orden = parseInt(plantilla.find('.orden').first().val() || 0)+1;
	
	plantilla_base.find('.orden').val(orden)
	
	var cont = $('#contenedor_servicios_cliente');
	
	var select = $('#select_servicio_cliente');
	var texto = select.children('option:selected').text();
	var servicio_id = select.val();
	
	plantilla.find('.servicio_texto').text(texto);
	plantilla.find('.servicio_id').val(servicio_id);
	plantilla.find('.orden').val(orden);
	
	
	plantilla.find('.servicio_id').attr('name',"servicios_clientes["+(numero+1)+"][servicio_id]");
	plantilla.find('.fecha_inicio').attr('name',"servicios_clientes["+(numero+1)+"][fecha_inicio]");
	plantilla.find('.fecha_fin').attr('name',"servicios_clientes["+(numero+1)+"][fecha_fin]");
	plantilla.find('.cliente_id').attr('name',"servicios_clientes["+(numero+1)+"][cliente_id]");
	plantilla.find('.orden').attr('name',"servicios_clientes["+(numero+1)+"][orden]");
	
		cont.append(plantilla);
		
		plantilla.show();
	
}

</script>