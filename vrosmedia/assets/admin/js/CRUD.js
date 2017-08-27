function changeData(){
    var data = [];
    if($('#admin_user_results').length > 0){
        data.controller='user';
        data.successColor='green';
        data.errorColor='red';
    }
    if($('#admin_business_results').length > 0)
    {
        data.controller='business';
        data.successColor='green';
        data.errorColor='red';
    }
    if($('#admin_event_results').length > 0)
    {
        data.controller='event';
        data.successColor='green';
        data.errorColor='red';
    }
    if($('#taxi_class').length > 0)
    {
        data.controller='taxi';
        data.successColor='green';
        data.errorColor='red';
    }
    if($('#price_results').length > 0)
    {

        data.controller='setting';
        data.successColor='green';
        data.errorColor='red';
    }
     if($('#new_category_results').length > 0)
    {

        data.controller='news';
        data.successColor='green';
        data.errorColor='red';
    }
    if($('#news_results').length > 0)
    {

        data.controller='news';
        data.successColor='green';
        data.errorColor='red';
    }
    if($('#admin_offer_results').length > 0)
    {

        data.controller='offers';
        data.successColor='green';
        data.errorColor='red';
    }
    if($('#admin_article_results').length > 0)
    {
        data.controller='article';
        data.successColor='green';
        data.errorColor='red';
    }


    return data;
}

     

 
 $(document).on("click", '.changeStatus', function (e) {
            e.preventDefault();
            
            var moduleData=changeData();            
           
            UserStatusCurrentvalue=$(this).text();
            
            var recID = $(this).attr('id');
            var $this = jQuery(this);
            $.ajax({
                type: "POST",
                dataType: "json",
                url: SITE_URL + moduleData.controller + '/status/' + recID,
                success: function (res) {
                     if (res.result == 'success') {
                          Materialize.toast(res.message, 3000, 'rounded');
                          if(UserStatusCurrentvalue=='Active'){
                              $("#"+recID).removeClass(moduleData.successColor);
                              $("#"+recID).addClass(moduleData.errorColor);
                              $("#"+recID).html('Inactive');
                          }else{
                              $("#"+recID).removeClass(moduleData.errorColor);
                              $("#"+recID).addClass(moduleData.successColor);
                              $("#"+recID).html('Active');
                          }
                      } else {
                           Materialize.toast(res.message, 3000, 'rounded');
                      }
                }
            })
            return false;
        });
        
      $(document).on("click", '.deleteAction', function (e) {
     
            e.preventDefault();
            var moduleData=changeData();    
            var recID = $(this).attr('id');
         
            var $this = jQuery(this);
//alert( SITE_URL + moduleData.controller + '/remove/' + recID);
            var r = confirm("Are you sure want to Delete this?");
            if (r == true) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: SITE_URL + moduleData.controller + '/remove/' + recID,
                    success: function (res) {
                       
                        if (res.result == 'success') {
                            Materialize.toast(res.message, 3000, 'rounded');
                             $("#"+recID).closest('tr#removeTR').remove();
                        }else{
                            Materialize.toast(res.message, 3000, 'rounded');
                        }
                    }
                })
            } else {
                e.preventDefault();
                return false;
            }    

         
            return false;
        });
        
          $(document).on("click", '.loadPage', function (e) {
             e.preventDefault();

            // $("#alertNotification").html('');

            var href = $(this).attr('href');
            var $this = jQuery(this);
            $.ajax({
                type: "POST",
                url: href,
                success: function (res) {
                    $('.section').html(res);
                }
            })
            return false;
        });

