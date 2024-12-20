<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReceiptRequest;
use App\Models\StoreReceipt;
use App\Models\Store;
use App\Models\Admin;
use Exception;

class StoreReceiptsController extends Controller
{

  private static $reference_type = [
    '1' => 'Purchases',
    '2' => 'Sales inverse',
    '3' => 'Purchases inverse',
    '4' => 'Transfer',
    '5' => 'Sales',
    '6' => 'Project supplies',
    '7' => 'Administration supplies',
    '8' => 'Credit transfer',
  ];

  private static $status = [1 => '1', 2 => '2', 3 => '0'];

  private static $tabs = [1 => 'inprogress', 2 => 'approved', 3 => 'archived'];
  
  private const INSERT_ENTRY = 1;
  private const OUTPUT_ENTRY = 2;

 /**
 * عرض قائمة بجميع الإيصالات.
 *
 * هذه الدالة تسترجع جميع الإيصالات من قاعدة البيانات وتعرضها مع معلومات
 * إضافية مثل المتاجر والمدراء. يتم إعداد المتغيرات اللازمة للعرض في الواجهة.
 *
 * @return \Illuminate\View\View
 */
  public function home()
  {
    $receipts = StoreReceipt::all();
    $stores   = Store::all();
    $admins   = Admin::all();
    $vars = [
      'reference_type'   => self::$reference_type,
      'direction_input'  => self::INSERT_ENTRY,
      'direction_output' => self::OUTPUT_ENTRY,
      'status'           => self::$status,
      'admins'           => $admins,
      'receipts'         => $receipts,
      'stores'           => $stores,

    ];
    return view('admin.receipts.index', $vars);
  }



/**
 * عرض قائمة بالإيصالات بناءً على الحالة والاتجاه المحددين.
 *
 * هذه الدالة تسترجع الإيصالات من قاعدة البيانات بناءً على الحالة المحددة
 * (مثل "معلق" أو "معتمد") والاتجاه (إدخال أو إخراج). يتم عرض الإيصالات في
 * صفحة مقسمة.
 *
 * @param string $dir اتجاه الإيصالات (input أو output).
 * @param int $tab الحالة التي يتم عرض الإيصالات بناءً عليها سواء 
 * كانت قيد الاتعديل أو تمت الموافقة عليها أو مؤرشفة.
 * @return \Illuminate\View\View
 */
  public function index($dir, $tab)
  {

    $receipts = StoreReceipt::where(['status' => self::$status[$tab], 'direction' => $dir == 'input' ? 1 : 2])
      ->orderBy('serial', 'desc')
      ->paginate(10);

    $stores   = Store::all();
    $admins   = Admin::all();
    $vars = [
      'tabs'              => self::$tabs,
      'tab'               => $tab,
      'dir'               => $dir,
      'reference_type'    => self::$reference_type,
      'direction_input'   => self::INSERT_ENTRY,
      'direction_output'  => self::OUTPUT_ENTRY,
      'status'            => self::$status,
      'admins'            => $admins,
      'receipts'          => $receipts,
      'stores'            => $stores,
    ];
    $file = 'admin.receipts.' . self::$tabs[$tab];
    return view($file, $vars);
  }


