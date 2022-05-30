<div class="span12">
          <div class="widget widget-nopad">
<?php
switch(@$_GET['act']){
default:
?>
<div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Hasil Clustering</h3>
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
				echo"<h2>&nbsp;Iterasi $it</h2>";
				echo'<p>&nbsp;Pusat Cluster ke-1 : {'.$px1.', '.$py1.'}</p>';
				echo'<p>&nbsp;Pusat Cluster ke-2 : {'.$px2.', '.$py2.'}</p>';
				?>
				
			<div class="widget big-stats-container">
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
                        <!-- <th rowspan=2>Aksi</th> -->
                        <!-- <td align='center'>
						<a href='?p=hasil&act=detail&it=$it&x1=$px1&y1=$py1&x2=$px2&y2=$py2&id=$r[id]' class='btn btn-xs btn-more'><span class='icon-search'> Detail</span></a>
					</td> -->
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
				$min=0;
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
			  <?php
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
				$px1=38.4545;
				//$py1=$tcy1/$ac1;
				$py1=31.7272;
				
				//$px2=$tcx2/$ac2;
				$px2=26;
				//$py2=$tcy2/$ac2;
				$py2=14.3333;
				$ac1=0;
				$ac2=0;
				$it++;
				echo"<h2>&nbsp;Iterasi $it</h2>";
				echo'<p>&nbsp;Pusat Cluster ke-1 : {'.$px1.', '.$py1.'}</p>';
				echo'<p>&nbsp;Pusat Cluster ke-2 : {'.$px2.', '.$py2.'}</p>';
				?>
				
			<div class="widget big-stats-container">
				<div class="shortcuts">
				<table class="table table-striped table-bordered table-hover">
				<thead>
                    <tr>
						<th rowspan=2>No</th>
                        <th rowspan=2>Nama Barang</th>
                        <th rowspan=2>Total Stok Barang</th>
                        <th colspan=3><center>Penjualan</center></th>
                        <th rowspan=2>Total</th>
                        <th rowspan=2>C1</th>
                        <th rowspan=2>C2</th>
                        <th rowspan=2>Hasil</th>
                        <!-- <th rowspan=2>Aksi</th>
                        <td align='center'>
						<a href='?p=hasil&act=detail&it=$it&x1=$px1&y1=$py1&x2=$px2&y2=$py2&id=$r[id]' class='btn btn-xs btn-more'><span class='icon-search'> Detail</span></a>
					</td> -->
                    </tr>
					<tr>
						<th>Januari</th>
						<th>Februari</th>
						<th>Maret</th>
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
					$ketmin="C1";
				}else{
					$ketmin="C2";					
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
			  
			  <?php
			  //ITERASI 3
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
				echo"<h2>&nbsp;Iterasi $it</h2>";
				echo'<p>&nbsp;Pusat Cluster ke-1 : {'.$px1.', '.$py1.'}</p>';
				echo'<p>&nbsp;Pusat Cluster ke-2 : {'.$px2.', '.$py2.'}</p>';
				?>
				
			<div class="widget big-stats-container">
				<div class="shortcuts">
				<table class="table table-striped table-bordered table-hover">
				<thead>
                    <tr>
						<th rowspan=2>No</th>
                        <th rowspan=2>Nama Barang</th>
                        <th rowspan=2>Total Stok Barang</th>
                        <th colspan=3><center>Penjualan</center></th>
                        <th rowspan=2>Total</th>
                        <th rowspan=2>C1</th>
                        <th rowspan=2>C2</th>
                        <th rowspan=2>Hasil</th>
                        <!-- <th rowspan=2>Aksi</th>
                        <td align='center'>
						<a href='?p=hasil&act=detail&it=$it&x1=$px1&y1=$py1&x2=$px2&y2=$py2&id=$r[id]' class='btn btn-xs btn-more'><span class='icon-search'> Detail</span></a>
					</td> -->
                    </tr>
					<tr>
						<th>Januari</th>
						<th>Februari</th>
						<th>Maret</th>
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
					$ketmin="C1";
				}else{
					$ketmin="C2";					
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
					<div class="tab-pane" style="padding-left:10px;" id="formcontrols">
					<h2>Nama Barang <?php echo"$r[nmb]"; ?></h2>
					<h4>1. Pusat Cluster</h4>
					<?php
					echo'Pusat Cluster 1 : {'.$_GET[x1].','.$_GET[y1].'}<br/>';
					echo'Pusat Cluster 2 : {'.$_GET[x2].','.$_GET[y2].'}<br/>';
					?>
					<h4>2. Perhitungan Jarak Cluster</h4>
					<?php
					$sub=$r['jan']+$r['feb']+$r['mar'];
					$c1=sqrt((pow(($r['stok']-$_GET[x1]),2))+(pow(($sub-$_GET[y1]),2)));
					$c2=sqrt((pow(($r['stok']-$_GET[x2]),2))+(pow(($sub-$_GET[y2]),2)));
					$min=0;
					$min=min($c1,$c2);
					
					if($c1==$min){
						$ketmin="C1 (Laris)";
					}elseif($c2==$min){
						$ketmin="C2 (Tidak Laris)";
					}
				
					echo"Jarak ke Cluseter 1 : D1 = sqrt((pow(($r[stok]-$_GET[x1]),2))+(pow(($sub-$_GET[y1]),2))) = $c1<br/>";
					echo"Jarak ke Cluseter 2 : D2 = sqrt((pow(($r[stok]-$_GET[x2]),2))+(pow(($sub-$_GET[y2]),2))) = $c2<br/>";
					?>
					<h4>3. Hasil</h4>
					<?php
					echo"<b>$ketmin</b>";
					?>
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