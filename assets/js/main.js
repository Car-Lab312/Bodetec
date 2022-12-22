var URL ="https://bodetec.csinformatica.cl/";

$(document).ready(function(){
	$('#staticBackdrop').on('shown.bs.modal',function(){
		$('#cod_prod').val('');
		$('#cod_prod').focus();
		$(this).on('change',function(){ 
			buscarProducto($('#cod_prod').val());
		});
	});
	$('#selectProdModal').on('shown.bs.modal',function(){
		$('#selectProd').val(' ');
		$('#cantidad').val(' ');
	});
	$('.del').click(function(){
		var id = $(this).data('id');
		$('#My_Delete').on('shown.bs.modal',function(){
			$('#acepta').attr('href',URL+'proveedores/delete&id='+id);
		})
	});
	
	$('#codigoEscaneoStock').change(function(){
		if($('#codigoEscaneoStock').val() != ''){
			$.ajax({
				type:'POST',
				url:'helpers/utils.php',
				data:{search_prod_stock:$('#codigoEscaneoStock').val()},
				cache:false,
				contenType:'application/json; charset=utf-8',
				success:function(data){
					$('#producto_in_scan').attr('value',revisar(data));
				},
			})
		}
	})
	$('#modalProductosIn').on('shown.bs.modal',function(){
		$('#codigoEscaneoStock').focus();
	})
    $('#borraDatos').click(function(){
    	$('#id_trab').attr('value','');
    	$('#rut_trab').attr('value','');
    	$('#nombre_trab').attr('value','');
    	$('#apellido_trab').attr('value','');
    	$('#correo_trab').attr('value','');
    })
    $('.trinp').keyup(function(e) {
    	var min=0;
    	var palabra = $(this).val();
    	if(palabra.length >= min){
    		$.ajax({
    			type:'POST',
				url: URL+'assets/ajax.php',
				data:'search_job='+palabra,
				dataType:'html',
				success:function(data){

				}
    		})
    	}
    });
    $('#trabajador_input').keyup(function(){
    	var palabra = $(this).val();
    	if($('#trabajador_input').val() != ''){
    		$('#tablaTrabajador tbody').empty();
    		$.ajax({
    			type:'POST',
				url: 'helpers/utils.php',
				data:{search_job:palabra},
				cache:false,
				contenType: 'application/json; charset=utf-8',
				success:function(data){
					$('#tablaTrabajador').prepend(data);
				},
				error : function(xhr, status) {				
        			$(location).attr('href',URL+'views/entregacargo/listadecargo.php');
    			},
    		});
    	}
    	
    });
    $('#rut_prov').keyup(function(){
		var id = $(this).val();
		if($('#rut_prov').val() != ''){
			$('#tablaProveedores tbody').empty();
			$.ajax({
				type : 'POST',
				url  : 'helpers/utils.php',
				data: {val_prov_search:id},
				cache:false,
				contenType: 'application/json; charset=utf-8',
				success:function(response){
				  	$('#tablaProveedores').append(response);	
				},
				error : function(xhr, status) {
        			$(location).attr('href',URL+'views/proveedores/nuevo.php');
    			},
				
			});
		}
	});
    $('#prodSelect').change(function(e){
    	e.preventDefault();
    	id = $(this).val();
    	$.ajax({
			type:'POST',
			url: 'helpers/utils.php',
			data:{id_prod_select:id},
			cache:false,
			contenType: 'json',
			success:function(data){
				valor = reenplaza(data),
 				$('#stockp').attr('value',valor);
 				$('#stockp').val(valor);
			},
			error : function(xhr, status) {
        		alert('Disculpe, existió un problema');
    		},
		});
    });
    
    $('#regionSelect').change(function(e) {
		e.preventDefault();
		id = $(this).val();
		$('#ciudadSelect').empty();
		$.ajax({
			type:'POST',
			url: 'helpers/utils.php',
			data:{id_region_search:id},
			cache:false,
			contenType: 'application/json; charset=utf-8',
			success:function(data){
 				print_opc_tions(data);
			},
			error : function(xhr, status) {
        		alert('Disculpe, existió un problema');
    		},
		});
	});
	$('#family_in').change(function(e){
		e.preventDefault();
		id=$(this).val();
		$('#subFam_in').empty();
		$.ajax({
			type:'POST',
			url: 'helpers/utils.php',
			data:{id_fam_search:id},
			cache:false,
			contenType: 'application/json; charset=utf-8',
			success:function(data){
 				$('#subFam_in').html(data);
 				
			},
			error : function(xhr, status) {
        		alert('Disculpe, existió un problema');
    		},
		});
	});
	$('#buscaRut').keyup(function(){

		if($(this).val() != ''){	
			$('#tablaTrabajador tbody').empty();
			valor = $(this).val();
			$.ajax({
				type:'POST',
				url: 'helpers/utils.php',
				data:{job_search:valor},
				cahe:false,
				contenType: 'application/json; charset=utf-8',
				success:function(data){
					$('#tablaTrabajador').prepend(data);
				}
			});
		}else{
			$('#tablaTrabajador tbody').empty();
		}
	});
	// $('#btn_buscaPorFechas').on('submit',function(){
	// 	//$('#tablaStockEntreFechas tbody').empty();
	// 	if($('#dateI_in').val() != '' && $('#dateF_in').val() !=''){
	// 		var inicio = $('#dateI_in').val();
	// 		var final = $('#dateF_in').val();
	// 		//$('#tablaStockEntreFechas tbody').empty();
	// 		$.ajax({
	// 			type:'POST',
	// 			url: 'helpers/utils.php',
	// 			data:{inicio_search : inicio, final_search : final},
	// 			cache:false,
	// 			contenType: 'application/json; charset=utf-8',
	// 			success:function(data){
 	// 				$('#tablaStockEntreFechas').append(data);
	// 			},
	// 			error : function(xhr, status) {
    //     			alert('Disculpe, existió un problema');
    // 			},
	// 		})
	// 	}
	// });
	$('#btnAddPedidoScan').click(function(){
		var codigo  = $('#cod_prod');
		var producto= $('#nombre_prod');
		var cantidad= $('#cantidad');
		if(codigo.val()!='' && producto.val()!='' && cantidad.val()!=''){
			var datos = [codigo.val(),producto.val(),cantidad.val()];
			nuevoPedido(datos);
		}
		
	})
	$('#btnAddPedidoManual').click(function(){
		var value = $('select option:selected');
		var nombre = $('select option:selected');
		var cantidad = $('#cantidadPedida');
		var stock = $('#stockp');	
		if(value.val() !='' && nombre.text() !='' && cantidad.val() != ''){
			if(stock.val() - cantidad.val() < 0){
				$('#msg').empty();
				$('#msg').append('<p><i class="bx bxs-error me-2"></i>Stock no disponible</p>');	
			}else{
				$('#msg').empty();
				var datos = [value.val(),nombre.text(),cantidad.val()];
				nuevoPedido(datos);
				$('#stockp').val('');
				$('#cantidad').val('');
			}
		}	
	});

	$('#btnAgregarStock').click(function(){
		var codigo   = $('#producto_in').val();
		var producto = $('select option:selected').text();
		var cantidad = $('#cantidad_in').val();
		var precio   = $('#precioProducto').val();
		var datos =[codigo,producto,cantidad,precio];
		agregarStock(datos);
	})
	$('#btnAgregarStockCod').click(function(){
		var codigo = $('#codigoEscaneoStock');
		//var codigo = codigoIn.val();
		//var codigo   = $('#codigoEscaneoStock').val();
		var producto = $('#producto_in_scan');
		var cantidad = $('#cantidad_in_scan');
		var precio   = $('#precioProducto_scan');
		var datos =[codigo.val(),producto.val(),cantidad.val(),precio.val()];
		agregarStock(datos);
		var inputs = [codigo,producto,cantidad,precio];
		clean(inputs);
	})
/*  ------------------------- FUCIONES -----------------------*/
	function agregarStock(dato){
		$('#tablaStockIngreso').append(
			$('<tr>').append(
				$('<td>').append(
					$('<input>').attr('type','text').attr('value',dato[0]).attr('name','cod[]').addClass('form-control')
					)
				).append(
					$('<td>').append(
						$('<input>').attr('type','text').attr('value',dato[1]).addClass('form-control')
					)
				).append(
					$('<td>').append(
						$('<input>').attr('type','number').attr('value',dato[2]).attr('name','cant[]').attr('value',dato[2]).addClass('form-control')
					)
				).append(
					$('<td>').append(
						$('<input>').attr('type','number').attr('value',dato[3]).attr('name','precio[]').attr('value',dato[3]).addClass('form-control')
					)
				).append(
					$('<td>').append(
						$('<input>').attr('type','number').attr('name','total[]').attr('value',dato[2]*dato[3]).addClass('form-control')
					)
				)
			)
		dato.pop();
		del();
	} 
	function revisar(datos){
		var regex = /\s+/gi;
		cont = datos.trim().replace(regex, ' ').split(' ').length;
		var i=0;
		var palabra = '';
		while(i<cont){
			valor = datos[i];
			if(valor != '<'){palabra = palabra.concat(valor.toString());}else{ i=cont; }
			 i++;
		}
		return palabra;
	}
	function reenplaza(dato){
    	valor = dato.split(' ')[0];
    	valor = valor.replace('<!DOCTYPE','');
 		return valor;
    }
    function clean(input){
    	for(i=0;i<=input.length;i++){
    		input[i].attr('value','').val('');
    	}
    	$('#modalProductosIn').load();
    }
	function print_opc_tions(data){
		$('#ciudadSelect').html(data);
	}
	function funcion(){
		$('.entrega').click(function(){
			id = $(this).val();	
		});
	}
	function nuevoPedido(datos){
		$('#tablaProdTrabajador').append(
			$('<tr>').attr('id',datos[0]).append(
				$('<td>').append(
					$('<input>').attr('type','text').attr('name','art[]').attr('value',datos[0]).addClass('form-control').val(datos[0])	
				)
			).append(
				$('<td>').append(
					$('<input>').attr('type','text').addClass('form-control').val(datos[1])
				)
			).append(
				$('<td>').append(
					$('<input>').attr('type','text').attr('name','cant[]').attr('value',datos[2]).addClass('form-control').val(datos[2])
				)
			).append(
				$('<td>').addClass('text-center').append(
					$('<button>').attr('type','button').addClass('btn btn-xs btn-danger').text('Eliminar').attr('id',datos[0])
				)
			)
		)
		datos.pop();
		del();
	}
	function ingresaInputStock(datos){
		$('.res').append(
			$('input').attr('type','text').attr('name','prodStok').attr('id','nombreProd').attr('value',datos[0]).addClass('form-control')
			)
	}
	function del(){
		$('.btn-danger').click(function(){
    		$(this).closest('tr').remove();
    	});
	}
	function buscarProducto(cod){
		codProd = cod;
		$.ajax({
			type:'POST',
			url: 'helpers/utils.php',
			data:{codProd_search:codProd},
			cahe:false,
			contenType: 'json',
			success:function(data){
				$('#nombre_prod').val(revisar(data));
				//console.log(data['stock']);
			
			},
			error:function(){
				//console.log('error de consulta');

			}
		})
	}


	/*  Show/Hidden Submenus */
	// $('.nav-btn-submenu').on('click', function(e){
	// 	e.preventDefault();
	// 	var SubMenu=$(this).next('ul');
	// 	var iconBtn=$(this).children('.fa-chevron-down');
	// 	if(SubMenu.hasClass('show-nav-lateral-submenu')){
	// 		$(this).removeClass('active');
	// 		iconBtn.removeClass('fa-rotate-180');
	// 		SubMenu.removeClass('show-nav-lateral-submenu');
	// 	}else{
	// 		$(this).addClass('active');
	// 		iconBtn.addClass('fa-rotate-180');
	// 		SubMenu.addClass('show-nav-lateral-submenu');
	// 	}
	// });

	/*  Show/Hidden Nav Lateral */
	$('#rut_registro').on('input',function(){
		var valor = rut_registro.value.replace('.','');
		valor = valor.replace('-','');
		cuerpo = valor.slice(0,-1);
		dv = valor.slice(-1).toUpperCase();
		   rut_registro.value = cuerpo + '-'+ dv
		if(cuerpo.length < 7){ 
			rut_registro.setCustomValidity("RUT Incompleto"); 
			return false;
		}
		suma = 0;
		multiplo = 2;
		for(i=1;i<=cuerpo.length;i++){          
			index = multiplo * valor.charAt(cuerpo.length - i);        
			suma = suma + index;        
			if(multiplo < 7){ 
				multiplo = multiplo + 1;} 
			else{ 
				multiplo = 2; 
			}
		}
		// Calcular Dígito Verificador en base al Módulo 11
		dvEsperado = 11 - (suma % 11);
		// Casos Especiales (0 y K)
		dv = (dv == 'K')?10:dv;
		dv = (dv == 0)?11:dv;
		// Validar que el Cuerpo coincide con su Dígito Verificador
		if(dvEsperado != dv){ 
			rut_registro.setCustomValidity("RUT Inválido");
			return false; 
		}
		// Si todo sale bien, eliminar errores (decretar que es válido)
		rut_registro.setCustomValidity('');
	});
	
	$('#rut_registro').on('focusout',function(){
		rut = $(this).val();
		$.ajax({
			type:'POST',
			url:URL+'usuario/get_usuario',
			data:'rut='+rut,
			dataType:'html',
			success:function(data){
				/*$('alerta').prepend("Ests usuario ya existe");*/
				if(data.success){
					/*alert(data);*/
				}
			}
		})
	})
	$('.btn-exit-system').on('click', function(e){
		e.preventDefault();
		$(location).attr('href','http://localhost/Proyecto_Bodega/'); 
	});
	/*
	$('#region_in').change(function(){
		
		id=$(this).val();
		$('#ciudad').empty();  
		$.ajax({
			type:'POST',
			url: URL+'ciudad/getCityByRegion',
			data:'id_region_search='+id,
			dataType:'html',
			success:function(response){
				header('Content-type: text/plain');
				  $('#ciudad').prepend(response);	
			}
		});
	
	
	});*/
	$('#addProdPedido').click(function(){
		if($(this).val() !=''){
			id = $(this).val();
			$.ajax({
				type : 'POST',
				url  : 'helpers/utils.php',
				data: {cod_prod_search:id},
				cache:false,
				contenType: 'application/json; charset=utf-8',
				success:function(response){
					  // $('#tablaProdTrabajador').append(response);	
				},
	/*				error:function(){
					alert('Error');
				}*/
			});
		}
	});
	
	$('#codigo_producto').on('change',function(){
		
		if($(this).val() !=''){
			$('#tablaProductos tbody').empty();
			id = $(this).val();
			$.ajax({
				type : 'POST',
				url  : 'helpers/utils.php',
				data: {val_prod_search:id},
				cache:false,
				contenType: 'application/json; charset=utf-8',
				success:function(response){
					  $('#tablaProductos').append(response);	
				},
				error:function(){
					alert('Error');
	
				}
			});
		}
	});
	/*	$('#codigo_busca').on('change',function(){
		if($(this).val() !=''){
			$('#codProStock').attr($(this).val());
			id = $(this).val();
			$.ajax({
				type : 'POST',
				url  : 'helpers/utils.php',
				data: {codProd_search:id},
				cache:false,
				contenType: 'json',
				success:function(response){
					valor = reenplaza(response),
					  $('#codProStock').attr(valor);	
				},
				error:function(){
					alert('Error');
				}
			});
		}
	})*/
	
	/*  Exit system buttom */
	
	
	
	
	
	/*  ------------ Codigo de acciones y movimiento ----------------*/
	$('.show-nav-lateral').on('click', function(e){
		e.preventDefault();
		var NavLateral=$('.nav-lateral');
		var PageConten=$('.page-content');
	 if(NavLateral.hasClass('active')){
		NavLateral.removeClass('active');
		PageConten.removeClass('active');
	 }else{
		NavLateral.addClass('active');
		PageConten.addClass('active');
	}
	});
	// $('.show-nav-lateral').on('click', function(e){
	// 	e.preventDefault();
	// 	var NavLateral=$('.nav-lateral');
	// 	var PageConten=$('.page-content');
	//  if(NavLateral.hasClass('active')){
	// 	NavLateral.removeClass('active');
	// 	PageConten.removeClass('active');
	//  }else{
	// 	NavLateral.addClass('active');
	// 	PageConten.addClass('active');
	// }
	// });
	
	
	(function($){
		$(window).on("load",function(){
			$(".nav-lateral-content").mCustomScrollbar({
				theme:"light-thin",
				scrollbarPosition: "inside",
				autoHideScrollbar: true,
				scrollButtons: {enable: true}
			});
			$(".page-content").mCustomScrollbar({
				theme:"dark-thin",
				scrollbarPosition: "inside",
				autoHideScrollbar: true,
				scrollButtons: {enable: true}
			});
		});
	
	})(jQuery);
	
	$(function(){
	  $('[data-toggle="popover"]').popover()
	});
});