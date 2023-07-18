<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Lihat Penyimpanan Obat</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php if($this->session->flashdata('storage_added')): ?>
                  <button id="melinda" style="display: none;" class="btn btn-default source" onclick="new PNotify({
                                  title: 'Berhasil',
                                  text: '<?php echo $this->session->flashdata('storage_added'); ?>',
                                  type: 'success',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });">Success</button>
                 	</div>
                 	
				<?php endif; ?>

				<a href="<?php echo base_url('penyimpanan/form_storage') ?>"><button type="button" class="btn btn-success" style="margin-bottom: 13px"><span class="fa fa-plus"></span> Tambah Pemasok </button></a>
				
				<table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Penyimpanan</th>
							<th>Aksi</th>
							
						</tr>
					</thead>
						<?php $sn = 1 ?>
					<tbody>
						
						<?php foreach($table_storage as $ts){ ?>
						<tr>
							<th scope="row"><?= $sn ?></th>
							<td><?php echo $ts->name ?></td>
							<td style=" text-align: center;">
								<?php echo anchor('penyimpanan/edit_form_storage/'.$ts->id, '<button class="btn btn-info btn-xs" type="button"><span class="fa fa-pencil"></span></button>'); ?>
								<?php echo anchor('penyimpanan/remove_storage/'.$ts->id, '<button class="btn btn-danger btn-xs" type="button"><span class="fa fa-trash"></span></button>');?>
					         </td>
						</tr>
						<?php $sn++; ?>

						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
