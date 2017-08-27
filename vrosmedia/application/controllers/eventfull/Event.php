<?php
ini_set('max_execution_time', 3000);
class Event extends Admin_Controller {

   public $viewData = array();
    function __construct() {
        parent::__construct();
        $this->viewData = $this->getAdminSettings();    
        $this->load->model('Event_live_model','Event');
    }

   function index()
    {
      $apiKey='drZ3mmjkB2vjJd38';
      $location='michigan';
      $pageNumber=1;
      $page_size=50;
      
      $url='http://api.eventful.com/json/events/search?app_key='.$apiKey.'&location='.$location.'&page_number='.$pageNumber.'&page_size='.$page_size;
      $result = file_get_contents($url);
      $data=json_decode($result, true);
      pre($data);
      for($i=0;$data['page_number']<=count($data['page_count']);$i++){
         // echo $data['events']['event'][$i]['id'];exit;
           $exit=$this->Event->check_event($data['events']['event'][$i]['id']);
          if($data['events']['event'][$i]['image']['medium']['url']==''){
              $data['events']['event'][$i]['image']['medium']['url']='test.jpg';
          }
          $eventData=array(
                            'eventfull_id'=>$data['events']['event'][$i]['id'],
                            'user_id'=>1,
                            'category_id'=>1,
                            'title'=>$data['events']['event'][$i]['title'],
                            'description'=>$data['events']['event'][$i]['description'],
                            'cover_image'=>$data['events']['event'][$i]['image']['medium']['url'],
                            'venue'=>$data['events']['event'][$i]['venue_address'].','.$data['events']['event'][$i]['venue_name'],
                            'lat'=>$data['events']['event'][$i]['latitude'],
                            'lng'=>$data['events']['event'][$i]['longitude'],
                            'location'=>$data['events']['event'][$i]['region_name'].','.$data['events']['event'][$i]['country_name'],
                            'email'=>'admin@vros.com',
                            'mobile'=>'+11111111',
                            'start_time'=>$data['events']['event'][$i]['longitude'],
                            'end_time'=>$data['events']['event'][$i]['longitude'],
                            'totallike'=>0,
                            'totalshare'=>0,
                            'totalfavorite'=>0
                          );
         
        
              
          
              
          if($exit['eventfull_id']!=''){
              $this->Event->update_data($eventData,$exit['eventfull_id']);
          }else{
             $this->Event->insert_data($eventData);
          }
         echo $this->last_query(); exit;
              exit;
        
          
      }
      
    }
   
}
