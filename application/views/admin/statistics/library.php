<script src="<?php echo base_url() ?>assets/js/Chart.min.js"></script>		
		<div class="page-option-view"> 
			<span class="label-select-stat">
				Select Section: 
				<select id="stat-options" class="select-change-input" onChange="changeContent();">
				  <option value="lib-type-div">Material Type</option>
				  <option value="lib-dep-div">Department</option>
				  <option value="lib-sec-div">Library Section</option>
				  <option value="lib-time-div">Time & Date</option>
				</select>
			</span>

			<div id="lib-type-div" class="lib-group">
				<div class="canvas-chart-holder">
					<canvas id="lib-mat" width="400" height="250"></canvas>
				</div>
				<script>
					new Chart(document.getElementById("lib-mat"), {
					type: 'pie',
					data: {
					  labels: ["Books", "Magazine", "Research", "Multimedia", "Journal"],
					  datasets: [{
						label: "Population (millions)",
						backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
						data: [20,123,45,343,341]
					  }]
					},
					options: {
					  title: {
						display: true,
						text: 'Material Types'
					  }
					}
					});
				</script>
			</div>

			<div id="lib-dep-div" class="lib-group">
				<div class="canvas-chart-holder">
					<canvas id="lib-dep" width="400" height="250"></canvas>
				</div>
				<script>
					new Chart(document.getElementById("lib-dep"), {
					type: 'pie',
					data: {
					  labels: ["CCS", "CTHRM", "CED", "CAS", "CAFA"],
					  datasets: [{
						label: "Population (millions)",
						backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
						data: [2478,5267,734,784,433]
					  }]
					},
					options: {
					  title: {
						display: true,
						text: 'Departments'
					  }
					}
					});
				</script>
			</div>

			<div id="lib-sec-div" class="lib-group">
				<div class="canvas-chart-holder">
					<canvas id="lib-sec" width="400" height="250"></canvas>
				</div>
				<script>
					new Chart(document.getElementById("lib-sec"), {
					type: 'pie',
					data: {
					  labels: ["Circulation", "References", "Filipiniana"],
					  datasets: [{
						label: "Population (millions)",
						backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
						data: [2478,5267,734]
					  }]
					},
					options: {
					  title: {
						display: true,
						text: 'Library Sections'
					  }
					}
					});
				</script>
			</div>
			<div id="lib-time-div" class="lib-group">
				<div class="canvas-chart-holder">
					<canvas id="lib-time" width="400" height="250"></canvas>
				</div>
				<script>
					new Chart(document.getElementById("lib-time"), {
					type: 'pie',
					data: {
					  labels: ["Circulation", "References", "Filipiniana"],
					  datasets: [{
						label: "Population (millions)",
						backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
						data: [2478,5267,734]
					  }]
					},
					options: {
					  title: {
						display: true,
						text: 'Time & Date'
					  }
					}
					});
				</script>

			</div>
	
		</div> <!-- end of page option view -->
	</div><!-- end of page content -->
</div> <!-- end of page body holder -->  