<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
                <div class="content-header row">
                    <div class="content-header-left col-md-4 col-12 mb-2">
                        <h3 class="content-header-title">Place</h3>
                    </div>
                    <div class="content-header-right col-md-8 col-12">
                        <div class="breadcrumbs-top float-md-right">
                            <div class="breadcrumb-wrapper mr-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active">Places</li>
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
                                    <h4 class="card-title">Insertion nouveau Place</h4>
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
                                        <strong>Success!</strong> Nouveau place bien enregistrer.
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    </div>
                                    <?php } ?>
                                    <div class="card-block">
                                        <div class="card-body">
                                            <form method="post" action="<?php echo base_url('PlaceController/ajouter')?>" enctype="multipart/form-data">
                                                <h5 class="mt-2">Lieu du Place:</h5>
                                                <fieldset class="form-group">
                                                    <input type="text" class="form-control" id="basicInput"  name="lieu" required>
                                                </fieldset>
                                                <h5 class="mt-2">Reference:</h5>
                                                <fieldset class="form-group">
                                                    <input type="text" class="form-control" id="basicInput"  name="reference" required>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                <input type="submit"  class="btn btn-info" id="basicInput"  value="Inserer">
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="content-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Liste des Place Existant</h4>
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
                                                        <th>Lieu</th>
                                                        <th>Reference</th> 
                                                        <th>Modifier Etat</th>   
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php for($i=0;$i<count($places);$i++) {
                                                        ?>
                                                        <tr>
                                                            <td scope="row"><?php echo $places[$i]['id'];?></td>
                                                            <td scope="row"><?php echo $places[$i]['lieu'];?></td>
                                                            <td scope="row"><?php echo $places[$i]['reference'];?></td>
                                                            <?php if($places[$i]['etat']=='En infraction'){?>
                                                            <td scope="row"><button type="button" class="btn btn-warning">
                                                                <a href="<?php echo site_url("PlaceController/finirinfra?id=".$places[$i]['id']);?>">Retirer Infraction</a></button>
                                                            </td>
                                                            <?php }else{?>
                                                                <td scope="row"><button type="button" class="btn btn-info">
                                                                <a href="<?php echo site_url("PlaceController/modifieretat?id=".$places[$i]['id']);?>">En infraction</a></button>
                                                            </td>
                                                            <?php }?>
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