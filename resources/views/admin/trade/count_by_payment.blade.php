    <div class="count-by-payments-index">
        <link href="/admin/vendors/searchableSelect/jquery.searchableSelect.css" rel="stylesheet">
        <script src="/admin/adminJS/echarts.js"></script>
        <div class="row">
        
        </div>
               <!-- table content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>交易统计-按支付渠道统计</h2>

                        <div class="clearfix"></div>
                    </div>
                  <!-- search start -->
                    <form id="form-search" class="x_panelNew">
                        <div class="btn-group focus-btn-group">
                            <label for="payment_channel">支付渠道
                                <select name="payment_channel" class="form-control form-controlNew" condition="=">
                                    <option value=''>不限</option>
                                </select>
                            </label>
                        </div>
                        <div class="btn-group focus-btn-group" style="width:215px;">
                            <label for="start_time">开始时间
                                <input type="text" class="form-control datepicker form-controlNew" name="start-create_time" placeholder="" condition="start_date">
                            </label>
                        </div>
                        <div class="btn-group focus-btn-group">
                            <label for="start_time">结束时间
                                <input type="text" class="form-control datepicker form-controlNew" name="end-create_time" placeholder="" condition="end_date">
                            </label>
                        </div>
                        <div class="btn-group focus-btn-group">
                            <label for="type">统计类型
                                <select name="statistics_type" class="form-control form-controlNew" condition="=">
                                    <option value='count'>交易笔数</option>
                                    <option value='money'>交易金额</option>
                                </select>
                            </label>
                        </div>
                        <div class="btn-group focus-btn-group">
                            <label for="fullname">查找
                            <button type="button" class="form-control btn btn-primary btn-sm search-btn"><i class="fa fa-search"></i></button>
                            </label>
                        </div>
                    </form>
                    <!-- search end -->
                    <div class="x_content">
                        <div id="chart" style="width:100%;height:600px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var payments = {!! json_encode($payment_list, JSON_UNESCAPED_UNICODE) !!};
        </script>
        <script src="/admin/vendors/searchableSelect/jquery.searchableSelect.js"></script>
        <script src="/admin/adminJS/trade/count_by_payment.js"></script> 
    </div>