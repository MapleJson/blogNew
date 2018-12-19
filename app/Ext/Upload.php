<?php

namespace App\Ext;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait Upload
{
    /**
     * @var string
     */
    protected $path = '/';

    private $fileName = '';

    /**
     * @var \Illuminate\Filesystem\FilesystemAdapter
     */
    protected $storage;

    /**
     * 初始化上传文件配置
     */
    private function initStorage()
    {
        $this->storage = Storage::disk(config('admin.upload.disk'));
    }

    /**
     * Upload interface.
     *
     * @param UploadedFile[]|UploadedFile $files
     * @return array
     */
    public function uploadFile($files)
    {
        $this->initStorage();
        if (is_array($files)) {
            return $this->uploadImages($files);
        }
        return $this->uploadImage($files);
    }

    /**
     * Get File Name
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param UploadedFile[] $files
     *
     * @return array
     */
    private function uploadImages($files)
    {
        $data = [];
        foreach ($files as $file) {
            if ($result = $this->uploadImage($file)) {
                $data[] = $result;
            }
        }

        return $data;
    }

    /**
     * @param UploadedFile $file
     *
     * @return mixed
     */
    private function uploadImage($file)
    {
        $this->path     .= config('admin.upload.directory.image');
        $this->fileName = $this->generateUniqueName($file);

        return $this->storage->putFileAs($this->path, $file, $this->fileName);
    }

    /**
     * Generate a unique name for uploaded file.
     *
     * @param UploadedFile $file
     *
     * @return string
     */
    private function generateUniqueName(UploadedFile $file)
    {
        return md5(uniqid()) . '.' . $file->getClientOriginalExtension();
    }

}