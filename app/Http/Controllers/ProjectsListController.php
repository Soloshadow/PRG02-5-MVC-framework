<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Project;
use App\User;

class ProjectsListController extends Controller
{

    public function __construct(){

        $this->middleware('lead_access:project leader')->except('index');

        // $this->authorizeResource(Project::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        // Eager load specific user with all its project
        $user_projects = User::with( 'projects' ) -> where('id', '=', Auth::id()) ->get();
        
        return view('projects.index', [ 'user_projects' => $user_projects[0] ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user)
    {

        $this->authorize('create', Project::class);
        
        // find current logged in user or throw an error page
        $user = User::findOrFail($user);

        // get list of owners and developers except the current logged in user
        $developers = User::where('id', '!=', $user->id)->get();

        return view('projects.create', [
            'user' => $user,
            'developers' => $developers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user)
    {

        // Form validation before storing in DB
        $validation = $request->validate([
            'project_name' => 'required|min:5',
            'developers' => 'required'
        ]);

        $project = new Project;

        $project->project_name = $validation['project_name'];

        $project->save();
        
        // Saving project to the correct user in pivot table
        $project -> users() -> attach($user);
        $project -> users() -> attach($validation['developers']);
        
        // redirecting user back to the specific url
        return redirect()->route('projects.index', ['user' => $user]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user, $id)
    {

        // Eager load the list of projects from specific user and all its related rows.

        $projects = Project::with('tasks')->where('id', '=', $id)->get();
        

        return view('projects.show', [ 
            'project' => $projects[0],
            'tasks' => $projects[0]->tasks
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user, $id)
    {

        $this->authorize('update', Project::class);

        // Eager load project with all current users
        $project = Project::with('users')->where('id', '=', $id) -> get();

        // get list of owners and developers except the current logged in user
        $developers = User::where('id', '!=', $user)->get();

        // dd(gettype($project[0]->users->toArray()));
        return view('projects.edit', [ 
            'project' => $project[0],
            'users' => $project[0]->users,
            'developers' => $developers
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user, $id)
    {
        //
        $validation = $request->validate([
            'project_name' => 'required|min:5',
            'developers' => 'required'
        ]);

        // dd($validation);

        $project = Project::find($id);
        
        //  Update project name with the new validated name
        $project->project_name = $validation['project_name'];

        // save/update project
        $project->save();

        // Sync new updated proejct with all selected develoeprs
        $project -> users() -> sync($validation['developers']);

        // Attach current user to the project otherwise the sync will remove the user
        $project ->users() ->attach($user);
        
        return redirect()->route('projects.index', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user, $id)
    {

        $this->authorize('delete', Project::class);

        $project = Project::find($id);

        $project->delete();

        // Eager load specific user with all its project
        $user_projects = User::with( 'projects' ) -> where('id', '=', Auth::id()) ->get();
        
        return view('projects.index', [ 'user_projects' => $user_projects[0] ] );
    }
}
