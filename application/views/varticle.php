<?php $this->load->view('header');?>
    <div class="container">
	<!-- Main component for a primary marketing message or call to action -->
	<div class="panel panel-default">
  <div class="panel-heading"><b>Daftar Barang</b></div>
  <div class="panel-body">
    <p><?=$this->session->flashdata('pesan')?> </p>
      <a href="<?=base_url()?>article/form/add" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
       <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th>Judul</th>
         <th>Isi</th>
         <th>Author</th>
         <th>Tanggal</th>
         <th>Aksi</th>
         </tr>
        </thead>
        <tbody>
        <?php if(empty($qarticle)){ ?>
         <tr>
          <td colspan="6">Data tidak ditemukan</td>
         </tr>
        <?php }else{
		$no=0;
		foreach($qarticle as $rowarticle){ $no++;?>
         <tr>
          <td><?=$no?></td>
          <td><?=$rowarticle->judul?></td>
          <td><?=$rowarticle->isi?></td>
          <td><?=$rowarticle->author?></td>
          <td><?=$rowarticle->tanggal?></td>
          <td>
           <a href="<?=base_url()?>article/form/edit/<?=$rowarticle->id_article?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
           <a href="<?=base_url()?>article/detail/<?=$rowarticle->id_article?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
           <a href="<?=base_url()?>article/hapus/<?=$rowarticle->id_article?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus article ini?')"><i class="glyphicon glyphicon-trash"></i></a>
          </td>
         </tr>
        <?php }}?>
        </tbody>
       </table>
        </div>
    </div>    <!-- /panel -->
    </div> <!-- /container -->
<?php $this->load->view('footer');?>