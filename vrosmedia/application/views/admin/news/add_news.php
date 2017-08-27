<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2"> <?php echo $title; ?>
            </h4>
          
            <div class="row">
                <form name="form_business" id="form_business" method="post" action="<?php echo base_url();?>admin/news/save_news" enctype="multipart/form-data" >
                    <input type="hidden" name="id" value="<?php echo $NewsData['id'];?>" id="id" />
                    <div class="row">

                        <div class="col s12">
                            <label class="" for="Title">Title</label>
                            <input type="text" id="type" name="title" value="<?php echo $NewsData['title'];?>" class="" required="true">
                        </div>

                        <div class="col s12">
                            <label class="" for="Description">Description</label>
                            <textarea id="description" name="description"  class="" required="true"><?php echo $NewsData['description'];?></textarea>
                        </div>
                      
                        <div class="col s12">
                            <label for="text" class="" for="media_path">News Image</label>
                            <input type="file" name="image" id="image"  value="" class="file-path" required>  
                            <br>
                            <small>Max 2 Mb Image file allowed</small>                  
                       </div>


                       <div class="col s12">

                        <label class="" for="ads_type">News Category</label>
                        <select class="browser-default" name="category_id">
                           <?php foreach($CategoryData as $cat) { ?> 
                            <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                           <?php } ?>

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

