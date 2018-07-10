<?php

namespace App\Http\Controllers\Flow\V1;

use App\Http\Controllers\BaseController;
use App\Http\Model\Flow\EdgesModel;
use App\Http\Model\Flow\FieldValueModel;
use App\Http\Model\Flow\FieldsModel;
use App\Http\Model\Flow\FlowTypeModel;
use App\Http\Model\Flow\FlowsModel;
use App\Http\Model\Flow\VerticesModel;
use App\Http\Requests\Request;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class FlowApiController extends BaseController
{
    protected $small_version = '0.1';

    protected $skip_auth = true;
    
    protected $skip_login = true;

    protected $default_limit = 10;

    /* 列配置 */
    protected $rows = [
    ];

    private function _getToken(){
        $builder = new Builder();
        $builder->set("namespace_id", 1);

        $sha256 = new Sha256();
        $builder->sign($sha256, "28c207cecedd1980969d8cc4e6ab464f292cb06d204a0170f8bcd37df17c73b0");
        $token = (string)$builder->getToken();
        return $token;
    }

    private $testValue = '{"action":"proposed","assignment":{"id":"3203","vertex_id":"861","status":"processing","response":{"id":"6748","cached_values":{"1779":{"value":["\u5362\u6d4b\u8bd5"],"text_value":["\u5362\u6d4b\u8bd5"],"exported_value":["\u5362\u6d4b\u8bd5"]},"1780":{"value":["\u8fd9\u5bb6\u4f19\u7684"],"text_value":["\u8fd9\u5bb6\u4f19\u7684"],"exported_value":["\u8fd9\u5bb6\u4f19\u7684"]},"1781":{"value":["\u7d22\u5c3c\u5927\u6cd5"],"text_value":["\u7d22\u5c3c\u5927\u6cd5"],"exported_value":["\u7d22\u5c3c\u5927\u6cd5"]},"1782":{"value":["100"],"text_value":["100"],"exported_value":["100"]},"1783":{"value":["\u5546\u4e1a"],"text_value":["\u5546\u4e1a"],"exported_value":["\u5546\u4e1a"]},"1784":{"value":["5"],"text_value":["5"],"exported_value":["5"]},"1785":{"value":["80"],"text_value":["80"],"exported_value":["80"]}}},"journey":{"id":"702","sn":"14620180629123535000004","status":"processing","current_vertex_id":"863","reviewer_vertex_ids":["861"]},"user":{"id":"256","name":"\u4e3e\u4e2a\u8354\u679d","identifier":"oXDm5sxqlHiGERUVnPVqcwqiQBbE","headimgurl":"http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/8SpBA9A4Q4lOPYodFYPiak77oHsHhheW6FSiaOpTr9Cdnz6JxaXdmQ8VXjZrZUCxskYwbcMPBHYpFTWvGItm8W8w"}},"flow":{"id":"146","title":"\u62db\u6807"}}';

    //获取流程类型数据
    protected function api_flow_type_sync (){
        $token = $this->_getToken();

        $typeIds = $this->request->input("type_ids");
        $errorMsg = [];

        $flowTypeIds = explode(",", $typeIds);

        $flowTypeModel = new FlowTypeModel();
        $fieldsModel   = new FieldsModel();
        $verticesModel = new VerticesModel();
        $edgeModel     = new EdgesModel();

        foreach ($flowTypeIds as $flowTypeId) {
            //获取所有流程分类
            $url = "https://beta.skylarkly.com/api/v4/yaw/flows/".$flowTypeId;
            $headers = [
                'Authorization:b064bee78c9be52a293d3b2b2ce87ba53c92668845045649ad600e1ea98bacfa:'.$token,
                'Content-type:text/json'
            ];
            $response = $this->curlRequest($url, null, 'GET', $headers);
            if(isset($response['error']) || empty($response)){
                $errorMsg[] = "流程类型ID为 " . $flowTypeId . " 的流程类型未获取到数据";
            }else{
                //Flow Type
                $flowTypeModel->StartTransaction();

                $count = $flowTypeModel->acquireCount(['flows_type_id', $response['id']]);
                $flowTypeData = ['title'=>$response['title'], 'flows_type_id'=>$response['id']];
                if($count == 0){
                    $flowTypeModel->add($flowTypeData);
                }else{
                    $flowTypeModel->modify(['flows_type_id', $response['id']], $flowTypeData);
                }

                //Flow Fields
                if(isset($response['fields'])){
                    $fields = $response['fields'];
                    foreach ($fields as $field) {
                        $count = $fieldsModel->acquireCount(['field_id', $field['id']]);
                        $data = [
                            'field_id' => $field['id'],
                            'title'    => $field['title'],
                            'description' => $field['description'],
                            'flow_type_id' => $response['id'],
                        ];
                        if($count == 0){
                            $fieldsModel->add($data);
                        }else{
                            $fieldsModel->modify(['field_id', $field['id']], $data);
                        }
                    }
                }

                //Flow vertices
                if(isset($response['vertices'])){
                    $vertices = $response['vertices'];
                    foreach ($vertices as $vertex) {
                        $count = $verticesModel->acquireCount(['vertices_id', $vertex['id']]);
                        $data = [
                            'vertices_id'  => $vertex['id'],
                            'flow_type_id' => $response['id'],
                            'name'         => $vertex['name'],
                            'type'         => $vertex['type'],
                        ];
                        if($count == 0){
                            $verticesModel->add($data);
                        }else{
                            $verticesModel->modify(['vertices_id', $vertex['id']], $data);
                        }
                    }
                }

                //Flow edges
                if(isset($response['edges'])){
                    $edges = $response['edges'];
                    foreach ($edges as $edge) {
                        $count = $edgeModel->acquireCount(['edges_id', $edge['id']]);
                        $data = [
                            'edges_id' => $edge['id'],
                            'flow_type_id' => $response['id'],
                            'from_vertex_id' => $edge['from_vertex_id'],
                            'to_vertex_id'   => $edge['to_vertex_id'],
                        ];
                        if($count == 0){
                            $edgeModel->add($data);
                        }else{
                            $edgeModel->modify(['edges_id', $edge['id']], $data);
                        }
                    }
                }

                if(!$flowTypeModel->TransactionCommit()){
                    $flowTypeModel->TransactionRollback();
                    $errorMsg[] = "流程类型ID " . $flowTypeId . " 保存数据失败";
                }
            }
        }
        if(!empty($errorMsg)){
            return [
                'code' => 200,
                'msg'  => 'SUCCESS',
            ];
        }else{
            return [
                'code' => 400,
                'msg'  => implode(',', $errorMsg),
            ];
        }
    }

    //获取所有类型流程数据
    protected function api_flows_data_sync(){
        $token = $this->_getToken();

        $flowTypeModel = new FlowTypeModel();
        $flowTypes = $this->Obj2Arr($flowTypeModel->acquireList(1, 100));

        $flowModel  = new FlowsModel();
        $fieldValueModel = new FieldValueModel();
        $fieldsModel = new FieldsModel();

        foreach ($flowTypes as $flowType) {
            $startPage = 1; //开始页面
            $perPage   = 50;//每页数据
            do{
                $url = "https://beta.skylarkly.com/api/v4/yaw/flows/".$flowType['flows_type_id']."/journeys?page=".$startPage."&per_page=".$perPage;

                $headers = [
                    'Authorization:b064bee78c9be52a293d3b2b2ce87ba53c92668845045649ad600e1ea98bacfa:'.$token,
                    'Content-type:text/json'
                ];
                $response = $this->curlRequest($url, null, 'GET', $headers);
                if(isset($response['error'])){
                    $errorMsg[] = "流程类型ID为 " . $flowType['flows_type_id'] . " 获取数据报错";
                }else{
                    if(!empty($response)){
                        foreach ($response as $key => $flow) {
                            $data = [
                                'sn'      => $flow['sn'],
                                'flow_id' => $flow['id'],
                                'flow_type_id' => $flowType['flows_type_id'],
                                'created_at'   => date('Y-m-d H:i:s', strtotime($flow['created_at'])),
                                'updated_at'   => date('Y-m-d H:i:s', strtotime($flow['updated_at'])),
                                'current_vertex_id' => $flow['current_vertex_id'],
                                'reviewer_vertex_ids' => implode(',', $flow['reviewer_vertex_ids']),
                                'create_user_id'     => $flow['user']['id'],
                                'create_user_name'   => urlencode($flow['user']['name']),
                                'create_user_identifier' => $flow['user']['identifier'],
                                'create_user_headimgurl' => $flow['user']['headimgurl'],
                                'status' => $flow['status'],
                            ];

                            $count = $flowModel->acquireCount(['flow_id', $flow['id']]);
                            if($count == 0){
                                $flowModel->add($data);
                            }else{
                                $flowModel->modify(['flow_id', $flow['id']], $data);
                            }

                            if(isset($flow['response'])){
                                $responseId = $flow['response']['id'];
                                $fieldValues = isset($flow['response']['cached_values']) ? $flow['response']['cached_values'] : [];
                                foreach ($fieldValues as $fieldId => $fieldValue) {
                                    $field = $this->Obj2Arr($fieldsModel->acquire(['field_id', $fieldId]));
                                    $data = [
                                        'response_id' => $responseId,
                                        'flow_id'     => $flow['id'],
                                        'field_id'    => $fieldId,
                                        'field_name'  => $field['title'],
                                        'value'       => json_encode($fieldValue['value']),
                                        'text_value'  => json_encode($fieldValue['text_value']),
                                        'exported_value' => json_encode($fieldValue['exported_value']),
                                    ];

                                    $count = $fieldValueModel->acquireCount([['response_id', $responseId], ['field_id', $fieldId], 'multi'=>true]);
                                    if($count == 0){
                                        $fieldValueModel->add($data);
                                    }else{
                                        $fieldValueModel->modify([['response_id', $responseId], ['field_id', $fieldId], 'multi'=>true], $data);
                                    }
                                }
                            }
                        }
                    }else if($startPage == 1){
                        $errorMsg[] = "流程类型ID为 " . $flowType['flows_type_id'] . " 的流程获取空数据";
                    }
                }
                ++$startPage;
                sleep(2);
            }while(!empty($response));
        }

        if(!empty($errorMsg)){
            return [
                'code' => 401,
                'msg'  => implode(',', $errorMsg),
            ];
        }else{
            return [
                'code' => 200,
                'msg'  => 'SUCCESS',
            ];
        }
    }

    //获取用户创建的流程列表
    protected function api_flow_list(){
        $page  = $this->request->input('page') ?? 1;
        $limit = $this->request->input('limit') ?? 10;
        $offset = $page < 0 ? 0 : ($page - 1)*$limit;

        $flowTypeId  = $this->request->input('flow_type_id') ?? 0;
        $projectName = $this->request->input('project_name');
        $where = [];

        $fieldModel = new FieldsModel();
        $field = $this->Obj2Arr($fieldModel->acquire([['title', '项目名称'], ['flow_type_id', $flowTypeId], 'multi'=>true]));
        $where = [['field_value.field_id', $field['field_id']], 'multi'=>true];

        if(!empty($projectName)){
            if(!empty($field)){
                $where[] = ['field_value.value', 'like', '%'.$projectName.'%'];
            }else{
                return [
                    'code' => 401,
                    'msg'  => '搜索条件错误',
                ];
            }
        }
        $flowsModel = new FlowsModel();
        $list = $this->Obj2Arr($flowsModel->PowerfulCURD('current_model', 'get', [
            'leftJoin' => ['field_value', 'field_value.flow_id', '=', 'flows.flow_id'],
            'where'    => $where,
            'skip'     => $offset,
            'take'     => $limit,
            'orderBy'  => ['flows.updated_at', 'desc']
        ]));

        $total = $this->Obj2Arr($flowsModel->PowerfulCURD('current_model', 'count', [
            'leftJoin' => ['field_value', 'field_value.flow_id', '=', 'flows.flow_id'],
            'where'    => $where,
            'skip'     => 0,
        ]));

        $fieldValueModel = new FieldValueModel();
        $verticesModel   = new VerticesModel();

        $newList = [];
        $flowStepList = [];
        $session = $this->request->getSession();

        if($session->exists('flow_step_list')){
            $flowStepList = json_decode($session->get('flow_step_list'), true);
        }

        foreach ($list as $row) {
            if(!isset($flowStepList[$row['flow_type_id']])){
                //查询此流程类型的步骤顺序
                // $startVertex = $this->Obj2Arr($verticesModel->acquire([['type', 'YetAnotherWorkflow::Vertex::Initial'], ['flow_type_id', $row['flow_type_id']], 'multi'=>true]));

                // $allSteps = $this->getAllFlowSteps($row['flow_type_id'], $startVertex['vertices_id']);
                // $flowStepList[$row['flow_type_id']] = $allSteps;
                // $session->save('flow_step_list', json_encode($flowStepList));

                //查询此流程类型的步骤顺序
                $startVertex = $this->Obj2Arr($verticesModel->acquire([['type', 'YetAnotherWorkflow::Vertex::Initial'], ['flow_type_id', $row['flow_type_id']], 'multi'=>true]));

                $sql = "CALL SELECT_EDGES(".$startVertex['vertices_id'].")";

                $allSteps = $this->Obj2Arr($verticesModel->PureSqlStr($sql));
                $flowStepList[$row['flow_type_id']] = json_decode($allSteps[0]['vertices_ids'], true);
                $session->save('flow_step_list', json_encode($flowStepList));
            }
            $row['project_name'] = $row['value'];
            $row['create_user_name'] = urldecode($row['create_user_name']);
            $row['reviewer_vertex_ids'] = explode(',', $row['reviewer_vertex_ids']);
            $fieldValues = $this->Obj2Arr($fieldValueModel->PowerfulCURD('current_model', 'get', [
                'where'    => ['flow_id', $row['flow_id']],
                'skip'     => 0,
            ]));

            $fieldValueList = [];
            foreach ($fieldValues as $fieldValue) {
                $textValue = json_decode($fieldValue['text_value']);
                $fieldValue['text_value'] = $textValue[0];
                $fieldValueList[] = $fieldValue;
            }

            $row['field_values'] = $fieldValueList;
            $row['vertices'] = $flowStepList[$row['flow_type_id']];

            $newList[] = $row;
        }

        return [
            'code' => 200,
            'msg'  => 'SUCCESS',
            'data' => [
                'list'  => $newList,
                'total' => $total,
                'page'  => $page,
                'limit' => $limit,
            ]
        ];
    }

    protected function api_update_data(){
        $data = $_POST;
        //$data = '{"action":"proposed","assignment":{"id":"3217","created_at":"2018-07-02 11:06:18 +0800","updated_at":"2018-07-02 11:06:18 +0800","vertex_id":"861","status":"processing","response":{"id":"6773","created_at":"2018-07-02 11:02:53 +0800","updated_at":"2018-07-02 11:06:18 +0800","cached_values":{"1779":{"value":["\u6d4b\u6b63\u9879\u76ee"],"text_value":["\u6d4b\u6b63\u9879\u76ee"],"exported_value":["\u6d4b\u6b63\u9879\u76ee"]},"1780":{"value":["ZD0001"],"text_value":["ZD0001"],"exported_value":["ZD0001"]},"1781":{"value":["\u6c99\u77f3"],"text_value":["\u6c99\u77f3"],"exported_value":["\u6c99\u77f3"]},"1782":{"value":["79000\u5e73\u7c73"],"text_value":["79000\u5e73\u7c73"],"exported_value":["79000\u5e73\u7c73"]},"1783":{"value":["\u5546\u7528\u4f4f\u5b85"],"text_value":["\u5546\u7528\u4f4f\u5b85"],"exported_value":["\u5546\u7528\u4f4f\u5b85"]},"1784":{"value":["3\u661f"],"text_value":["3\u661f"],"exported_value":["3\u661f"]},"1785":{"value":["20%"],"text_value":["20%"],"exported_value":["20%"]}}},"journey":{"id":"732","created_at":"2018-07-02 11:06:18 +0800","updated_at":"2018-07-02 11:06:18 +0800","sn":"14620180702110253000007","status":"processing","current_vertex_id":"863","reviewer_vertex_ids":["861"]},"user":{"id":"256","created_at":"2018-06-29 12:34:54 +0800","updated_at":"2018-06-29 12:34:54 +0800","name":"\u4e3e\u4e2a\u8354\u679d","identifier":"oXDm5sxqlHiGERUVnPVqcwqiQBbE","headimgurl":"http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/8SpBA9A4Q4lOPYodFYPiak77oHsHhheW6FSiaOpTr9Cdnz6JxaXdmQ8VXjZrZUCxskYwbcMPBHYpFTWvGItm8W8w"}},"flow":{"id":"146","created_at":"2018-06-19 17:39:43 +0800","updated_at":"2018-06-19 17:53:43 +0800","title":"\u62db\u6807"}}';
        if(empty($data)){
            return [
                'code' => 401,
                'msg'  => '更新数据为空',
            ];
        }
        $data = json_decode($data, true);
        $result = false;

        $flowModel  = new FlowsModel();
        $flowTypeModel = new FlowTypeModel();

        //查询本地是否支持流程类型
        $flowTypeId = $data['flow']['id'];
        $count = $flowTypeModel->acquireCount(['flows_type_id', $flowTypeId]);
        if($count > 0){
            $result = $this->_addOrUpdateFlow($data);
        }else{
            return [
                'code' => 401,
                'msg'  => '不支持的流程类型',
            ];
        }
        if($result){
            return [
                'code' => 200,
                'msg'  => 'SUCCESS',
            ];
        }
        return [
            'code' => 401,
            'msg'  => '更新数据失败',
        ];
    }

    private function _addOrUpdateFlow($data){
        $flowModel       = new FlowsModel();
        $fieldValueModel = new FieldValueModel();
        $fieldsModel     = new FieldsModel();

        $assignment = $data['assignment'];
        $fields = $this->Obj2Arr($fieldsModel->acquireList(1, 100, ['flow_type_id', $data['flow']['id']]));
        $flow   = $this->Obj2Arr($flowModel->acquire(['flow_id', $assignment['journey']['id']]));

        $flowModel->StartTransaction();
        //流程主体信息
        $flowData['flow_id'] = $assignment['journey']['id'];
        $flowData['sn']      = $assignment['journey']['sn'];
        $flowData['flow_type_id'] = $data['flow']['id'];
        $flowData['current_vertex_id'] = $assignment['journey']['current_vertex_id'];
        $flowData['reviewer_vertex_ids'] = json_encode($assignment['journey']['reviewer_vertex_ids']);
        $flowData['create_user_id'] = $assignment['user']['id'];
        $flowData['create_user_name'] = urlencode($assignment['user']['name']);
        $flowData['create_user_identifier'] = urlencode($assignment['user']['identifier']);
        $flowData['create_user_headimgurl'] = $assignment['user']['headimgurl'];
        $flowData['status'] = $assignment['journey']['status'];
        $flowData['created_at'] = date('Y-m-d H:i:s', strtotime($assignment['journey']['created_at']));
        $flowData['updated_at'] = date('Y-m-d H:i:s', strtotime($assignment['journey']['updated_at']));

        if(empty($flow)){
            $flowModel->add($flowData);
        }else{
            $flowModel->modify(['flow_id', $assignment['journey']['id']],$flowData);
        }
        
        //流程字段值
        $cachedValues = $assignment['response']['cached_values'];
        foreach ($fields as $field) {
            if(isset($cachedValues[$field['field_id']])){
                $fieldValueData = [
                    'response_id'=> $assignment['response']['id'], 
                    'flow_id'    => $assignment['journey']['id'], 
                    'field_id'   => $field['field_id'], 
                    'field_name' => $field['title'],
                    'value'      => json_encode($cachedValues[$field['field_id']]['value']),
                    'text_value' => json_encode($cachedValues[$field['field_id']]['text_value']),
                    'exported_value' => json_encode($cachedValues[$field['field_id']]['exported_value']),
                ];
                
                $count = $fieldValueModel->acquireCount([['flow_id', $assignment['journey']['id']], ['field_id', $field['field_id']], 'multi'=>true]);
                if($count > 0){
                    $fieldValueModel->modify([['flow_id', $assignment['journey']['id']], ['field_id', $field['field_id']], 'multi'=>true], $fieldValueData);
                }else{
                    $fieldValueModel->add($fieldValueData);
                }
            }
        }
        if($flowModel->TransactionCommit()){
            return true;
        }
        $flowModel->TransactionRollback();
        return false;
    }

    protected function getAllFlowSteps($flowTypeId, $fromVertexId, $flowSteps = []){
        $edgesModel = new EdgesModel();
        $verticesModel   = new VerticesModel();

        $edges = $this->Obj2Arr($edgesModel->PowerfulCURD('current_model', 'get', [
            'leftJoin' => ['vertices', 'vertices.vertices_id', '=', 'edges.from_vertex_id'],
            'where'    => [['edges.flow_type_id', $flowTypeId], ['edges.from_vertex_id', $fromVertexId], 'multi'=>true],
            'skip'     => 0,
            'take'     => 1,
            'select'   => ['vertices.vertices_id','vertices.name', 'edges.to_vertex_id']
        ]));

        if(empty($edges)){
            $endVertex = $this->Obj2Arr($verticesModel->acquire([['vertices_id', $fromVertexId], ['flow_type_id', $flowTypeId], 'multi'=>true], ['vertices_id','vertices.name']));
            $flowSteps[] = $endVertex;
            return $flowSteps;
        }

        $flowSteps[] = $edges[0];
        return $this->getAllFlowSteps($flowTypeId,  $edges[0]['to_vertex_id'], $flowSteps);
    }

    /**
     * @param $URL 请求链接
     * @param null $data 数据 array() string
     * @param string $type 请求类型 POST GET PUT DELETE
     * @param string $headers 头部信息
     * @param string $data_type 返回数据类型 默认为json
     * @return mixed
     */
    private function curlRequest($URL, $data=null, $type='POST',$headers="", $data_type='json'){
        $ch = curl_init();
        //判断ssl连接方式
        if(stripos($URL, 'https://') !== false) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        }else{
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
            curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        }
        $connttime=300; //连接等待时间500毫秒
        $timeout = 15000;//超时时间15秒
 
        $querystring = "";
        if (is_array($data)) {
            // Change data in to postable data
            foreach ($data as $key => $val) {
                if (is_array($val)) {
                    foreach ($val as $val2) {
                        $querystring .= urlencode($key).'='.urlencode($val2).'&';
                    }
                } else {
                    $querystring .= urlencode($key).'='.urlencode($val).'&';
                }
            }
            $querystring = substr($querystring, 0, -1); // Eliminate unnecessary &
        } else {
            $querystring = $data;
        }
       // echo $querystring;
        curl_setopt ($ch, CURLOPT_URL, $URL); //发贴地址
        //设置HEADER头部信息
        if($headers!=""){
           curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
        }else {
           curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type: text/json'));
        }    
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);//反馈信息
        curl_setopt ($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); //http 1.1版本
 
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT_MS, $connttime);//连接等待时间
        curl_setopt ($ch, CURLOPT_TIMEOUT_MS, $timeout);//超时时间
        
        switch ($type){
            case "GET" : 
                curl_setopt($ch, CURLOPT_HTTPGET, true);
                break;
            case "POST": 
                curl_setopt($ch, CURLOPT_POST,true);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$querystring);
                break;
            case "PUT" : 
                curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS,$querystring);
                break;
            case "DELETE":
                curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                curl_setopt($ch, CURLOPT_POSTFIELDS,$querystring);
                break;
        }
        $file_contents = curl_exec($ch);//获得返回值
        // echo time().'<br>';
        $status = curl_getinfo($ch);
        curl_close($ch);

        if($data_type=="json"||$data_type=="JSON")
        {
            return json_decode($file_contents, true);
        }else
        {
            return $file_contents;
        }
    }
}