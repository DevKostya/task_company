<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Services\CommentsService;
use App\Services\CompaniesService;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    private $commentsService;
    private $companiesService;

    public function __construct(CommentsService $commentsService, CompaniesService $companiesService)
    {
        $this->commentsService = $commentsService;
        $this->companiesService = $companiesService;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCompany($id)
    {
        $company = $this->companiesService->getCompanyById($id);
        $comments = $this->commentsService->getCompanyCommentsById($id, Auth::id());
        return view('company', compact(['comments','company']));
    }

    /**
     * @param AddCommentRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addComment(AddCommentRequest $request, $id)
    {
        $company = $this->companiesService->getCompanyById($id);
        $this->commentsService->postComment($request->all(),$id);
        $comments = $this->commentsService->getCompanyCommentsById($id, Auth::id());
        return view('company', compact(['comments','company']));
    }
}
