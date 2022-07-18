<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Detail Parking</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Tables
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Liste Parking Non libre</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Ref. Parking</th>
                                                <th>Vehicule</th>
                                                <th>Date/Heure Debut</th>
                                                <th>Temp du tarif</th>
                                                <th>Reste</th>
                                                <th>Etat</th>    
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($i=0;$i<count($parkings);$i++) {
                                           
                                            if($parkings[$i]['etat']=='Libre'){
                                                $couleur="btn btn-warning btn-min-width mr-1 mb-1";
                                            }else{
                                                $couleur="btn btn-primary btn-min-width mr-1 mb-1";
                                            }
                                        ?>
                                            <tr>
                                                <td scope="row"><?php echo $parkings[$i]['id']?></td>
                                                <td scope="row"><?php echo $parkings[$i]['voiture']?></td>
                                                <td scope="row"><?php echo $parkings[$i]['debutarrive']?></td>
                                                <td scope="row"><?php echo $parkings[$i]['sommeduree']?></td>
                                                <td scope="row"><?php echo $parkings[$i]['etat']?></td>
                                                <td scope="row"> <button type="button" class="<?php echo $couleur;?>"></button></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
