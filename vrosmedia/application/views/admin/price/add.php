<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2"> <?php echo $title;?>
            </h4>
            <div class="row">
                <form name="form_business" id="form_business" method="post" action="<?php echo base_url();?>admin/setting/save_price" >
                    <input type="hidden" name="id" value="<?php echo $PriceData['id'];?>" id="id" />
                    <div class="row">

                        <div class="col s6">
                            <label class="" for="Name">Name</label>
                            <input type="text" id="type" name="type" value="<?php echo $PriceData['type'];?>" class="" maxlength="50" tab-index="2" required="true">
                        </div>

                        <div class="col s6">
                            <label class="" for="duration_in_days">Duration (In days)</label>
                            <input type="text" id="duration_in_days" name="duration_in_days" value="<?php echo $PriceData['duration_in_days'];?>" class="" maxlength="50" tab-index="2" required="true">
                        </div>
                        <div class="col s12">
                            <label class="" for="Price">Price (In $)</label>
                            <input type="text" id="price" name="price" value="<?php echo $PriceData['price'];?>" class="" maxlength="50" tab-index="2" required="true">
                        </div>
                         <div class="col s12">
                            <label class="" for="Price">Time (In Sec-ads play on headrest with this time)</label>
                            <input type="text" id="time" name="time" value="<?php echo $PriceData['time'];?>" class="" maxlength="50" tab-index="2" required="true">
                        </div>


                       <div class="col s12">

                        <label class="" for="ads_type">Ads Type</label>
                        <select class="browser-default" name="ads_type">
                            <option value="1">Banner Ads</option>
                            <option value="2">Footer Active</option>

                        </select>


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

