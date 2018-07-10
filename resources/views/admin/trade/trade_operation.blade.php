    <div class="trade-operation-index">
        <div class="row">
        
        </div>
               <!-- table content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>交易处理</h2>

                        <div class="clearfix"></div>
                    </div>
                  <!-- search start -->
                    <form id="form-search" class="x_panelNew">
                        <div class="btn-group focus-btn-group">
                            <label for="order_num">订单号
                                  <input type="text" id="order_num" class="form-control form-controlNew" name="order_num" condition="="/>
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
                            <label for="accept_channel">受理渠道
                                <select name="accept_channel" class="form-control form-controlNew" condition="=">
                                    <option value=''>不限</option>
                                    @foreach($accept_list as $vo)
                                    <option value='{{$vo["id"]}}'>{{$vo["accept_name"]}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="btn-group focus-btn-group">
                            <label for="trade_status">交易状态
                              <select name="trade_status"  class="form-control form-controlNew" condition="=">
                                <option value=''>不限</option>
                                @foreach($trade_status as $k=>$vo)
                                <option value='{{$k}}'>{{$vo}}</option>
                                @endforeach
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
                                <td>{accept_name}</td>
                                <td>{accept_sign}</td>
                                <td>{clear_money_rate}</td>
                                <td>{total_money}</td>
                                <td>{charge_money}</td>
                                <td>{supplement_money}</td>
                                <td>{reversal_money}</td>
                                <td>{create_time}</td>
                                <td><button disabled class="btn btn-xs btn-primary">{trade_status_alias}</button></td>
                                <td>
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
                      <div id="edit-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog"  style="width:30%">
                            <div class="modal-content">
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel2"></h4>
                                </div>
                                <div class="modal-body">


                                    <div id="testmodal2" style="padding: 5px 20px;">
                                        <input type="hidden" class="form-control form-controlNew" id="account_check_id" name="account_check_id" value="">
                                        
                                        <form id="dataform" class="form-horizontal data-form" role="form">
                                            <!-- CSRF TOKEN -->
                                            
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">关闭</button>
                                    <button type="button" class="btn btn-primary btn-save">保存</button>
                                </div>
                            </div>
                        </div>
                    </div>              
                </div>
            </div>
        </div>
        <script src="/admin/vendors/searchableSelect/jquery.searchableSelect.js"></script>
        <script src="/admin/adminJS/trade/operation_index.js"></script> 
    </div>