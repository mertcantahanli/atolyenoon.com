  <?php include 'header.php' ?>
  
  <?php
    $calismalarim= $baglanti-> query("SELECT * FROM makale order by sira ")->fetchAll(PDO::FETCH_OBJ);
    
  ?>
  <div class="row">
  <?php 
    foreach($calismalarim as $row){
  ?>
    <div class="col-lg-4 col-md-8 col-xs-8 w-100 ">
  
  <div class="z" >
    <div class="card-deck">
      <div class="card" style="margin-bottom: 25px;"> <a href="detayurun.php?id=<?=$row->id ?>">
         
      <img class="card-img-top" src="admin/assets/images/<?=$row->foto ?>" alt="Card image cap">
       <div class="card-body">
            <h5 class="card-title"><?=$row->baslik ?></h5>
            <p class="card-text" style="text-align:right; "><small class="text-muted"><?=$row->icerik ?></small></p>
        </a></div>
    </div>
    </div>
    </div>
    
    </div>
    <?php } ?>
    <hr>
  <?php include 'footer.php' ?>