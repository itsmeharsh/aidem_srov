<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2"> <?php echo $title;?>
            </h4>
            <div class="row">
                <form name="form_ads" id="form_ads" method="post" action="<?php echo base_url();?>admin/ads/save" enctype="multipart/form-data" >
                    <input type="hidden" name="ads_id" value="<?php echo $AdsData['id'];?>" id="id" />
                    <div class="row">
                         <?php if($AdsData['id']==''){ ?>   

                        <div class="col s12">
                            <label class="" for="businessdata">select Business for advertisment</label>
                            <select class="browser-default" name="business_id">
                                <?php foreach($BusinessData as $business){ ?>
                                    <option value="<?php echo $business->id; ?>" <?php if($business_id==$business->id){ echo 'selected'; } ?>><?php echo $business->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <?php } else { ?>
                               <input type="hidden" name="business_id" value="<?php echo $AdsData['business_id'];?>" id="id" /> 
                         <?php } ?>
<!--                        <div class="col s12">
                            <label class="" for="businessdata">select city for advertisment</label>
                            <select class="browser-default" name="cityID">
                                <?php foreach($CityData as $City){ ?>
                                    <option value="<?php echo $City->id; ?>"><?php echo $City->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col s12">
                            <label for="text" class="" for="title">Title</label>
                            <input type="text" id="title" name="title" value="<?php echo $AdsData['title'];?>" class="" maxlength="50" tab-index="2" required="true">
                        </div>
                        <div class="col s12">
                            <label for="text" class="" for="description">Description</label>
                            <textarea class="materialize-textarea" id="description" name="description" rows="5" tab-index="7" required="true"><?php echo $AdsData['description'];?></textarea>
                        </div>-->
                        <div class="col s12">
                            <label class="" for="time">Time (Advertisment will play on headrest with this time)</label>
                            <select class="browser-default" name="time" id="time">
                                <option value="5">5 Sec</option>
                                <option value="10">10 Sec</option>
                                <option value="15">15 Sec</option>
                                <option value="20">20 Sec</option>
                                <option value="25">25 Sec</option>
                                <option value="30">30 Sec</option>
                                <option value="35">35 Sec</option>
                                <option value="40">40 Sec</option>
                                <option value="45">45 Sec</option>
                                <option value="50">50 Sec</option>
                                <option value="55">55 Sec</option>
                                <option value="60">60 Sec</option>
                                <option value="65">65 Sec</option>
                                <option value="70">70 Sec</option>
                                <option value="75">75 Sec</option>
                                <option value="80">80 Sec</option>
                                <option value="85">85 Sec</option>
                                <option value="90">90 Sec</option>
                                <option value="100">100 Sec</option>
                                <option value="110">110 Sec</option>
                                <option value="120">120 Sec</option>
                                <option value="130">130 Sec</option>
                                <option value="140">140 Sec</option>
                                

                            </select>
                           
                        </div>
<!--                        <div class="col s12">
                            <label for="text" class="" for="address">Address</label>
                            <textarea class="materialize-textarea" id="address" name="address" rows="5" tab-index="8" required="true"><?php echo $AdsData['address'];?></textarea>
                        </div>-->
                        <div class="col s12">

                            <label class="" for="status">Advertisment type</label>
                            <select class="browser-default" name="ads_type" id="ads_type">
                                <option value="1">Banner Ads</option>
                                <option value="2">Footer Ads</option>
                                <option value="3">Both</option>

                            </select>


                        </div>
<!--                        <div class="col s12" id="banner">
                            <label for="text" class="" for="address">Banner Image</label>
                            <input type="file" name="image" id="video_path"  value="" class="file-path">
                        </div>
                        <div class="col s12" style="display: none;" id="footer">
                            <label for="text" class="" for="address">Footer Image</label>
                            <input type="file" name="image_footer" id="video_path"  value="" class="file-path">
                        </div>-->


                        <div class="col s6" >
                            <label for="text" class="" for="start_time">start time</label>
                            <input type="date" name="start_time" id="start_time"  value="<?php echo $AdsData['start_time'] ? $AdsData['start_time']:'';?>" class="">
                        </div>
                        <div class="col s6" >
                            <label for="text" class="" for="end_time">end time</label>
                            <input type="date" name="end_time" id="end_time"  value="<?php echo $AdsData['end_time'] ? $AdsData['end_time']:'';?>" class="">
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




