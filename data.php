<div class="span12">
          <div class="widget widget-nopad">
<?php
switch(@$_GET['act']){
default:
?>
<div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Data Produk</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
<br/><p><a href='?module=data&act=tambah' class='btn btn-more'><span class='icon-plus'>Tambah</span></a></p>
				<div class="shortcuts">
				<table class="table table-striped table-bordered table-hover">
				<thead>
                    <tr>
						<th rowspan=2>No</th>
                        <th rowspan=2>Nama Produk</th>
                        <th rowspan=2>Total Stok Produk</th>
                        <th colspan=3><center>Bulan <?php echo date('M - Y') ?></center></th>
                        <th rowspan=2>Total</th>
                        <th rowspan=2>Aksi</th>
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
				$q=mysql_query("select * from data order by nmb asc");
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
					<td>$sub</td>
					<td align='center'>
						<a href='?module=data&act=edit&id=$r[id]' class='btn btn-xs btn-more'>Edit</a>
						<a href='?module=data&act=hapus&id=$r[id]' class='btn btn-xs btn-more' onclick=\"return confirm('yakin data dihappus...???')\">Delete</a>
					</td>
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

case"tambah":
if(isset($_POST['simpan'])){
	mysql_query("insert into data values('','$_POST[nm]','$_POST[stok]','$_POST[jan]','$_POST[feb]','$_POST[mar]');");
	echo"
	<script>
		alert('Data Tersimpan');
		window.location.href='?module=data';
	</script>
	";
}
?>
	<div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Tambah Produk</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container"><br/>
		<div class="tab-pane" id="formcontrols">
								<form id="edit-profile" method="post" action="" class="form-horizontal">
									<fieldset>
										
										<div class="control-group">											
											<label class="control-label" for="email">Nama Produk</label>
											<div class="controls">
												<input type="text" class="span2" name="nm">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="email">Total Stok Produk</label>
											<div class="controls">
												<input type="text" class="span1" name="stok">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="email">Transaksi</label>
											<div class="controls">
												<input type="text" class="span1" name="jan">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="email">Penjualan</label>
											<div class="controls">
												<input type="text" class="span1" name="feb">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="email">Rata-rata Penjualan</label>
											<div class="controls">
												<input type="text" class="span1" name="mar">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<br>
										<div class="form-actions">
											<button type="submit" name="simpan" class="btn btn-more">Save</button> 
						<button class="btn btn-back" onclick="history.back(-1)">Cancel</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
								
		</div>
	</div>
<?php
break;

case"edit":
$r=mysql_fetch_array(mysql_query("select * from data where id='$_GET[id]'"));
if(isset($_POST['simpan'])){
	mysql_query("update data set nmb='$_POST[nm]',stok='$_POST[stok]',jan='$_POST[jan]',feb='$_POST[feb]',mar='$_POST[mar]' where id='$_GET[id]'");
	echo"
	<script>
		alert('Data diubah');
		window.location.href='?module=data';
	</script>
	";
}
?>
	<div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Edit Produk</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container"><br/>
		<div class="tab-pane" id="formcontrols">
								<form id="edit-profile" method="post" action="" class="form-horizontal">
									<fieldset>
										
										<div class="control-group">											
											<label class="control-label" for="email">Nama Produk</label>
											<div class="controls">
												<input type="text" class="span2" name="nm" value="<?php echo"$r[nmb]"; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="email">Total Stok Produk</label>
											<div class="controls">
												<input type="text" class="span1" name="stok" value="<?php echo"$r[stok]"; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="email">Transaksi</label>
											<div class="controls">
												<input type="text" class="span1" name="jan" value="<?php echo"$r[jan]"; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="email">Penjualan</label>
											<div class="controls">
												<input type="text" class="span1" name="feb" value="<?php echo"$r[feb]"; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="email">Rata-rata Penjualan</label>
											<div class="controls">
												<input type="text" class="span1" name="mar" value="<?php echo"$r[mar]"; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<br>
										<div class="form-actions">
											<button type="submit" name="simpan" class="btn btn-more">Ubah</button> 
											<button class="btn btn-more">Cancel</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
								
		</div>
	</div>
<?php
break;

case"hapus":
if(isset($_GET['id'])){
	mysql_query("delete from data where id='$_GET[id]';");
	echo"
	<script>
		alert('Data dihapus');
		window.location.href='?module=data';
	</script>
	";
}
break;
}
?>
          </div>
          <!-- /widget -->
          
          <!-- /widget -->
          <!-- /widget --> 
        </div>
        