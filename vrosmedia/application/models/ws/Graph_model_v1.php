<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Graph_model_v1 extends MY_Model {



    function __construct() {
        parent::__construct();

    }
    function Graph($postData,$type)
    {
        $business_id=$postData['business_id'];
        
        //get lable
        
        
        
        $date2=$postData['start_date'];
        $date1=$postData['end_date'];

        if($date1!='' && $date2!=''){
            $startTimeStamp = strtotime($date2);
            $endTimeStamp = strtotime($date1);

            $timeDiff = abs($endTimeStamp - $startTimeStamp);

            $numberDays = $timeDiff/86400;  // 86400 seconds in one day

            $days = intval($numberDays);
            
            

        }else{
            $date1=date('Y-m-d');
            $date2 =  date('Y-m-d', strtotime('-15 days', strtotime($date1)));
            $days=15;
        }
        
        //get lable

        $start_date_month= date('M', strtotime($date2));
        $end_date_month= date('M', strtotime($date1));                   
        $year=date('Y', strtotime($date1));
        if($start_date_month==$end_date_month){
            $lable=$start_date_month.','.$year;
        }else{
            $lable=$start_date_month.'-'.$end_date_month.','.$year;
        }


        $select_string='';
        $select_string.='select DATE("'.$date1.'") as day ';


        for($i=1;$i<=$days;$i++){
            $select_string.='union select DATE("'.$date1.'") - interval '.$i.' day ';
        }




        $result=$this->db->query('SELECT days.day, count(clicks) as clicks,"'.$lable.'" as "lable",business_id,type FROM
                    ('.$select_string.') days
                left join  advertise_revenue
                 on days.day =  advertise_revenue.date
                 WHERE (advertise_revenue.deleted="0"  OR advertise_revenue.business_id IS NULL)
              group by
                days.day');
   //echo $this->db->last_query(); exit;
        return $result->result_array();
    }
       function GraphData($dataID,$date,$type,$dataType)
    {
          if($dataType=='business'){
              $dataWhere='business_id = "'.$dataID.'"';
          }elseif($dataType=='offer'){
              $dataWhere='offer_id = "'.$dataID.'"';
          }elseif($dataType=='ads'){
              $dataWhere='ads_id = "'.$dataID.'"';
          }else{
              $dataWhere='business_id = "'.$dataID.'"';
          }
        $result=$this->db->query('SELECT count(clicks) as clicks FROM
                    advertise_revenue
                 WHERE deleted="0" AND '.$dataWhere.' AND date="'.$date.'" AND type="'.$type.'" group by date');
       // echo $this->db->last_query(); exit;
          return $result->row()->clicks;  
    }


/*
 * SELECT days.day, count(clicks) as clicks FROM
                    (select DATE("2016-12-26") as  day
                        union select DATE("2016-12-26") - interval 1 day
                        union select DATE("2016-12-26") - interval 2 day
                   ) days
                left join  advertise_revenue
                 on days.day =  advertise_revenue.date
                 WHERE (advertise_revenue.business_id="1" OR advertise_revenue.business_id IS NULL) AND  (advertise_revenue.type="3"  OR advertise_revenue.business_id IS NULL) AND (advertise_revenue.deleted="0"  OR advertise_revenue.business_id IS NULL)
              group by
                days.day


SELECT days.day, count(clicks) as clicks FROM
                    (select DATE("2016-12-25") as day select DATE("2016-12-25") - interval 1 day ) days
                left join  advertise_revenue
                 on days.day =  advertise_revenue.date
                 WHERE (advertise_revenue.business_id="1" OR advertise_revenue.business_id IS NULL) AND  (advertise_revenue.type="3"  OR advertise_revenue.business_id IS NULL) AND (advertise_revenue.deleted="0"  OR advertise_revenue.business_id IS NULL)
              group by
                days.day
 */


}
