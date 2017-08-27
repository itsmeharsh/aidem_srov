<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2"> <?php echo $title;?>
            </h4>
            <div class="row">
                <form name="form_ads" id="form_ads" method="post" action="<?php echo base_url();?>admin/offers/save" enctype="multipart/form-data" >
                    <input type="hidden" name="offer_id" value="<?php echo $OfferData['id'];?>" id="id" />
                    <div class="row">
                         <?php if($AdsData['id']==''){ ?>   

                        <div class="col s12">
                            <label class="" for="businessdata">select Business for offers</label>
                            <select class="browser-default" name="business_id">
                                <?php foreach($BusinessData as $business){ ?>
                                    <option value="<?php echo $business->id; ?>" <?php if($business_id==$business->id){ echo 'selected'; } ?>><?php echo $business->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <?php } else { ?>
                               <input type="hidden" name="business_id" value="<?php echo $OfferData['business_id'];?>" id="id" /> 
                         <?php } ?>


                        <div class="col s6" >
                            <label for="text" class="" for="start_time">start time</label>
                            <input type="date" name="start_time" id="start_time"  value="<?php echo $OfferData['start_time'] ? $OfferData['start_time']:'';?>" class="">
                        </div>
                        <div class="col s6" >
                            <label for="text" class="" for="end_time">end time</label>
                            <input type="date" name="end_time" id="end_time"  value="<?php echo $OfferData['end_time'] ? $OfferData['end_time']:'';?>" class="">
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




