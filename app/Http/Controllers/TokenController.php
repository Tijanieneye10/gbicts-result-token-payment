<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Providers\SendTokenViaEmail;
use Illuminate\Support\Facades\Gate;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('password.confirm', ['only' => ['show']]);
    }
    public function index()
    {
        return view('pages.getCards');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        list($status, $ref, $transId) = array($request->status, $request->tx_ref, $request->transaction_id);
        // Check if transaction is successfuly
        if ($status === 'successful' && isset($ref) && isset($transId)) {

            $numberOfTokens = session()->get('tokenNumber');
            $result = upsertDatabase($numberOfTokens);

            // Event to send email
            SendTokenViaEmail::dispatch(auth()->user(), $result);
            return redirect()->route('tokens.index')->with('status', 'Token(s) purchased successfully');
        } else {
            return redirect()->route('tokens.index')->with('status', 'Transaction failed try again');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Put the number of token purchase on session
        $request->session()->put('tokenNumber', $request->token);
        $uri = payment_method($request->token);
        return redirect()->to($uri);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $token)
    {

        if (Gate::allows('updateSoldTime', $token)) {
            $date = Carbon::now();
            $token->update(['sold' => $date]);
            return back();
        } else {
            abort(403);
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
