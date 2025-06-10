<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
class TransactionController extends Controller
{
    
    public function index() {
     $transactions = Transaction::withTrashed()->orderBy('id','desc')->get();
     return view('admin::transaction.index',compact('transactions'));
    }
}
