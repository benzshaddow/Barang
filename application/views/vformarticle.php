<?php $this->load->view('header'); ?>
<?php
if($aksi=='aksi_add'){
	$id="";
	$judul="";
	$isi="";
	$author="";
	$tags="";
	$tanggal="";
}else{
	foreach($qdata as $rowdata){
		$id		= $rowdata->id_article;
		$judul	= $rowdata->judul;
		$isi	= $rowdata->isi;
		$author	= $rowdata->author;
		$tags	= $rowdata->tags;
		$tanggal= $rowdata->tanggal;
	}
}
?>
<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
	<div class="panel-heading"><b>Form Article</b></div>
	<div class="panel-body">
	<?=$this->session->flashdata('pesan')?>
	<form action="<?=base_url();?>article/form/<?=$aksi?>" method="post" enctype="multipart/form-data">
		<table class="table table-striped">
         <tr>
          <td style="width:15%;">Judul</td>
          <td>
            <div class="col-sm-8">
                <input type="hidden" name="id" class="form-control" value="<?=$id?>" required>
                <input type="text" name="judul" class="form-control" value="<?=$judul?>" placeholder="Judul Article" required>
            </div>
            </td>
         </tr>
         <tr>
          <td>Isi</td>
          <td>
            <div class="col-sm-8">
                <textarea type="text" name="isi" class="form-control" placeholder="Isi Article" required><?=$isi?></textarea>
            </div>
            </td>
         </tr>
         <tr>
          <td>Author</td>
          <td> <div class="col-sm-8">
          <input type="text" name="author" class="form-control" placeholder="Nama Author. etc: Benny" value="<?=$author?>" required>
          </div>
          </td>
         </tr>
         <tr>
          <td>Tags</td>
          <td>
          <div class="col-sm-8">
            <input type="text" name="tags" class="form-control" placeholder="Tags Article" value="<?=$tags?>" required>
          </div>
          </td>
         </tr>
		 <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Simpan">
            <a href="<?=base_url();?>article" type="reset" class="btn btn-default">Batal</a>
          </td>
         </tr>
       </table>
     </form>
	</div>
    </div> <!-- /panel -->
    </div> <!-- /container -->
<?php $this->load->view('footer'); ?>