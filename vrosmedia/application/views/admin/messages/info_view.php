<?php
if($this->session->userdata('INFO'))
{
	$info = $this->session->userdata('INFO');
	$this->session->unset_userdata('INFO');
	foreach($info as $key => $val){
            echo " <div class='alert'>
                        <button class='close' data-dismiss='alert'>Ã—</button>
                        ".$val."
                    </div>";
        }
}
?>