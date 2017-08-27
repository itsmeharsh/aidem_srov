<?php

if ($this->session->userdata('ERROR')) {
    $errors = $this->session->userdata('ERROR');
    $this->session->unset_userdata('ERROR');
    foreach ($errors as $key => $val) {
        echo '<div id="card-alert" class="card red lighten-5">
                      <div class="card-content red-text">
                        <p>' . $val . '</p>
                      </div>
</div>';
    }
}
?>

