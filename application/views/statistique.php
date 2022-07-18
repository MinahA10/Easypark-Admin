<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Statistique Utilisation Place Parking"
	},
	axisY: {
		title: ""
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "",
		dataPoints: [
      <?php foreach($placeStat as $stat  )    {?>
			{ y: <?php echo $stat['effectif']?>, label: " <?php echo $stat['id']?>" },
      <?php }?>
		]
	}]
});   
chart.render();
}
</script>
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
                                    <li class="breadcrumb-item"><a href="index.html">Statistique</a></li>
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
                                <div id="chartContainer" style="height: 200px; max-width: 340px; margin: 50px;"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>