<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM parcels where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
if($to_branch_id > 0 || $from_branch_id > 0){
	$to_branch_id = $to_branch_id  > 0 ? $to_branch_id  : '-1';
	$from_branch_id = $from_branch_id  > 0 ? $from_branch_id  : '-1';
$branch = array();
 $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches where id in ($to_branch_id,$from_branch_id)");
    while($row = $branches->fetch_assoc()):
    	$branch[$row['id']] = $row['address'];
	endwhile;
}
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="callout callout-info">
					<dl>
						<dt>Numero Trackeur:</dt>
						<dd> <h4><b><?php echo $reference_number ?></b></h4></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Information Fournisseur</b>
					<dl>
						<dt>Fournisseur:</dt>
						<dd><?php echo ucwords($sender_name) ?></dd>
						<dt>Numero P.O:</dt>
						<dd><?php echo ucwords($Ponumber) ?></dd>
						<dt>Date d'arrivée:</dt>
						<dd><?php echo ucwords($sender_address) ?></dd>
						<dt>Date de livraison:</dt>
						<dd><?php echo ucwords($sender_contact) ?></dd>
					</dl>
				</div>
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Autres Informations</b>
					<dl>
						<dt>Numero Licence:</dt>
						<dd><?php echo ucwords($recipient_name) ?></dd>
						<dt>Titre de transport:</dt>
						<dd><?php echo ucwords($recipient_address) ?></dd>
						<dt>Feri:</dt>
						<dd><?php echo ucwords($recipient_contact) ?></dd>
					</dl>
				</div>
			</div>
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Details d'importation</b>
						<div class="row">
							<div class="col-sm-6">
								<dl>
									<dt>Poids:</dt>
									<dd><?php echo $weight ?></dd>
									<dt>Description:</dt>
									<dd><?php echo $height ?></dd>
									<dt>Valeur d'importation:</dt>
									<dd><?php echo number_format($price,2) ?></dd>
								</dl>	
							</div>
							<div class="col-sm-6">
								<dl>
									<dt>Inconterm:</dt>
									<dd><?php echo $width ?></dd>
									<dt>Port d'entré:</dt>
									<dd><?php echo $length ?></dd>
									<dt>Type:</dt>
									<dd><?php echo $type == 1 ? "<span class='badge badge-primary'>Aerien</span>":"<span class='badge badge-info'>Maritime</span>" ?></dd>
								</dl>	
							</div>
						</div>
					<dl>
						<dt>Transitaire en Charge:</dt>
						<dd><?php echo ucwords($branch[$from_branch_id]) ?></dd>
						
						<?php if($type == 2): ?>
							
							<dd><?php echo ucwords($branch[$to_branch_id]) ?></dd>
						<?php endif; ?>
						<dt>Status:</dt>
						<dd>
							<?php 
							switch ($status) {
								case '1':
									echo "<span class='badge badge-pill badge-info'> En cours</span>";
									break;
								case '2':
									echo "<span class='badge badge-pill badge-info'> Livré</span>";
									break;
								
								default:
									echo "<span class='badge badge-pill badge-info'> Attendus</span>";
									
									break;
							}

							?>
							<span class="btn badge badge-primary bg-gradient-primary" id='update_status'><i class="fa fa-edit"></i> Update Status</span>
						</dd>

					</dl>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
<noscript>
	<style>
		table.table{
			width:100%;
			border-collapse: collapse;
		}
		table.table tr,table.table th, table.table td{
			border:1px solid;
		}
		.text-cnter{
			text-align: center;
		}
	</style>
	<h3 class="text-center"><b>Student Result</b></h3>
</noscript>
<script>
	$('#update_status').click(function(){
		uni_modal("Update Status of: <?php echo $reference_number ?>","manage_parcel_status.php?id=<?php echo $id ?>&cs=<?php echo $status ?>","")
	})
</script>