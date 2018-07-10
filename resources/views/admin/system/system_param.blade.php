    <div class="param-index">
        <div class="row">
        
        </div>
               <!-- table content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>系统参数 管理</h2>

                        <div class="clearfix"></div>

                        <button type="button" class="btn btn-success btn-xs btn-add">添加</button>
                        <button type="button" class="btn btn-info btn-xs btn-back" style="display:none;"><i class="fa fa-arrow-left"></i>返回</button>
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
                                <td>{params_key}</td>
                                <td>{params_name}</td>
                                <td>{params_value}</td>
                                <td>{params_default_value}</td>
                                <td>{accept_id}</td>
                                <td>{payment_id}</td>
                                <td>{expire_time}</td>
                                <td>{ignore_expire_time_alias}</td>
                                <td>{remark}</td>
                                <td>{status_alias}</td>
                                <td>
                                    <button type="button" dataid="{id}" class="btn btn-primary btn-xs btn-detail"><i class="fa fa-folder">详情</i></button>
                                    <button type="button" dataid="{id}" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil">修改</i></button>
                                    <button type="button" dataid="{id}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o">删除</i></button>
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
                                        <input type="hidden" class="form-control form-controlNew" id="params_id" name="params_id" value="">
                                        
                                        <form id="data-form" class="form-horizontal data-form" role="form">
                                            <!-- CSRF TOKEN -->
                                            
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">参数KEY<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="params_key">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">参数名<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="params_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">参数值<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="params_value">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">默认值<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" placeholder="正常参数失效后，使用此参数值" name="params_default_value">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">适用受理渠道<span class="required">*</span></label>
                                                    <select name="accept_id" class="form-control form-controlNew">
                                                        <option value='0'>所有渠道</option>
                                                        @foreach($accept_list as $k=>$val)
                                                        <option value='{{$val["id"]}}'>{{$val["accept_name"]}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">适用支付渠道<span class="required">*</span></label>
                                                    <select name="payment_id" class="form-control form-controlNew">
                                                        <option value='0'>所有渠道</option>
                                                        @foreach($payment_list as $k=>$val)
                                                        <option value='{{$val["id"]}}'>{{$val["payment_name"]}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">过期时间<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="expire_time">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">是否无视过期时间<span class="required">*</span></label>
                                                    <select name="ignore_expire_time" class="form-control form-controlNew">>
                                                        @foreach($ignore_expire_time as $k=>$val)
                                                        <option value='{{$k}}'>{{$val}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label class="control-label">备注<span class="required">*</span></label>
                                                    <textarea name="remark" class="form-control form-controlNew"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label class="control-label">状态<span class="required">*</span></label>
                                                    <select name="status" class="form-control form-controlNew">>
                                                        @foreach($status as $k=>$val)
                                                        <option value='{{$k}}'>{{$val}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
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
        <script src="/admin/adminJS/system/param_index.js"></script> 
    </div>