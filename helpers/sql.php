SELECT
    tbl_articulo_pedidos.id_pedimento,
	fecha,
	tbl_usuario.rut, 
    tbl_usuario.nombre,
    tbl_usuario.apellido,
    tbl_articulo_pedidos.producto_cod,
    tbl_producto.nombre,
    tbl_articulo_pedidos.cantidad
FROM `tbl_pedimento`AS TP
INNER JOIN tbl_usuario ON TP.id_usuario = tbl_usuario.id_user
INNER JOIN tbl_articulo_pedidos ON TP.id_pedimento = tbl_articulo_pedidos.id_pedimento
INNER JOIN tbl_producto ON tbl_articulo_pedidos.producto_cod = tbl_producto.cod_producto
WHERE fecha BETWEEN '2022-06-04' AND '2022-06-05'