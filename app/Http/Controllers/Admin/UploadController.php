<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Ext\Code;
use App\Ext\Upload;

class UploadController extends AdminController
{
    use Upload;

    public function upload()
    {
        $post = self::getValidateParam(__FUNCTION__);
        return $this->responseJson([
            'src'   => $this->uploadFile($post['file']),
            'title' => $this->getFileName(),
        ]);
    }

    public function editorUpload()
    {
        $post = self::getValidateParam('upload');
        return $this->responseJson([
            'src'   => self::uploadImageUrl($this->uploadFile($post['file'])),
            'title' => $this->getFileName(),
        ], Code::ZERO);
    }

    public function bulkUpload()
    {
        $post = self::getValidateParam(__FUNCTION__);
        return $this->responseJson([
            'src'   => $this->uploadFile($post['files']),
            'title' => $this->getFileName(),
        ]);
    }

}