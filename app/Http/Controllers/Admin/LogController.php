<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Models\Administrator;
use App\Models\OperationLog;

class LogController extends AdminController
{
    public $methodColors = [
        'GET'    => 'green',
        'POST'   => 'yellow',
        'PUT'    => 'blue',
        'DELETE' => 'red',
    ];

    public function index()
    {
        $data = [
            'admins'  => Administrator::getList(),
            'methods' => OperationLog::$methods,
        ];
        return $this->responseView('log.list', $data);
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        OperationLog::$limit = $this->getPageOffset(self::limitParam());

        $get = self::getValidateParam('logSearch');
        if (!empty($get['user_id'])) {
            OperationLog::$where[] = ['user_id', '=', (int)$get['user_id']];
        }
        if (!empty($get['method'])) {
            OperationLog::$where = ['method', '=', $get['method']];
        }
        if (!empty($get['ip'])) {
            OperationLog::$where = ['ip', '=', $get['ip']];
        }
        if (!empty($get['path'])) {
            OperationLog::$where = ['path', 'like', "%{$get['path']}%"];
        }
        $logs = OperationLog::getList();
        foreach ($logs as &$log) {
            $log->username = $log->user->name;
            $log->methodColor = $this->methodColors[$log->method];
        }
        $this->setCount(OperationLog::getListCount());
        return $this->responseJson($logs);
    }

    /**
     * 获取需要注册的模型
     *
     * @return OperationLog
     */
    public function getModelAccessor()
    {
        return app(OperationLog::class);
    }
}