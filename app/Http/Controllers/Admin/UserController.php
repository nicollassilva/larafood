<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;

class UserController extends Controller
{
    protected $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->paginate();

        return view('admin.pages.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUser $request)
    {
        $data = $request->all();
        $data['tenant_id'] = auth()->user()->tenant_id;

        $this->repository->create($request->all());

        return redirect()
                    ->route('users.index')
                    ->with('message', 'Perfil criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$profile = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.users.show', [
            'profile' => $profile
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$profile = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.users.edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request, $id)
    {
        if(!$profile = $this->repository->find($id))
            return redirect()->back();

        $profile->update($request->all());

        return redirect()
                ->route('users.index')
                ->with('message', 'Perfil atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$profile = $this->repository->find($id))
            return redirect()->back();

        $profile->delete();
        return redirect()
            ->route('users.index')
            ->with('message', 'Perfil deletado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $users = $this->repository
        ->where(function($query) use ($request) {
            if ($request->filter) {
                $query->where('name', 'LIKE', "%{$request->filter}%")
                      ->orWhere('email', 'LIKE', "%{$request->filter}%");;
            }
        })->paginate();

        return view('admin.pages.users.index', [
            'users' => $users,
            'filters' => $filters
        ]);
    }
}
