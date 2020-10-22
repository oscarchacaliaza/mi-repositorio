<?
@session_start();
	include("claseconexion.php");
	require_once "class_sql_inject.php";
	$sql = new sql_inject('sqlinject.log');
	
	$xidanexo=$_REQUEST['xid_anexo'];
	$query1 = "select convert(varchar(10), dateadd(d, 0, getdate()), 103) as ddatetm";
	
	$result1 = sqlsrv_query($conn,$query1);
	$row1 = sqlsrv_fetch_array($result1,SQLSRV_FETCH_ASSOC);	
	$ddatetm=$row1['ddatetm'];
	
	$year=date("Y");
	
	$query2 = "exec pxConsultasWeb2 '1', @vcodcontr='{$_SESSION['user']}'";
	//echo $query12;
	$result2 = sqlsrv_query($conn,$query2);
	$rw = sqlsrv_fetch_array($result2,SQLSRV_FETCH_ASSOC);		
	
	$vdirecc=strlen($rw['direcc'])==0? '&nbsp;': $rw['direcc'];
	$vnombre=str_replace('Ñ','&Ntilde;',$rw['nombre']);
	@$cidpers=$_GET['cidpers'];
	$vnrdoc=$rw['num_doc'];
	$_SESSION['vnrdoc']=$vnrdoc;	
	
	
	$cejerci =$_REQUEST['cejerci'];	
	
				
	
	$query21 = "exec pxConsultasWeb2 @msquery='7',@vcodcontr='{$_SESSION['user']}',@paramt5='$year'";

	$result21 = sqlsrv_query($conn,$query21);
	$dtt = sqlsrv_fetch_array($result21,SQLSRV_FETCH_ASSOC);		
	
	
	
	
?>
<!DOCTYPE html>
<!-- saved from url=(0064)http://demo.naksoid.com/elephant/materialistic-blue/login-3.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Consulte su Estado de Cuenta - Municipalidad de Paracas</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="Municipalidad de Paracas">
    
    <meta property="og:type" content="website">
    
    <meta property="og:description" content="Municipalidad de Paracas">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="css/manifest.json">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#0288d1">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/css">
    <link rel="stylesheet" href="css/vendor.min.css">
    <link rel="stylesheet" href="css/elephant.min.css">
    <link rel="stylesheet" href="css/application.min.css">
    <link rel="stylesheet" href="css/demo.min.css">
    
   <script type="text/javascript" language='javascript'>

		window.onload = function() {

			var tabl=document.getElementById('Predios');
			var rows=tabl.getElementsByTagName('TR');
	
		
			for(i=0; i<rows.length; ++i) {
			
				if(rows[i].className=='detPredio') {								
									
					var cell=rows[i].getElementsByTagName('TD');
					for(j=0; j<cell.length; ++j) {
						
						// CUANDO EL MOUSE SE DEZPLAZA POR LA FILA
						cell[j].onmouseover = function() {
							var row=this.parentNode.getElementsByTagName('TD');
							for(k=0; k<row.length; ++k) {
								row[k].className="onMouseOver";
							}						
						};
						
						// CUANDO EL MOUSE SALE DE LA FILA
						cell[j].onmouseout = function() {
							var row=this.parentNode.getElementsByTagName('TD');
							for(k=0; k<row.length; ++k) {
								row[k].className="";
							}
						};
						
						// EVENTO CLICK DE LA CELDA
						cell[j].onclick = function() {
							var row=this.parentNode.getElementsByTagName('TD');
							var php="";
							for(k=0; k<row.length; ++k) {
								var det=row[k].getElementsByTagName('SPAN');
								for(h=0; h<det.length; ++h) {
									php += det[h].id.substring(0,3)+"="+det[h].innerHTML+"&";
								}
							}
							php += "RGM="+regimen;
							
							location = 'pu.php?'+php;
						};
					
					}
				}
			}
			
			
			
			document.getElementById('preLoad').style.visibility = 'hidden';
		};
		
	</script>
	<script language='javascript'>
