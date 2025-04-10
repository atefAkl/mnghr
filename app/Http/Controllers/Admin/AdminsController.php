<?php

namespace App\Http\Controllers\admin;

use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Models\AdminProfile;
use Illuminate\Http\Request;
use App\Models\Possitions;
use App\Models\UserRule;
use App\Models\AdminRole;
use App\Models\Admin;
use App\Models\Rule;



class AdminsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected static $professions = [['Application Admin', 'مدير التطبيق'],  ['general manager', 'المدير العام'], ['Financial Manager', 'المدير المالى'], ['Inventory Man', 'أمين المخازن'], ['Accountant', 'المحاسب'], ['Store Man', 'مسئول التخزين'], ['labourer', 'عامل']];
    public function index()
    {
        //
        $users = Admin::where([])->get();

        $vars = [
            'users' => $users,
            'professions' => static::$professions
        ];
        return view('admin.admins.home', $vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vars = [
            'jobs' => static::$professions,
        ];
        return view('admin.admins.create', $vars);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request.
     * @return \Illuminate\Http\Response.
     */

    public function store(Request $request)
    {
        //
        $admin = Admin::create([
            'userName'         => $request->userName,
            'email'            => $request->email,
            'password'         => bcrypt($request->password),
            'created_at'       => date('Ymd H:i:s'),
            'created_by'       => currentUserId()
        ]);

        if ($admin != null) {
            $profile = AdminProfile::newProfile($request);
            $profile->user_id = $admin->id;
            try {
                $profile->save();
                return redirect()->route('display-admin', [$admin->id])->withSuccess('New admin has been added successfully.');
            } catch (QueryException $e) {
                $admin->delete();
                return redirect()->back()->withError('Admin creation process failed');
            }
        }
        return redirect()->back()->withError('Admin creation process failed');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function edit($id)
    {
        //

        return view('admin.admins.edit', ['user' => Admin::find($id)->with('profile')->first()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $admin = Admin::find($request->id);
        $profile = AdminProfile::where(['user_id' => $request->id])->first();

        if (null == $admin) {
            return redirect()->back()->with(['error' => 'حدث خطأ أثناء تحديث بيانات الموظف']);
        }
        try {
            $admin->update([
                'userName'         => $request->userName  ?? $admin->userName,
                'email'            => $request->email     ?? $admin->email,
                'updated_at'       => date('Ymd H:i:s')   ?? $admin->updated_at,
                'updated_by'       => currentUserId()  ?? $admin->updated_by,
            ]);

            $profile->update([
                'first_name'    => $request->first_name     ?? $profile->first_name,
                'last_name'     => $request->last_name      ?? $profile->last_name,
                'possition'     => $request->possition      ?? $profile->possition,
                'gender'        => $request->gender         ?? $profile->gender,
                'dob'           => $request->dob            ?? $profile->dob,
                'natId'         => $request->natId          ?? $profile->natId,
                'image'         => $request->image          ?? $profile->image,
                'user_id'       => $request->user_id        ?? $profile->user_id,
                'updated_at'    => $request->updated_at     ?? $profile->updated_at,
                'phone'         => $request->phone          ?? $profile->phone,
                'address'       => $request->address        ?? $profile->address
            ]);
            return redirect()->back()->with(['success' => 'Admin info updated successfully.']);
        } catch (QueryException $e) {
            return redirect()->back()->with(['error' => "Error updating admin info due to: $e"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display($id)
    {
        // return to users if the id is wrong
        $admin = Admin::find($id);
        if (!$admin) {
            return redirect()->route('admins.home')->withError('لا يوجد موظفين مرتبطين بهذا الرقم التعريفى، رجاءا اختر موظفين من القائمة');
        }
        $vars = [
            'admin' => Admin::where('id', $id)->with('profile')->first(),
        ];

        return view('admin.admins.profile', $vars);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function displayRoles($id)
    {
        // return to users if the id is wrong
        $admin = Admin::find($id);
        if (!$admin) {
            return redirect()->route('display-admins-list')->withError('No admins has been found with provided id, please select admins from the list.');
        }
        $profile = $admin->profile();
        $admin->getRoles();
        $roles = $admin->assignedRoles;

        $vars = [
            'admin' => $admin,
            'profile' => $profile,
            'roles' => $roles,
        ];

        return view('admin.admins.roles', $vars);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function displayLog($id)
    {
        // return to users if the id is wrong
        $admin = Admin::find($id);
        if (!$admin) {
            return redirect()->route('admins.home')->withError('لا يوجد موظفين مرتبطين بهذا الرقم التعريفى، رجاءا اختر موظفين من القائمة');
        }
        $vars = [
            'admin' => Admin::where('id', $id)->with('profile')->first(),
        ];

        return view('admin.admins.log', $vars);
    }



    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function profile_update(Request $request)
    {
        $profile = AdminProfile::where(['userId' => $request->id])->first();

        if (null == $profile) {
            return redirect()->back()->with(['error' => 'حدث خطأ ما، يرجى مراجعة الإدارة!!']);
        }

        $profile->firstName         = $request->firstName;
        $profile->lastName          = $request->lastName;
        $profile->title             = $request->title;
        $profile->gender            = $request->gender;
        $profile->dob               = $request->dob;
        $profile->natId             = $request->natId;
        $profile->phone             = $request->phone;
        $profile->profession        = $request->profession;


        $profile->updated_at       = date('Ymd H:i:s');
        $profile->updated_by       = currentUserId();

        if ($profile->update()) {

            return redirect()->back()->with(['success' => 'تم تعديل بيانات الموظف بنجاح']);
        }
        return redirect()->back()->with(['error' => 'حدث خطأ أثناء تحديث بيانات الموظف']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:admins,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        try {
            AdminRole::create([
                'admin_id' => $request->user_id,
                'role_id' => $request->role_id,
                'guard_name' => 'admin',
            ]);

            return redirect()->back()->withSuccess('Role assigned successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withError('Failed to assign role.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $admin = Admin::find($id);
        if ($admin->delete()) {
            return redirect()->back()->with(['success' => 'تم حذف المدير بنجاح']);
        }
        return redirect()->route('admins.home')->withError('لا يوجد موظفين مرتبطين بهذا الرقم التعريفى، رجاءا اختر موظفين من القائمة');
    }
}
