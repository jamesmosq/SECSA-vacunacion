<!--   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
.Estilo2 {font-weight: bold}
-->
</style>
<body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="application/javascript">

	function alerta(objeto)
	{
		if (objeto.value == "")
		{
			titulo = objeto.title;
			alert('Debe seleccionar o ingresar un valor en ' + titulo);
			objeto.focus();
		}
	}
	
	function ok()
	{
		if (document.getElementById('Fecha_movimiento').value == "")
		{
			alerta(document.getElementById('Fecha_movimiento'));
					return false;
		}

		if (document.getElementById('Temperatura').value == "")
		{
			alerta(document.getElementById('Temperatura'));
					return false;
		}


// Validacion par que los ingresos y las salidas no esten en blanco ""


		if (document.getElementById('BCG_Ingreso').value == "")
		{
			alerta(document.getElementById('BCG_Ingreso'));
					return false;
		}
		
		if (document.getElementById('BCG_Salida').value == "")
		{
			alerta(document.getElementById('BCG_Salida'));
					return false;
		}
		
		if (document.getElementById('VIP_Ingreso').value == "")
		{
			alerta(document.getElementById('VIP_Ingreso'));
					return false;
		}
		
		if (document.getElementById('VIP_Salida').value == "")
		{
			alerta(document.getElementById('VIP_Salida'));
					return false;
		}
		
		if (document.getElementById('VOP_Ingreso').value == "")
		{
			alerta(document.getElementById('VOP_Ingreso'));
					return false;
		}
		
		if (document.getElementById('VOP_Salida').value == "")
		{
			alerta(document.getElementById('VOP_Salida'));
					return false;
		}
		
		if (document.getElementById('PENTA_Ingreso').value == "")
		{
			alerta(document.getElementById('PENTA_Ingreso'));
					return false;
		}
		
		if (document.getElementById('PENTA_Salida').value == "")
		{
			alerta(document.getElementById('PENTA_Salida'));
					return false;
		}
		
		if (document.getElementById('HEXA_Ingreso').value == "")
		{
			alerta(document.getElementById('HEXA_Ingreso'));
					return false;
		}
		
		if (document.getElementById('HEXA_Salida').value == "")
		{
			alerta(document.getElementById('HEXA_Salida'));
					return false;
		}
		
		if (document.getElementById('DPT_Ingreso').value == "")
		{
			alerta(document.getElementById('DPT_Ingreso'));
					return false;
		}
		
		if (document.getElementById('DPT_Salida').value == "")
		{
			alerta(document.getElementById('DPT_Salida'));
					return false;
		}
		
		if (document.getElementById('DPaTped_Ingreso').value == "")
		{
			alerta(document.getElementById('DPaTped_Ingreso'));
					return false;
		}
		
		if (document.getElementById('DPaTped_Salida').value == "")
		{
			alerta(document.getElementById('DPaTped_Salida'));
					return false;
		}
		
		if (document.getElementById('TDped_Ingreso').value == "")
		{
			alerta(document.getElementById('TDped_Ingreso'));
					return false;
		}
		
		if (document.getElementById('TDped_Salida').value == "")
		{
			alerta(document.getElementById('TDped_Salida'));
					return false;
		}
		
		if (document.getElementById('HBped_Ingreso').value == "")
		{
			alerta(document.getElementById('HBped_Ingreso'));
					return false;
		}
		
		if (document.getElementById('HBped_Salida').value == "")
		{
			alerta(document.getElementById('HBped_Salida'));
					return false;
		}
		
		if (document.getElementById('HBadu_Ingreso').value == "")
		{
			alerta(document.getElementById('HBadu_Ingreso'));
					return false;
		}
		
		if (document.getElementById('HBadu_Salida').value == "")
		{
			alerta(document.getElementById('HBadu_Salida'));
					return false;
		}
		
		if (document.getElementById('Rota_Ingreso').value == "")
		{
			alerta(document.getElementById('Rota_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Rota_Salida').value == "")
		{
			alerta(document.getElementById('Rota_Salida'));
					return false;
		}
		
		if (document.getElementById('Neumo10_Ingreso').value == "")
		{
			alerta(document.getElementById('Neumo10_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Neumo10_Salida').value == "")
		{
			alerta(document.getElementById('Neumo10_Salida'));
					return false;
		}
		
		if (document.getElementById('Neumo13_Ingreso').value == "")
		{
			alerta(document.getElementById('Neumo13_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Neumo13_Salida').value == "")
		{
			alerta(document.getElementById('Neumo13_Salida'));
					return false;
		}
		
		if (document.getElementById('SRP_Ingreso').value == "")
		{
			alerta(document.getElementById('SRP_Ingreso'));
					return false;
		}
		
		if (document.getElementById('SRP_Salida').value == "")
		{
			alerta(document.getElementById('SRP_Salida'));
					return false;
		}
		
		if (document.getElementById('FA_Ingreso').value == "")
		{
			alerta(document.getElementById('FA_Ingreso'));
					return false;
		}
		
		if (document.getElementById('FA_Salida').value == "")
		{
			alerta(document.getElementById('FA_Salida'));
					return false;
		}
		
		if (document.getElementById('HAped_Ingreso').value == "")
		{
			alerta(document.getElementById('HAped_Ingreso'));
					return false;
		}
		
		if (document.getElementById('HAped_Salida').value == "")
		{
			alerta(document.getElementById('HAped_Salida'));
					return false;
		}
		
		if (document.getElementById('Meningo_Ingreso').value == "")
		{
			alerta(document.getElementById('Meningo_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Meningo_Salida').value == "")
		{
			alerta(document.getElementById('Meningo_Salida'));
					return false;
		}
		
		if (document.getElementById('Varicela_Ingreso').value == "")
		{
			alerta(document.getElementById('Varicela_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Varicela_Salida').value == "")
		{
			alerta(document.getElementById('Varicela_Salida'));
					return false;
		}
		
		if (document.getElementById('SR_Ingreso').value == "")
		{
			alerta(document.getElementById('SR_Ingreso'));
					return false;
		}
		
		if (document.getElementById('SR_Salida').value == "")
		{
			alerta(document.getElementById('SR_Salida'));
					return false;
		}
		
		if (document.getElementById('Tdadu_Ingreso').value == "")
		{
			alerta(document.getElementById('Tdadu_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Tdadu_Salida').value == "")
		{
			alerta(document.getElementById('Tdadu_Salida'));
					return false;
		}
		
		if (document.getElementById('DPaTadu_Ingreso').value == "")
		{
			alerta(document.getElementById('DPaTadu_Ingreso'));
					return false;
		}
		
		if (document.getElementById('DPaTadu_Salida').value == "")
		{
			alerta(document.getElementById('DPaTadu_Salida'));
					return false;
		}
		
		if (document.getElementById('Influenzaped_Ingreso').value == "")
		{
			alerta(document.getElementById('Influenzaped_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Influenzaped_Salida').value == "")
		{
			alerta(document.getElementById('Influenzaped_Salida'));
					return false;
		}
		
		if (document.getElementById('Antigripal_Ingreso').value == "")
		{
			alerta(document.getElementById('Antigripal_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Antigripal_Salida').value == "")
		{
			alerta(document.getElementById('Antigripal_Salida'));
					return false;
		}
		
		if (document.getElementById('VPH_Ingreso').value == "")
		{
			alerta(document.getElementById('VPH_Ingreso'));
					return false;
		}
		
		if (document.getElementById('VPH_Salida').value == "")
		{
			alerta(document.getElementById('VPH_Salida'));
					return false;
		}
		
		if (document.getElementById('VAH_Ingreso').value == "")
		{
			alerta(document.getElementById('VAH_Ingreso'));
					return false;
		}
		
		if (document.getElementById('VAH_Salida').value == "")
		{
			alerta(document.getElementById('VAH_Salida'));
					return false;
		}
		
		if (document.getElementById('IAH_Ingreso').value == "")
		{
			alerta(document.getElementById('IAH_Ingreso'));
					return false;
		}
		
		if (document.getElementById('IAH_Salida').value == "")
		{
			alerta(document.getElementById('IAH_Salida'));
					return false;
		}
		
		if (document.getElementById('IHB_Ingreso').value == "")
		{
			alerta(document.getElementById('IHB_Ingreso'));
					return false;
		}
		
		if (document.getElementById('IHB_Salida').value == "")
		{
			alerta(document.getElementById('IHB_Salida'));
					return false;
		}
		
		if (document.getElementById('Iglobulina_Ingreso').value == "")
		{
			alerta(document.getElementById('Iglobulina_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Iglobulina_Salida').value == "")
		{
			alerta(document.getElementById('Iglobulina_Salida'));
					return false;
		}
		
		if (document.getElementById('Antitetanica_Ingreso').value == "")
		{
			alerta(document.getElementById('Antitetanica_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Antitetanica_Salida').value == "")
		{
			alerta(document.getElementById('Antitetanica_Salida'));
					return false;
		}
		
		if (document.getElementById('Antidifterica_Ingreso').value == "")
		{
			alerta(document.getElementById('Antidifterica_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Antidifterica_Salida').value == "")
		{
			alerta(document.getElementById('Antidifterica_Salida'));
					return false;
		}
		
		if (document.getElementById('DBCG_Ingreso').value == "")
		{
			alerta(document.getElementById('DBCG_Ingreso'));
					return false;
		}
		
		if (document.getElementById('DBCG_Salida').value == "")
		{
			alerta(document.getElementById('DBCG_Salida'));
					return false;
		}
		
		if (document.getElementById('DSRP_Ingreso').value == "")
		{
			alerta(document.getElementById('DSRP_Ingreso'));
					return false;
		}
		
		if (document.getElementById('DSRP_Salida').value == "")
		{
			alerta(document.getElementById('DSRP_Salida'));
					return false;
		}
		
		if (document.getElementById('DSR_Ingreso').value == "")
		{
			alerta(document.getElementById('DSR_Ingreso'));
					return false;
		}
		
		if (document.getElementById('DSR_Salida').value == "")
		{
			alerta(document.getElementById('DSR_Salida'));
					return false;
		}
		
		if (document.getElementById('DFA_Ingreso').value == "")
		{
			alerta(document.getElementById('DFA_Ingreso'));
					return false;
		}
		
		if (document.getElementById('DFA_Salida').value == "")
		{
			alerta(document.getElementById('DFA_Salida'));
					return false;
		}
		
		if (document.getElementById('Dvaricela_Ingreso').value == "")
		{
			alerta(document.getElementById('Dvaricela_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Dvaricela_Salida').value == "")
		{
			alerta(document.getElementById('Dvaricela_Salida'));
					return false;
		}
		
		if (document.getElementById('DVAH_Ingreso').value == "")
		{
			alerta(document.getElementById('DVAH_Ingreso'));
					return false;
		}
		
		if (document.getElementById('DVAH_Salida').value == "")
		{
			alerta(document.getElementById('DVAH_Salida'));
					return false;
		}
		
		if (document.getElementById('Smeningo_Ingreso').value == "")
		{
			alerta(document.getElementById('Smeningo_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Smeningo_Salida').value == "")
		{
			alerta(document.getElementById('Smeningo_Salida'));
					return false;
		}
		
		if (document.getElementById('J22auto_Ingreso').value == "")
		{
			alerta(document.getElementById('J22auto_Ingreso'));
					return false;
		}
		
		if (document.getElementById('J22auto_Salida').value == "")
		{
			alerta(document.getElementById('J22auto_Salida'));
					return false;
		}
		
		if (document.getElementById('J22con_Ingreso').value == "")
		{
			alerta(document.getElementById('J22con_Ingreso'));
					return false;
		}
		
		if (document.getElementById('J22con_Salida').value == "")
		{
			alerta(document.getElementById('J22con_Salida'));
					return false;
		}
		
		if (document.getElementById('J23auto_Ingreso').value == "")
		{
			alerta(document.getElementById('J23auto_Ingreso'));
					return false;
		}
		
		if (document.getElementById('J23auto_Salida').value == "")
		{
			alerta(document.getElementById('J23auto_Salida'));
					return false;
		}
		
		if (document.getElementById('J23con_Ingreso').value == "")
		{
			alerta(document.getElementById('J23con_Ingreso'));
					return false;
		}
		
		if (document.getElementById('J23con_Salida').value == "")
		{
			alerta(document.getElementById('J23con_Salida'));
					return false;
		}
		
		if (document.getElementById('J25auto_Ingreso').value == "")
		{
			alerta(document.getElementById('J25auto_Ingreso'));
					return false;
		}
		
		if (document.getElementById('J25auto_Salida').value == "")
		{
			alerta(document.getElementById('J25auto_Salida'));
					return false;
		}
		
		if (document.getElementById('J25con_Ingreso').value == "")
		{
			alerta(document.getElementById('J25con_Ingreso'));
					return false;
		}
		
		if (document.getElementById('J25con_Salida').value == "")
		{
			alerta(document.getElementById('J25con_Salida'));
					return false;
		}
		
		if (document.getElementById('J26auto_Ingreso').value == "")
		{
			alerta(document.getElementById('J26auto_Ingreso'));
					return false;
		}
		
		if (document.getElementById('J26auto_Salida').value == "")
		{
			alerta(document.getElementById('J26auto_Salida'));
					return false;
		}
		
		if (document.getElementById('J26con_Ingreso').value == "")
		{
			alerta(document.getElementById('J26con_Ingreso'));
					return false;
		}
		
		if (document.getElementById('J26con_Salida').value == "")
		{
			alerta(document.getElementById('J26con_Salida'));
					return false;
		}
		
		if (document.getElementById('J27_Ingreso').value == "")
		{
			alerta(document.getElementById('J27_Ingreso'));
					return false;
		}
		
		if (document.getElementById('J27_Salida').value == "")
		{
			alerta(document.getElementById('J27_Salida'));
					return false;
		}
		
		if (document.getElementById('Gotero_Ingreso').value == "")
		{
			alerta(document.getElementById('Gotero_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Gotero_Salida').value == "")
		{
			alerta(document.getElementById('Gotero_Salida'));
					return false;
		}
		
		if (document.getElementById('Cinfantil_Ingreso').value == "")
		{
			alerta(document.getElementById('Cinfantil_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Cinfantil_Salida').value == "")
		{
			alerta(document.getElementById('Cinfantil_Salida'));
					return false;
		}
		
		if (document.getElementById('Cadulto_Ingreso').value == "")
		{
			alerta(document.getElementById('Cadulto_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Cadulto_Salida').value == "")
		{
			alerta(document.getElementById('Cadulto_Salida'));
					return false;
		}
		
		if (document.getElementById('Cinternacional_Ingreso').value == "")
		{
			alerta(document.getElementById('Cinternacional_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Cinternacional_Salida').value == "")
		{
			alerta(document.getElementById('Cinternacional_Salida'));
					return false;
		}
		
		if (document.getElementById('Tadulto_Ingreso').value == "")
		{
			alerta(document.getElementById('Tadulto_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Tadulto_Salida').value == "")
		{
			alerta(document.getElementById('Tadulto_Salida'));
					return false;
		}
		
		if (document.getElementById('Tnino_Ingreso').value == "")
		{
			alerta(document.getElementById('Tnino_Ingreso'));
					return false;
		}
		
		if (document.getElementById('Tnino_Salida').value == "")
		{
			alerta(document.getElementById('Tnino_Salida'));
					return false;
		}
		
		
		
		
		
//  Termina Validacion par que los ingresos y las salidas no esten en blanco ""

		vsumaBCG = parseInt(document.getElementById('BCG_Ingreso').value) + parseInt(document.getElementById('BCG_Salida').value);
		
							
		if  ((document.getElementById('BCG_lote').value == "") && vsumaBCG > 0)
		{
			alerta(document.getElementById('BCG_lote'));
					return false;
		}
		
		vsumaVIP = parseInt(document.getElementById('VIP_Ingreso').value) + parseInt(document.getElementById('VIP_Salida').value);
							
		if  ((document.getElementById('VIP_lote').value == "") && vsumaVIP > 0)
		{
			alerta(document.getElementById('VIP_lote'));
					return false;
		}

		vsumaVOP = parseInt(document.getElementById('VOP_Ingreso').value) + parseInt(document.getElementById('VOP_Salida').value);
							
		if  ((document.getElementById('VOP_lote').value == "") && vsumaVOP > 0)
		{
			alerta(document.getElementById('VOP_lote'));
					return false;
		}

		vsumaPENTA = parseInt(document.getElementById('PENTA_Ingreso').value) + parseInt(document.getElementById('PENTA_Salida').value);
							
		if  ((document.getElementById('PENTA_lote').value == "") && vsumaPENTA > 0)
		{
			alerta(document.getElementById('PENTA_lote'));
					return false;
		}

		vsumaHEXA = parseInt(document.getElementById('HEXA_Ingreso').value) + parseInt(document.getElementById('HEXA_Salida').value);
							
		if  ((document.getElementById('HEXA_lote').value == "") && vsumaHEXA > 0)
		{
			alerta(document.getElementById('HEXA_lote'));
					return false;
		}

		vsumaDPT = parseInt(document.getElementById('DPT_Ingreso').value) + parseInt(document.getElementById('DPT_Salida').value);
							
		if  ((document.getElementById('DPT_lote').value == "") && vsumaDPT > 0)
		{
			alerta(document.getElementById('DPT_lote'));
					return false;
		}

		vsumaDPaTped = parseInt(document.getElementById('DPaTped_Ingreso').value) + parseInt(document.getElementById('DPaTped_Salida').value);
							
		if  ((document.getElementById('DPaTped_lote').value == "") && vsumaDPaTped > 0)
		{
			alerta(document.getElementById('DPaTped_lote'));
					return false;
		}

		vsumaTDped = parseInt(document.getElementById('TDped_Ingreso').value) + parseInt(document.getElementById('TDped_Salida').value);
							
		if  ((document.getElementById('TDped_lote').value == "") && vsumaTDped > 0)
		{
			alerta(document.getElementById('TDped_lote'));
					return false;
		}

		vsumaHBped = parseInt(document.getElementById('HBped_Ingreso').value) + parseInt(document.getElementById('HBped_Salida').value);
							
		if  ((document.getElementById('HBped_lote').value == "") && vsumaHBped > 0)
		{
			alerta(document.getElementById('HBped_lote'));
					return false;
		}

		vsumaHBadu = parseInt(document.getElementById('HBadu_Ingreso').value) + parseInt(document.getElementById('HBadu_Salida').value);
							
		if  ((document.getElementById('HBadu_lote').value == "") && vsumaHBadu > 0)
		{
			alerta(document.getElementById('HBadu_lote'));
					return false;
		}

		vsumaRota = parseInt(document.getElementById('Rota_Ingreso').value) + parseInt(document.getElementById('Rota_Salida').value);
					
		if  ((document.getElementById('Rota_lote').value == "") && vsumaRota > 0)
		{
			alerta(document.getElementById('Rota_lote'));
					return false;
		}	
	
		vsumaNeumo10 = parseInt(document.getElementById('Neumo10_Ingreso').value) + parseInt(document.getElementById('Neumo10_Salida').value);
							
		if  ((document.getElementById('Neumo10_lote').value == "") && vsumaNeumo10 > 0)
		{
			alerta(document.getElementById('Neumo10_lote'));
					return false;
		}
	
			vsumaNeumo13 = parseInt(document.getElementById('Neumo13_Ingreso').value) + parseInt(document.getElementById('Neumo13_Salida').value);
							
		if  ((document.getElementById('Neumo13_lote').value == "") && vsumaNeumo13 > 0)
		{
			alerta(document.getElementById('Neumo13_lote'));
					return false;
		}
	
	   	vsumaSRP = parseInt(document.getElementById('SRP_Ingreso').value) + parseInt(document.getElementById('SRP_Salida').value);
							
		if  ((document.getElementById('SRP_lote').value == "") && vsumaSRP > 0)
		{
			alerta(document.getElementById('SRP_lote'));
					return false;
		}
	
	vsumaFA = parseInt(document.getElementById('FA_Ingreso').value) + parseInt(document.getElementById('FA_Salida').value);
							
		if  ((document.getElementById('FA_lote').value == "") && vsumaFA > 0)
		{
			alerta(document.getElementById('FA_lote'));
					return false;
		}
	
	
	vsumaHAped = parseInt(document.getElementById('HAped_Ingreso').value) + parseInt(document.getElementById('HAped_Salida').value);
							
		if  ((document.getElementById('HAped_lote').value == "") && vsumaHAped > 0)
		{
			alerta(document.getElementById('HAped_lote'));
					return false;
		}
	
	
	vsumaMeningo = parseInt(document.getElementById('Meningo_Ingreso').value) + parseInt(document.getElementById('Meningo_Salida').value);
							
		if  ((document.getElementById('Meningo_lote').value == "") && vsumaMeningo > 0)
		{
			alerta(document.getElementById('Meningo_lote'));
					return false;
		}
	
	vsumaVaricela = parseInt(document.getElementById('Varicela_Ingreso').value) + parseInt(document.getElementById('Varicela_Salida').value);
							
		if  ((document.getElementById('Varicela_lote').value == "") && vsumaVaricela > 0)
		{
			alerta(document.getElementById('Varicela_lote'));
					return false;
		}
	
	
	vsumaSR = parseInt(document.getElementById('SR_Ingreso').value) + parseInt(document.getElementById('SR_Salida').value);
							
		if  ((document.getElementById('SR_lote').value == "") && vsumaSR > 0)
		{
			alerta(document.getElementById('SR_lote'));
					return false;
		}

	
	vsumaTdadu = parseInt(document.getElementById('Tdadu_Ingreso').value) + parseInt(document.getElementById('Tdadu_Salida').value);
							
		if  ((document.getElementById('Tdadu_lote').value == "") && vsumaTdadu > 0)
		{
			alerta(document.getElementById('Tdadu_lote'));
					return false;
		}
	
	
	
	
	vsumaDPaTadu = parseInt(document.getElementById('DPaTadu_Ingreso').value) + parseInt(document.getElementById('DPaTadu_Salida').value);
							
		if  ((document.getElementById('DPaTadu_lote').value == "") && vsumaDPaTadu > 0)
		{
			alerta(document.getElementById('DPaTadu_lote'));
					return false;
		}
	
	
	vsumaInfluenzaped = parseInt(document.getElementById('Influenzaped_Ingreso').value) + parseInt(document.getElementById('Influenzaped_Salida').value);
							
		if  ((document.getElementById('Influenzaped_lote').value == "") && vsumaInfluenzaped > 0)
		{
			alerta(document.getElementById('Influenzaped_lote'));
					return false;
		}
	
	vsumaAntigripal = parseInt(document.getElementById('Antigripal_Ingreso').value) + parseInt(document.getElementById('Antigripal_Salida').value);
							
		if  ((document.getElementById('Antigripal_lote').value == "") && vsumaAntigripal > 0)
		{
			alerta(document.getElementById('Antigripal_lote'));
					return false;
		}
	
	
	vsumaVPH = parseInt(document.getElementById('VPH_Ingreso').value) + parseInt(document.getElementById('VPH_Salida').value);
							
		if  ((document.getElementById('VPH_lote').value == "") && vsumaVPH > 0)
		{
			alerta(document.getElementById('VPH_lote'));
					return false;
		}
	
	
	vsumaVAH = parseInt(document.getElementById('VAH_Ingreso').value) + parseInt(document.getElementById('VAH_Salida').value);
							
		if  ((document.getElementById('VAH_lote').value == "") && vsumaVAH > 0)
		{
			alerta(document.getElementById('VAH_lote'));
					return false;
		}
	
	
	vsumaIAH = parseInt(document.getElementById('IAH_Ingreso').value) + parseInt(document.getElementById('IAH_Salida').value);
							
		if  ((document.getElementById('IAH_lote').value == "") && vsumaIAH > 0)
		{
			alerta(document.getElementById('IAH_lote'));
					return false;
		}

	
	
	vsumaIHB = parseInt(document.getElementById('IHB_Ingreso').value) + parseInt(document.getElementById('IHB_Salida').value);
							
		if  ((document.getElementById('IHB_lote').value == "") && vsumaIHB > 0)
		{
			alerta(document.getElementById('IHB_lote'));
					return false;
		}

	
	vsumaIglobulina = parseInt(document.getElementById('Iglobulina_Ingreso').value) + parseInt(document.getElementById('Iglobulina_Salida').value);
							
		if  ((document.getElementById('Iglobulina_lote').value == "") && vsumaIglobulina > 0)
		{
			alerta(document.getElementById('Iglobulina_lote'));
					return false;
		}
	
	
	vsumaAntitetanica = parseInt(document.getElementById('Antitetanica_Ingreso').value) + parseInt(document.getElementById('Antitetanica_Salida').value);
							
		if  ((document.getElementById('Antitetanica_lote').value == "") && vsumaAntitetanica > 0)
		{
			alerta(document.getElementById('Antitetanica_lote'));
					return false;
		}
	
	
	
	
	vsumaAntidifterica = parseInt(document.getElementById('Antidifterica_Ingreso').value) + parseInt(document.getElementById('Antidifterica_Salida').value);
							
		if  ((document.getElementById('Antidifterica_lote').value == "") && vsumaAntidifterica > 0)
		{
			alerta(document.getElementById('Antidifterica_lote'));
					return false;
		}
	
	
	vsumaDBCG = parseInt(document.getElementById('DBCG_Ingreso').value) + parseInt(document.getElementById('DBCG_Salida').value);
							
		if  ((document.getElementById('DBCG_lote').value == "") && vsumaDBCG > 0)
		{
			alerta(document.getElementById('DBCG_lote'));
					return false;
		}

	
	
	vsumaDSRP = parseInt(document.getElementById('DSRP_Ingreso').value) + parseInt(document.getElementById('DSRP_Salida').value);
							
		if  ((document.getElementById('DSRP_lote').value == "") && vsumaDSRP > 0)
		{
			alerta(document.getElementById('DSRP_lote'));
					return false;
		}

	vsumaDSR = parseInt(document.getElementById('DSR_Ingreso').value) + parseInt(document.getElementById('DSR_Salida').value);
							
		if  ((document.getElementById('DSR_lote').value == "") && vsumaDSR > 0)
		{
			alerta(document.getElementById('DSR_lote'));
					return false;
		}
	
	
	vsumaDFA = parseInt(document.getElementById('DFA_Ingreso').value) + parseInt(document.getElementById('DFA_Salida').value);
							
		if  ((document.getElementById('DFA_lote').value == "") && vsumaDFA > 0)
		{
			alerta(document.getElementById('DFA_lote'));
					return false;
		}
	
	
	vsumaDvaricela = parseInt(document.getElementById('Dvaricela_Ingreso').value) + parseInt(document.getElementById('Dvaricela_Salida').value);
							
		if  ((document.getElementById('Dvaricela_lote').value == "") && vsumaDvaricela > 0)
		{
			alerta(document.getElementById('Dvaricela_lote'));
					return false;
		}
	
	vsumaDVAH = parseInt(document.getElementById('DVAH_Ingreso').value) + parseInt(document.getElementById('DVAH_Salida').value);
							
		if  ((document.getElementById('DVAH_lote').value == "") && vsumaDVAH > 0)
		{
			alerta(document.getElementById('DVAH_lote'));
					return false;
		}
vsumaSmeningo = parseInt(document.getElementById('Smeningo_Ingreso').value) + parseInt(document.getElementById('Smeningo_Salida').value);
							
		if  ((document.getElementById('Smeningo_lote').value == "") && vsumaSmeningo > 0)
		{
			alerta(document.getElementById('Smeningo_lote'));
					return false;
		}

vsumaJ22auto = parseInt(document.getElementById('J22auto_Ingreso').value) + parseInt(document.getElementById('J22auto_Salida').value);
							
		if  ((document.getElementById('J22auto_lote').value == "") && vsumaJ22auto > 0)
		{
			alerta(document.getElementById('J22auto_lote'));
					return false;
		}

vsumaJ22con = parseInt(document.getElementById('J22con_Ingreso').value) + parseInt(document.getElementById('J22con_Salida').value);
							
		if  ((document.getElementById('J22con_lote').value == "") && vsumaJ22con > 0)
		{
			alerta(document.getElementById('J22con_lote'));
					return false;
		}

vsumaJ23auto = parseInt(document.getElementById('J23auto_Ingreso').value) + parseInt(document.getElementById('J23auto_Salida').value);
							
		if  ((document.getElementById('J23auto_lote').value == "") && vsumaJ23auto > 0)
		{
			alerta(document.getElementById('J23auto_lote'));
					return false;
		}

vsumaJ23con = parseInt(document.getElementById('J23con_Ingreso').value) + parseInt(document.getElementById('J23con_Salida').value);
							
		if  ((document.getElementById('J23con_lote').value == "") && vsumaJ23con > 0)
		{
			alerta(document.getElementById('J23con_lote'));
					return false;
		}

vsumaJ25auto = parseInt(document.getElementById('J25auto_Ingreso').value) + parseInt(document.getElementById('J25auto_Salida').value);
							
		if  ((document.getElementById('J25auto_lote').value == "") && vsumaJ25auto > 0)
		{
			alerta(document.getElementById('J25auto_lote'));
					return false;
		}

vsumaJ25con = parseInt(document.getElementById('J25con_Ingreso').value) + parseInt(document.getElementById('J25con_Salida').value);
							
		if  ((document.getElementById('J25con_lote').value == "") && vsumaJ25con > 0)
		{
			alerta(document.getElementById('J25con_lote'));
					return false;
		}

vsumaJ26auto = parseInt(document.getElementById('J26auto_Ingreso').value) + parseInt(document.getElementById('J26auto_Salida').value);
							
		if  ((document.getElementById('J26auto_lote').value == "") && vsumaJ26auto > 0)
		{
			alerta(document.getElementById('J26auto_lote'));
					return false;
		}

vsumaJ26con = parseInt(document.getElementById('J26con_Ingreso').value) + parseInt(document.getElementById('J26con_Salida').value);
							
		if  ((document.getElementById('J26con_lote').value == "") && vsumaJ26con > 0)
		{
			alerta(document.getElementById('J26con_lote'));
					return false;
		}

vsumaJ27 = parseInt(document.getElementById('J27_Ingreso').value) + parseInt(document.getElementById('J27_Salida').value);
							
		if  ((document.getElementById('J27_lote').value == "") && vsumaJ27 > 0)
		{
			alerta(document.getElementById('J27_lote'));
					return false;
		}

vsumaGotero = parseInt(document.getElementById('Gotero_Ingreso').value) + parseInt(document.getElementById('Gotero_Salida').value);
							
		if  ((document.getElementById('Gotero_lote').value == "") && vsumaGotero > 0)
		{
			alerta(document.getElementById('Gotero_lote'));
					return false;
		}

		vsumaCinfantil = parseInt(document.getElementById('Cinfantil_Ingreso').value) + parseInt(document.getElementById('Cinfantil_Salida').value);
							
		if  ((document.getElementById('Cinfantil_lote').value == "") && vsumaCinfantil > 0)
		{
			alerta(document.getElementById('Cinfantil_lote'));
					return false;
		}

		vsumaCadulto = parseInt(document.getElementById('Cadulto_Ingreso').value) + parseInt(document.getElementById('Cadulto_Salida').value);
							
		if  ((document.getElementById('Cadulto_lote').value == "") && vsumaCadulto > 0)
		{
			alerta(document.getElementById('Cadulto_lote'));
					return false;
		}

		vsumaCinternacional = parseInt(document.getElementById('Cinternacional_Ingreso').value) + parseInt(document.getElementById('Cinternacional_Salida').value);
							
		if  ((document.getElementById('Cinternacional_lote').value == "") && vsumaCinternacional > 0)
		{
			alerta(document.getElementById('Cinternacional_lote'));
					return false;
		}

		vsumaTadulto = parseInt(document.getElementById('Tadulto_Ingreso').value) + parseInt(document.getElementById('Tadulto_Salida').value);
							
		if  ((document.getElementById('Tadulto_lote').value == "") && vsumaTadulto > 0)
		{
			alerta(document.getElementById('Tadulto_lote'));
					return false;
		}

		vsumaTnino = parseInt(document.getElementById('Tnino_Ingreso').value) + parseInt(document.getElementById('Tnino_Salida').value);
							
		if  ((document.getElementById('Tnino_lote').value == "") && vsumaTnino > 0)
		{
			alerta(document.getElementById('Tnino_lote'));
					return false;
		}

	
		document.form1.submit();
	}
	
	function validar()
	{

		if (document.getElementById('Identificacion').value == "")
		{
			alerta(document.getElementById('Identificaci?n no puede ser vac?a'));
					return false;
		}
		document.form1.submit();
	}

// function Fedad(){
//	fecha = new Date(document.getElementById('Fecha_nacimiento').value);
//	hoy = new Date(document.getElementById('Fecha').value);
//	ed = parseInt((hoy -fecha)/365/24/60/60/1000);
//	if (isNaN(ed)) return null; else return ed;
// }
		
		
</script>
</head>

<?php
//session_start();
require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);
$editFormAction = "Ingreso_exitoso_datos_movimiento.php"; 



if(empty($_POST["Institucion"])) 
	$Institucion = $_GET["vid"];
else
	$Institucion = $_POST["Institucion"];


//$query_Recordset1 = ("SELECT * FROM movimiento WHERE Institucion='".$cbo_institucion."'");
$query_Recordset1 = ("SELECT Nombre_institucion FROM institucion WHERE Nombre_institucion='".$Institucion."'");
$Recordset1 = mysqli_query($vacunacion, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

//ECHO "<br> NUMERO DE institucion:".$Institucion

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INGRESO MOVIMIENTO VACUNACION</title>
</head>
<body>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
   <P>
  <div align="center"><strong>MOVIMIENTO VACUNACION</strong></div>
 
  <table align="center">
       	<tr valign="baseline">
			<td nowrap="nowrap" align="right"><div align="left"><strong>Institucion:</strong></div></td>
			  <td><input type="text" name="Institucion" id="Institucion" value="<?php echo utf8_encode($row_Recordset1['Nombre_institucion']); ?>" readOnly="readOnly" size="32" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Institucion"/>
		   </tr>
					  
			<tr valign="baseline">
				<td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Fecha de movimiento:</strong></div></td>
				<td><input type="date" name="Fecha_movimiento" id="Fecha_movimiento" value="" size="32" title="Fecha_movimiento"/></td>
			</tr>	   
			   
			  <tr valign="baseline">
			<td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Temperatura:</strong></div></td>
			  <td><input type="text" name="Temperatura" id="Temperatura" value="" size="32" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Temperatura"/>
		   </tr>
			  
			  
			  
			  
			  
		<!-- Consulta para hacer el consecutivo para el numero de pedido -->
			 <?php  
				$consulta= ("SELECT * FROM pedido"); 
				$resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
				$numero = mysqli_num_rows($resultado);
			 ?> 
		  
			<tr valign="baseline">
				<td nowrap="nowrap" align="right"><div align="left"><strong>Numero pedido:</strong></div></td>
				<td><input type="int" name="Nro_pedido" id="Nro_pedido" value="<?php echo ($numero+1); ?>" readOnly="readOnly" size="32" title="Nro_pedido"/></td>
			</tr>	   
			   
	 </table>


<!-------------------------------------------------------------------------BCG ------------------------------------------------------->

   <table>
   
   <tr valign="baseline">
   <td nowrap="nowrap" align="right"><div align="center"><strong>Biológico</strong></div></td>
   <td nowrap="nowrap" align="right"><div align="center"><strong>Lote</strong></div></td>
   <td nowrap="nowrap" align="right"><div align="center"><strong>Ingreso a cava</strong></div></td>
    <td nowrap="nowrap" align="right"><div align="center"><strong>Asignación a IPS</strong></div></td>
	<td nowrap="nowrap" align="right"><div align="center"><strong>Tipo Id</strong></div></td>
	<td nowrap="nowrap" align="right"><div align="center"><strong>Identificación:</strong></div></td>
	<td nowrap="nowrap" align="right"><div align="center"><strong>Nombres y apellidos:</strong></div></td>
	
    </tr>	
   
	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>BCG:</strong></div></td>
		<td><select input type="text" name="BCG_lote" id="BCG_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="BCG_lote"> 
		<?php  
		
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote, saldo FROM `tbl_lote` WHERE insumo='BCG' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['BCG_lote']."\">".$row_Recordset1['BCG_lote']."</option>\n";   
			 			      
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
			 }
	 
		  ?> 
      </select> 

 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="BCG_Ingreso" id="BCG_Ingreso" value="0"  size="10" oninput="this.value = this.value.replace(/[^0-9]/g,'')" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="BCG_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="BCG_Salida" id="BCG_Salida" value="0" size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="BCG_Salida"/>
      </td>
   
     </tr>	
  
	 
	 
	 <!-------------------------------------------------------------------------VIP ------------------------------------------------------->

 
	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>VIP (Vacuna Inyectable de Polio):</strong></div></td>
		<td><select input type="text" name="VIP_lote" id="VIP_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="VIP_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='VIP (Vacuna Inyectable de Polio)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['VIP_lote']."\">".$row_Recordset1['VIP_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td>  -->
         <td><input type="number" name="VIP_Ingreso" id="VIP_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="VIP_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="VIP_Salida" id="VIP_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="VIP_Salida"/>
      </td>
   
     </tr>	
	 
	 
	 
	  <!-------------------------------------------------------------------------VOP ------------------------------------------------------->

 
	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>VOP (Vacuna Oral de Polio):</strong></div></td>
		<td><select input type="text" name="VOP_lote" id="VOP_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="VOP_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='VOP (Vacuna Oral de Polio)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['VOP_lote']."\">".$row_Recordset1['VOP_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

      <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="VOP_Ingreso" id="VOP_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="VOP_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="VOP_Salida" id="VOP_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="VOP_Salida"/>
      </td>
   
     </tr>	
	 
	 
	  <!-------------------------------------------------------------------------Pentavalente ------------------------------------------------------->

 
	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Pentavalente:</strong></div></td>
		<td><select input type="text" name="PENTA_lote" id="PENTA_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="PENTA_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Pentavalente' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['PENTA_lote']."\">".$row_Recordset1['PENTA_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="PENTA_Ingreso" id="PENTA_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="PENTA_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td>  -->
		 <td><input type="number" name="PENTA_Salida" id="PENTA_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="PENTA_Salida"/>
      </td>
   
     </tr>	
	 
	
	<!-------------------------------------------------------------------------Hexavalente ------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Hexavalente:</strong></div></td>
		<td><select input type="text" name="HEXA_lote" id="HEXA_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="HEXA_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Hexavalente' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['HEXA_lote']."\">".$row_Recordset1['HEXA_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td>  -->
         <td><input type="number" name="HEXA_Ingreso" id="HEXA_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="HEXA_Ingreso"/>
      </td>

      <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td>  -->
		 <td><input type="number" name="HEXA_Salida" id="HEXA_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="HEXA_Salida"/>
      </td>
   
     </tr>	
	 
	 
	 <!-------------------------------------------------------------------------DPT (Difteria, Tos ferina y Tétanos) ------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>DPT (Difteria, Tos ferina y Tétanos):</strong></div></td>
		<td><select input type="text" name="DPT_lote" id="DPT_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="DPT_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='DPT (Difteria, Tos ferina y Tétanos)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['DPT_lote']."\">".$row_Recordset1['DPT_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td>  -->
         <td><input type="number" name="DPT_Ingreso" id="DPT_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DPT_Ingreso"/>
      </td>

      <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="DPT_Salida" id="DPT_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DPT_Salida"/>
      </td>
   
     </tr>	
	
	 
	 
	  <!-------------------------------------------------------------------------DPaT (Pediátrica) ------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>DPaT (Pediátrica):</strong></div></td>
		<td><select input type="text" name="DPaTped_lote" id="DPaTped_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="DPaTped_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='DPaT (Pediátrica)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['DPaTped_lote']."\">".$row_Recordset1['DPaTped_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td>  -->
         <td><input type="number" name="DPaTped_Ingreso" id="DPaTped_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DPaTped_Ingreso"/>
      </td>

      <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="DPaTped_Salida" id="DPaTped_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DPaTped_Salida"/>
      </td>
   
     </tr>	
	 
	 
	 
	  <!-------------------------------------------------------------------------TD (Pediátrica)------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>TD (Pediátrica):</strong></div></td>
		<td><select input type="text" name="TDped_lote" id="TDped_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="TDped_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='TD (Pediátrica)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['TDped_lote']."\">".$row_Recordset1['TDped_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="TDped_Ingreso" id="TDped_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="TDped_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="TDped_Salida" id="TDped_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="TDped_Salida"/>
      </td>
   
     </tr>	
	 
	 
	 <!-------------------------------------------------------------------------Hepatitis B (Pediátrica)------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Hepatitis B (Pediátrica):</strong></div></td>
		<td><select input type="text" name="HBped_lote" id="HBped_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="HBped_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Hepatitis B (Pediátrica)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['HBped_lote']."\">".$row_Recordset1['HBped_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="HBped_Ingreso" id="HBped_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="HBped_Ingreso"/>
      </td>

      <!--<td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="HBped_Salida" id="HBped_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="HBped_Salida"/>
      </td>
   
     </tr>	
	 
	 
	  <!-------------------------------------------------------------------------Hepatitis B (Adulto)------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Hepatitis B (Adulto):</strong></div></td>
		<td><select input type="text" name="HBadu_lote" id="HBadu_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="HBadu_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Hepatitis B (Adulto)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['HBadu_lote']."\">".$row_Recordset1['HBadu_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="HBadu_Ingreso" id="HBadu_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="HBadu_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="HBadu_Salida" id="HBadu_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="HBadu_Salida"/>
		 </td>
   
   <!-- <td width="100" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Tipo identificaci&oacute;n:</strong></div></td> -->
      <td width="100"><select name="HBadu_tipo_id" title="HBadu_tipo_id" id="HBadu_tipo_id" value="" />  
		  <option value="" selected></option>
		  <option value="NV"><?php echo "NV";?></option>
		  <option value="RC"><?php echo "RC";?></option>
		  <option value="TI"><?php echo "TI";?></option>
		  <option value="CC"><?php echo "CC";?></option>
		  <option value="CE"><?php echo "CE";?></option>
		  <option value="CD"><?php echo "CD";?></option>
		  <option value="AS"><?php echo "AS";?></option>
		  <option value="MS"><?php echo "MS";?></option>
		  <option value="SC"><?php echo "SC";?></option>
		  <option value="PE"><?php echo "PE";?></option>
		  <option value="PT"><?php echo "PT";?></option>
		  <option value="PA"><?php echo "PA";?></option>
		</select> 
	</td>
        
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>N&uacute;mero identificaci&oacute;n:</strong></div></td> -->
		<td><input type="text" name="HBadu_Id" id="HBadu_Id" value="" size="15" title="HBadu_Id"/> </td>
   
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Nombres y apellidos:</strong></div></td> -->
    <td><input type="text" name="HBadu_nombres" id="HBadu_nombres" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="HBadu_nombres"/></td>
   
    </tr>	
	 
	 
	 
	  <!-------------------------------------------------------------------------Rotavirus------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Rotavirus:</strong></div></td>
		<td><select input type="text" name="Rota_lote" id="Rota_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Rota_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Rotavirus' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Rota_lote']."\">".$row_Recordset1['Rota_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Rota_Ingreso" id="Rota_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Rota_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Rota_Salida" id="Rota_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Rota_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	  <!-------------------------------------------------------------------------Neumococo 10------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Neumococo 10:</strong></div></td>
		<td><select input type="text" name="Neumo10_lote" id="Neumo10_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Neumo10_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Neumococo 10' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Neumo10_lote']."\">".$row_Recordset1['Neumo10_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Neumo10_Ingreso" id="Neumo10_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Neumo10_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Neumo10_Salida" id="Neumo10_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Neumo10_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	 
	  <!-------------------------------------------------------------------------Neumococo 13------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Neumococo 13:</strong></div></td>
		<td><select input type="text" name="Neumo13_lote" id="Neumo13_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Neumo13_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Neumococo 13' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Neumo13_lote']."\">".$row_Recordset1['Neumo13_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Neumo13_Ingreso" id="Neumo13_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Neumo13_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Neumo13_Salida" id="Neumo13_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Neumo13_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	  <!-------------------------------------------------------------------------SRP (Triple viral)------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>SRP (Triple viral):</strong></div></td>
		<td><select input type="text" name="SRP_lote" id="SRP_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="SRP_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='SRP (Triple viral)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['SRP_lote']."\">".$row_Recordset1['SRP_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="SRP_Ingreso" id="SRP_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="SRP_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="SRP_Salida" id="SRP_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="SRP_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	  <!-------------------------------------------------------------------------Fiebre Amarilla------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Fiebre Amarilla:</strong></div></td>
		<td><select input type="text" name="FA_lote" id="FA_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="FA_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Fiebre Amarilla' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['FA_lote']."\">".$row_Recordset1['FA_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="FA_Ingreso" id="FA_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="FA_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="FA_Salida" id="FA_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="FA_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	 
	  <!-------------------------------------------------------------------------Hepatitis A (Pediátrica)------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Hepatitis A (Pediátrica):</strong></div></td>
		<td><select input type="text" name="HAped_lote" id="HAped_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="HAped_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Hepatitis A (Pediátrica)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['HAped_lote']."\">".$row_Recordset1['HAped_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="HAped_Ingreso" id="HAped_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="HAped_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="HAped_Salida" id="HAped_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="HAped_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	 <!-------------------------------------------------------------------------Meningococo------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Meningococo:</strong></div></td>
		<td><select input type="text" name="Meningo_lote" id="Meningo_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Meningo_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Meningococo' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Meningo_lote']."\">".$row_Recordset1['Meningo_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Meningo_Ingreso" id="Meningo_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Meningo_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Meningo_Salida" id="Meningo_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Meningo_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	 <!-------------------------------------------------------------------------Varicela------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Varicela:</strong></div></td>
		<td><select input type="text" name="Varicela_lote" id="Varicela_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Varicela_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Varicela' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Varicela_lote']."\">".$row_Recordset1['Varicela_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Varicela_Ingreso" id="Varicela_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Varicela_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Varicela_Salida" id="Varicela_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Varicela_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	 <!-------------------------------------------------------------------------SR (Sarampión, Rubeola)------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>SR (Sarampión, Rubeola):</strong></div></td>
		<td><select input type="text" name="SR_lote" id="SR_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="SR_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='SR (Sarampión, Rubeola)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['SR_lote']."\">".$row_Recordset1['SR_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="SR_Ingreso" id="SR_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="SR_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="SR_Salida" id="SR_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="SR_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	 
	 <!-------------------------------------------------------------------------Td (Adulto)------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Td (Adulto):</strong></div></td>
		<td><select input type="text" name="Tdadu_lote" id="Tdadu_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Tdadu_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Td (Adulto)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Tdadu_lote']."\">".$row_Recordset1['Tdadu_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Tdadu_Ingreso" id="Tdadu_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Tdadu_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Tdadu_Salida" id="Tdadu_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Tdadu_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	 <!-------------------------------------------------------------------------dPaT (Adulto)------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>dPaT (Adulto):</strong></div></td>
		<td><select input type="text" name="DPaTadu_lote" id="DPaTadu_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="DPaTadu_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='dPaT (Adulto)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['DPaTadu_lote']."\">".$row_Recordset1['DPaTadu_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="DPaTadu_Ingreso" id="DPaTadu_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DPaTadu_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="DPaTadu_Salida" id="DPaTadu_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DPaTadu_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	 
	 <!-------------------------------------------------------------------------Influenza pediátrica (0.25 cc)------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Influenza pediátrica (0.25 cc):</strong></div></td>
		<td><select input type="text" name="Influenzaped_lote" id="Influenzaped_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Influenzaped_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Influenza pediátrica (0.25 cc)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Influenzaped_lote']."\">".$row_Recordset1['Influenzaped_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Influenzaped_Ingreso" id="Influenzaped_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Influenzaped_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Influenzaped_Salida" id="Influenzaped_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Influenzaped_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	 <!-------------------------------------------------------------------------Antigripal (0.5 cc)------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Antigripal (0.5 cc):</strong></div></td>
		<td><select input type="text" name="Antigripal_lote" id="Antigripal_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Antigripal_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Antigripal (0.5 cc)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Antigripal_lote']."\">".$row_Recordset1['Antigripal_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Antigripal_Ingreso" id="Antigripal_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Antigripal_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Antigripal_Salida" id="Antigripal_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Antigripal_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	 <!-------------------------------------------------------------------------VPH------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>VPH:</strong></div></td>
		<td><select input type="text" name="VPH_lote" id="VPH_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="VPH_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='VPH' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['VPH_lote']."\">".$row_Recordset1['VPH_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="VPH_Ingreso" id="VPH_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="VPH_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="VPH_Salida" id="VPH_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="VPH_Salida"/>
		 </td>
   
    </tr>	
	 
	 
<!-------------------------------------------------------------------------Vacuna Antirrábica  Humana------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Vacuna Antirrábica  Humana:</strong></div></td>
		<td><select input type="text" name="VAH_lote" id="VAH_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="VAH_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Vacuna Antirrábica Humana' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['VAH_lote']."\">".$row_Recordset1['VAH_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="VAH_Ingreso" id="VAH_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="VAH_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="VAH_Salida" id="VAH_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="VAH_Salida"/>
		 </td>
   
    <!-- <td width="100" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Tipo identificaci&oacute;n:</strong></div></td> -->
      <td width="100"><select name="VAH_tipo_id" title="VAH_tipo_id" id="VAH_tipo_id" value="" />  
		  <option value="" selected></option>
		 <option value="NV"><?php echo "NV";?></option>
		  <option value="RC"><?php echo "RC";?></option>
		  <option value="TI"><?php echo "TI";?></option>
		  <option value="CC"><?php echo "CC";?></option>
		  <option value="CE"><?php echo "CE";?></option>
		  <option value="CD"><?php echo "CD";?></option>
		  <option value="AS"><?php echo "AS";?></option>
		  <option value="MS"><?php echo "MS";?></option>
		  <option value="SC"><?php echo "SC";?></option>
		  <option value="PE"><?php echo "PE";?></option>
		  <option value="PT"><?php echo "PT";?></option>
		  <option value="PA"><?php echo "PA";?></option>
		</select> 
	</td>
        
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>N&uacute;mero identificaci&oacute;n:</strong></div></td> -->
		<td><input type="text" name="VAH_Id" id="VAH_Id" value="" size="15" title="VAH_Id"/> </td>
   
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Nombres y apellidos:</strong></div></td> -->
     <td><input type="text" name="VAH_nombres" id="VAH_nombres" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="VAH_nombres"/></td>
   
     
    </tr>	


<!-------------------------------------------------------------------------Inmuno-globulina Antirrábica Humano------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Inmuno-globulina Antirrábica Humano:</strong></div></td>
		<td><select input type="text" name="IAH_lote" id="IAH_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="IAH_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Inmuno-globulina Antirrábica Humano' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['IAH_lote']."\">".$row_Recordset1['IAH_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="IAH_Ingreso" id="IAH_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="IAH_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="IAH_Salida" id="IAH_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="IAH_Salida"/>
		 </td>
   


 <!-- <td width="100" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Tipo identificaci&oacute;n:</strong></div></td> -->
      <td width="100"><select name="IAH_tipo_id" title="IAH_tipo_id" id="IAH_tipo_id" value="" />  
		  <option value="" selected></option>
		 <option value="NV"><?php echo "NV";?></option>
		  <option value="RC"><?php echo "RC";?></option>
		  <option value="TI"><?php echo "TI";?></option>
		  <option value="CC"><?php echo "CC";?></option>
		  <option value="CE"><?php echo "CE";?></option>
		  <option value="CD"><?php echo "CD";?></option>
		  <option value="AS"><?php echo "AS";?></option>
		  <option value="MS"><?php echo "MS";?></option>
		  <option value="SC"><?php echo "SC";?></option>
		  <option value="PE"><?php echo "PE";?></option>
		  <option value="PT"><?php echo "PT";?></option>
		  <option value="PA"><?php echo "PA";?></option>
		</select> 
	</td>
        
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>N&uacute;mero identificaci&oacute;n:</strong></div></td> -->
		<td><input type="text" name="IAH_Id" id="IAH_Id" value="" size="15" title="IAH_Id"/> </td>
   
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Nombres y apellidos:</strong></div></td> -->
    <td><input type="text" name="IAH_nombres" id="IAH_nombres" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="IAH_nombres"/></td>
   
    </tr>	
	 
	 
	 
<!-------------------------------------------------------------------------Inmuno-globulina Hepatitis B------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Inmuno-globulina Hepatitis B:</strong></div></td>
		<td><select input type="text" name="IHB_lote" id="IHB_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="IHB_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Inmuno-globulina Hepatitis B' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['IHB_lote']."\">".$row_Recordset1['IHB_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="IHB_Ingreso" id="IHB_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="IHB_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="IHB_Salida" id="IHB_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="IHB_Salida"/>
		 </td>
   
	 

 <!-- <td width="100" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Tipo identificaci&oacute;n:</strong></div></td> -->
      <td width="100"><select name="IHB_tipo_id" title="IHB_tipo_id" id="IHB_tipo_id" value="" />  
		  <option value="" selected></option>
		 <option value="NV"><?php echo "NV";?></option>
		  <option value="RC"><?php echo "RC";?></option>
		  <option value="TI"><?php echo "TI";?></option>
		  <option value="CC"><?php echo "CC";?></option>
		  <option value="CE"><?php echo "CE";?></option>
		  <option value="CD"><?php echo "CD";?></option>
		  <option value="AS"><?php echo "AS";?></option>
		  <option value="MS"><?php echo "MS";?></option>
		  <option value="SC"><?php echo "SC";?></option>
		  <option value="PE"><?php echo "PE";?></option>
		  <option value="PT"><?php echo "PT";?></option>
		  <option value="PA"><?php echo "PA";?></option>
		</select> 
	</td>
        
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>N&uacute;mero identificaci&oacute;n:</strong></div></td> -->
		<td><input type="text" name="IHB_Id" id="IHB_Id" value="" size="15" title="IHB_Id"/> </td>
   
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Nombres y apellidos:</strong></div></td> -->
    <td><input type="text" name="IHB_nombres" id="IHB_nombres" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="IHB_nombres"/></td>
   
    </tr>	
	 


<!-------------------------------------------------------------------------Inmuno-globulina antitetánica------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Inmuno-globulina antitetánica:</strong></div></td>
		<td><select input type="text" name="Iglobulina_lote" id="Iglobulina_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Iglobulina_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Inmuno-globulina antitetánica' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Iglobulina_lote']."\">".$row_Recordset1['Iglobulina_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Iglobulina_Ingreso" id="Iglobulina_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Iglobulina_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Iglobulina_Salida" id="Iglobulina_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Iglobulina_Salida"/>
		 </td>
   

	 

 <!-- <td width="100" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Tipo identificaci&oacute;n:</strong></div></td> -->
      <td width="100"><select name="Iglobulina_tipo_id" title="Iglobulina_tipo_id" id="Iglobulina_tipo_id" value="" />  
		  <option value="" selected></option>
		 <option value="NV"><?php echo "NV";?></option>
		  <option value="RC"><?php echo "RC";?></option>
		  <option value="TI"><?php echo "TI";?></option>
		  <option value="CC"><?php echo "CC";?></option>
		  <option value="CE"><?php echo "CE";?></option>
		  <option value="CD"><?php echo "CD";?></option>
		  <option value="AS"><?php echo "AS";?></option>
		  <option value="MS"><?php echo "MS";?></option>
		  <option value="SC"><?php echo "SC";?></option>
		  <option value="PE"><?php echo "PE";?></option>
		  <option value="PT"><?php echo "PT";?></option>
		  <option value="PA"><?php echo "PA";?></option>
		</select> 
	</td>
        
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>N&uacute;mero identificaci&oacute;n:</strong></div></td> -->
		<td><input type="text" name="Iglobulina_Id" id="Iglobulina_Id" value="" size="15" title="Iglobulina_Id"/> </td>
   
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Nombres y apellidos:</strong></div></td> -->
    <td><input type="text" name="Iglobulina_nombres" id="Iglobulina_nombres" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Iglobulina_nombres"/></td>
   
    </tr>	
	 


<!-------------------------------------------------------------------------Antitoxina antitetánica------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Antitoxina antitetánica:</strong></div></td>
		<td><select input type="text" name="Antitetanica_lote" id="Antitetanica_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Antitetanica_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Antitoxina antitetánica' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Antitetanica_lote']."\">".$row_Recordset1['Antitetanica_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Antitetanica_Ingreso" id="Antitetanica_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Antitetanica_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Antitetanica_Salida" id="Antitetanica_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Antitetanica_Salida"/>
		 </td>
   
 

 <!-- <td width="100" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Tipo identificaci&oacute;n:</strong></div></td> -->
      <td width="100"><select name="Antitetanica_tipo_id" title="Antitetanica_tipo_id" id="Antitetanica_tipo_id" value="" />  
		  <option value="" selected></option>
		 <option value="NV"><?php echo "NV";?></option>
		  <option value="RC"><?php echo "RC";?></option>
		  <option value="TI"><?php echo "TI";?></option>
		  <option value="CC"><?php echo "CC";?></option>
		  <option value="CE"><?php echo "CE";?></option>
		  <option value="CD"><?php echo "CD";?></option>
		  <option value="AS"><?php echo "AS";?></option>
		  <option value="MS"><?php echo "MS";?></option>
		  <option value="SC"><?php echo "SC";?></option>
		  <option value="PE"><?php echo "PE";?></option>
		  <option value="PT"><?php echo "PT";?></option>
		  <option value="PA"><?php echo "PA";?></option>
		</select> 
	</td>
        
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>N&uacute;mero identificaci&oacute;n:</strong></div></td> -->
		<td><input type="text" name="Antitetanica_Id" id="Antitetanica_Id" value="" size="15" title="Antitetanica_Id"/> </td>
   
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Nombres y apellidos:</strong></div></td> -->
    <td><input type="text" name="Antitetanica_nombres" id="Antitetanica_nombres" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Antitetanica_nombres"/></td>
   
    </tr>	
	 
	 
<!-------------------------------------------------------------------------Antitoxina Diftérica------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Antitoxina Diftérica:</strong></div></td>
		<td><select input type="text" name="Antidifterica_lote" id="Antidifterica_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Antidifterica_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Antitoxina Diftérica' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Antidifterica_lote']."\">".$row_Recordset1['Antidifterica_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Antidifterica_Ingreso" id="Antidifterica_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Antidifterica_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Antidifterica_Salida" id="Antidifterica_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Antidifterica_Salida"/>
		 </td>
   
   
 <!-- <td width="100" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Tipo identificaci&oacute;n:</strong></div></td> -->
      <td width="100"><select name="Antidifterica_tipo_id" title="Antidifterica_tipo_id" id="Antidifterica_tipo_id" value="" />  
		  <option value="" selected></option>
		  <option value="NV"><?php echo "NV";?></option>
		  <option value="RC"><?php echo "RC";?></option>
		  <option value="TI"><?php echo "TI";?></option>
		  <option value="CC"><?php echo "CC";?></option>
		  <option value="CE"><?php echo "CE";?></option>
		  <option value="CD"><?php echo "CD";?></option>
		  <option value="AS"><?php echo "AS";?></option>
		  <option value="MS"><?php echo "MS";?></option>
		  <option value="SC"><?php echo "SC";?></option>
		  <option value="PE"><?php echo "PE";?></option>
		  <option value="PT"><?php echo "PT";?></option>
		  <option value="PA"><?php echo "PA";?></option>
		</select> 
	</td>
        
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>N&uacute;mero identificaci&oacute;n:</strong></div></td> -->
		<td><input type="text" name="Antidifterica_Id" id="Antidifterica_Id" value="" size="15" title="Antidifterica_Id"/> </td>
   
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Nombres y apellidos:</strong></div></td> -->
    <td><input type="text" name="Antidifterica_nombres" id="Antidifterica_nombres" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Antidifterica_nombres"/></td>
   
    </tr>	
	 


	  <!-------------------------------------------------------------------------Diluyente de BCG------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Diluyente de BCG:</strong></div></td>
		<td><select input type="text" name="DBCG_lote" id="DBCG_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="DBCG_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Diluyente de BCG' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['DBCG_lote']."\">".$row_Recordset1['DBCG_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="DBCG_Ingreso" id="DBCG_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DBCG_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="DBCG_Salida" id="DBCG_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DBCG_Salida"/>
		 </td>
   
    </tr>
	 
	 
	 
	  <!-------------------------------------------------------------------------Diluyente de SRP------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Diluyente de SRP:</strong></div></td>
		<td><select input type="text" name="DSRP_lote" id="DSRP_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="DSRP_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Diluyente de SRP' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['DSRP_lote']."\">".$row_Recordset1['DSRP_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="DSRP_Ingreso" id="DSRP_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DSRP_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="DSRP_Salida" id="DSRP_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DSRP_Salida"/>
		 </td>
   
    </tr>
	 
	 
	  <!-------------------------------------------------------------------------Diluyente de SR (Sarampión Rubeola)------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Diluyente de SR (Sarampión Rubeola):</strong></div></td>
		<td><select input type="text" name="DSR_lote" id="DSR_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="DSR_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Diluyente de SR (Sarampión Rubeola)' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['DSR_lote']."\">".$row_Recordset1['DSR_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="DSR_Ingreso" id="DSR_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DSR_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="DSR_Salida" id="DSR_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DSR_Salida"/>
		 </td>
   
    </tr>
	
	
	 <!-------------------------------------------------------------------------Diluyente de fiebre amarilla------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Diluyente de fiebre amarilla:</strong></div></td>
		<td><select input type="text" name="DFA_lote" id="DFA_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="DFA_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Diluyente de fiebre amarilla' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['DFA_lote']."\">".$row_Recordset1['DFA_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="DFA_Ingreso" id="DFA_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DFA_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="DFA_Salida" id="DFA_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DFA_Salida"/>
		 </td>
   
    </tr>
	
	
	 <!-------------------------------------------------------------------------Diluyente de varicela------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Diluyente de varicela:</strong></div></td>
		<td><select input type="text" name="Dvaricela_lote" id="Dvaricela_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Dvaricela_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Diluyente de varicela' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Dvaricela_lote']."\">".$row_Recordset1['Dvaricela_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Dvaricela_Ingreso" id="Dvaricela_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Dvaricela_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Dvaricela_Salida" id="Dvaricela_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Dvaricela_Salida"/>
		 </td>
   
    </tr>
	
	
	
	
	
 <!-------------------------------------------------------------------------Diluyente de antirrábica humana------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Diluyente de antirrábica humana:</strong></div></td>
		<td><select input type="text" name="DVAH_lote" id="DVAH_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="DVAH_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Diluyente de antirrábica humana' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['DVAH_lote']."\">".$row_Recordset1['DVAH_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="DVAH_Ingreso" id="DVAH_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DVAH_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="DVAH_Salida" id="DVAH_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DVAH_Salida"/>
		 </td>
   
   
	 

 <!-- <td width="100" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Tipo identificaci&oacute;n:</strong></div></td> -->
      <td width="100"><select name="DVAH_tipo_id" title="DVAH_tipo_id" id="DVAH_tipo_id" value="" />  
		  <option value="" selected></option>
		 <option value="NV"><?php echo "NV";?></option>
		  <option value="RC"><?php echo "RC";?></option>
		  <option value="TI"><?php echo "TI";?></option>
		  <option value="CC"><?php echo "CC";?></option>
		  <option value="CE"><?php echo "CE";?></option>
		  <option value="CD"><?php echo "CD";?></option>
		  <option value="AS"><?php echo "AS";?></option>
		  <option value="MS"><?php echo "MS";?></option>
		  <option value="SC"><?php echo "SC";?></option>
		  <option value="PE"><?php echo "PE";?></option>
		  <option value="PT"><?php echo "PT";?></option>
		  <option value="PA"><?php echo "PA";?></option>
		</select> 
	</td>
        
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>N&uacute;mero identificaci&oacute;n:</strong></div></td> -->
		<td><input type="text" name="DVAH_Id" id="DVAH_Id" value="" size="15" title="DVAH_Id"/> </td>
   
   <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Nombres y apellidos:</strong></div></td> -->
    <td><input type="text" name="DVAH_nombres" id="DVAH_nombres" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="DVAH_nombres"/></td>
   
    </tr>	

	
 <!-------------------------------------------------------------------------Solvente Meningococo------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Solvente Meningococo:</strong></div></td>
		<td><select input type="text" name="Smeningo_lote" id="Smeningo_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Smeningo_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Solvente Meningococo' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Smeningo_lote']."\">".$row_Recordset1['Smeningo_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Smeningo_Ingreso" id="Smeningo_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Smeningo_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Smeningo_Salida" id="Smeningo_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Smeningo_Salida"/>
		 </td>
   
    </tr>
	
	
	
 <!-------------------------------------------------------------------------Jeringa 22G*1 ¼ Autodescartable------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Jeringa 22G*1 ¼ Autodescartable:</strong></div></td>
		<td><select input type="text" name="J22auto_lote" id="J22auto_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="J22auto_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Jeringa 22G*1 ¼ Autodescartable' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['J22auto_lote']."\">".$row_Recordset1['J22auto_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="J22auto_Ingreso" id="J22auto_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J22auto_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="J22auto_Salida" id="J22auto_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J22auto_Salida"/>
		 </td>
   
    </tr>
	
	
	
 <!-------------------------------------------------------------------------Jeringa 22G*1 ¼ Convencional------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Jeringa 22G*1 ¼ Convencional:</strong></div></td>
		<td><select input type="text" name="J22con_lote" id="J22con_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="J22con_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Jeringa 22G*1 ¼ Convencional' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['J22con_lote']."\">".$row_Recordset1['J22con_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="J22con_Ingreso" id="J22con_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J22con_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="J22con_Salida" id="J22con_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J22con_Salida"/>
		 </td>
   
    </tr>
	
	
	
 <!-------------------------------------------------------------------------Jeringa 23G*1 Autodescartable------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Jeringa 23G*1 Autodescartable:</strong></div></td>
		<td><select input type="text" name="J23auto_lote" id="J23auto_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="J23auto_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Jeringa 23G*1 Autodescartable' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['J23auto_lote']."\">".$row_Recordset1['J23auto_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="J23auto_Ingreso" id="J23auto_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J23auto_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="J23auto_Salida" id="J23auto_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J23auto_Salida"/>
		 </td>
   
    </tr>
	
	
 <!-------------------------------------------------------------------------Jeringa 23G*1 Convencional------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Jeringa 23G*1 Convencional:</strong></div></td>
		<td><select input type="text" name="J23con_lote" id="J23con_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="J23con_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Jeringa 23G*1 Convencional' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['J23con_lote']."\">".$row_Recordset1['J23con_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="J23con_Ingreso" id="J23con_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J23con_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="J23con_Salida" id="J23con_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J23con_Salida"/>
		 </td>
   
    </tr>
	
		
 <!-------------------------------------------------------------------------Jeringa #25G*5/8 Autodescartable------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Jeringa #25G*5/8 Autodescartable:</strong></div></td>
		<td><select input type="text" name="J25auto_lote" id="J25auto_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="J25auto_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Jeringa #25G*5/8 Autodescartable' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['J25auto_lote']."\">".$row_Recordset1['J25auto_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="J25auto_Ingreso" id="J25auto_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J25auto_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="J25auto_Salida" id="J25auto_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J25auto_Salida"/>
		 </td>
   
    </tr>
	
	
 <!-------------------------------------------------------------------------Jeringa #25G*5/8  Convencional------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Jeringa #25G*5/8  Convencional:</strong></div></td>
		<td><select input type="text" name="J25con_lote" id="J25con_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="J25con_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Jeringa #25G*5/8  Convencional' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['J25con_lote']."\">".$row_Recordset1['J25con_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="J25con_Ingreso" id="J25con_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J25con_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="J25con_Salida" id="J25con_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J25con_Salida"/>
		 </td>
   
    </tr>
	
	
 <!-------------------------------------------------------------------------Jeringa #26G*3/8 Autodescartable------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Jeringa #26G*3/8 Autodescartable:</strong></div></td>
		<td><select input type="text" name="J26auto_lote" id="J26auto_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="J26auto_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Jeringa #26G*3/8 Autodescartable' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['J26auto_lote']."\">".$row_Recordset1['J26auto_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="J26auto_Ingreso" id="J26auto_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J26auto_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="J26auto_Salida" id="J26auto_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J26auto_Salida"/>
		 </td>
   
    </tr>
	
	
 <!-------------------------------------------------------------------------Jeringa #26G*3/8  Convencional------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Jeringa #26G*3/8  Convencional:</strong></div></td>
		<td><select input type="text" name="J26con_lote" id="J26con_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="J26con_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Jeringa #26G*3/8  Convencional' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['J26con_lote']."\">".$row_Recordset1['J26con_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="J26con_Ingreso" id="J26con_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J26con_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="J26con_Salida" id="J26con_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J26con_Salida"/>
		 </td>
   
    </tr>
	
	
	
	
 <!-------------------------------------------------------------------------Jeringa #27G*3/8------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Jeringa #27G*3/8:</strong></div></td>
		<td><select input type="text" name="J27_lote" id="J27_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="J27_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='Jeringa #27G*3/8' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['J27_lote']."\">".$row_Recordset1['J27_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="J27_Ingreso" id="J27_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J27_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="J27_Salida" id="J27_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="J27_Salida"/>
		 </td>
   
    </tr>
	
	
	
 <!-------------------------------------------------------------------------GOTEROS------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>GOTEROS:</strong></div></td>
		<td><select input type="text" name="Gotero_lote" id="Gotero_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Gotero_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='GOTEROS' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Gotero_lote']."\">".$row_Recordset1['Gotero_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Gotero_Ingreso" id="Gotero_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Gotero_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Gotero_Salida" id="Gotero_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Gotero_Salida"/>
		 </td>
   
    </tr>
	
	
	
 <!-------------------------------------------------------------------------CARNÉ DE VACUNACIÓN INFANTIL------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>CARNÉ DE VACUNACIÓN INFANTIL:</strong></div></td>
		<td><select input type="text" name="Cinfantil_lote" id="Cinfantil_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Cinfantil_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='CARNÉ DE VACUNACIÓN INFANTIL' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Cinfantil_lote']."\">".$row_Recordset1['Cinfantil_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Cinfantil_Ingreso" id="Cinfantil_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Cinfantil_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Cinfantil_Salida" id="Cinfantil_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Cinfantil_Salida"/>
		 </td>
   
    </tr>
	
	
	
 <!-------------------------------------------------------------------------CARNÉ DE VACUNACIÓN DE ADULTOS------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>CARNÉ DE VACUNACIÓN DE ADULTOS:</strong></div></td>
		<td><select input type="text" name="Cadulto_lote" id="Cadulto_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Cadulto_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='CARNÉ DE VACUNACIÓN DE ADULTOS' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Cadulto_lote']."\">".$row_Recordset1['Cadulto_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Cadulto_Ingreso" id="Cadulto_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Cadulto_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Cadulto_Salida" id="Cadulto_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Cadulto_Salida"/>
		 </td>
   
    </tr>
	
	
	
	
 <!-------------------------------------------------------------------------CARNÉ INTERNACIONAL DE VACUNACIÓN------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>CARNÉ INTERNACIONAL DE VACUNACIÓN:</strong></div></td>
		<td><select input type="text" name="Cinternacional_lote" id="Cinternacional_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Cinternacional_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='CARNÉ INTERNACIONAL DE VACUNACIÓN' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Cinternacional_lote']."\">".$row_Recordset1['Cinternacional_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Cinternacional_Ingreso" id="Cinternacional_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Cinternacional_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Cinternacional_Salida" id="Cinternacional_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Cinternacional_Salida"/>
		 </td>
   
    </tr>
	
	
	
	
 <!-------------------------------------------------------------------------TARJETAS UNIFICADAS DE VACUNACIÓN ADULTOS------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>TARJETAS UNIFICADAS DE VACUNACIÓN ADULTOS:</strong></div></td>
		<td><select input type="text" name="Tadulto_lote" id="Tadulto_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Tadulto_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='TARJETAS UNIFICADAS DE VACUNACIÓN ADULTOS' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Tadulto_lote']."\">".$row_Recordset1['Tadulto_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Tadulto_Ingreso" id="Tadulto_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Tadulto_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Tadulto_Salida" id="Tadulto_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Tadulto_Salida"/>
		 </td>
   
    </tr>
	
	
	
	
 <!-------------------------------------------------------------------------TARJETAS UNIFICADAS DE VACUNACIÓN NIÑOS------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>TARJETAS UNIFICADAS DE VACUNACIÓN NIÑOS:</strong></div></td>
		<td><select input type="text" name="Tnino_lote" id="Tnino_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Tnino_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote` WHERE insumo='TARJETAS UNIFICADAS DE VACUNACIÓN NIÑOS' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['Tnino_lote']."\">".$row_Recordset1['Tnino_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="Tnino_Ingreso" id="Tnino_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Tnino_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="Tnino_Salida" id="Tnino_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Tnino_Salida"/>
		 </td>
   
    </tr>
	
	
	 
   </table> 
	 	



 <!-------------------------------------------------------------------------Observaciones------------------------------------------------------->

		
		   
		   <table>
	
	<tr valign="baseline">
					<td nowrap="nowrap" align="right"><div align="left"><strong>Observaciones:</strong></div></td>
					<td> <textarea cols="90" rows="2" maxlength="500" name="Observaciones"  id="Observaciones"  style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Observaciones" /></textarea>	
	</tr>
	
	</table> 
	
		
       <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
    <td><input type="button" value="Ingresar registro" onClick="ok()" />    </tr>
       

<!--  <input	type="button" onclick="calcular_edad('04/29/1975');"> -->
  <input type="hidden" name="MM_insert" value="form1" />
</form>
  <p><a href="Principal.php">principal</a></p>

</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>