 /**
 * عرض نموذج لإنشاء مورد جديد جديد.
 *
 * هذه الدالة تعرض نموذجًا لإنشاء إيصال جديد. لا توجد معالجة إضافية
 * في الوقت الحالي.
 *
 * @return \Illuminate\View\View
 */
  public function create()
  {
    //
  }

/**
 * تخزين مورد جديد في قاعدة البيانات.
 *
 * هذه الدالة تستقبل طلب إنشاء إيصال جديد وتقوم بتخزينه في قاعدة البيانات.
 * يتم التحقق من الطلب باستخدام StoreReceiptRequest.
 *
 * @param \App\Http\Requests\StoreReceiptRequest $request بيانات الإيصال الجديد.
 * @return \Illuminate\Http\RedirectResponse
 * @throws \Exception في حال حدوث خطأ أثناء التخزين.
 */
  public function store(StoreReceiptRequest $request)
  {

    try {
      StoreReceipt::create([
        'reception_date'          => $request->reception_date,
        'reference_type'          => $request->reference_type,
        'serial'                  => $request->serial,
        'brief'                   => $request->brief,
        'notes'                   => $request->notes,
        'status'                  => $request->status !== null ? $request->status : 1,
        'admin_id'                => $request->admin_id,
        'store_id'                => $request->store_id,
        'direction'               => $request->direction,
        'created_by'              => currentUserId(),

      ]);
      return redirect()->back()->withSuccess('Saves Successfully');
    } catch (Exception $err) {
      return redirect()->back()->withError('Failed to save, due to: ' . $err);
    }
  }

/**
 * عرض مورد محدد.
 *
 * هذه الدالة تسترجع الإيصال المحدد بواسطة المعرف وتعرض تفاصيله.
 * لا توجد معالجة إضافية في الوقت الحالي.
 *
 * @param string $id معرف الإيصال المراد عرضه.
 * @return \Illuminate\View\View
 */
  public function show(string $id)
  {
    //
  }

/**
 * عرض نموذج لتعديل مورد محدد.
 *
 * هذه الدالة تسترجع الإيصال المحدد بواسطة المعرف وتعرض نموذجًا لتعديله.
 *
 * @param string $id معرف الإيصال المراد تعديله.
 * @return \Illuminate\View\View
 */
  public function edit(string $id)
  {
    $receipt = StoreReceipt::find($id);
    $stores   = Store::all();
    $admins   = Admin::all();
    $vars = [
      'reference_type'   => self::$reference_type,
      'status'           => self::$status,
      'admins'           => $admins,
      'receipt'          => $receipt,
      'stores'           => $stores,

    ];
    return view('admin.receipts.edit', $vars);
  }

/**
 * تحديث مورد محدد في قاعدة البيانات.
 *
 * هذه الدالة تستقبل طلب تحديث الإيصال وتقوم بتحديثه في قاعدة البيانات.
 *
 * @param \Illuminate\Http\Request $request بيانات الإيصال المحدث.
 * @return \Illuminate\Http\RedirectResponse
 * @throws \Exception في حال حدوث خطأ أثناء التحديث.
 */
  public function update(Request $request)
  {
    $receipt = StoreReceipt::find($request->id);

    //return $request->product_serial;
    try {
      $receipt->update([
        'reference_type'          => $request->reference_type,
        'brief'                   => $request->brief,
        'notes'                   => $request->notes,
        'admin_id'                => $request->admin_id,
        'store_id'                => $request->store_id,
        'status'                  => $request->status,
        'updated_by'              => currentUserId(),

      ]);
      return redirect()->back()->with('success', 'Receipt updated successfully');
    } catch (Exception $e) {
      return redirect()->back()->with('error', 'Error updating because of: ' . $e->getMessage());
    }
  }

/**
 * إزالة مورد محدد من قاعدة البيانات.
 *
 * هذه الدالة تستقبل معرف الإيصال المراد حذفه، تتحقق مما إذا كان الإيصال موجودًا
 * ثم تقوم بحذفه. إذا لم يكن موجودًا، يتم إرجاع رسالة خطأ.
 *
 * @param string $id معرف الإيصال المراد حذفه.
 * @return \Illuminate\Http\RedirectResponse
 * @throws \Exception في حال حدوث خطأ أثناء الحذف.
 */
  public function destroy($id)
  {
    $receipt = StoreReceipt::find($id);
    if (!$receipt) {
      return redirect()->back()->withError('The receipt is not exist, may be deleted or you have insuffecient privilleges to delete it.');
    }
    try {
      $receipt->delete();
      return redirect()->back()->with('success', 'receipt Removed Successfully'); 
    } catch (Exception $err) {

      return redirect()->back()->with(['error' => 'receipt can not be Removed due to: ' . $err]);
    }
  }

/**
 * استعادة مورد محذوف من قاعدة البيانات.
 *
 * هذه الدالة تستقبل معرف الإيصال المحذوف وتقوم باستعادته. 
 *
 * @param string $id معرف الإيصال المراد استعادته.
 * @return \Illuminate\Http\RedirectResponse
 * @throws \Exception في حال حدوث خطأ أثناء الاستعادة.
 */
  public function  restore($id)
  {

    try {
       StoreReceipt::withTrashed()->where('id', $id)->restore();
      return redirect()->back()->with(['success' => 'Receipt Restore Successfully']);
    } catch (Exception $err) {

      return redirect()->back()->with(['error' => 'Receipt can not be Removed due to: ' . $err]);
    }
  }

  /**
 * حذف مورد محدد بشكل نهائي من قاعدة البيانات.
 *
 * هذه الدالة تستقبل معرف الإيصال المراد حذفه بشكل نهائي وتقوم بحذفه.
 *
 * @param string $id معرف الإيصال المراد حذفه بشكل نهائي.
 * @return \Illuminate\Http\RedirectResponse
 * @throws \Exception في حال حدوث خطأ أثناء الحذف.
 */
  public function  forceDelete($id)
  {
    $receipt = StoreReceipt::withTrashed()->find($id);
    if (!$receipt) {
      return redirect()->back()->withError('The receipt is not exist, may be deleted or you have insuffecient privilleges to delete it.');
    }
    try {
      $receipt->forceDelete();
      return  redirect()->back()->with(['success' => 'Receipt deleted Successfully']);
    } catch (Exception $err) {

      return redirect()->back()->with(['error' => 'Receipt can not be Removed due to: ' . $err]);
    }
  }
}