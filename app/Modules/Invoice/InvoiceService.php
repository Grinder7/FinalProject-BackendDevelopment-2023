<?

declare(strict_types=1);

namespace App\Modules\Invoice;

use Illuminate\Database\Eloquent\Collection;

class InvoiceService
{
    public InvoiceRepository $invoiceRepository;
    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }
    public function getAllData(): Collection
    {
        return $this->invoiceRepository->getAllData();
    }
}
