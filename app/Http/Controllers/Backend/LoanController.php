<?php

namespace App\Http\Controllers\Backend;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function user_loan()
    {
        $loans = Loan::orderBy('id', 'asc')->get();
        return view('frontend.pages.loan.manage', compact('loans'));
    }

        /**
     * Display a listing of the resource.
     */
    public function admin_loan()
    {
        $loans = Loan::orderBy('id', 'asc')->get();
        $users = User::orderBy('id', 'asc')->get();
        return view('backend.pages.loan.manage', compact('loans','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $loans = new Loan;

        $loans->money               = $request->money;
        $loans->type                = $request->type;
        $loans->instalment          = $request->instalment;
        $loans->each_instalment_pay = $request->each_instalment_pay;
        $loans->payment_terms       = $request->payment_terms;
        $loans->note                = $request->note;
        $loans->user_id             = $request->user_id;
        $loans->status              = $request->status;

        $loans->save();
        Alert::success('Thank you!', 'Your Loan Application has been Successfully Submitted.');
        return redirect()->back();

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function user_edit(string $id)
    {

        $loan = Loan::find($id);
        if(!is_null($loan)){
            return view('frontend.pages.loan.edit', compact('loan'));
        }
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function admin_edit(string $id)
    {

        $loan = Loan::find($id);
        if(!is_null($loan)){
            return view('backend.pages.loan.edit', compact('loan'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function user_update(Request $request, string $id)
    {
        $loan = Loan::find($id);

        if(!is_null($loan)){
        $loan->money               = $request->money;
        $loan->type                = $request->type;
        $loan->instalment          = $request->instalment;
        $loan->each_instalment_pay = $request->each_instalment_pay;
        $loan->payment_terms       = $request->payment_terms;
        $loan->note                = $request->note;

        $loan->save();
        Alert::info('Thank you!', 'Your Loan Application has been Successfully Updated.');
        return redirect()->route('user.loan.manage');
    }
    }


        /**
     * Update the specified resource in storage.
     */
    public function admin_update(Request $request, string $id)
    {
        $loan = Loan::find($id);

        if(!is_null($loan)){
        $loan->money               = $request->money;
        $loan->type                = $request->type;
        $loan->instalment          = $request->instalment;
        $loan->each_instalment_pay = $request->each_instalment_pay;
        $loan->payment_terms       = $request->payment_terms;
        $loan->note                = $request->note;
        $loan->status              = $request->status;

        $loan->save();
        Alert::info('Thank you!', 'Loan Application has been Successfully Updated.');
        return redirect()->route('admin.loan.manage');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function user_destroy(string $id)
    {
        $loan = Loan::find($id);

        if(!is_null($loan)){
            $loan->delete();
            Alert::warning('Successfully Deleted', 'Your Loan Application has been Successfully Deleted.');
            return redirect()->route('user.loan.manage');
        }
    }

        /**
     * Remove the specified resource from storage.
     */
    public function admin_destroy(string $id)
    {        $loan = Loan::find($id);

        if(!is_null($loan)){
            $loan->delete();
            Alert::warning('Successfully Deleted', 'Loan Application has been Successfully Deleted.');
            return redirect()->route('admin.loan.manage');
        }
    }
}