/*function ocultar()
{
	btnprint.style.visibility='hidden';
	btnprint.style.display='none';
	window.print();
	window.close();
}
*/</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="layout layout-header-fixed">
   
   <div class="layout-header">
      <? include("inc/header.inc"); ?>
    </div>
    
    <div class="layout-main">
      <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
          <div class="custom-scrollbar" style="">
           <ul class="sidenav">
                <li class="sidenav-item" align="center">
                   <img src="img/logo_abancay.png" >
                </li>
         </ul>
          <div class="col-md-12" style="padding-top:15px;">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-gray sq-24 circle">
                        <span class="icon icon-cogs"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      
                      <small><font><font><?php echo $_SESSION['user'];?></font></font></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-gray sq-24 circle">
                        <span class="icon icon-user"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      
                      <small style="font-size:10px;"><font><font> <?php 
			$_SESSION['nombr']=$vnombre;
			echo utf8_encode($vnombre);?></font></font></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-gray sq-24 circle">
                        <span class="icon icon-home"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      
                      <small style="font-size:10px;"><font><font><?php
			$_SESSION['vdirecc']=$vdirecc; 
			echo utf8_encode($vdirecc);
			?></font></font></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <nav id="sidenav" class="sidenav-collapse collapse">
              <ul class="sidenav">
                <li class="sidenav-search hidden-md hidden-lg">
                  <form class="sidenav-form" action="http://demo.naksoid.com/">
                    <div class="form-group form-group-sm">
                      <div class="input-with-icon">
                        <input class="form-control" type="text" placeholder="Search…">
                        <span class="icon icon-search input-icon"></span>
                      </div>
                    </div>
                  </form>
                </li>
                
                
                <li class="sidenav-heading">Mis Deudas</li>
                <li class="sidenav-item ">
                  <a href="dconsolidado.php" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-check"></span>
                    <span class="sidenav-label">Deudas Consolidadas</span>
                  </a>
                  
                </li>
                <li class="sidenav-item">
                  <a href="ddetalladas.php">
                    
                    <span class="sidenav-icon icon icon-check"></span>
                    <span class="sidenav-label">Deudas Detalladas</span>
                  </a>
                </li>
                
                <li class="sidenav-heading">Mis Pagos</li>
                <li class="sidenav-item">
                  <a href="pagos.php" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-check"></span>
                    <span class="sidenav-label">Pagos a la Fecha</span>
                  </a>
                  
                </li>           
                
                <li class="sidenav-heading">Declaración Jurada</li>
                <li class="sidenav-item">
                  <a href="hr.php" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-check"></span>
                    <span class="sidenav-label">HR</span>
                  </a>
                  
                </li>
               
                <li class="sidenav-item active">
                  <a href="hla.php" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-check"></span>
                    <span class="sidenav-label">HLA</span>
                  </a>
                  
                </li>
                 </li

              ></ul>
            </nav>
          </div>
        </div>
      </div>
      
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib" style="padding-bottom:5px; padding-top:10px;">Hoja de Liquidación (HLA)
</span>
              
            </h1>
            <p class="title-bar-description">
              <small>Deudas del Contribuyente al  &nbsp;<i class="fa fa-calendar"></i>&nbsp;  <b><?php print($ddatetm);?> </b></small>
            </p>
          </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="panel panel-body">
                <div class="table-responsive"> 
                <form id="frmEstCta" name="frmEstCta" method="Get" action="../estadocuentachek.php">
      <table width="100%" >
        <tr>
        	<td width="46%">
            <a href="hojaliquidaciona.php"  class="btn btn-outline-primary" target="_blank">Imprimir</a>
            
           <!-- <a href="../estadocuentaConsolidado.php" target="_blank"><img src="../images/bo-imprimir.gif" width="84" height="27" alt="Imprimir"></a>--></td>
        	<!--<td width="24%" rowspan="2" align="right" class="subtitulo" >Seleccione el Año:</td>
        	<td width="10%" align="center"><select name="cejerci" id="cejerci" onChange="listar()" style="width:100px" class="custom-select">
                  <option value='' selected <?php if(isset($_REQUEST['cejerci'])){echo 'selected="selected"';}?>>Todos</option>
                  <?php
						for($i=date('Y'); $i>=1996; --$i)
						{
							echo "<option value='$i'".(($_REQUEST['cejerci']==$i)? 'selected="selected"': '').">$i</option>";
						}
                    ?>
                </select>
           </td>-->
        	<!--<td width="13%" align="right" >        	<span class="style5">Su Deuda Actual es:</span><span class="title3"> S/.</span>&nbsp;</td>
        	<td width="7%"  bgcolor="#f6a015" align="center">
            <strong class="style5" style="text-align:center; color:#FFF; font-size:18px;">
			 <?php
			//echo $array
			?>
		    </strong>
          
           
            </td>-->
        </tr>
      </table>
      </div></div></div></div>
          <div class="row">
            <div class="col-xs-12">
              <div class="panel panel-body">
                <div class="table-responsive">
                  <table width="100%" border="0" align="center" class="table table-bordered table-striped " id="sorting-example1">
  
   <tr>
    <td>
    <table width="100%" border="0" align="center">
      <tr>
        <td width="5%"><img src="img/logo_abancay.png" width="120" height="95" ></td>
        <td width="63%"><br /> <div align="center"><p><b>
                <span style='font-size:24px;'>DETERMINACIÓN DE ARBITRIOS <?php echo $year;?></span><br>
                <b><span style='font-size:14px;'>ORDENANZA MUNICIPAL N° 021 - 2019-MDP<br>
                </span> <span style='font-size:14px;'>ACUERDO DE CONSEJO N° 005-2020-MPP</span></b><b></p></div>  </td>
               <td width="17%" align="center"><br /><span style='font-size:34px;'>HLA</span><br><span style="font-size:12px;">(HOJA DE LIQUIDACIÓN)</span></td>
      </tr>
    </table><br />
    <table width="100%" border="0" class="table responsive-table" id="sorting-example1"  >
    	<? /*if($TYPE == "1") {*/?>
        <thead>
        <tr>
			<td >I. DATOS DEL CONTRIBUYENTE</td>
		</tr>
        <tr>
          <td ><table width="100%" border="0">
            <tr>
              <td height="110" align="center">
                <table width="98%" border="1" class="bo" bordercolor="#ccc">
                  <tr>
                    <td width="12%" height="42" background="img/barra.png" style="color:#666666;">&nbsp;&nbsp;CONTRIBUYENTE:</td>
                    <td width="49%">&nbsp;&nbsp;<?php echo utf8_encode($_SESSION['nombr']);?></td>
                    <td width="15%" background="img/barra.png" style="color:#666666;">&nbsp;&nbsp;CODIGO DE CONTRIBUYENTE:</td>
                    <td width="24%">&nbsp;&nbsp;<?php echo $_SESSION['user'];?></td>
                    </tr>
                  <tr >
                    <td height="42" background="img/barra.png" style="color:#666666;">&nbsp;&nbsp;DOMICILIO FISCAL:</td>
                    <td colspan="3">&nbsp;&nbsp;<?php echo utf8_encode($_SESSION['vdirecc']);?></td>
                    </tr>
                  </table>
                
              </td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td height="19" >II. DETERMINACION (S/.)</td>
        </tr>
        <tr>
          <td height="19" >
          <table width="98%" border="1" align="center" class="bo" bordercolor="#ccc">
  <tr background="img/barra.png" style="color:#666666;">
    <td width="4%" height="42" align="center">CODIGO PREDIO</td>
    <td width="25%" align="center">UBICACION DEL PREDIO</td>
    <td width="6%" align="center">FRONTIS</td>
    <td width="6%" align="center">ZONA</td>
    <td width="15%" align="center">USO</td>
    <td width="4%" align="center">%  PROP</td>
    <td width="8%" align="center">RESIDUOS SOLIDOS</td>
    <td width="8%" align="center">BARRIDO DE CALLES</td>
    <td width="8%" align="center">PARQUES Y JARDINES</td>
    <td width="8%" align="center">SERENAZGO</td>
    <td width="10%" align="center">TOTAL</td>
  </tr>
    <?php
