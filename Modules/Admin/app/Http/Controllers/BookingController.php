<?php
namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index() {
      $bookings = Booking::where('completed',1)->withTrashed()->orderBy('id','desc')->get();
      return view('admin::booking.index',compact('bookings'));
    }
    
}
