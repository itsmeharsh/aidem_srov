<?php
require_once('db_config.php');
$con=mysqli_connect("localhost","vrosmedia","vrosmedia@123","vrosmedia");
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//global $db;
//$token = 'MEGKPC7VWCNLXVI6ICFW';
$token = 'NUUODXD2NVNCQYZOT7LJ';
$api_url = "https://www.eventbriteapi.com/v3";
define('API_URL',$api_url);
define('EVENTBRITE_TOKEN',$token);

function curl_get_contents($url){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}

function search_event($param = array()){
    if(!empty($param)){
        $param = http_build_query($param);
        $param = "&".$param;
    }else{
        $param = "";
    }

    $event_search_url = API_URL . "/events/search?token=".EVENTBRITE_TOKEN.$param;
    //die($event_search_url);
    $event_list_data = curl_get_contents($event_search_url);
    return json_decode($event_list_data,true);
}

function get_event_venue($venue_id){
    $venue_get_url = API_URL . "/venues/".$venue_id."/?token=".EVENTBRITE_TOKEN;
    $venue_get_data = curl_get_contents($venue_get_url);
    return json_decode($venue_get_data,true);
}

//=== Search event ===//
$search_event_param = array(
    'page' => '1',
    'search_type'=>'promoted',
    // 'location.latitude'=>'44.3148',
    // 'location.longitude'=>'85.6024',
    // 'location.within'=>'10'
    'location.address'=>'Lansing'
    /* Set lat long for particular area so API get only that area events  */
    // 'location.viewport.northeast.latitude'=>'42.96',
    // 'location.viewport.northeast.longitude'=>'85.2628',
    // 'location.viewport.southwest.latitude'=>'42.1092',
    // 'location.viewport.southwest.longitude'=> '86.4845'
);

$event_search_data = search_event($search_event_param);
$sql="SELECT *  FROM `tbl_events`  WHERE event_type='live' ";
$result=mysqli_query($con,$sql);

// Fetch all existing event
$event_exist_app_event=mysqli_fetch_all($result,MYSQLI_ASSOC);
$current_date=date('m/d/Y h:i:s a', time());

foreach ($event_exist_app_event as  $evalue){
  $that_data = array();
  $that_data['deleted']=0;
  $that_data['start_time'] = $evalue['start_time'];
  $event_start_date= date("m/d/Y",$that_data['start_time']);
  if($event_start_date < $current_date){
    $that_data['deleted'] ='1';
    $that_sql_query = 'UPDATE `tbl_events` SET deleted = "' . $that_data['deleted'] . '" WHERE id = "' . $evalue['id'] . '"';
    if ($db->query($that_sql_query) === TRUE){
    }
  }
}

for($page = 1; $page <= $event_search_data['pagination']['page_size']; $page++){
  $event_list = array();
  if($page > 1){
    $search_event_param['page'] = $page;
    $event_search_data_loop = search_event($search_event_param);
    $event_list = $event_search_data_loop['events'];
  }else{
    $event_list = $event_search_data['events'];    
  }
  
  $insert_data_list = array();
  $insert_query_list = array();
  
  foreach ($event_list as $ekey => $evalue){
    $that_data_1['category_id'] = NULL;
    $that_data_1['cityID'] = '4';
    $that_data_1['eventfull_id'] = $evalue['id'];
    $that_data_1['user_id']='13';
    $that_data_1['title'] = trim($evalue['name']['text']);
    $that_data_1['description'] = trim($evalue['description']['text']);
    $that_data_1['cover_image'] = $evalue['logo']['original']['url'];
    $that_data_1['website'] = $evalue['url'];

    $venue_details = array();
    $venue_details = get_event_venue($evalue['venue_id']);
    $that_data_1['location'] = trim($venue_details['address']['localized_address_display']);
    $that_data_1['venue'] = trim($venue_details['address']['localized_address_display']);
    $that_data_1['lat'] = $venue_details['address']['latitude'];
    $that_data_1['lng'] = $venue_details['address']['longitude'];

    $start_time = implode(' ', explode('T', $evalue['start']['local']));
    $that_data_1['start_time'] = strtotime($start_time);

    $end_time = implode(' ', explode('T', $evalue['end']['local']));
    $that_data_1['end_time'] = strtotime($end_time);
    $changeStatus='';
    $that_data_1['deleted']=0;
    if ($that_data_1['description'] == '') {
        $that_data_1['description'] = $that_data_1['title'];
    }
    //array_push($insert_data_list,$that_data);
    $event_exist = "SELECT id FROM `tbl_events` WHERE eventfull_id = '".$evalue['id']."'";
    $result_event=mysqli_query($con,$event_exist);
    
    $event_exist_app_event=mysqli_fetch_all($result_event,MYSQLI_ASSOC);
    $ev_exist=count($event_exist_app_event);
    // $event_exist_result = $db->query($event_exist);
    if ($that_data_1['description'] == '') {
        $that_data_1['description'] = $that_data_1['title'];
    }
    $event_start_date_1= date("m/d/Y",$that_data_1['start_time']);
	
    if($that_data_1['cover_image']!='') {
        if ($ev_exist == 0) {
            if($event_start_date_1 < $current_date){
              $that_data_1['deleted'] ='1';
            }
            $that_sql_query = 'INSERT INTO `tbl_events` (user_id,cityID,eventfull_id,title,description,cover_image,website,location,lat,lng,start_time,end_time,venue,deleted) VALUES ("' . $that_data_1['user_id'] . '","' . $that_data_1['cityID'] . '","' . $that_data_1['eventfull_id'] . '","' . $that_data_1['title'] . '","' . $that_data_1['description'] . '","' . $that_data_1['cover_image'] . '","' . $that_data_1['website'] . '","' . $that_data_1['location'] . '","' . $that_data_1['lat'] . '","' . $that_data_1['lng'] . '","' . $that_data_1['start_time'] . '","' . $that_data_1['end_time'] . '","' . $that_data_1['venue'] . '","' . $that_data_1['deleted'] . '") ';
			
            if ($db->query($that_sql_query) === TRUE) {
                //echo $that_data['eventfull_id']." - New record created successfully";
            } else {
                //$that_sql_query = array("Error"=>$sql . "<br>" . $conn->error,'query'=>$that_sql_query);
            }
            //.insert_query($that_data);
            array_push($insert_query_list, $that_sql_query);
        } else {
            if($event_start_date_1 < $current_date){
              $that_data_1['deleted'] ='1';
            }
            //update
            $that_sql_query = 'UPDATE `tbl_events` SET deleted="'.$that_data_1['deleted'] .'", cityID = "' . $that_data_1['cityID'] . '", title = "' . $that_data_1['title'] . '", description = "' . $that_data_1['description'] . '", cover_image = "' . $that_data_1['cover_image'] . '", website = "' . $that_data_1['website'] . '", location = "' . $that_data_1['location'] . '", lat = "' . $that_data_1['lat'] . '", lng = "' . $that_data_1['lng'] . '", start_time = "' . $that_data_1['start_time'] . '", end_time = "' . $that_data_1['end_time'] . '" WHERE eventfull_id = "' . $that_data_1['eventfull_id'] . '"';
                
            if ($db->query($that_sql_query) === TRUE) {
                //echo $that_data['eventfull_id']." - Record updated successfully";
            } else {
                /*
                echo "Error updating record: " . $conn->error;
                echo "<br/>".$that_sql_query;
                */
            }
        }
        
    }

  }
  //if($page == 3) break;
}
echo "Cron run succesfully";
?>