//			$cn=new conexion();
//				$cn->conectar();
				//$xidanexo=$dtt['cod_pred'];
				//echo ("exec pxConsultasWeb2 @msquery='7', @paramt1='{$_SESSION['user']}',@paramt5='$year',@paramt3='$xidanexo'");
$query3 = "exec pxConsultasWeb2 @msquery='7',@vcodcontr='{$_SESSION['user']}',@paramt5='$year'";
				//echo $query3;
$result3 = sqlsrv_query($conn,$query3);
//				$dtt = sqlsrv_fetch_array($result21,SQLSRV_FETCH_ASSOC);



//				$results=mssql_query(("exec pxConsultasWeb2 @msquery='7', @paramt1='{$_SESSION['user']}',@paramt5='$year',@paramt3='$xidanexo'"),$cn->getConnection());
				while($dtt=sqlsrv_fetch_array($result3,SQLSRV_FETCH_ASSOC)) 
				{
  
  
  ?>
  
  <tr>
    <td height="42" align="center"><? echo utf8_encode($dtt['id_anexo']);?></td>
    <td align="center"><? echo utf8_encode($dtt['direccion']);?></td>
    <td align="center"><? echo utf8_encode($dtt['frontis']);?></td>
    <td align="center"><? echo utf8_encode($dtt['codzon']);?></td>
    <td align="center"><? echo utf8_encode($dtt['uso']);?></td>
    <td align="center"><? echo utf8_encode($dtt['porpro']);?></td>
    <td align="center"><? echo utf8_encode($dtt['resiso']);?></td>
    <td align="center"><? echo utf8_encode($dtt['limpub']);?></td>
    <td align="center"><? echo utf8_encode($dtt['parjar']);?></td>
    <td align="center"><? echo utf8_encode($dtt['serena']);?></td>
    <td align="center"><? echo utf8_encode($dtt['resiso']+$dtt['limpub']+$dtt['parjar']+$dtt['serena']);?></td>
  </tr>
  <? } ?>
  
  <? 
  
			$query4 = "exec pxConsultasWeb2 @msquery='7', @vcodcontr='{$_SESSION['user']}',@paramt5='$year'";
			$result4 = sqlsrv_query($conn,$query4);
			$dtt=sqlsrv_fetch_array($result4,SQLSRV_FETCH_ASSOC)
		  
  ?>
  <tr style="color:#666666;">
    <td height="42" colspan="6" align="right" background="img/barra.png" style="color:#666666;"><p>SUB TOTAL:  </p></td>
    <td align="center"><B><? echo utf8_encode($dtt['sum_resiso']);?></B></td>
    <td align="center"><B><? echo utf8_encode($dtt['sum_limpub']);?></B></td>
    <td align="center"><B><? echo utf8_encode($dtt['sum_parjar']);?></B></td>
    <td align="center"><B><? echo utf8_encode($dtt['sum_serena']);?></B></td>
   <td align="center"><B><? echo utf8_encode($dtt['total']);?></B></td>
    
    
   
    
  </tr>
          </table>

          
          </td>
        </tr>
        </thead>
		
		
        <? /*}*/ ?>
		
	</table>
    
    
    
    </td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>
       <!-- 
        <table class="table responsive-table" id="sorting-example1" width="100%">
        <thead>
