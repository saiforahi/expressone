<?php
namespace App\Http\Controllers;
use Validator;
use App\Models\Area;
use App\Models\Blog;
use App\Models\Team;
use App\Models\Unit;
use App\Models\About;
use App\Models\Slider;

use App\Models\Vision;
use App\Models\History;
use App\Models\Message;
use App\Models\Mission;
use App\Models\Promise;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\Blog_category;

class HomeController extends Controller
{

    public function index()
    {
        $banner = Slider::where('status','1')->first();
        $about = About::where('id','1')->first();
        return view('index',compact('banner','about'));
    }

    public function about()
    {
        $about = About::where('id','1')->first();
        $abouts = About::where('id','!=','1')->where('status','1')->get();
        return view('about',compact('about','abouts'));
    }
    public function team()
    {
        $about = Team::where('id','1')->first();
        $abouts = Team::where('id','!=','1')->where('status','1')->get();
        return view('team',compact('about','abouts'));
    }
    public function promise()
    {
        $about = Promise::where('id','1')->first();
        $abouts = Promise::where('id','!=','1')->where('status','1')->get();
        return view('promise',compact('about','abouts'));
    }
    public function vision()
    {
        $about = Vision::where('id','1')->first();
        $abouts = Vision::where('id','!=','1')->where('status','1')->get();
        return view('vision',compact('about','abouts'));
    }
    public function mission()
    {
        $about = Mission::where('id','1')->first();
        $abouts = Mission::where('id','!=','1')->where('status','1')->get();
        return view('mission',compact('about','abouts'));
    }
    public function history()
    {
        $about = History::where('id','1')->first();
        $abouts = History::where('id','!=','1')->where('status','1')->get();
        return view('history',compact('about','abouts'));
    }

    function pricing(){
        return view('pricing');
    }

    public function tracking()
    {
        return view('tracking');
    }
    public function track_order(Request $request){
        // dd($request->all());
        $shipment = Shipment::where('tracking_code',$request->tracking_code)->first();
        return view('includes.tracking-info',compact('shipment'));
    }


    public function contact()
    {
        return view('contact');
    }

    function save_contact(Request $request){
        $data = $this->fields();
        // dd($request->all());
        $message = Message::create($data);
        return back()->with('message','Your Message has been sent successfully!');
    }

    public function blog()
    {
        $categories = Blog_category::orderBy('name')->get();
        $featuresPhotos = Blog::select('photo','id')->inRandomOrder()->limit(9)->get();
        // dd($featuresPhotos);
        $blogs = Blog::latest()->paginate(10);
        return view('blog',compact('blogs','categories','featuresPhotos'));
    }

    function category_post(Blog_category $blog_category){
        $categories = Blog_category::orderBy('name')->get();
        $featuresPhotos = Blog::select('photo','id')->inRandomOrder()->limit(9)->get();
        $blogs = Blog::where('blog_category_id',$blog_category->id)->paginate(10);
        return view('blog',compact('blogs','categories','featuresPhotos'));
    }

    function seach_blog(Request $request){
        $categories = Blog_category::orderBy('name')->get();
        $featuresPhotos = Blog::select('photo','id')->inRandomOrder()->limit(9)->get();
        $keyword = $request->search;
        // dd($keyword);
        $blogs = BLog::query()
           ->where('title', 'LIKE', "%{$keyword}%")
           ->orWhere('description', 'LIKE', "%{$keyword}%")
           ->paginate(10);
        return view('blog',compact('blogs','categories','featuresPhotos'));
    }

    function fields(){
        return request()->validate( [
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'message'=>'required|min:15',
        ]);
    }

    public function rateCheck(Request $request)
    {
        $price = 0;
        $total_price = 0;
        $cod_type = 0;
        $cod_amount = 0;
        $unit = Unit::find($request->unit);

        return ['status' => 'success', 'total_price' => $total_price, 'price' => $price, 'cod' => $cod_type, 'cod_amount' => $cod_amount, 'cod_rate' => ''];
    }
}
