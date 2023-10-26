<?php

namespace App\Http\Controllers\wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class walletManage extends Controller
{
  public function index()
  {
    return view('content.wallet.wallet-manage');
  }
}