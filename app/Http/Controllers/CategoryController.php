<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use COM;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $param = [
            'categories' => $categories,
        ];
        return view('admin.categories.index', $param);
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $categories = new Category();
        $categories->name = $request->name;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public/assets/category/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $categories->image = $new_image;
            $data['product_image'] = $new_image;
        }
        // $category->description = $request->description;
        $categories->save();
        alert()->success('Thêm', 'thành công');

        return redirect()->route('categories.index');
    }


    public function show(string $id)
    {
    }


    public function edit(string $id)
    {
        $categories = Category::find($id);
        return view('admin.categories.edit', compact('categories'));
    }


    public function update(Request $request, string $id)
    {
        $categories = Category::find($id);
        $categories->name = $request->name;
        $get_image = $request->image;
        if ($get_image) {
            $path = 'public/assets/category/' . $categories->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/assets/category/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $categories->image = $new_image;
            // dd($product)
            $data['product_image'] = $new_image;
        }
        $categories->save();
        alert()->success('sửa', 'thành công');

        return redirect()->route('categories.index');
    }


    public function destroy(string $id)
    {
        // Category::find($id)->delete();
        // alert()->success('xóa','thành công');
        // return redirect()->route('categories.index');
        $product = Category::find($id);
        $product->delete();
        alert()->success('Sản phẩm đã được đưa vào thùng rác!');
        return redirect()->route('categories.index');
    }

    public function trash()
    {
        $softs = Category::onlyTrashed()->get();

        return view('admin.categories.trash', compact('softs'));
    }

    public function restore($id)
    {
        try {
            $softs = Category::withTrashed()->find($id);
            $softs->restore();
            alert()->success('Khôi phục sản phẩm thành công!');
            return redirect()->route('categories.trash');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('categories.trash');

      }
    }
    //xóa vĩnh viễn
   public function force_delete(string $id)
    {
        try {
              //1: tìm ra nhũng product có cate_id = $id
                $products = Product::where('category_id', $id)->get();
                //2: chuyển những product có cate_it đó về 1 cate _id khác
                foreach ($products as $product) {
                        $product->category_id = 1;
                        $product->save();
                        //xoá

                        $soft = Category::withTrashed()->where('id', $id)->forceDelete();

                        alert()->success('Xóa Vĩnh Viễn Thành Công!');
                        return redirect()->route('categories.trash');
                }

        } catch (\exception $e) {
                Log::error($e->getMessage());
                toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
                return redirect()->route('categories.trash');
        }
     }

}
