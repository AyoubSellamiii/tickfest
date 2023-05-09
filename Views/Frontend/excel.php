<?php
  include_once '..\..\Model\Reclamation.php';
  include_once '..\..\Controller\ReclamationC.php';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=liste_des_reclamation.com.xls");
$reclamationC = new ReclamationC();
 $reclamation = $reclamationC->afficherReclamation();
 ?>
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border='2'>
                                    <thead>

  <tr>
  <th>id_reclamtion</th>
            <th>sujet</th>
            <th>contact</th>
            <th>description</th>
            <th>date_creation</th>
            <th>type</th>

  </tr>
  
  <?php 
                foreach($reclamation as $reclamation) {
        ?>

<td><?php echo $reclamation['id_reclamtion']; ?></td>
            <td><?php echo $reclamation['sujet']; ?></td>
            <td><?php echo $reclamation['contact']; ?></td>
            <td><?php echo $reclamation['description']; ?></td>
            <td><?php echo $reclamation['date_creation']; ?></td>
            <td><?php echo $reclamation['type']; ?></td>
                                               
                                               
                                               
                                                
                                                </tr>
                                            
                                                </div>
                      </div>
                  </div>

              </div>
              <!-- /.container-fluid -->

          </div>


      <?php
              }
      ?>
</table>