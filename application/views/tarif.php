<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Gestion Tarif Client</h3>
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
        <section class="basic-inputs">
            <div class="row match-height">
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Insertion nouveau Tarif</h4>
                    </div>
                    <?php
                        $error = $this->session->flashdata('error');
                        if($error)
                        {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $error; ?>                    
                        </div>
                        <?php }
                            $success = $this->session->flashdata('success');
                            if($success)
                            {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong>Nouveau Tarif bien enregistrer.
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        </div>
                    <?php } ?>
                    <div class="card-block">
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url('TarifController/ajout')?>" enctype="multipart/form-data">
                                <h5 class="mt-2">Nom du Tarif:</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="basicInput"  name="tarif" required>
                                </fieldset>
                                <h5 class="mt-2">Duree:</h5>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="basicInput"  name="duree" required>
                                </fieldset>
                                <h5 class="mt-2">Prix:</h5>
                                <fieldset class="form-group">
                                    <input type="number" class="form-control" id="basicInput"  name="prix" required>
                                </fieldset>
                                <fieldset class="form-group">
                                <input type="submit"  class="btn btn-info" id="basicInput"  value="Inserer">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="content-body"><!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Liste des Tarif Dispo</h4>
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
                                                    <th>#</th>
                                                    <th>Nom du Tarif</th>
                                                    <th>Duree</th>
                                                    <th>Prix</th>
                                                    <th>Modifier</th> 
                                                    <th>Supprimer</th>     
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i=0;$i<count($tarifs);$i++) {
                                                    ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $tarifs[$i]['id'];?></td>
                                                        <td scope="row"><?php echo $tarifs[$i]['tarif'];?></td>
                                                        <td scope="row"><?php echo $tarifs[$i]['temp'];?></td>
                                                        <td scope="row"><?php echo $tarifs[$i]['prix'];?></td>
                                                        <td scope="row"><button type="button" class="btn btn-info">
                                                            <a href="<?php echo site_url("TarifController/modifier?id=".$tarifs[$i]['id']);?>">Modifier</a></button>
                                                        </td>
                                                        <td scope="row"><button type="button" class="btn btn-info">
                                                            <a href="<?php echo site_url("TarifController/supprimer?id=".$tarifs[$i]['id']);?>">Delete</a></button>
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
</div>