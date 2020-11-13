<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Gallery;
use App\Painting;
use App\User;
use App\Order;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::user()->is_admin){
            $users = User::all();
            $paintings = Painting::all();
            $orders = Order::all();
            $galleries = Gallery::all();

            $orders_by_state = [];
            if(count($orders) != 0){
                $orders_by_state[0] = [
                    'progress' => round( (count( Order::where('is_delivered', True)->get() ) / count($orders)) * 100),
                    'state' => "Delivered"
                ];
                $orders_by_state[1] = [
                    'progress' => round( (count( Order::where('is_delivered', False)->get() ) / count($orders)) * 100),
                    'state' => "Pending"
                ];
            }else{
                $orders_by_state[0] = [
                    'progress' => 100,
                    'state' => "Delivered"
                ];
                $orders_by_state[1] = [
                    'progress' => 100,
                    'state' => "Pending"
                ];
            }

            return view('admin', ['users' => $users, 'paintings' => $paintings, 'orders' => $orders,
            'galleries' => $galleries, 'orders_by_state' => $orders_by_state]);

        }

        return redirect('/');
    }

    public function galleriesIndex()
    {
        if(Auth::user()->is_admin){
            $users = User::all();
            $paintings = Painting::all();
            $orders = Order::all();
            $galleries = Gallery::all();

            return view('admin-galleries', ['users' => $users, 'paintings' => $paintings, 'orders' => $orders,
            'galleries' => $galleries]);
        }

        return redirect('/');

    }

    public function paintingsIndex()
    {
        if(Auth::user()->is_admin){
            $users = User::all();
            $paintings = Painting::all();
            $orders = Order::all();
            $galleries = Gallery::all();

            return view('admin-paintings', ['users' => $users, 'paintings' => $paintings, 'orders' => $orders,
            'galleries' => $galleries]);
        }

        return redirect('/');

    }

    public function ordersIndex()
    {
        if(Auth::user()->is_admin){
            $users = User::all();
            $paintings = Painting::all();
            $orders = Order::all();
            $galleries = Gallery::all();
            $infos = [];

            for($i = 0 ; $i < count( $orders ) ; $i++){
                $infos[$i]['id'] = $orders[$i]->id;
                $infos[$i]['product_id'] = $orders[$i]->painting_id;
                $infos[$i]['product_name'] = Painting::findOrFail($orders[$i]->painting_id)->title;
                $infos[$i]['user_id'] = $orders[$i]->user_id;
                $infos[$i]['user_name'] = User::findOrFail($orders[$i]->user_id)->name;
                $infos[$i]['artist_id'] = Painting::findOrFail($orders[$i]->painting_id)->gallery->user->id;
                $infos[$i]['artist_name'] = Painting::findOrFail($orders[$i]->painting_id)->gallery->user->name;
                $infos[$i]['is_delivered'] = $orders[$i]->is_delivered;
            }

            return view('admin-orders', ['users' => $users, 'paintings' => $paintings, 'orders' => $orders,
            'galleries' => $galleries, 'infos' => $infos]);
        }

        return redirect('/');
    }

    public function usersIndex()
    {
        if(Auth::user()->is_admin){
            $users = User::all();
            $paintings = Painting::all();
            $orders = Order::all();
            $galleries = Gallery::all();

            return view('admin-users', ['users' => $users, 'paintings' => $paintings, 'orders' => $orders,
            'galleries' => $galleries]);
        }

        return redirect('/');
    }

    public function permissionUser($id){
        $state = request('state');
        $user = User::findOrFail($id);
        if($state=='normal'){
            $user->is_admin = FALSE;
        }elseif($state=='admin'){
            $user->is_admin = TRUE;
        }
        $user->save();
        return back();
    }

    public function orderDeliver($id)
    {
        if(Auth::user()->is_admin){
            $order = Order::findOrFail($id);
            $order->is_delivered = TRUE;
            $order->save();

            return back();
        }

        return redirect('/');
    }

    public function orderIndex($id){
        if(Auth::user()->is_admin){
            $users = User::all();
            $paintings = Painting::all();
            $orders = Order::all();
            $galleries = Gallery::all();


            $order = Order::findOrFail($id);
            $painting = Painting::findOrFail($order->painting_id);
            $user= User::findOrFail($order->user_id);



            return view('admin-order', ['users' => $users, 'paintings' => $paintings, 'orders' => $orders, 'galleries' => $galleries,'order'=>$order,'painting'=>$painting,'user'=>$user]);
        }

        return redirect('/');

    }


    public function destroyUser($id){
        $user = User::findOrFail($id);

        $orders = Order::all();
        foreach($orders as $order){
            if($order->user_id == $id){
                $order->delete();
            }
        }

        foreach($user->galleries as $gallery){
            foreach($gallery->paintings as $painting){
                if($painting->image != "default.jpg"){
                    Storage::delete( 'public/painting/'. $painting->image );
                }
                $painting->delete();
            }

            if($gallery->image != "default.jpg"){
                Storage::delete( 'public/gallery/'. $gallery->image );
            }
            $gallery->delete();
        }

        if($user->image != "default_avatar.jpg"){
            Storage::delete( 'public/profile/'. $user->image );
        }
        $user->delete();

        return back()
        ->with('success',"The user is deleted successfully!!");

    }

    public function destroyPainting($id)
    {
        if(Auth::user()->is_admin){
            $painting = Painting::findOrFail($id);

            if($painting->image != "default.jpg"){
                Storage::delete( 'public/painting/'. $painting->image );
            }

            $painting->delete();

            return redirect('/admin/paintings');
        }

        return redirect('/');

    }

    public function destroyGallery($id)
    {
        if(Auth::user()->is_admin){
            $gallery = Gallery::findOrFail($id);

            foreach ($gallery->paintings as $painting) {
                if($painting->image != "default.jpg"){
                    Storage::delete( 'public/painting/'. $painting->image );
                }

                $painting->delete();
            }

            if($gallery->image != "default.jpg"){
                Storage::delete( 'public/gallery/'. $gallery->image );
            }

            $gallery->delete();

            return redirect('/admin/galleries');
        }

        return redirect('/');

    }

}
