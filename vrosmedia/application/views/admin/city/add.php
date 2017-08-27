<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2"> <?php echo $title;?>
            </h4>
            <div class="row">
                <form name="form_business" id="form_business" method="post" action="<?php echo base_url();?>admin/setting/save_city" >
                    <input type="hidden" name="id" value="<?php echo $CityData['id'];?>" id="id" />
                    <div class="row">

                        <div class="col s6">
                            <label class="" for="Name">Name</label>
                            <input type="text" id="type" name="name" value="<?php echo $CityData['name'];?>" class="" maxlength="50" tab-index="2" required="true">
                        </div>

                        <div class="col s6">
                            <label class="" for="duration_in_days">Country</label>
                            <input type="text"  value="USA" readonly>
                        </div>
                       


                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                <i class="mdi-content-send right">
                                </i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

