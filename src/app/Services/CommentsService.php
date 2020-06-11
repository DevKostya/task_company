<?php


namespace App\Services;


use App\Models\Comment;

class CommentsService
{
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public function getCompanyCommentsById($companyId, $userId)
    {
        return Comment::with(['company', 'user'])
            ->where('company_id', '=', $companyId)
            ->where('user_id', '=', $userId)
            ->orderBy('date','desc')
            ->get();
    }

    /**
     * @param $params
     * @param $componyId
     * @param $userId
     * @return mixed
     */
    public function postComment($params, $componyId)
    {
        return Comment::create([
            'column_name' => $params['column_name'],
            'user_id' => $params['user_id'],
            'company_id' => $componyId,
            'comment' => $params['text'],
            'date' => date(now()),
        ]);
    }
}
