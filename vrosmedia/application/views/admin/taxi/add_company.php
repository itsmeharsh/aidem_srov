<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2"> <?php echo $title;?>
            </h4>
            <div class="row">
                <form name="form_business" id="form_business" method="post" action="<?php echo base_url();?>admin/taxi/save_company" >
                    <input type="hidden" name="id" value="<?php echo $CompanyData['id'];?>" id="id" />
                    <div class="row">

                        <div class="col s12">
                            <label class="" for="Name">Name</label>
                            <input type="text" id="name" name="name" value="<?php echo $CompanyData['name'];?>" class="" maxlength="50" tab-index="2" required="true">
                        </div>

                        <div class="col s12">
                            <label class="" for="Description">Description</label>
                            <textarea class="materialize-textarea" id="description" name="description" rows="5" tab-index="8"><?php echo $CompanyData['description'];?></textarea>
                        </div>

                        <div class="col s12">

                            <label class="" for="status">status</label>
                            <select class="browser-default" name="active">
                                <option value="1">Active</option>
                                <option value="0">InActive</option>

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

