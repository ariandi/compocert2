<?php

namespace App\Http\Controllers\Front\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use DataTables;
use Input;
use App\Entities\Admin\Nodestructures;
use App\Entities\Admin\Certificate;
use App\Entities\Admin\Node;
use App\User;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function __construct()
    {
        if( !session()->has('LanguageID') ){
            session(['LanguageID' => 'no']);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($alias = 'home', Request $request)
    {
        $uriPath = $request->path();

        $node = Node::find(2);
        $website = Node::where('id', 25)->first();
        $whatWeOffer = Node::where('id', 37)->first();

        // $tigaIcon = $this->menus(12);
        $websiteChild = $this->menus(25);
        // $quotesChild = $this->menus(34);
        $whatWeOfferChild = $this->menus(37);

        $parent = $this->getParent($node->id);

        return view('front.home.index', [
                                                'website' => $website,
                                                'websiteChild' => $websiteChild,
                                                'whatWeOffer' => $whatWeOffer,
                                                'whatWeOfferChild' => $whatWeOfferChild,
                                                'node' => $node,
                                                'parent_data' => $parent
                                            ]);
    }

    public function content($alias = 'home', Request $request)
    {
        $uriPath = urldecode($request->path());

        if($uriPath != '/'){
            $node = Node::where(['Alias' => $uriPath, 'active' => 1])->first();
        }

        $cert = new Certificate();

        if( \Session::get('cert') ){
            $cert = \Session::get('cert');
        }

        $parent = null;

        $parent = $this->getParent($node->id);
        $aside = $this->menus($parent->id);

        return view('front.home.'.$node->template, [
            'node' => $node,
            'cert' => $cert,
            'parent' => $parent->title,
            'aside' => $aside,
            'parent_data' => $parent,
        ]);
    }




    public function searchnode($id = 1)
    {
        $node = Node::select('title', 'alias', 'id', 'content1', 'content4', 'content3', 'content4')->where(['id' => $id])->first();
        return $node;
    }

    public function menus($parent = 1)
    {
        $selProdChild = Nodestructures::select('n.title', 'n.alias', 'n.id',
                                                'n.content1', 'n.content2', 'n.content3', 'n.content4',
                                                'ms.path', 'n.keyword', 'n.description')
                            ->join('nodes as n', 'n.id', '=', 'nodestructures.child_node_id')
                            ->leftjoin('mediastorages as ms', 'n.media1', '=', 'ms.id')
                            ->where(['nodestructures.parent_node_id' => $parent, 'nodestructures.active' => 1, 'n.active' => 1])->get();
        return $selProdChild;
    }

    public function sendEmailSubscript(Request $request)
    {
        //$input = $request->all();
        $checkdata = User::where('email',$request->email)->first();

        if(! isset($checkdata)){

            $createnew = User::create([
                'name'          => $request->name,
                'username'      => explode(' ', $request->name)[0],
                'gender'        => 'M',
                'role'          => 'viewer',
                'lang_id'       => 'en',
                'profile_img'   => 'images/profiles/user',
                'active'        => 1,
                'email'         => $request->email,
                'password'      => bcrypt("123456"),
            ]);

        }


        $objDemo = new \stdClass();
        $objDemo->sento = '1';
        $objDemo->name  = $request->name;
        $objDemo->email = $request->email;

        Mail::to($request->email)->send(new SendEmail($objDemo));

        $objDemos = new \stdClass();
        $objDemos->sento = '2';
        $objDemos->name  = $request->name;
        $objDemos->email = $request->email;

        Mail::to('rune@wisehouse.no')->send(new SendEmail($objDemos));

        //$sendemail = Mail::to($datauser->email)->send(new SendEmail($objDemo));
        return redirect()->route('front.home')
                        ->with('success','Tusen takk');
    }

    public function getParent($id = 1)
    {
        $getParent = Nodestructures::select('n.title', 'n.alias', 'n.id')
                            ->join('nodes as n', 'n.id', '=', 'nodestructures.parent_node_id')
                            ->where(['nodestructures.child_node_id' => $id, 'nodestructures.active' => 1, 'n.active' => 1])->first();
        return $getParent;
    }
}

