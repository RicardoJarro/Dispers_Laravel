<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Category;
use App\GeneralCategory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\TestMail;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $pdf = PDF::loadView('prueba');
        return $pdf->stream('prueba.pdf');
    }

    public function guardarpdf(){

        $categorias = Category::all();
        $pdf = PDF::loadView('admin.category.pdfcategoryhorizontal',compact('categorias'));
    	Storage::disk('public')->put(date('Y-m-d-H-i-s').'-categoriashorizontal', $pdf);
    	return redirect()->back()->with('status', '¡PDF guardado correctamente!');
    }

    public function pdf_catalogo(){
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $catalogo=GeneralCategory::with('categories.products.images')->get();
       // $pdf=PDF::loadView('tienda.productos.catalogo',compact('catalogo'));

        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('tienda.productos.catalogo',compact('catalogo'))->stream();
        return $pdf->download('categoriashorizontal.pdf');

        return redirect()->back()->with('status', '¡PDF guardado correctamente!');
    }

    public function PDFCategoriasHorizontal(Request $request,$id){
     
     $pedido=Order::with('order_details.product')->find($id);
     $fecha=Carbon::now()->toDateTimeString();
     $user=$pedido->user;
    //  $pdf = (\PDF::loadView('usuarios',compact('users')))->setPaper('a4','landscape');
        $pdf = (PDF::loadView('tienda.compra.factura_enviar',compact('pedido','fecha')))->setPaper('a4','landscape');

    // $categorias = Category::all();
    //  $pdf = PDF::loadView('admin.category.pdfcategoryhorizontal',compact('categorias'));
    
     //$usuario=$pedido->user;
     $data["email"]=$request->get($user->email);
     $data["client_name"]=$request->get($user->nombre);
     $data["subject"]=$request->get("Gracias por comprar");

         Mail::send('welcome', $data, function($message)use($data,$pdf,$user) {
         $message->to($user->email, $user->nombre)
         ->subject("Gracias por comprar ")
         ->attachData($pdf->output(), "Factura.pdf");
         });
    
     if (Mail::failures()) {
          $this->statusdesc  =   "Error sending mail";
          $this->statuscode  =   "0";
          return redirect()->route('ver_compra',$id)->with('cancelar','Ocurrio un problema');
     }else{

        $this->statusdesc  =   "Message sent Succesfully";
        $this->statuscode  =   "1";
        return redirect()->route('ver_compra',$id)->with('datos','Factura enviada');
     }
     
     return redirect()->route('ver_compra',$id)->with('datos','Factura enviada');
     
    //Mail::to('juandiego-271296@hotmail.es')->send(new TestMail());

    // return $pdf->setPaper('a4', 'landscape')->download('categoriashorizontal.pdf');
    
    }




    public function PDFCategorias(Request $request)
    {
     
        $categorias = Category::all();

        $pdf = PDF::loadView('admin.category.pdfcategory',compact('categorias'));
        return $pdf->download('categorias.pdf');
    }
}