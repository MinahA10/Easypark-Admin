<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Gestion Porte Feuille Client</h3>
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
                            <h4 class="card-title">Liste des Recharge Porte Feuille Non Valider</h4>
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
                                                <th>Date demande</th>
                                                <th>Nom Client</th>
                                                <th>Montant demander</th>
                                                <th>Etat</th> 
                                                <th>Option</th>     
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($i=0;$i<count($portefeuille);$i++) {
                                        ?>
                                            <tr>
                                                <td scope="row"><?php echo $portefeuille[$i]['daty']?></td>
                                                <td scope="row"><?php echo $portefeuille[$i]['nom'].' '. $portefeuille[$i]['prenom']?></td>
                                                <td scope="row"><?php echo $portefeuille[$i]['inserer']?></td>
                                                <td scope="row"><?php echo $portefeuille[$i]['etat']?></td>
                                                <td scope="row"><button type="button" class="btn btn-info">
                                                <a href="<?php echo site_url("PorteFeuilleController/validation?id=".$portefeuille[$i]['id'].'&iddetail='.$portefeuille[$i]['iddetail'].'&demander='.$portefeuille[$i]['inserer'].'&solde='.$portefeuille[$i]['montant']);?>">Valider</a></button>
                                                </td>
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
