


INSERT INTO `laravel-miggo`.`cloudmenus`
(`id`,
`descripcion`,
`url`,
`imagen`,
`orden`,
`administrador`,
`cloudmenu_id`,
`ayuda`)
VALUES (4,'GESTION DE PRODUCTOS','/productos/index','lgM_GESTION DE PRODUCTOS.ico',1,1,3,'Este modulo permite la creacion de items y para codificar cada producto del inventario ya sea su precio y/o nombre'),
(5,'GESTION MENUS NAVEGACION','/cloudmenus/index/','lgM_GESTION MENUS NAVEGACION.ico',2,0,9,NULL),
(6,'GESTION MENU - PERFIL','/cloudmenus_perfiles/index/','lgM_GESTION MENU - PERFIL.ico',3,0,9,NULL),
(7,'GESTION REGIMEN EMPRESA','/regimenes/index/','lgM_GESTION REGIMEN EMPRESA.png',4,0,9,NULL),
(8,'GESTION TIPO BODEGAS','/tipodepositos/index/','lgM_GESTION TIPO DEPOSITOS.ico',5,0,4,'MIGGO nos ayuda con la creacion de bodega que tendra el negocio, en las que se puede generar un listado de todas y buscar informacion sobre cada una de ellas'),
(9,'GESTION NOTAS CLIENTES','/anotaciones/index/','lgM_NOTAS.png',6,0,6,'Visualizacion de la base de datos personales de los clientes -creacion de cliente nuevo'),
(10,'VISUALIZAR AUDITORIAS','/auditorias/index/','lgM_AUDITORIAS.png',7,0,9,NULL),
(11,'INVENTARIO DE PRODUCTOS','/cargueinventarios/index/','lgM_INVENTARIO DE PRODUCTOS.ico',8,0,3,'Busca la disponibilidad y precios del producto con su referencia, codigo o nombre'),
(12,'CATEGORIAS DE PRODUCTOS','/categorias/index/','lgM_CATEGORIAS DE PRODUCTOS.ico',9,1,3,'MIGGO nos crea categorias para cada producto segun su actividad y agrupacion para cada producto'),
(13,'GESTION DE CIUDADES','/ciudades/index/','lgM_GESTION DE CIUDADES.ico',10,0,9,NULL),
(14,'GESTION DE CLIENTES','/clientes/index/','lgM_GESTION DE CLIENTES.ico',11,0,6,NULL),
(15,'GESTION DE BODEGAS','/depositos/index/','lgM_GESTION DE DEPOSITOS.png',12,0,4,'Puedes observar el comportamiento y rotacion de productos, clientes y bodegas, ademas darle tu propio manejo o modificar aquellas bodegas que te interesen ver mas en la primera pantalla del software'),
(16,'CLIENTES - BODEGAS','/depositos_clientes/index','lgM_CLIENTES - DEPOSITOS.ico',13,1,4,'Te permite ver los clientes que maneja por cada sede (bodega),
 de igual manera establecer la relacion entre el cliente y la bodega y te daras cuenta que clase de cliente es mas frecuente en cada bodega'),
(17,'USUARIOS - BODEGAS','/depositos_usuarios/index/','lgM_USUARIOS - DEPOSITOS.ico',14,1,4,'Facilita la habilitacion del usuario en las bodegas, es decir que nos permite que cada usuario esta habilitado para cada bodega'),
(18,'DESCARGAR INVENTARIO','/descargueinventarios/index','lgM_DESCARGAR INVENTARIO.png',15,0,3,'Cuando se encuentran diferencias en el inventario MIGGO permite realizar ajustes en este modulo'),
(19,'GESTION DE EMPRESAS','/empresas/index/','lgM_GESTION DE EMPRESAS.png',16,0,9,NULL),
(20,'GESTION DE IMPUESTOS','/impuestos/index/','lgM_GESTION DE IMPUESTOS.png',17,0,2,'Estos son los impuestos que maneja la empresa, IVA, Retefuente, Ica dependiente de tu actividad comercial'),
(21,'GESTION DE LICENCIAS','/licencias/index/','lgM_GESTION DE LICENCIAS.png',18,0,9,NULL),
(22,'EMPRESAS-LICENCIAS','/licencias_empresas/index','lgM_EMPRESAS-LICENCIAS.ico',19,1,9,NULL),
(23,'GESTION DE PAISES','/paises/index/','lgM_GESTION DE PAISES.ico',20,0,9,NULL),
(24,'GESTION DE PERFILES','/perfiles/index/','lgM_GESTION DE PERFILES.ico',21,0,9,NULL),
(25,'GESTION DE USUARIOS','/usuarios/index/','lgM_GESTION DE USUARIOS.ico',22,0,1,'Crear y determinar la participacion y el perfil del usuario que utilice el software'),
(26,'TIPOS DE PAGOS','/tipopagos/index/','lgM_TIPOS DE PAGOS.ico',23,0,1,'Especifica hacia que cuenta de caja va dirigido los pago que se realizan ya sea efectivo, cheque, transferencia(banco) etc.'),
(27,'GESTION DE PROVEEDORES','/proveedores/index','lgM_GESTION DE PROVEEDORES.png',24,0,3,'Con el nit o nombre puedes dar la busqueda de informacion de proveedores, sus datos basicos'),
(28,'GESTION DE DOCUMENTOS','/documentos/index','lgM_GESTION DE DOCUMENTOS.png',28,0,1,'Se generan registro de cada movimiento realizado en el inventario â€œtrasladosâ€ â€œcargue de inventarioâ€ y datos de quien lo realiza es decir el usuario quien maneja el software y tiene acceso a ingresar al inventario'),
(29,'CUENTAS POR PAGAR','/cuentaspendientes/index','lgM_CUENTAS POR PAGAR.ico',25,0,2,'Encontraras las facturas que estan pendiente por pago y las que estan vencidas'),
(30,'PREFACTURAS','/prefacturas/index','lgM_ORDEN DE PEDIDO.png',27,0,2,'Si presentas una orden de servicio que ya esta lista para facturar, visualizara la prefectura y llevaras un control de que lo que tienes pendiente por facturar'),
(31,'FACTURAR','/facturas/add','lgM_FACTURAR.png',26,0,2,'Aqui realizas las facturas a clientes, tambien te permite creacion del cliente y realizar una factura por venta rapida'),
(32,'CIERRE DIARIO','/facturas/cierrediario/','lgM_CIERRE DIARIO.ico',29,0,2,'Control de lo que se ha facturado, ingresos por cajas mayor. -puedes buscar cuadres de cajas de dias pasados'),
(33,'GESTION FACTURAS','/facturas/index/','lgM_GESTION FACTURAS.ico',30,0,2,'Archivo de facturas registradas, - las puedes buscar por su consecutivo o nombre del cliente'),
(34,'UTILIDAD POR VENTAS','/utilidades/index','lgM_UTILIDAD POR VENTAS.png',31,0,8,'Una vez determinado el valor de las ventas netas y el costo de lo vendido MIGGO hace un resultado de la utilidad en ventas en cada producto vendido a diario, permitiendo tambien realizar busquedas de dias pasados'),
(35,'CUENTAS POR COBRAR','/cuentasclientes/index','lgM_CUENTAS POR COBRAR.ico',32,0,2,'Se accede al listado de cuentas por cobrar pendientes a clientes. - si el registro se encuentra en verde es porque el saldo se encuentra vigente, si el registro se encuentra en rojo es porque el saldo se encuentra vencido'),
(36,'NOTAS FACTURAS','/notafacturas/index','lgM_NOTAS FACTURAS.png',33,0,2,'Permite la creacion de notas para posteriormente agregarlos a las facturas'),
(37,'RELACIONAR EMPRESA','/relacionempresas/index','lgM_RELACIONAR EMPRESA.ico',34,0,1,'De acuerdo al requerimiento y la figura del cliente, es posible crear la facturacion con su personalidad, entiendase natural o juridica. Para esto, MIGGO por medio de los datos suministrados creara la factura con la agilidad pertinente'),
(38,'TRASLADO DE INVENTARIO','/trasladoinventarios/index/','lgM_TRASLADO DE INVENTARIO.png',35,0,3,'Transferencia de producto, funciona para realizar transferencias de bodega a bodega'),
(39,'CUENTAS','/cuentas/index','lgM_CUENTAS.ico',36,0,1,'Se puede observar nombre de la cuenta, saldo disponible, fecha de creacion y numero de cuenta. Es decir, las cuentas de cajas que el negocio desarrolla'),
(40,'GASTOS','/gastos/index','lgM_GASTOS.ico',37,0,2,'permite el registro de los movimientos efectuados en una cuenta'),
(41,'MI EMPRESA','/empresas/view/','lgM_MI EMPRESA.png',38,0,1,'Suministra los principales datos de la empresa para que estos se vean reflejados en la factura'),
(42,'CAMBIAR PASSWORD','/usuarios/usercambiocontrasenia','lgM_CAMBIAR PASSWORD.jpg',39,0,1,NULL),
(43,'ORDENES DE TRABAJO','/ordentrabajos/index/','lgM_ORDENES DE TRABAJO.ico',40,0,5,'Nos permite crear una orden de servicio (OT) la cual se diligencia al momento del ingreso y toma del pedido. Tambien no permite ver el listado de las que estan por dias con la sei±alizacion de semaforo'),
(44,'VEHICULOS','/vehiculos/index/','lgM_VEHICULOS.png',42,0,7,'Podras crear el vehiculo segun tu tipo, modelo y linea; en caso que no este no exista en el software'),
(45,'TIPO VEHICULO - PARTE VEHICULO','/partevehiculos_tipovehiculos/index/','lgM_TIPO VEHICULO - PARTE VEHICULO.png',43,0,7,'Este modulo es basicamente informativo el servidor nos crea las lineas segun la marca que se maneje en el taller con todas sus partes para que al momento que crearlo nos permite elegir los que se requiere'),
(46,'TIPOS DE VEHICULOS','/tipovehiculos/index/','lgM_TIPOS DE VEHICULOS.png',44,0,7,'Este modulo es para caracterizar cada tipo de vehiculo, segun el taller automotriz en donde se atienden automoviles o motos es necesario crear todos los tipos de vehiculo del mercado'),
(47,'PARTES DE VEHICULOS','/partevehiculos/index/','lgM_PARTES DE VEHICULOS.png',45,0,7,'Este modulo complementa el modulo de VEHICULO, ahi se usa las partes que se requiera al momento de la creacion'),
(48,'REPORTE ORDENES POR MECANICO','/facturas/repOrdenesPorMecanico/','lgM_REPORTE ORDENES POR MECANICO.png',41,0,5,'Nos reporta las ordenes en proceso que tiene cada colaborador, nos permite revisar el tema de comisiones para el colaborar de planta'),
(49,'MARCAS DE VEHICULOS','/marcavehiculos/index/','lgM_MARCAS DE VEHICULOS.png',46,0,7,'El usuario debe ingresar que marcas automoviles o motocicletas'),
(50,'PLANTAS DE SERVICIO ','/plantaservicios/index/','lgM_PLANTAS DE SERVICIO .png',47,0,1,'MIGGO nos indica en que lugar se esta realizando el ajuste, donde se realizan los servicios es decir nos esta informando en que bodega o almacen estan'),
(52,'COTIZACIONES','/cotizaciones/index/','lgM_COTIZACIONES.png',48,0,2,'Permite crear los valores de un producto o servicio para clientes externos'),
(53,'COTIZACIONES','/cotizaciones/index/','lgM_COTIZACIONES.ico',49,0,NULL,NULL),
(54,'LISTA CIERRE DIARIO','/cierrecajas/index','lgM_LISTA CIERRE DIARIO.png',50,0,2,NULL),
(55,'ITEMS GASTOS','/Itemsgastos/index','lgM_ITEMS GASTOS.png',51,0,1,'Podemos crear items para saber los diferentes tipos de gastos'),
(56,'SEMAFOROS','/semaforos/index','lgM_SEMAFOROS.png',52,0,1,'MIGGO nos ayudas a organizar las ordenes en proceso categorizarlas por colores segun sus dias'),
(57,'FACTURAS','/facturas/indexfactclientes','lgM_SEMAFOROS.png',53,0,10,NULL),
(58,'ORDENES DE TRABAJO','/ordentrabajos/indexordclientes','lgM_SEMAFOROS.png',54,0,10,NULL),
(59,'PAGOS - FACTURAS','/factura_cuenta_valores/index','lgM_GESTION DE PRODUCTOS.ico',55,0,8,'Si quieres identificar cual ha sido el medio de pago mas usado, MIGGO nos permite ver el tipo de pago que uso el cliente, en momentos real y buscar dias pasados'),
(60,'CATEGORIAS','/categoriacompras/index','lgM_GESTION DE PRODUCTOS.ico',56,0,18,NULL),
(61,'RETEICA - RETEFUENTE','/reteicaretefuentes/index','lgM_GESTION DE PRODUCTOS.ico',57,0,18,NULL),
(62,'COMPRAS','/compras/index','lgM_GESTION DE PRODUCTOS.ico',58,0,18,NULL),
(63,'ALERTAS ORDEN TRABAJO','/alertaordenes/index','lgM_GESTION DE PRODUCTOS.ico',63,0,19,'En MIGGO se usa este modulo mas importante para el negocio, nos permite generar alertas a los cliente para realizar fidelizacion que nos ayuda a no perder el cliente, a realizar contacto proactivo donde se realizan llamadas y se anexa observaciones segun la conversacion con el cliente'),
(64,'FACTURAS - CLIENTES','/facturas/reportefacturasclientes','lgM_GESTION DE PRODUCTOS.ico',59,0,8,'Este modulo nos ayuda con un resumen donde se visualiza los servicios mas vendidos y los cliente frecuente que los compran'),
(65,'CALENDARIO','/calendarios/calendar/','lgM_GESTION DE LICENCIAS.png',65,0,19,'Es un organizador de por dias del mes donde se generan las alertas que se deben de llamar por dia y tambien permite generar citas que tenemos pendientes'),
(66,'EVENTOS','/eventos/index/','lgM_GESTION DE LICENCIAS.png',66,0,19,'Registrar las citas y reuniones que se tienen previstas con un responsable, una fecha y los datos basicos del cliente'),
(67,'ALERTAS FINALIZADAS','/alertaordenes/indexfinalizadas','lgM_GESTION DE PRODUCTOS.ico',64,0,19,'Son aquellas que estan en estado Exitoso es decir que ya se hizo la labor con el cliente de llamarlo y hace el proceso de fidelizacion'),
(68,'PREFACTURAS Y ORDENES EN GESTION','/ordentrabajos/ordenesPrefacturas','lgM_GESTION DE DOCUMENTOS.png',67,0,8,'MIGGO cuenta con este modulo el cual no informa que esta pendiente por facturar y las ordenes en proceso'),
(69,'PUBLICIDAD EN LA CABECERA','/publicidadmoviles/indexCabecera','lgM_GESTION DE PRODUCTOS.ico',69,0,1,'MIGGO cuenta con una app que permite que el cliente pueda acceder a ella y tener a la mano todo lo relacionado a su vehiculo, historial, ordenes en proceso y finalizadas, aqui se puede cargar imagenes que se visualizan en la APP el cliente estara mas informado sobre los productos o servicios de la empresa'),
(70,'PUBLICIDAD AL PIE','/publicidadmoviles/indexFooter','lgM_GESTION DE PRODUCTOS.ico',70,0,1,'Es la misma funcionalidad que la cabecera, pero esta se visualiza en la parte inferior de la APP'),
(71,'CARGAR INVENTARIO','/cargueinventarios/cargarinvpln/','lgM_INVENTARIO DE PRODUCTOS.ico',8,0,3,'Cuando se realiza inventarios fisicos se puede cargar el conteo en un formato Excel este permitiendo que se visualice en el software'),
(72,'ROTACION DE PRODUCTOS','/utilidades/rotacion','lgM_UTILIDAD POR VENTAS.png',31,0,8,'MIGGO permite El indice de rotacion diario de las existencias [comerciales, productos terminados, productos en curso de fabricacion, materias primas y auxiliares, etc.],
 indica cuantas veces las existencias totales se han renovado en un tiempo dado'),
(73,'ALERTA FACTURA','/alertaordenes/alertafacturas','lgM_UTILIDAD POR VENTAS.png',64,0,19,'GESTIONAR ALERTAS PARA FACTURAS Y PREFACTURAS'),
(74,'ALERTA GENERAL','/alertaordenes/alertas','lgM_UTILIDAD POR VENTAS.png',64,0,19,'GESTIONAR ALERTAS ');

