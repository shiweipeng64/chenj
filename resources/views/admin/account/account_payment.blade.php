    <div class="account-payment-index">
        <div class="row">
        
        </div>
               <!-- table content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>支付渠道账单详情</h2>

                        <div class="clearfix"></div>
                        <button type="button" class="btn btn-info btn-xs btn-back"><i class="fa fa-arrow-left"></i>返回</button>
                    </div>
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
                                <td>{payment_channel_alias}</td>
                                <td>{total_gap_count_paid}</td>
                                <td>{total_count_paid}</td>
                                <td>{total_money_paid}</td>
                                <td>{total_gap_count_refund}</td>
                                <td>{toal_count_refund}</td>
                                <td>{toal_money_refund}</td>
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
                                        <input type="hidden" class="form-control form-controlNew" id="menu_id" name="menu_id" value="">
                                        <input type="hidden" class="form-control form-controlNew" id="parent_id" name="parent_id" value="">
                                        
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
        <script src="/admin/adminJS/account/account_payment.js"></script> 
    </div>