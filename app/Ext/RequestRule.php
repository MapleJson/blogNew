<?php

namespace App\Ext;

trait RequestRule
{
    // 公共参数
    public $pageLimitRule = [
        'page'  => 'required|integer|min:1',
        'limit' => 'required|integer|between:1,50',
    ];

    public $createMessageRule = [
        'articleId'  => 'nullable|integer|min:1',
        'content'    => 'required|string',
        'targetUser' => 'nullable|string',
        'parentId'   => 'required_with:targetUser|integer|min:1',
        'targetId'   => 'required_with:targetUser|integer|min:1',
    ];

    public $applyLinkRule = [
        'title'   => 'required|string',
        'logo'    => 'required|url',
        'domain'  => 'required|url',
        'summary' => 'required|string',
    ];

    public $loadPhotoRule = [
        'id' => 'required|integer|min:1',
    ];

    public $updatePwdRule = [
        'password' => 'required|confirmed|min:6|max:14'
    ];

    public $updateAdminUserRule = [
        'email'  => 'nullable|email',
        'avatar' => 'nullable|string',
        'name'   => 'required|min:4|max:14'
    ];

    public $destroyRule = [
        'id' => 'required',
    ];

    public $uploadRule = [
        'file' => 'required|file',
    ];

    public $menuStoreUpdateRule = [
        'parent_id' => 'required|integer|min:0',
        'title'     => 'required|string',
        'name'      => 'required_unless:parent_id,0|string',
        'uri'       => 'required_unless:parent_id,0|string',
        'order'     => 'required|integer|min:1',
        'icon'      => 'required|string',
    ];

    public $settingUpdateRule = [
        'siteName'      => 'required|string',
        'keywords'      => 'required|string',
        'description'   => 'required|string',
        'authorName'    => 'required|string',
        'profession'    => 'required|string',
        'mood'          => 'required|string',
        'content'       => 'required|string',
        'weChat'        => 'required|string',
        'weChatQR'      => 'required|string',
        'qq'            => 'required|string',
        'email'         => 'required|email',
        'topPicCount'   => 'required|integer|min:0',
        'bannersCount'  => 'required|integer|min:0',
        'blogShowCount' => 'required|integer|min:0',
        'proposeCount'  => 'required|integer|min:0',
        'messageCount'  => 'required|integer|min:0',
        'rssSize'       => 'required|integer|min:0',
        'template'      => 'required|string',
    ];

    public $carouselStoreUpdateRule = [
        'title' => 'required|string',
        'img'   => 'required|string',
        'type'  => 'required|integer|in:1,2,3',
        'state' => 'required|integer|in:1,2',
    ];

    public $blogSearchRule = [
        'title'     => 'nullable|string',
        'isTop'     => 'nullable|integer|in:0,1,2',
        'recommend' => 'nullable|integer|in:0,1,2',
        'state'     => 'nullable|integer|in:0,1,2',
    ];

    public $blogStoreUpdateRule = [
        'title'     => 'required|string',
        'tags'      => 'required|string',
        'img'       => 'nullable|string',
        'summary'   => 'required|string',
        'content'   => 'required|string',
        'isTop'     => 'required|integer|in:1,2',
        'recommend' => 'required|integer|in:1,2',
        'original'  => 'required|integer|in:1,2',
        'state'     => 'required|integer|in:1,2',
    ];

    public $tagSearchRule = [
        'name'  => 'nullable|string',
        'state' => 'nullable|integer|in:0,1,2',
    ];

    public $tagStoreUpdateRule = [
        'name'  => 'required|string',
        'state' => 'required|integer|in:1,2',
    ];

    public $whisperSearchRule = [
        'content' => 'nullable|string',
        'state'   => 'nullable|integer|in:0,1,2',
    ];

    public $whisperStoreUpdateRule = [
        'content' => 'required|string',
        'state'   => 'required|integer|in:1,2',
    ];

    public $linkSearchRule = [
        'title'  => 'nullable|string',
        'domain' => 'nullable|string',
        'me'     => 'nullable|integer|in:0,1,2',
        'state'  => 'nullable|integer|in:0,1,2',
    ];

    public $linkStoreUpdateRule = [
        'title'   => 'required|string',
        'logo'    => 'required|url',
        'summary' => 'required|string',
        'domain'  => 'required|url',
        'me'      => 'required|integer|in:1,2',
        'state'   => 'required|integer|in:1,2',
    ];

    public $messageSearchRule = [
        'content' => 'nullable|string',
        'state'   => 'nullable|integer|in:0,1,2',
    ];

    public $messageStoreRule = [
        'targetId'   => 'required|integer|min:1',
        'targetUser' => 'required|string',
        'parentId'   => 'required|integer|min:1',
        'articleId'  => 'nullable|integer|min:1',
        'content'    => 'required|string',
        'state'      => 'required|integer|in:1,2',
    ];

    public $messageUpdateRule = [
        'state' => 'required|integer|in:0,1,2',
    ];

    public $administratorSearchRule = [
        'username' => 'nullable|string'
    ];

    public $administratorStoreUpdateRule = [
        'username' => 'required|string|between:3,12',
        'password' => 'nullable|string|between:6,16|confirmed',
        'name'     => 'required|string',
        'avatar'   => 'required|string',
        'email'    => 'required|email',
    ];

    public $travelSearchRule = [
        'title' => 'nullable|string',
        'state' => 'nullable|integer|in:0,1,2',
    ];

    public $travelStoreUpdateRule = [
        'title'   => 'required|string',
        'cover'   => 'required|string',
        'summary' => 'required|string',
        'state'   => 'required|integer|in:1,2',
    ];

    public $photoSearchRule = [
        'id'    => 'required|integer|min:1',
        'state' => 'nullable|integer|in:0,1,2',
    ];

    public $photoStoreRule = [
        'travelId' => 'required|integer|min:1',
        'file'     => 'required|file',
    ];

    public $photoUpdateRule = [
        'summary' => 'required|string',
        'state'   => 'required|integer|in:1,2',
    ];

    public $logSearchRule = [
        'user_id' => 'nullable|integer|min:1',
        'method'  => 'nullable|string',
        'path'    => 'nullable|string',
        'ip'      => 'nullable|ip',
    ];

    public $templateSearchRule = [
        'state' => 'nullable|integer|in:0,1,2',
    ];

    public $templateStoreUpdateRule = [
        'name'  => 'required|string',
        'state' => 'required|integer|in:1,2',
    ];
}