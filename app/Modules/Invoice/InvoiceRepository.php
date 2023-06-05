<?

declare(strict_types=1);

namespace App\Modules\Invoice;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Collection;

class InvoiceRepository
{
    public function getAllData(): Collection
    {
        return Invoice::all();
    }
}
