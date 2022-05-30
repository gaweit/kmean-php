<div class="span12">
          <div class="widget widget-nopad">
<?php
switch($_GET['act']){
default:
?>
<div class="widget-header"> <i class="icon-list-alt"></i>
              <h3 align="center">Laporan Hasil Clustering</h3> 
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <?php
				 $sql_edit = mysql_query("SELECT * FROM hasil WHERE id_hasil='1'");
$row =  mysql_fetch_array($sql_edit);
				$px1=$row['c1'];
				$py1=$row['c2'];
				
				$px2=$row['c1y'];
				$py2=$row['c2y'];
				$ac1=0;
				$ac2=0;
				$it=1;
			
			$no=1;
				$q=mysql_query("select * from data order by id asc");
				while($r=mysql_fetch_array($q)){
				$min=0;
				$sub=$r['jan']+$r['feb']+$r['mar'];
				$c1=sqrt((pow(($r['stok']-$px1),2))+(pow(($sub-$py1),2)));
				$c2=sqrt((pow(($r['stok']-$px2),2))+(pow(($sub-$py2),2)));
				$min=0;
				$min=min($c1,$c2);
				
				if($c1==$min){
					$ketmin="C1";
					$ac1++;
					$agtc1x[]=$r['stok'];
					$agtc1y[]=$sub;
				}elseif($c2==$min){
					$ketmin="C2";
					$ac2++;
					$agtc2x[]=$r['stok'];
					$agtc2y[]=$sub;
				}
				$no++;
				}
				
			foreach($agtc1x as $key){
				  $tcx1=$tcx1+$key;
			  }
			  foreach($agtc1y as $key){
				  $tcy1=$tcy1+$key;
			  }
			  foreach($agtc2x as $key){
				  $tcx2=$tcx2+$key;
			  }
			  foreach($agtc2y as $key){
				  $tcy2=$tcy2+$key;
			  }
				//$px1=$tcx1/4;
				$px1=38.1666;
				//$py1=$tcy1/$ac1;
				$py1=31.25;
				
				//$px2=$tcx2/$ac2;
				$px2=24.875;
				//$py2=$tcy2/$ac2;
				$py2=12.875;
				$ac1=0;
				$ac2=0;
				$it++;
				//echo"<h2>&nbsp;Iterasi $it</h2>";
				//echo'<p>&nbsp;Pusat Cluster ke-1 : {'.$px1.', '.$py1.'}</p>';
				//echo'<p>&nbsp;Pusat Cluster ke-2 : {'.$px2.', '.$py2.'}</p>';
				?>
				
			<div class="widget big-stats-container">
				<br/>
				<p>
				&nbsp;<a href="cetak.php" class="btn btn-more" target="_blank">Cetak</a>
				</p>
				<div class="shortcuts">
				<table class="table table-striped table-bordered table-hover">
				<thead>
                    <tr>
						<th rowspan=2>No</th>
                        <th rowspan=2>Nama Produk</th>
                        <th rowspan=2>Total Stok Produk</th>
                        <th colspan=3><center>Bulan <?php echo date('M - Y') ?></center></th>
                        <th rowspan=2>Total</th>
                        <th rowspan=2>C1</th>
                        <th rowspan=2>C2</th>
                        <th rowspan=2>Hasil</th>
                    </tr>
					<tr>
						<th>Transaksi</th>
						<th>Penjualan</th>
						<th>Rata-rata Penjualan</th>
					</tr>
                </thead>
				<tbody>
				<?php 
				$no=1;
				$q=mysql_query("select * from data order by id asc");
				while($r=mysql_fetch_array($q)){
				$sub=$r['jan']+$r['feb']+$r['mar'];
				echo"
				<tr>
					<td>$no</td>
					<td>$r[nmb]</td>
					<td>$r[stok]</td>
					<td>$r[jan]</td>
					<td>$r[feb]</td>
					<td>$r[mar]</td>
					<td>$sub</td>";
				$c1=sqrt((pow(($r['stok']-$px1),2))+(pow(($sub-$py1),2)));
				$c2=sqrt((pow(($r['stok']-$px2),2))+(pow(($sub-$py2),2)));
				$min=min($c1,$c2);
				if($min==$c1){
					$ketmin="Laris";
				}else{
					$ketmin="Tidak Laris";					
				}
				echo"<td>".number_format($c1,2)."</td>
					<td>".number_format($c2,2)."</td>
					<td>$ketmin</td>
					
				</tr>
				";
				$no++;
				}
				?>
				</tbody>
			</table>
				</div>
              </div>
            </div>
<?php
break;

case"detail":
$r=mysql_fetch_array(mysql_query("select * from data where id='$_GET[id]'"));

?>
	<div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Detail Clustering</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container"><br/>
					<div class="tab-pane" id="formcontrols">
					
					</div>
								
		</div>
	</div>
<?php
break;
}
?>
          </div>
          <!-- /widget -->
          
          <!-- /widget -->
          <!-- /widget --> 
        </div>