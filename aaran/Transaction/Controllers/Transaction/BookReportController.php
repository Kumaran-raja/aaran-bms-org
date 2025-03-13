<?php

namespace Aaran\Transaction\Controllers\Transaction;


use Aaran\Common\Models\TransactionType;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;;
use Aaran\Transaction\Models\AccountBook;
use Aaran\Transaction\Models\Transaction;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class BookReportController extends Controller
{
    public $byParty;
    public $transaction;
    public $opening_bal;
    public $accountId;
    public $transId;
    public $transName;
    public $trans_type_id;
    public $startDate;
    public $endDate;
    public $opening_balance;
    public $contact_detail_id;
    public $invoiceDate_first;

    public function __invoke($id, $start_date, $end_date)
    {
        $this->byParty = $id;

        $this->transaction = AccountBook::find($id);

        if ($this->transaction) {
            $this->opening_balance = $this->transaction->opening_balance;
            $this->accountId = $this->transaction->id;
            $this->transId = $this->transaction->trans_type_id;
        } else {
            $this->opening_balance = 0;
            $this->accountId = null;
            $this->transId = null;
        }

        if ($this->transId == 108) {
            $this->transName = TransactionType::find(108)?->vname ?? 'Unknown Transaction';
        } elseif ($this->transId == 109) {
            $this->transName = TransactionType::find(109)?->vname ?? 'Unknown Transaction';
        } else {
            $this->transName = TransactionType::find(136)?->vname ?? 'Unknown Transaction';
        }

        Pdf::setOption(['dpi' => 150, 'defaultPaperSize' => 'a4', 'defaultFont' => 'sans-serif', 'fontDir']);

        $this->invoiceDate_first = Carbon::now()->subYear()->format('Y-m-d');

        $pdf = PDF::loadView('aaran-ui::components.pdf-view.Transaction.bookReport', [
            'transaction' => Transaction::where('trans_type_id', $this->transId)
                ->where('account_book_id', $this->accountId)
                ->whereDate('vdate', '>=', $start_date ?: $this->invoiceDate_first)
                ->whereDate('vdate', '<=', $end_date ?: $this->invoiceDate_first)
                ->get(),
            'cmp' => Company::printDetails(session()->get('company_id')),
            'start_date' => date('d-m-Y', strtotime($start_date)),
            'contact' => Contact::find($id),
            'end_date' => date('d-m-Y', strtotime($end_date)),
            'opening_balance' => $this->opening_balance,
            'party' => $this->byParty,
            'trans_name' => $this->transName,
        ]);

        $pdf->render();
        return $pdf->stream();
    }


}
