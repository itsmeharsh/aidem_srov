<div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <div class="row" style="margin-left: 10px;">
                    <form class="col s12" >
                  <div class="row">
                    <div class="input-field col s4">
                      <i class="mdi-editor-insert-invitation prefix"></i>
                     <input type="text" class="datepicker picker__input" readonly="" id="P1053025662" tabindex="-1" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="P1053025662_root">
                      <label for="icon_prefix">Start Date</label>
                    </div>
                    <div class="input-field col s4">
                      <i class="mdi-editor-insert-invitation prefix"></i>
                      <input type="text" class="datepicker picker__input" readonly="" id="P1053025662" tabindex="-1" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="P1053025662_root">
                      <label for="icon_password">End Date</label>
                    </div>
                    <div class="input-field col s4">
                      <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light" type="submit" name="action"><i class="mdi-action-search"></i> Search</button>
                      </div>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
<div id="card-stats">
                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content  green white-text">
                                        <p class="card-stats-title"><i class="mdi-social-group-add"></i> Total QR Scans</p>
                                        <h4 class="card-stats-number">1</h4>
                                        
                                        </p>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total Clicks</p>
                                        <h4 class="card-stats-number">1</h4>
                                       
                                    </div>
                                   
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content blue-grey white-text">
                                        <p class="card-stats-title"><i class="mdi-action-trending-up"></i> Total Impression</p>
                                        <h4 class="card-stats-number">1</h4>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content deep-purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i>Total Vehicle</p>
                                        <h4 class="card-stats-number">1</h4>
                                       
                                    </div>
                                  
                                </div>
                            </div>                            
                        </div>
                    </div>


<h4 class="header">Qr code scans</h4>

<div id="QR-chart-container" style="width: 100%; height: 480px;"></div>

<h4 class="header">Clicks Graphs</h4>

<div id="CLICK-chart-container" style="width: 100%; height: 480px;"></div>

<h4 class="header">Impression Graphs</h4>

<div id="IMPRESSION-chart-container" style="width: 100%; height: 480px;"></div>



  <script type="text/javascript" src="<?php echo DOMAIN_URL; ?>/assets/admin/js/jquery-1.11.2.min.js"></script>    
<script type="text/javascript" src="<?php echo DOMAIN_URL; ?>/assets/admin/js/chart/highcharts.js"></script>


<script>
     var QRchartData='<?php echo $qrgraphData; ?>'; 
     var QRchart, QRdata = jQuery.parseJSON(QRchartData);
    $(document).ready(function(){
            QRchart = new Highcharts.Chart({
                    chart: { renderTo: 'QR-chart-container', type: 'column' },
                    exporting: { buttons: false },
                    colors: ['#a7612d'],
                    title: { text: false },
                    credits: { enabled: false },
                    yAxis: { title: false },
                    xAxis: { categories: QRdata.categories },
                    series: QRdata.series
            });
    });
    
     var CLICKchartData='<?php echo $ClickgraphData; ?>'; 
    
     var Clickchart, Clickdata = jQuery.parseJSON(CLICKchartData);
    $(document).ready(function(){
            Clickchart = new Highcharts.Chart({
                    chart: { renderTo: 'CLICK-chart-container', type: 'column' },
                    exporting: { buttons: false },
                    colors: ['#a7612d'],
                    title: { text: false },
                    credits: { enabled: false },
                    yAxis: { title: false },
                    xAxis: { categories: Clickdata.categories },
                    series: Clickdata.series
            });
    });
    
     var ImpressionchartData='<?php echo $ImpressionData; ?>'; 
    
     var Impressionchart, Impressiondata = jQuery.parseJSON(ImpressionchartData);
    $(document).ready(function(){
            Impressionchart = new Highcharts.Chart({
                    chart: { renderTo: 'IMPRESSION-chart-container', type: 'column' },
                    exporting: { buttons: false },
                    colors: ['#a7612d'],
                    title: { text: false },
                    credits: { enabled: false },
                    yAxis: { title: false },
                    xAxis: { categories: Impressiondata.categories },
                    series: Impressiondata.series
            });
    });
</script>

