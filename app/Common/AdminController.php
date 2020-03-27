<?php

namespace App\Common;

use App\Ext\Code;

class AdminController extends PublicController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = '';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = '';

    /**
     * 统一视图返回
     *
     * @param string|null $view
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function responseView(string $view, array $data = [])
    {
        $administrator = auth('admin')->user();
        if (!empty($administrator->avatar)) {
            $administrator->avatarImg = self::uploadImageUrl($administrator->avatar);
        }

        return view("admin.{$view}", $data, compact('administrator'));
    }

    /**
     * 设置总条数
     * @param int $count
     */
    protected function setCount(int $count)
    {
        self::$response['count'] = $count;
    }

    /**
     * 获取需要注册的模型
     *
     * @return PublicModel
     */
    public function getModelAccessor()
    {
        return app(PublicModel::class);
    }

    /**
     * 预处理数据
     * @param string $type
     */
    public function formatModelData(string $type = 'store')
    {
    }

    /**
     * 新增数据
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $model = $this->getModelAccessor();

        $model::$data = self::getValidateParam($this->storeValidate);
        $this->formatModelData();
        if ($model::addToData()) {
            return $this->responseJson();
        }
        return $this->responseJson(self::translateInfo(Code::FAIL_TO_ADD));
    }

    /**
     * 编辑数据
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id)
    {
        $model = $this->getModelAccessor();

        $model::$data = self::getValidateParam($this->updateValidate);
        $this->formatModelData('update');
        $model::$where['id'] = $id;
        if ($model::editToData()) {
            return $this->responseJson();
        }
        return $this->responseJson(self::translateInfo(Code::FAIL_TO_EDIT));
    }

    /**
     * 删除数据
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy()
    {
        $model = $this->getModelAccessor();
        $del   = self::getValidateParam(__FUNCTION__);
        if ($model::delToData($del['id'])) {
            return $this->responseJson();
        }
        return $this->responseJson(self::translateInfo(Code::FAIL_TO_DELETE));
    }
}
