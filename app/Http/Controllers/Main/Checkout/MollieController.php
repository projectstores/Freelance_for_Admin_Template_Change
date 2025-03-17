<?php
 
namespace App\Http\Controllers\Main\Checkout;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MollieController extends Controller
{
   
    /**
     * Get cashfree token
     *
     * @param Request $request
     * @return mixed
     */
    public function redirect(Request $request)
    {
        return redirect('account/orders');
    }

}