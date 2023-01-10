<?php

namespace App\Http\Controllers;

use App\Models\MPage;
use App\Models\MRolePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = MPage::where('del_flg', 0)
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        foreach ($pages as  $page) {
            $page->role;
        }

        return inertia('PageList', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('AddPage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required',
            'page_route' => 'required'
        ]);

        $page = new MPage();
        $page->p_name = $request->page_name;
        $page->p_route = strtolower($request->page_route);
        $page->save();

        $pages = MPage::where('p_route', $page->p_route)->first();
        
        $rolePage = new MRolePage();
        $rolePage->m_page_id = $pages->id;
        $rolePage->m_role_id = session()->get('roleId');
        $rolePage->save();

        return Redirect::route('pageList.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Redirect::route('pageList.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = MPage::find($id);

        if($page == null){
            return Redirect::route('pageList.index');
        }else{
            return inertia('EditPage', [
                'page' => $page
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'page_name' => 'required',
            'page_route' => 'required'
        ]);

        $page = MPage::find($id);
        $page->p_name = $request->page_name;
        $page->p_route = $request->page_route;
        $page->save();

        return Redirect::route('pageList.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = MPage::find($id);
        $page->publish = 0;
        $page->save();

        return Redirect::route('pageList.index');
    }
}
