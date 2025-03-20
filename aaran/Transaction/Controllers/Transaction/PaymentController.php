<?php

namespace Aaran\Transaction\Controllers\Transaction;

use Aaran\Common\Models\PaymentMode;
use Aaran\Master\Models\Company;
use Aaran\Transaction\Models\Transaction;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    public $mode_id;
    public $mode_name;

    public function __invoke($id)
    {
        if ($id == 1) {
            $this->mode_id = 111;
            $this->mode_name = PaymentMode::find($this->mode_id)->vname;
        } elseif ($id == 2) {
            $this->mode_id = 110;
            $this->mode_name = PaymentMode::find($this->mode_id)->vname;
        }

//        return pdf('pdf-view.Transaction.payment', [
        Pdf::setOption(['dpi' => 150, 'defaultPaperSize' => 'a4', 'defaultFont' => 'sans-serif','fontDir']);

        $pdf = PDF::loadView('aaran-ui::components.pdf-view.Transaction.payment'
            , [
            'list' => $this->getList(),
            'cmp' => Company::printDetails(session()->get('company_id')),
            'mode_id' => $this->mode_id,
            'mode_name' => $this->mode_name,
        ]);
        $pdf->render();

        return $pdf->stream();

    }

    public function getList()
    {
        return Transaction::where('mode_id', $this->mode_id)
            ->where('active_id','=','1')->get();
    }
    #endregion
}
