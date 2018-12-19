<?php

namespace App\Http\Controllers\Front\Search;

use App\Http\Services\Search\Search;

class SearchController
{
    /**
     * 搜索功能
     * @param Search $search
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Search $search)
    {
        return $search->search();
    }
}
