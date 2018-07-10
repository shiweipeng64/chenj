    <div class="account-detail-index">
        <div class="row">
        
        </div>
               <!-- table content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>对账明细<small>选择日期内所有明细</small></h2>

                        <div class="clearfix"></div>
                    </div>
                  <!-- search start -->
                    <form id="form-search" class="x_panelNew">
                        <div class="btn-group focus-btn-group" style="width:215px;">
                            <label for="start_time">开始时间
                                <input type="text" class="form-control datepicker form-controlNew" name="start-billing_date" placeholder="" condition="start_date">
                            </label>
                        </div>
                        <div class="btn-group focus-btn-group">
                            <label for="start_time">结束时间
                                <input type="text" class="form-control datepicker form-controlNew" name="end-billing_date" placeholder="" condition="end_date">
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

                        <table id="datatable" class="table table-striped table-bordered">
                            <colgroup>
                                @foreach ($rows as $key => $row)
                                @if ($row['show'])
                                <col width="{{$row['width']}}">
                                @endif
                                @endforeach
                            </colgroup>
                            <thead>
                            <tr>
                                @foreach ($rows as $key => $row)
                                @if ($row['show'])
                                <th>{{$row['name']}}</th>
                                @endif
                                @endforeach
                            </tr>
                            </thead>
                            <!-- ajax加载 -->
                          <tbody>
                            
                          </tbody>
                        </table>
                        <div id="AiGrid"><!-- 分页插件 --></div>

                        <!-- 订单列表HTML模板 -->
                        <script type="text/template" id="table_template">
                            <tr>
                                <td>{order_num}</td>
                                <td>{user_num}</td>
                                <td>{charge_money}</td>
                                <td>{charge_time}</td>
                                <td>{trade_status_alias}</td>
                                <<td><button type="button" class="btn btn-xs">{boss_check_alias}</button></td>
                                <td>{accept_channel_name}</td>
                                <td><button type="button" class="btn btn-xs">{accept_check_alias}</button></td>
                                <td>{payment_channel_name}</td>
                                <td><button type="button" class="btn btn-xs">{payment_check_alias}</button></td>
                            </tr>
                        </script>
                    </div>
                  
                      <!-- 删除 modal -->
                      <div id="delete-info" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  style="width:30%">
                            <div class="modal-content">
                                                        
                                <div class="modal-body">
                                    确定要删除该信息么？
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">取消</button>
                                    <button type="button" _id="" class="btn btn-primary btn-delete-sure">确定</button>
                                 </div>
                                 
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <script src="/admin/adminJS/account/account_detail.js"></script> 
    </div>