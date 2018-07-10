    <div class="account-index">
        <div class="row">
        
        </div>
               <!-- table content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>对账管理</h2>

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
                                <td>{billing_date}</td>
                                <td>{trade_count}</td>
                                <td>{trade_money}</td>
                                <td>{correct_count}</td>
                                <td>{correct_money}</td>
                                <td>{gap_count}</td>
                                <td>{gap_money}</td>
                                <td>{remark}</td>
                                <td>
                                    <button type="button" dataid="{id}" class="btn btn-warning btn-xs btn-account-detail">支付渠道详情<i class="fa fa-arrow-right"></i></button>
                                </td>
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
                      
                    <!-- 添加/修改详情 modal -->
<!--                     <div id="edit-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  style="width:50%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel2">账单明细</h4>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">关闭</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <script src="/admin/vendors/searchableSelect/jquery.searchableSelect.js"></script>
        <script src="/admin/adminJS/account/account_index.js"></script> 
    </div>