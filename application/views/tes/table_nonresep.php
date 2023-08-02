<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Lihat Penjualan Non Resep</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix">
				</div>
			</div>

			<div class="x_content">
				<?php if($this->session->flashdata('inv_added')): ?>
                  <button id="melinda" style="display: none;" class="btn btn-default source" onclick="new PNotify({
                                  title: 'Berhasil',
                                  text: '<?php echo $this->session->flashdata('inv_added'); ?>',
                                  type: 'success',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });">Success</button>
                 	</div>
                 	
				<?php endif; ?>

				<a href="<?php echo base_url('transaksi/form_nonresep') ?>"><button type="button" class="btn btn-success" style="margin-bottom: 13px"><span class="fa fa-plus"></span> Tambah Non-Resep </button></a>
				
				<table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Tanggal Transaksi</th>
							<th>No Referensi</th>
							<!-- <th>Nama Pembeli</th> -->
							
							<th>Banyak</th>
							<th>Total Penjualan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>

				</table>
		</div>
	</div>
	</div>

</div>