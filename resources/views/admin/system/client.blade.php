    <div class="client-index">
        <div class="row">
        
        </div>
               <!-- table content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>客户端 管理</h2>

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
                                <td>{client_key}</td>
                                <td>{client_name}</td>
                                <td>{client_type}</td>
                                <td>{version}</td>
                                <td>{version_tiny}</td>
                                <td>{adapt_screen}</td>
                                <td>{adapt_facility_alias}</td>
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
                                        <input type="hidden" class="form-control form-controlNew" id="client_id" name="client_id" value="">
                                        
                                        <form id="dataform" class="form-horizontal data-form" role="form">
                                            <!-- CSRF TOKEN -->
                                            
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">客户端关键字<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="client_key">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">客户端名称<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="client_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">客户端类型</label>
                                                    <input type="text" class="form-control form-controlNew" name="client_type">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label">大版本(3位数)<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="version">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label">小版本(4位数)<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="version_tiny">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">适用屏幕( W,H 或 * 通配)<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="adapt_screen">
                                                </div>

                                                <div class="col-sm-6">
                                                    <label class="control-label">适用设备<span class="required">*</span></label>
                                                    <select name="adapt_facility" class="form-control form-controlNew">
                                                        @foreach($adapt_facilities as $k=>$val)
                                                        <option value='{{$k}}'>{{$val}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">省份<span class="required">*</span></label>
                                                    <select name="province" class="form-control form-controlNew">
                                                        @foreach($provinces as $k=>$val)
                                                        <option value='{{$val["id"]}}'>{{$val["districts_name"]}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label class="control-label">城市<span class="required">*</span></label>
                                                    <select name="city" class="form-control form-controlNew">
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">区/县<span class="required">*</span></label>
                                                    <select name="district" class="form-control form-controlNew">
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
												<div class="col-sm-12">
													<label class="control-label">支付渠道</label>
													<br>
													@foreach($payment_channels as $k=>$val)
													<div style="display:inline-block;width:20%;text-align: left;"><input type="checkbox" name="payment_channel_ids[]" value="{{$val['id']}}">{{$val['payment_name']}}</div>
													@endforeach
												</div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label class="control-label">状态<span class="required">*</span></label>
                                                    <select name="status" class="form-control form-controlNew">
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
        <script>
            var cities = {!! json_encode($cities, JSON_UNESCAPED_UNICODE) !!};
            var districts = {!! json_encode($districts, JSON_UNESCAPED_UNICODE) !!};
        </script>
        <script src="/admin/adminJS/system/client_index.js"></script> 
    </div>