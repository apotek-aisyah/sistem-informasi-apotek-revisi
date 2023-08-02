<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Edit Penjualan Resep</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
         
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      
        <form action="<?php echo base_url(). 'transaksi/update'; ?>" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left" novalidate>
        <input type="hidden" name="no_resep" value="<?php echo $resep->no_resep?>">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Dokter</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="nama_dokter" name="nama_dokter" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" required="required" value="<?php echo $resep->nama_dokter?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telepon Dokter</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="telp_dokter" name="telp_dokter" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resep->telp_dokter?>">
            </div>
          </div>
         
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Klinik</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="klinik" name="klinik" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resep->klinik?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama Pasien</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="nama_pasien" name="nama_pasien" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resep->nama_pasien?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telepon Pasien</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="telp_pasien" name="telp_pasien" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resep->telp_pasien?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obat">Nama Obat</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="obat_id" id="obat_id" class="select2_single form-control" tabindex="-1">
                <?php foreach ($table_med as $row): ?>
                    <option value="<?php echo $row->id_obat?>" <?php if($row->id_obat == $resep->obat_id)
                    echo 'selected'; ?>><?php echo $row->nama_obat ?></option>
                <?php endforeach; ?>
  
              </select>
            </div>
          </div>
          

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="<?php echo base_url('transaksi/table_resep') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
              <button id="send" type="submit" class="btn btn-success">Edit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
