<?php
namespace Vanderbilt\AdministratorOnlyDAGRenaming;

class AdministratorOnlyDAGRenaming extends \ExternalModules\AbstractExternalModule{
	function redcap_every_page_top(){
		if(strpos($_SERVER['REQUEST_URI'], '/DataAccessGroups/index.php') !== false && !SUPER_USER){
			?>
			<script>
				$(function(){
					$('#table-dags_table .editText').click(function(e){
						e.stopImmediatePropagation()
						alert("Only REDCap administrators are allowed to rename DAGs on this project.")
					})
				})
			</script>
			<?php
		}
	}
}