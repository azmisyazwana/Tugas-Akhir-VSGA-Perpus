<html>
<head>
</head>
 
<body>
     <center>

       <table  cellspacing="0" cellpadding="5"  width="50%" >
                       <?php
                            $no=1;
                            foreach($read as $r) {?>
                  <tr>
                    <th colspan="2"> <h4>Kartu Anggota</h4></th>
                  </tr>
                  <tr>
                     <td colspan="2" align="center"><img src="<?= base_url()?>assets/img/<?= $r->image ?>" height="100px" style="border-radius:20px"></td>
                  </tr>
                   <tr>
                     <th class="text-center" align="right">ID Anggota</th>
                    <td width="50%" align="left"><?= $r->id_anggota ?></td>
                  </tr>
                  <tr>
                    <th class="text-center" align="right">Nama</th>
                     <td><?= $r->nama ?></td>
                  </tr>
                 <tr>
                    <th class="text-center" align="right">Jenis Kelamin</th>
                    <td><?= $r->jenis_kelamin ?></td>
                  </tr>
                  <tr>
                    <th class="text-center" align="right">Alamat</th>
                     <td><?= $r->alamat ?></td>
                  </tr>
                    <?php } ?>
    </table>
    </div>   
    <script>
window.print() ;
</script>           
  </center>
</body>

</html>
