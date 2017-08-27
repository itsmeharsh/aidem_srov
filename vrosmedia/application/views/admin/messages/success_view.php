<?php
if($this->session->userdata('SUCCESS'))
{
    $success = $this->session->userdata('SUCCESS');
    $this->session->unset_userdata('SUCCESS');
    
    foreach ($success as $key => $val) {
        echo '<div id="card-alert" class="card green lighten-5">
                      <div class="card-content green-text">
                        <p>' . $val . '</p>
                      </div>
            </div>';
    }
}
?>