<tr>
<td colspan=6>III. DETERMINACIÓN DE IMPUESTOS</td>
</tr>
</thead>
		<tr align="center" >
			<td>Trim</td>
			<td>Fec. Venc.</td>
			<td>Impuesto</td>
			<td>G. Emisión</td>
			<td>Total</td>
		</tr>
		<?php
			if(strlen($rg)=="0"){
				$rg = "AFECTO";
			}
//			@$rs->cierraconexion();

//			$rs->sql("exec pxConsultasWeb '6', '{$_SESSION['user']}', '$year'");
//			$dt=$rs->respuesta();
			
			$query5 = "exec pxConsultasWeb '6', '{$_SESSION['user']}', '$year'";
			//echo $query12;
			$result5 = sqlsrv_query($conn,$query5);		
			$dt=sqlsrv_fetch_array($result5,SQLSRV_FETCH_ASSOC)			
			
		  ?></b></td>	

		
		<?
			if($dt['imp_anual'] != 0) {
				for($i = 1; $i < 5; ++$i) {
				
				if($i == 1) {
					$rd=$dt['imp_anual']-($dt['imp_insol']*4);
					$ge=$dt['costo_emis'];
				}
				
				if($i != 1) {
					$ge=0;
					$rd=0;
				}
		?>
		<tr  class="footer">
			<td align="center"><? echo $i;?></td>
			<td align="center">
				<? 
					switch($i) {
					case 1: echo (($year%4==0)? "29": "28")."/02/".$year; break;
					case 2: echo "31/05/".$year; break;
					case 3: echo "31/08/".$year; break;
					case 4: echo "30/11/".$year; break;
					}
				?></td>
			<td align="center"><? echo number_format($dt['imp_insol']+$rd, 2, ',', "'");?></td>
			<td align="center"><? echo number_format($ge, 2, ',', "'");?></td>
			<td align="center"><? echo number_format($dt['imp_insol']+$rd+$ge, 2, ',', "'");?></td>
		</tr>		
		<?
				}
			}
		
		?>
        <thead>
        <tr  class="footer">
			<td align="center">Monto Anual</td>
			<td align="center"><? echo (($year%4==0)? "29": "28")."/02/".$year;?></td>
            <td align="center"><? echo number_format($dt['imp_anual'], 2, ',', "'");?></td>
			<td align="center"><? echo number_format($dt['costo_emis'], 2, ',', "'");?></td>
			<td align="center"><? echo number_format($dt['imp_anual']+$dt['costo_emis'], 2, ',', "'");?></td>
		</tr></thead>
	</table>
    
    </td>
     <td>&nbsp; </td>
    
        <td>
       <table class="table responsive-table" id="sorting-example1" width="100%">
		<tr  class="footer"><td width=43%>Total de Autovaluo:</th><td width="29%" align=right><? echo number_format($dt['tot_autova'], 2, ',', "'");?></td></tr>
		<tr  class="footer"><td >Base Imponible:</th><td align=right><? echo number_format($dt['tot_autova'], 2, ',', "'");?></td></tr> 
		<tr  class="footer"><td >Imp. Predial:</th><td align=right><? echo number_format($dt['imp_anual'], 2, ',', "'");?></td></tr>
		<tr  class="footer"><td >Gastos de Emisión:</th><td align=right><? echo number_format($dt['costo_emis'], 2, ',', "'");?></td></tr>
		<tr  class="footer"><td >Total a Pagar:</th><td align=right><? echo number_format($dt['imp_anual']+$dt['costo_emis'], 2, ',', "'");?></td></tr>
	</table>
    
    </td>
      </tr>
    </table>--></td>
  </tr>
</table>
               







                  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="layout-footer">
        <div class="layout-footer-body">
          <small class="version">Version 1.0.0</small>
          <small class="copyright">2020 © Estado de Cuenta de la <a href="#">Municipalidad de Abancay</a></small>
        </div>
      </div>
    </div>
   
    <script async src="js/analytics.js"></script>
	<script src="js/vendor.min.js"></script>
    <script src="js/elephant.min.js"></script>
    <script src="js/application.min.js"></script>
    <script src="js/demo.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
  
</body></html>