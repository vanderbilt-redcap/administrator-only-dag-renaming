<?php
namespace Vanderbilt\AdministratorOnlyDAGRenaming;

class AdministratorOnlyDAGRenaming extends \ExternalModules\AbstractExternalModule{
	function redcap_every_page_top(){
		if(strpos($_SERVER['REQUEST_URI'], '/DataAccessGroups/index.php') !== false && !SUPER_USER){
			?>
			<script>
				$(function(){
					// This applies to new elements as well, to handle the table getting rebuilt when a DAG is added.
					$('#group_table').on('click', '#table-dags_table .editText', function(e){
						e.stopImmediatePropagation()
						alert("Only REDCap administrators are allowed to rename DAGs on this project.")
					})
				})
			</script>
			<?php
		}
	}
}