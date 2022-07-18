<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Gestion Date et Heure Systeme</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Date Systeme
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
                        <h3 class="card-title">Heure Actuel: <?php echo $dates;?></h3><br>
                    </div>
                    <div class="card-block">
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url('DatyController/update')?>" enctype="multipart/form-data">
                                <h5 class="mt-2">Update Heure:</h5>
                                <fieldset class="form-group">
                                    <input type="time" class="form-control" id="basicInput"  name="heure" required>
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
    </div>
</div>