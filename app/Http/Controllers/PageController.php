<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository\ContactRepositoryInterface;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function about()
    {
        return view('page.about');
    }

    public function contact()
    {
        return view('page.contact');
    }

    public function faq()
    {
        return view('page.faq');
    }

    public function rule()
    {
        return view('page.rule');
    }

    public function sendContact(Request $request)
    {
        $data        = $request->all();
        $fillable    = $this->contactRepository->getFillable();
        $attribute   = array_only($data, $fillable);
        $saveContact = $this->contactRepository->create($attribute);

        if ($saveContact) {
            return redirect()->action('PageController@contact')
                ->with('success', trans('validate.msg.send-success'));
        }

        return redirect()->action('PageController@contact')
            ->with('error', trans('validate.msg.send-fail'));
    }
}
