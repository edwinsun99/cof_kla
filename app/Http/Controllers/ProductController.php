// app/Http/Controllers/ProductController.php
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getNamaType($pn)
    {
        $product = Product::where('product_number', $pn)->first();

        if ($product) {
            return response()->json(['nama_type' => $product->nama_type]);
        } else {
            return response()->json(['nama_type' => null]);
        }
    }
}
