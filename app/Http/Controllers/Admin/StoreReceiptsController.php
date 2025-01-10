<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReceiptRequest;
use App\Http\Requests\UpdateRececiptRequest;
use App\Models\StoreReceipt;
use App\Models\Store;
use App\Models\Admin;
use Illuminate\View\View;
use Exception;
use Illuminate\Http\RedirectResponse;

class StoreReceiptsController extends Controller
{

  private const STORE_RECEIPT_NUMBER = 150;

  /**
   * حالة الإيصالات.
   * هذا المصفوفة تحتوي على القيم الممكنة لحالة الإيصالات، 
   * والتى يتم التعبير عنها فى الروابط بالأرقام 
   * والتى تمثل القيمة الفعلية التى تعبر عن حالة الايصال فى قاعدة البيانات كالتالى:.
   *
   * @var array
   */
  private static $status = [
    1 => '1', // قيد التنفيذ
    2 => '2', // معتمد
    3 => '0', // مؤرشف
  ];



  /**
   * علامات التبويب المستخدمة في واجهة المستخدم.
   * هذا المصفوفة تحتوي على القيم الممكنة لعلامات التبويب المستخدمة.
   * 1: قيد التنفيذ، 2: معتمد، 3: مؤرشف.
   *
   * @var array
   */
  private static $receipt_status = [
    0 => 'All States',   // الكل
    1 => 'inprogress', // قيد التنفيذ
    2 => 'approved',   // معتمد
    3 => 'archived',   // مؤرشف
  ];

  /**
   * علامات التبويب المستخدمة في واجهة المستخدم.
   * هذا المصفوفة تحتوي على القيم الممكنة لعلامات التبويب المستخدمة.
   * 1: قيد التنفيذ، 2: معتمد، 3: مؤرشف.
   *
   * @var array
   */
  private static $receipt_direction = [
    0 => 'All Types',   // الكل
    1 => 'input', // المدخلات
    2 => 'output',   // المخرجات

  ];

  /**
   * نوع (اتجاه) الايصال ادخال
   * هذا الثابت يمثل نوع الإدخال للإيصالات.
   * @var int
   */
  private const INSERT_ENTRY = 1;

  /**
   * نوع (اتجاه) الايصال اخراج
   * هذا الثابت يمثل نوع الإخراج للإيصالات.
   * @var int
   */
  private const OUTPUT_ENTRY = 2;

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
  // public function index()
  // {
  //   $filters = request()->query();
  //   $conditions = [];
  //   if (array_key_exists('status' ,$filters) && $filters['status'] != '0') {
  //     $conditions['status'] = $filters['status'];
  //   }
  //   if (array_key_exists('direction' ,$filters) && $filters['direction'] != '0') {
  //     $conditions['direction'] = $filters['direction'];
  //   }

  //   if (array_key_exists('reference_type' ,$filters) && $filters['reference_type'] != '') {
  //     $conditions['reference_type'] = $filters['reference_type'];
  //   }
  //   if (array_key_exists('admin_id' ,$filters) && $filters['admin_id'] != '') {
  //     $conditions['admin_id'] = $filters['admin_id'];
  //   }


  //   $receipts = StoreReceipt::where($conditions)->withTrashed()->orderBy('serial', 'desc')->paginate(10);
  //   $vars = [
  //     'query'             => request()->query(),
  //     'admins'            => Admin::all(),
  //     'stores'            => Store::all(),
  //     'reference_types'   => StoreReceipt::getReferenceTypes(),
  //     'receipt_status'    => static::$receipt_status,
  //     'receipt_direction' => static::$receipt_direction,
  //     'receipts'          => $receipts,
  //     'insert_entry'   => self::INSERT_ENTRY,
  //     'output_entry'  => self::OUTPUT_ENTRY,

  //   ];

  //   return view('admin.receipts.index', $vars);
  // }

  public function index()
  {
    $filters = request()->query();
    $conditions = [];
    $query = StoreReceipt::withTrashed()->orderBy('serial', 'desc'); // Start with a query builder

    if (array_key_exists('status', $filters) && $filters['status'] != '0') {
      $query->where('status', $filters['status']); // Use where on the query builder
    }
    if (array_key_exists('direction', $filters) && $filters['direction'] != '0') {
      $query->where('direction', $filters['direction']);
    }
    if (array_key_exists('reference_type', $filters) && $filters['reference_type'] != '') {
      $query->where('reference_type', $filters['reference_type']);
    }
    if (array_key_exists('admin_id', $filters) && $filters['admin_id'] != '') {
      $query->where('admin_id', $filters['admin_id']);
    }
    $receipts = $query->paginate(20); // Paginate the query
    $lastInputReceipt = StoreReceipt::where(['direction' => 1])->orderBy('id', "DESC")->first();
    $lastOutputReceipt = StoreReceipt::where(['direction' => 2])->orderBy('id', "DESC")->first();
    // 2 for year - 3 for DocIndex - 2 for DocType - 2 for Month - 5 for Doc Order
    // str_pad(string $input, int $pad_length, string $pad_string = "0", int $pad_type = STR_PAD_RIGHT): string

    $dynamic_in = str_pad($lastInputReceipt->serial + 1, 5, '0', STR_PAD_LEFT);
    $dynamic_out = str_pad($lastOutputReceipt->serial + 1, 5, '0', STR_PAD_LEFT);
    $gen_in_sn = date('y') . self::STORE_RECEIPT_NUMBER . self::INSERT_ENTRY . date('m') . substr($dynamic_in, -5);
    $gen_out_sn = date('y') . self::STORE_RECEIPT_NUMBER . self::OUTPUT_ENTRY . date('m') . substr($dynamic_out, -5);
    $vars = [
      'gen_in_sn' => $gen_in_sn,
      'gen_out_sn' => $gen_out_sn,
      'lasts' => [substr($lastInputReceipt->serial, -5), substr($lastOutputReceipt->serial, -5)],
      'query' => request()->query(),
      'admins' => Admin::all(),
      'stores' => Store::all(),
      'reference_types' => StoreReceipt::getReferenceTypes(),
      'receipt_status' => static::$receipt_status,
      'receipt_direction' => static::$receipt_direction,
      'receipts' => $receipts,
      'insert_entry' => self::INSERT_ENTRY,
      'output_entry' => self::OUTPUT_ENTRY,
    ];

    return view('admin.stores.receipts.index', $vars);
  }

