<div class="overall-trades-index">
    <script src="/admin/adminJS/echarts.js"></script>
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>总交易量(本月)</span>
            <div class="count" id="month_number"></div>
            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>4% </i>同比上月</span>-->
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i>总交易金额(本月)</span>
            <div class="count" id="month_money"></div>
            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i>同比上月</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>总交易量(本周)</span>
            <div class="count green" id="week_number"></div>
            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i>同比上周</span>-->
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>总交易金额(本周)</span>
            <div class="count" id="week_money"></div>
            <!--<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i>同比上周</span>-->
        </div>
    </div>
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>总交易量(今天)</span>
            <div class="count" id="day_number"></div>
            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>4% </i>同比昨日</span>-->
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i>总交易金额(今天)</span>
            <div class="count" id="day_money"></div>
            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i>同比昨日</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>峰值并发数</span>
            <div class="count">0</div>
            <!--<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i>同比历史最高</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>实时并发数</span>
            <div class="count">0</div>
            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i>同比今日最高</span>-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>交易成功率</span>
            <div class="count" id="success_rate">NaN</div>
            <!--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i>同比历史成功率</span>-->
        </div>
    </div>
    <!-- /top tiles -->
    <script src="/admin/adminJS/overall/trades_index.js"></script> 
</div>