  /**
   * عرض نموذج لإنشاء مورد جديد جديد.
   * هذه الدالة تعرض نموذجًا لإنشاء إيصال جديد. لا توجد معالجة إضافية
   * في الوقت الحالي.
   *
   * @return \Illuminate\View\View
   */
  public function create(): View
  {
    //
    return view('admin.stores.receipts.create');
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
        'reference'               => $request->reference,
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
      return redirect()->back()->withInput()->withError('Failed to save, due to: ' . $err);
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

  public function searchReceipt(Request $request)
  {
    $query = StoreReceipt::query()->withTrashed()->orderBy('serial', 'desc');
    // Serial search
    if ($request->serial) {
      $query->where('serial', 'LIKE', '%' . $request->serial . '%');
    }
    // Date range filter
    if ($request->after_date) {
      $query->whereDate('reception_date', '>=', $request->after_date);
    }
    if ($request->before_date) {
      $query->whereDate('reception_date', '<=', $request->before_date);
    }
    $receipts = $query->paginate(20);
    $vars = [
      'receipts' => $receipts,
      'reference_types' => StoreReceipt::getReferenceTypes(),
      'receipt_status' => static::$receipt_status,
      'receipt_direction' => static::$receipt_direction,
    ];
    return view('admin.stores.receipts.search.search',  $vars);
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

    $receipt = StoreReceipt::withTrashed()->where('id', $id)->first();
    $stores   = Store::all();
    $admins   = Admin::all();
    $vars = [
      'reference_types'   => StoreReceipt::getReferenceTypes(),
      'status'           => self::$status,
      'admins'           => $admins,
      'receipt'          => $receipt,
      'stores'           => $stores,

    ];
    return view('admin.stores.receipts.edit', $vars);
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
  public function update(UpdateRececiptRequest $request)
  {

    try {
      $receipt = StoreReceipt::find($request->id);
      $validated = $request->validated();
      $receipt->updated_by = currentUserId();
      $receipt->update($validated);

      return redirect()->route('display-recepits-list')->with('success', 'Receipt updated successfully');
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
  public function archiveReceipt($id)
  {

    // العثور على الإيصال باستخدام المعرف
    $receipt = StoreReceipt::find($id);
    // التحقق مما إذا كان الإيصال موجودًا

    if (!$receipt) {
      return redirect()->back()->with('error', 'Receipt not found.');
    }
    try {
      $receipt->status = 3;
      $receipt->deleted_at = now(); // تعيين قيمة deleted_at إلى التاريخ والوقت الحالي
      $receipt->save();
      return redirect()->back()->with('success', 'Receipt Archived successfully.');
    } catch (Exception $e) {
      return redirect()->back()->with('error', 'Error approving receipt: ' . $e->getMessage());
    }
  }

  public function approveReceipt($id)
  {
    // العثور على الإيصال باستخدام المعرف
    $receipt = StoreReceipt::find($id);
    // التحقق مما إذا كان الإيصال موجودًا

    if (!$receipt) {
      return redirect()->back()->with('error', 'Receipt not found.');
    }
    try {
      $receipt->status = 2;
      $receipt->updated_by = currentUserId(); // إذا كنت تحتاج إلى تتبع من قام بالتحديث
      $receipt->save();
      return redirect()->back()->with('success', 'Receipt Archived successfully.');
    } catch (Exception $e) {
      return redirect()->back()->with('error', 'Error approving receipt: ' . $e->getMessage());
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

  public function restore($id)
  {
    try {
      $receipt = StoreReceipt::withTrashed()->find($id); // Use find() to get the model instance
      if ($receipt) { // Check if the receipt exists
        $receipt->restore();
        $receipt->status = 2;
        $receipt->save();

        return redirect()->back()->with(['success' => 'Receipt Restore Successfully']);
      } else {
        return redirect()->back()->with(['error' => 'Receipt not found.']); // Handle the case where the receipt doesn't exist.
      }
    } catch (Exception $err) {
      return redirect()->back()->with(['error' => 'Receipt can not be restored due to: ' . $err->getMessage()]); // Use getMessage() for more specific error info
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
  public function  destroy($id)
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
